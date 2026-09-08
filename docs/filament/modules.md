---
title: Moduli Filament
description: Moduli Filament
extends: _layouts.documentation
section: content
---

# Moduli Filament {#moduli-filament}

<<<<<<< HEAD
Url di riferimento https://github.com/savannabits/filament-modules  
=======
Url di riferimento https://github.com/savannabits/filament-modules
>>>>>>> c7fd73eb (.)
Installare il pacchetto di savannabits
```php
composer require coolsam/modules
```
<<<<<<< HEAD
Al suo interno si avrà già inglobato nwidart/laravel-modules.  

Per creare un modulo eseguire i comandi artisan di nwidart  
=======
Al suo interno si avrà già inglobato nwidart/laravel-modules.

Per creare un modulo eseguire i comandi artisan di nwidart
>>>>>>> c7fd73eb (.)
url di riferimento https://nwidart.com/laravel-modules/v6/advanced-tools/artisan-commands
```php
php artisan module:make NomeModulo
```
<<<<<<< HEAD
Per creare l'AdminPanelProvider di filament nel modulo eseguire  
```php
php artisan module:make-filament-panel admin NomeModulo # php artisan module:make-filament-panel [id] [module]
```
Sostituire il codice generato con 
=======
Per creare l'AdminPanelProvider di filament nel modulo eseguire
```php
php artisan module:make-filament-panel admin NomeModulo # php artisan module:make-filament-panel [id] [module]
```
Sostituire il codice generato con
>>>>>>> c7fd73eb (.)
```php
<?php

declare(strict_types=1);

namespace Modules\NomeModulo\Providers\Filament;

use Modules\Xot\Providers\Filament\XotBasePanelProvider;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'NomeModulo';
}

```

### Versione HEAD

<<<<<<< HEAD

=======
>>>>>>> c7fd73eb (.)
## Collegamenti tra versioni di modules.md
* [modules.md](docs/tecnico/laraxot/modules.md)
* [modules.md](docs/architecture/modules.md)
* [modules.md](../../../Xot/docs/filament/modules.md)
* [modules.md](../../../Xot/docs/config/modules.md)
<<<<<<< HEAD


### Versione Incoming


---

=======
* [modules.md](../../../xot/docs/filament/modules.md)
* [modules.md](../../../xot/docs/config/modules.md)

### Versione Incoming

---
>>>>>>> c7fd73eb (.)
