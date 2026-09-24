# Migration Guidelines for Project Modules

## Overview
This document outlines the guidelines for creating and managing database migrations within the project. Following these rules ensures consistency, prevents errors, and maintains database integrity across different modules.

## Rules for Migrations
1. **Base Class for Migrations**: All migration files must extend `Modules\Xot\Database\Migrations\XotBaseMigration` instead of the default `Illuminate\Database\Migrations\Migration`. This base class includes project-specific configurations and behaviors.
   - **Why**: Centralizes migration logic, making it easier to maintain and update migration behaviors across the project.
2. **Table Existence Check**: Before creating a table, always check if it exists using `Schema::hasTable()` to prevent errors when the table is already present in the database.
   - **Why**: Avoids conflicts during migration execution, especially in environments where the database schema might already include the table.

## Example Migration
```php
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends XotBaseMigration
{
    public function up(): void
    {
        if (!Schema::hasTable('example_table')) {
            Schema::create('example_table', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('example_table');
    }
};
```

## Related Documentation
<<<<<<< .merge_file_NvkRWQ
<<<<<<< HEAD
<<<<<<< HEAD
- [User Module Database Errors](database_errors.md)
=======
<<<<<<< HEAD
- [User Module Database Errors](database_errors.md)
=======
- [User Module Database Errors](../../User/docs/DATABASE_ERRORS.md)
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
- [User Module Database Errors](../../User/docs/DATABASE_ERRORS.md)
>>>>>>> 8d801bbe (Check & fix styling)
=======
- [User Module Database Errors](database_errors.md)
>>>>>>> .merge_file_eZYxdx
- [Xot Base Classes](../XOT_BASE_CLASSES.md)
- [Code Quality](../CODE_QUALITY.md)
- [Root Documentation](../../../../docs/collegamenti-documentazione.md)
- [Database Guidelines](../DATABASE_GUIDELINES.md)
<<<<<<< .merge_file_NvkRWQ
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
- [User Module Database Errors](../../user/docs/database_errors.md)
- [Xot Base Classes](../xot_base_classes.md)
- [Code Quality](../code_quality.md)
- [Root Documentation](../../../../../docs/collegamenti-documentazione.md)
- [Database Guidelines](../database_guidelines.md)
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_eZYxdx
