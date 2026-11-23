---
qmd: "xot architecture readme md"
<<<<<<< .merge_file_PECR6V
<<<<<<< .merge_file_KqUhW5
title: "Xot - readme.md"
=======
title: "Xot - README.md"
>>>>>>> .merge_file_9ZOwJX
=======
<<<<<<< .merge_file_A7RLaV
=======
<<<<<<< .merge_file_I4sGDJ
>>>>>>> .merge_file_EtSt92
title: "Xot - readme.md"
=======
title: "Xot - README.md"
>>>>>>> .merge_file_JaoTls
>>>>>>> .merge_file_gtigS0
module: Xot
bmad: true
status: active
---
# Architettura Xot

## Classi Base

### XotBaseModel

Modello base per tutti i moduli.

```php
namespace Modules\Xot\Models;

abstract class XotBaseModel extends Model
{
    use Updater;
    
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
```

### XotBaseMigration

Migrazioni anonime standardizzate.

```php
return new class() extends XotBaseMigration {
    protected string $table_name = 'example';
    
    public function up(): void
    {
        $this->tableCreate(function (Blueprint $table): void {
            $table->id();
            $table->timestamps();
        });
    }
};
```

## Collegamenti

- [Xot Principale](../README.md)
- [Filament](../filament/)
