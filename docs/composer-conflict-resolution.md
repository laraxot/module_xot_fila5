# Risoluzione conflitti Composer (Xot)

## Scopo
- Garantire coerenza delle dipendenze del modulo Xot e dell’ecosistema Filament/Livewire.

## Decisioni
- Allineamento di `filament/filament` a `^5.0`.
- Allineamento di `livewire/livewire` a `^4.0` per compatibilità con Filament v5.
- Rimozione di `pestphp/pest-plugin-livewire` se il progetto resta su PHP `^8.2`, perché le versioni 4.x richiedono PHP `^8.3` e Livewire `^4.0.1`.

## Collegamenti
<<<<<<< .merge_file_ZSVHFQ
<<<<<<< HEAD
<<<<<<< HEAD
- [Gestione dipendenze Composer](../../../../docs/composer.md)
=======
<<<<<<< HEAD
- [Gestione dipendenze Composer](../../../../docs/composer.md)
=======
- [Gestione dipendenze Composer](../../../../../docs/composer.md)
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
- [Gestione dipendenze Composer](../../../../../docs/composer.md)
>>>>>>> 3792da0d (Check & fix styling)
=======
- [Gestione dipendenze Composer](../../../../docs/composer.md)
>>>>>>> .merge_file_n7CiQl
