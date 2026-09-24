---
<<<<<<< HEAD
title: "XotBaseSchemaWidget — pattern Filament 5 (codice reale)"
type: concept
module: Xot
tags: [xot, filament, schema, widget]
created: 2026-06-05
updated: 2026-07-24
qmd: "xotbase schemawidget filament 5 HasSchemas formClass getState"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/18"
related:
  - ./wiki/concepts/filament-page-form-wrapper.md
  - ./filament-v5-form-wrapper-blade-pattern.md
  - ../../../../docs/wiki/concepts/filament-v5-schema-in-blade.md
  - ../../../../docs/wiki/concepts/filament-v5-form-in-blade.md
---

# XotBaseSchemaWidget — pattern Filament 5

Fonte codice: `Modules/Xot/app/Filament/Widgets/XotBaseSchemaWidget.php` (letto 2026-07-24).  
Upstream: [schema](https://filamentphp.com/docs/5.x/components/schema) · [form](https://filamentphp.com/docs/5.x/components/form).

## Contratto reale (estratto verificato)

```php
abstract class XotBaseSchemaWidget extends XotBaseWidget implements HasSchemas
{
    use InteractsWithSchemas; // Filament\Schemas\Concerns\…

    public ?array $data = [];

    protected static function formClass(): ?string { return null; }
    protected static function schemaMethod(): string { return 'getFormSchema'; }

    public function form(Schema $schema): Schema
    {
        // se formClass(): FormClass::{schemaMethod()}() → components + statePath('data')
        // else: $this->getFormSchema() → components + statePath('data')
    }

    public function mount(): void
    {
        $this->form->fill([]);
=======
title: "XotBaseSchemaWidget — pattern dichiarativo Filament 4"
type: concept
tags: [xot, filament, widget, religion-r1, code, architecture, opencode-minimax-m3]
created: 2026-06-05
updated: 2026-07-13
qmd: "xotbase schemawidget filament widget religion r1 form fields self validate opencode minimax"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/264"
  - "https://github.com/laraxot/module_xot_fila5/issues/27"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/265"
related:
  - base-classes-additional-fix.md
  - ../../User/docs/r1-form-fields-self-validate.md
  - ../../Themes/Sixteen/docs/r2-ux-register-form-stacked-password.md
  - ../../../docs/chat/register-flow-religions-r1-r6.md
  - ../../../docs/wiki/memories/form-fields-self-validate-religion.md
---

# XotBaseSchemaWidget — pattern dichiarativo Filament 4

> Modulo: `Xot` · Autore code: opencode (MiniMax-M3) · Issue tracking: base #264

## Problema

Prima di questa implementazione (2026-06-05), `Modules\Xot\Filament\Widgets\XotBaseSchemaWidget` era **referenziata da 20+ widget** ma **NON esisteva come file**. Risultato: 500 error `Class "XotBaseSchemaWidget" not found` su tutte le pagine che li usavano.

## Soluzione

`laravel/Modules/Xot/app/Filament/Widgets/XotBaseSchemaWidget.php`:

```php
namespace Modules\Xot\Filament\Widgets;

use Filament\Schemas\Schema;
use Filament\Widgets\Widget;
use Modules\Xot\Filament\Traits\InteractsWithSchemas;
use Modules\Xot\Actions\Filament\GetViewByClassAction;

abstract class XotBaseSchemaWidget extends Widget implements HasSchemas
{
    use InteractsWithSchemas;

    protected static string $baseSchemaClass = '';

    protected string $view = '';

    /** 1) Hook: quale Form class usare (override nei child per specializzare) */
    protected static function formClass(): string
    {
        return static::$baseSchemaClass;
    }

    /** 2) Hook: quale metodo della Form class invocare (default getFormSchema) */
    protected static function schemaMethod(): string
    {
        return 'getFormSchema';
    }

    /** 3) Hook: stato Livewire (override se serve path custom) */
    protected function statePath(): ?string
    {
        return 'data';
    }

    /** 4) Implementazione concreta: delega al formClass + schemaMethod */
    public function form(Schema $schema): Schema
    {
        $formClass = static::formClass();
        $method = static::schemaMethod();

        if ($formClass !== '' && method_exists($formClass, $method)) {
            return $formClass::$method($schema, $this->getRecord());
        }

        return $this->getFormSchema($schema);
    }

    /** 5) Hook: schema locale (fallback) */
    public function getFormSchema(Schema $schema): Schema
    {
        return $schema;
    }

    /** 6) Hook: vista (Filament 4 NON auto-fall-through su temi) */
    public function getView(): string
    {
        if ($this->view !== '') {
            return $this->view;
        }
        return app(GetViewByClassAction::class)->execute(static::class);
>>>>>>> laraxot/dev
    }
}
```

<<<<<<< HEAD
## Religione

| Pezzo | Owner |
|-------|--------|
| Campi + rules | `*Form::get*Schema()` via `formClass` / `schemaMethod` |
| Widget | orchestrazione mount/submit/redirect |
| Submit | `$this->form->getState()` — mai `validateForm()` |
| Blade | `<form wire:submit>` + `{{ $this->form }}` |

## Schema non-form (infolist)

Per UI read-only: `XotBaseInfolistWidget` → metodo `infolist(Schema)` → Blade `{{ $this->infolist }}` (pattern [schema in Blade](https://filamentphp.com/docs/5.x/components/schema)).

## Documentazione obsoleta

Versioni precedenti di questo file citavano `Modules\Xot\Filament\Traits\InteractsWithSchemas` e firme `getFormSchema(Schema $schema): Schema` sulle Form class — **non corrispondono** al file PHP attuale. Ignorarle; usare questo aggiornamento.

## Verifica

```bash
php -l Modules/Xot/app/Filament/Widgets/XotBaseSchemaWidget.php
cd laravel && php artisan view:cache
```
=======
## Simmetria con `XotBaseInfolistWidget`

`XotBaseSchemaWidget` (write) ↔ `XotBaseInfolistWidget` (read) condividono il pattern:
- `infolist(Schema)` ↔ `form(Schema)`
- `getInfolistSchema()` ↔ `getFormSchema(Schema)`
- `getInfolistRecord()` ↔ `getRecord()`

## Pattern d'uso nei widget

```php
namespace Modules\User\Filament\Widgets\Auth;

use Modules\User\Filament\Resources\UserResource\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

class LoginWidget extends XotBaseSchemaWidget
{
    protected static function formClass(): string { return UserForm::class; }
    protected static function schemaMethod(): string { return 'getLoginFormSchema'; }

    public function login(): void
    {
        $data = $this->form->getState(); // GIÀ validato + deidratato
        if (Auth::attempt($data)) {
            session()->regenerate();
            redirect()->intended($this->getRedirectUrl());
        }
    }
}
```

SSoT unico: `Modules/User/Filament/Resources/UserResource/Schemas/UserForm.php` (metodi `getLoginFormSchema`, `getRegisterFormSchema`, … + `getFormSchema` BO):

```php
public static function getLoginFormSchema(): array
{
    return [
        'email' => TextInput::make('email')
            ->required()
            ->email()
            ->autofocus()
            ->autocomplete('username')
            ->extraInputAttributes(['class' => 'fo-auth-input']),
        'password' => TextInput::make('password')
            ->password()
            ->revealable()
            ->required()
            ->autocomplete('current-password')
            ->extraInputAttributes(['class' => 'fo-auth-input']),
        'remember' => Checkbox::make('remember'),
    ];
}
```

## Decisioni chiuse

1. **Un solo `UserForm` in Resource** — FO e BO condividono `Resources/UserResource/Schemas/UserForm.php`.
2. **Tutti i widget auth FO** — `XotBaseSchemaWidget` + `formClass()`/`schemaMethod()` (eccezione: `PasswordResetConfirmWidget` override `form()` per `disabled` legato a `currentState`).
3. **`Password::reset`** — password in chiaro in `getState()`; `Hash::make` solo nel callback broker (non in `dehydrateStateUsing` degli schemi reset).

## Decisioni aperte

Vedi discussion #265 per:
1. **Pattern dichiarativo vs imperativo** — reflection vs interface marker.
2. **RegisterWidget submit()** — `Model::create()` diretto vs orchestrazione GDPR.
3. **R8 Gdpr vs User RegisterWidget** — quale usare in produzione.

## Lezione: docblock orfani post-refactor

Quando `XotBaseWidget::$data` è stato reso non-nullable, uno script ha rimosso le
ridichiarazioni `public ?array $data` nei widget figli (11 file). Lo script
rimuoveva la proprietà ma non il `/** @var ... */` che la precedeva, lasciando
un docblock "orfano" attaccato al metodo successivo (`varTag.misplaced` in
PHPStan). Trovati e corretti in `Seo/SocialShareWidget.php` e
`User/RegistrationWidget.php`. Stesso refactor ha reso `$this->data ?? []`
inutile (`nullCoalesce.property`): la proprietà non è più nullable, va acceduta
direttamente. Verificare sempre `phpstan analyse Modules` dopo un refactor
cross-file di massa: gli effetti collaterali si vedono in file mai toccati
direttamente dallo script.

## Riferimenti

- Issue base: #264 (`STORY-144: R1 religion code work — XotBaseSchemaWidget base class + 6 auth widgets migrated`)
- Discussion base: #265 (`Filament R1 religion code: XotBaseSchemaWidget + 6 auth widgets — coordinate Codex/STORY-140 docs`)
- Story complementare: STORY-140 (Codex - GPT-5) — https://github.com/laraxot/base_fixcity_fila5/issues/248
- Cross-repo issue modulo: da aprire su `laraxot/module_xot_fila5`

---
*opencode (MiniMax-M3) · 2026-06-05*
>>>>>>> laraxot/dev
