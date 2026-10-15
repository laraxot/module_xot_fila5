

## PHPStan e cartella Tests/

Autoload PSR-4: `Modules\\Xot\\Tests\\` → `tests/`. Una seconda cartella `Tests/` (maiuscolo) fuori autoload viene comunque analizzata da `phpstan analyse Modules` e reintroduce stub fantasma. Non ricrearla: SSoT solo in `tests/`.

## Anti-ricreazione Tests/

Non creare `Modules/Xot/Tests/` (maiuscolo). PSR-4 punta a `tests/`. Una seconda tree (anche con symlink) fa analizzare a PHPStan stub fantasma/corrotti (`phpstan.parse`). SSoT stub exporter: `tests/Unit/Exports/`. Stubs Filament: `tests/Fixtures/Stubs/`.

## Symlink ricorsivo Stubs/Stubs

Mai creare `tests/Fixtures/Stubs/Stubs` → `tests/Fixtures/Stubs`. PHPStan segue il link e analizza path infinitamente annidati (`Stubs/Stubs/Stubs/...`), generando migliaia di `class.nameCase` e errori spurii. Se compare: `rm` del symlink, non della directory reale.

