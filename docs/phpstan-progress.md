# PHPStan Zero-Errors Progress — Modules

Tracks the ongoing effort to bring `phpstan analyse Modules` to zero errors,
using the project's existing `phpstan.neon` (only the project owner may edit that file).

## Session 2026-07-07 — RESULT: 0 errors

`phpstan analyse Modules` (5889 files) now reports `[OK] No errors`, down from
a baseline of 490. Reached via two parallel agent lanes (`User`/`Xot` vs
`Geo`+small modules, coordinated with `.lock` files, no collisions) plus two
direct single-root-cause fixes that each cascaded into ~20-30 unrelated
classes:

- `Xot/app/Filament/Traits/TransFuncTrait.php` line 78: `$transValue` from
  `Arr::get($group_arr, $item)` inside an `is_array()` branch was inferred as
  `array<mixed, mixed>` instead of `array<string, mixed>` — fixed by rebuilding
  the array with an explicit `foreach` narrowing keys to `int|string` (a
  concurrent agent refined this further than my first inline-`@var` pass).
- `Xot/app/Filament/Traits/TransTrait.php`: `$replace`/`$params` docblocks were
  typed `array<int|string, ...>` but every real caller only ever needs
  `array<string, ...>` (verified zero external callers pass int keys) —
  narrowed the four `@param` tags accordingly, fixed ~20 `argument.type`
  errors across every class mixing in the trait with zero regressions.

Two real bugs were caught and fixed along the way, not just type annotations:
1. A fatal PHP error from invalid generic syntax in a native type hint in
   `TransFuncTrait.php` (`string|array<string,mixed>|Translator|null` outside
   a docblock isn't valid PHP) — was breaking `php artisan` bootstrap entirely.
2. SQL injection risk in `Geo/Models/Location.php::scopeWithinDistance()` —
   raw float interpolation into `whereRaw()` replaced with bound parameters.

Also found: `Modules/Geo/tests/Unit/Actions/GoogleMaps/GetAddressFromGoogleMapsActionTest.php`
has pre-existing corrupted syntax (stray `)` inside `Http::fake([...])`) that
blocks `pest` for the whole `Geo` module — untouched (out of phpstan scope,
needs its own fix), flagged here for whoever owns test maintenance next.

### Progression (for reference)

Baseline → current: 490 → 324 errors (166 fixed, zero regressions verified via
scoped `phpstan analyse` + `php -l` after every edit).

### Fixes applied, by pattern

- **`HasTeams.php` / `Role.php` (User module)**: malformed `Collection<TeamContract>`
  generic (missing key type), two `getTeamAdmins()`/`getTeamMembers()` missing
  `@return Collection<int, XotUserContract>`, `Role::team()` missing `@return`
  entirely, `Role::permissions()` `BelongsToMany` missing generics,
  `firstOrCreate`/`updateOrCreate` `@method` tags missing `array<string, mixed>` value types.
- **`HasXotFactory` trait usage (14 models)**: models using
  `use HasXotFactory;` without the required
  `/** @use HasXotFactory<\Illuminate\Database\Eloquent\Factories\Factory<static>> */`
  docblock. Convention already established elsewhere in the codebase
  (`BaseUser.php`, `XotBaseModel.php`) — bind `TFactory` to the generic
  `Factory<static>`, do not reference the model's specific Factory subclass.
- **Factory classes missing `@extends Factory<Model>` (25 files, User + Geo
  modules)**: `class XxxFactory extends Factory` with no generic annotation.
  Fixed by reading each file's `protected $model = Xxx::class;` line and adding
  `@extends Factory<Xxx>` above the class. One file (`TenantFactory.php`) also
  needed its `@var class-string<Model>` narrowed to `class-string<Tenant>` for
  the `$model` property, and dropped the now-unused `Model` import.

### Former blocker — resolved

`Xot/app/Traits/Updater.php`/`RelationX.php` `$this`-as-template-arg errors on
`Role`/`Permission`/`BasePivot` (described in earlier drafts of this doc as an
unresolvable Larastan quirk after extensive bisection) were in fact resolved
as part of reaching 0 errors this session — the fix landed in the parallel
`User`/`Xot` agent lane, folded into the general relation-generics cleanup
rather than as an isolated targeted fix. If this resurfaces after a future
change, don't assume it's unfixable — re-check the current file state first.

### Convention reference: covariance

`TDeclaringModel` on `BelongsTo`/`HasMany`/`BelongsToMany` is **not covariant**.
Use `$this` in `@return` tags on instance methods, never `static` — `static`
produces a `return.type` mismatch even when the method body is correct
(confirmed on `Role::permissions()`).

## Error categories risolte (sessione 2026-07-07)

Tutte le categorie sotto sono state azzerate nella campagna parallela:

- `missingType.iterableValue` — bare `array` → `array<string, mixed>` o shape specifiche.
- `missingType.generics` — Collection/BelongsTo/BelongsToMany/Factory/Builder annotati.
- `generics.notSubtype` — follow-on risolti con `$this` invece di `static` su relazioni.
- `return.type` — case-by-case su trait e modelli.
- Stale `@mixin IdeHelperXxx` — rimossi o corretti, mai generati file IdeHelper fantasma.
- Bug reali trovati: fatal syntax in `TransFuncTrait.php`, SQL injection in `Location::scopeWithinDistance()`.

### Blocco storico (risolto o non più riproducibile)

Il blocco `Updater.php`/`RelationX.php` documentato sotto non compare più nell'output
PHPStan corrente — verificare prima di ri-aprire.
