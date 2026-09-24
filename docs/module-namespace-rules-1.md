# Regola generale: Label e traduzioni in Filament

## Regola
- Label, heading, placeholder, help SOLO in file di traduzione modulo.
- Nessun uso di ->label() nei file Filament.
- La label viene applicata automaticamente da LangServiceProvider tramite AutoLabelAction.
- Convenzione chiavi: `modulo.resource.fields.campo.label` o `modulo.resource.actions.azione.label`.

## Pattern
- Nessuna label hardcoded.
- Tutte le chiavi di traduzione devono essere presenti e coerenti.

## Anti-pattern
- Uso di ->label() nei componenti Filament.
- Label hardcoded.

## Test di regressione
- Test statico che cerca ->label( nei file Filament.
- Test che verifica la presenza di tutte le chiavi di traduzione.

## Collegamenti
<<<<<<< .merge_file_I7jUxr
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_C3X80O
- [docs root](../../../../docs/actions.md)
- [docs Lang](../../lang/docs/filament-label.md)

Ultimo aggiornamento: maggio 2025.
<<<<<<< .merge_file_I7jUxr
<<<<<<< HEAD
=======
=======
- [docs root](../../../../../docs/actions.md)
- [docs Lang](../../lang/docs/filament-label.md)

Ultimo aggiornamento: maggio 2025.
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
- [docs root](../../../../../docs/actions.md)
- [docs Lang](../../lang/docs/filament-label.md)

Ultimo aggiornamento: maggio 2025.
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_C3X80O
