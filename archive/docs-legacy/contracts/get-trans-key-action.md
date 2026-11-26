---
title: "Contratto — GetTransKeyAction"
type: contract
action: "Modules\\Xot\\Actions\\GetTransKeyAction"
status: active
tags: [contract, action, translations, lang]
created: 2026-11-25
updated: 2026-11-26
qmd: "gettranskeyaction chiave traduzione dashboard snake vuota lang it php navigation group backtrace menu utente"
module: Xot
---

# GetTransKeyAction

Deriva la chiave di traduzione `modulo::file` dal FQCN di una classe Filament
(`Modules\AI\Filament\Pages\Dashboard` → `ai::dashboard`). La usano `TransFuncTrait`,
`NavigationLabelTrait` e `AutoLabelAction`.

## Input

- `string $class`: FQCN della classe da cui ricavare la chiave. Vuoto: si usa la classe del chiamante dal backtrace.
- Una classe fuori da `Modules\` (per esempio la `Action` Filament del menu utente: `profile`, `logout`) non ha un modulo
  proprio: l'Action risale il backtrace fino al primo oggetto `Modules\...` e usa quello, cioè la pagina in rendering.
  Se non lo trova usa il modulo principale e l'ultimo segmento del nome in snake_case.

## Output

Una stringa `modulo::chiave`. `modulo` è il nome del modulo in minuscolo; `chiave` è il nome della classe in snake_case,
senza il suffisso del tipo (`...Resource`, `...Action`, `...FormSchema`) e senza il prefisso `list|get|manage|edit|view|create|dashboard`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `XOT-TRANSKEY-INV-1` | Il primo segmento del nome classe in snake_case, se è uno fra `dashboard`, `list`, `get`, `manage`, `edit`, `view`, `create`, si toglie solo se resta un resto (righe 83-88): `Modules\AI\Filament\Pages\Dashboard` resta `ai::dashboard`; `Modules\Rating\Filament\Resources\RatingResource\Pages\ListRatings` diventa `rating::rating` (tolto `list_`, il resto è singolarizzato, righe 98-103). | `XOT-TRANSKEY-INV-1` |
| `XOT-TRANSKEY-INV-2` | La parte dopo `::` non è mai vuota: una chiave `modulo::` farebbe scrivere a `SaveTransAction` un file di lingua `lang/it/.php`. Verificata una tantum su 448 classi Filament dei moduli (misura di chi ha scritto il contratto, non ripetibile con un comando). Il codice non la garantisce: se il nome della classe coincide con il suo tipo (per esempio `Modules\M\Actions\Action`), `Str::beforeLast` restituisce una stringa vuota (righe 70-71) e la chiave diventa `m::` (ragionamento sul codice, non riprodotto). | — (non dimostrato) |
| `XOT-TRANSKEY-INV-3` | Il suffisso del tipo (singolare della cartella del namespace: `Action`, `Resource`, `RelationManager`…) è tolto dal nome classe, come i suffissi `_action` e `_form_schema`; per i `RelationManager` il resto è singolarizzato (righe 66-75, 89-95): `LogActivityAction` → `activity::log_activity`, `ProfilesRelationManager` → `user::profile`. Test esistente senza group, da annotare: `tests/Unit/Actions/GetTransKeyActionTest.php:10-19`. | — (non dimostrato) |

## Effetti collaterali

Nessuno sui dati: legge solo il nome della classe e il backtrace. Chi usa la chiave può scrivere nei file di lingua
(`SaveTransAction`, solo in locale): per questo una chiave sbagliata lascia file spuri nei moduli.

## Errori

- `InvalidArgumentException` (Webmozart `Assert`) se il backtrace non fornisce una classe stringa.
- Nessuna eccezione per un nome che non corrisponde ai prefissi: la chiave è comunque costruita.

## Non fa

- Non legge né scrive file di lingua e non traduce niente: restituisce solo la chiave.
- Non verifica che il file di lingua esista.
- Non decide il percorso del file: lo fa `GetTransPathAction` (modulo Lang), che a sua volta rifiuta una chiave senza nome file
  (invariante 6 di `Modules/Lang/docs/contracts/save-trans-action.md`).

Test: `Modules/Xot/tests/Unit/Actions/GetTransKeyActionTest.php`.
