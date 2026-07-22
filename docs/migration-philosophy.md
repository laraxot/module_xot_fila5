# Laraxot Migration Architecture Philosophy

## Core Migration Principles

### The Single Source of Truth Principle

**🚨 FUNDAMENTAL RULE**: Each database table must have exactly **ONE** authoritative `create_table` migration within its module.

### Why This Architecture Matters

1. **Predictable Schema Evolution**: Clear, linear progression of database changes
2. **Environment Consistency**: Same migration order across all environments
3. **Maintainability**: Single file to modify for each table's base schema
4. **DRY Compliance**: Eliminates redundant schema definitions
5. **XotBaseMigration Integration**: Leverages auto-discovery and idempotent operations

### The XotBaseMigration Advantage

The `XotBaseMigration` class provides sophisticated migration capabilities:

#### Auto-Discovery Features

```php
// Automatically detects model class from migration name
public function getModelClass(): string
{
    // Extracts 'Role' from 'CreateRolesTable'
    // Resolves to: Modules\User\Models\Role
}
```

#### Idempotent Operations

```php
// Safe table creation - only creates if doesn't exist
$this->tableCreate(function (Blueprint $table) {
    $table->id();
    $table->string('name');
});

// Safe table updates - only adds missing columns
$this->tableUpdate(function (Blueprint $table) {
    if (!$this->hasColumn('team_id')) {
        $table->foreignId('team_id')->nullable()->index();
    }
});
```

### Migration Types and Their Purpose

#### 1. Table Creation Migrations
- **Pattern**: `{timestamp}_create_{table}_table.php`
- **Purpose**: Define the base table schema
- **Rule**: Exactly ONE per table per module
- **Example**: `2024_01_01_000011_create_roles_table.php`

#### 2. Schema Evolution Migrations
- **Pattern**: `{timestamp}_{action}_{table}.php`
- **Purpose**: Modify existing table schema
- **Examples**:
  - `2024_06_15_add_email_to_users.php`
  - `2024_07_20_remove_old_column_from_posts.php`

#### 3. Data Migration Migrations
- **Pattern**: `{timestamp}_migrate_{purpose}.php`
- **Purpose**: Transform or seed data
- **Examples**:
  - `2024_08_10_migrate_user_roles.php`
  - `2024_09_15_seed_default_permissions.php`

### The Duplicate Migration Anti-Pattern

#### What NOT to Do

```
❌ WRONG - Multiple create_table migrations for same table
Modules/User/database/migrations/
├── 2023_01_01_000011_create_roles_table.php  # Duplicate
├── 2023_01_01_000012_create_roles_table.php  # Duplicate
└── 2024_01_01_000011_create_roles_table.php  # Authoritative
```

#### Why This Is Problematic

1. **Migration Order Ambiguity**: Which migration runs first?
2. **Schema Conflict Risk**: Different migrations may define different schemas
3. **Rollback Complexity**: Which migration should be rolled back?
4. **Development Confusion**: Which file is the source of truth?

### Correct Migration Strategy

#### Single Authoritative Migration

```
✅ CORRECT - One create_table migration per table
Modules/User/database/migrations/
├── 2024_01_01_000001_create_users_table.php
├── 2024_01_01_000011_create_roles_table.php      # Single authoritative
├── 2024_01_01_000021_create_permissions_table.php
└── 2024_06_15_143000_add_team_id_to_roles.php    # Schema evolution
```

#### Schema Evolution Approach

When you need to modify a table:

1. **NEVER** create a new `create_table` migration
2. **ALWAYS** create a schema evolution migration
3. **USE** `XotBaseMigration::tableUpdate()` for safe modifications

### XotBaseMigration Best Practices

#### 1. Leverage Auto-Discovery

```php
class CreateRolesTable extends XotBaseMigration
{
    public function up(): void
    {
        // Connection auto-discovered as 'user'
        // Model auto-discovered as Modules\User\Models\Role

        $this->tableCreate(function (Blueprint $table) {
            // Base schema definition
        });

        $this->tableUpdate(function (Blueprint $table) {
            // Safe schema evolution
        });
    }
}
```

#### 2. Use Idempotent Methods

```php
// ✅ CORRECT - Safe for multiple runs
$this->tableCreate(...);
$this->tableUpdate(...);

// ❌ WRONG - May fail on subsequent runs
Schema::create(...);
$table->addColumn(...);
```

#### 3. Handle Connection Auto-Discovery

```php
// Connection automatically determined from:
// Modules\User\Models\Role → 'user' connection
// No need to manually set $connection
```

### Migration Cleanup Protocol

When duplicate migrations are discovered:

1. **Identify Authoritative File**: Most complete/current schema definition
2. **Remove Duplicates**: Delete older `create_table` migrations
3. **Verify Dependencies**: Ensure no other migrations depend on duplicates
4. **Test Rollback**: Confirm clean rollback and re-migration
5. **Update Documentation**: Document the consolidation

### Module-Specific Implementation

Each module should:

1. Maintain exactly one `create_table` migration per table
2. Use `XotBaseMigration` for all migrations
3. Document migration dependencies in module README
4. Follow consistent naming conventions

### Exception Cases

**The ONLY exception** to the one-migration-per-table rule:

- **Module Splitting**: When a table moves to a different module
- **Major Refactoring**: Complete schema redesign requiring new table
- In both cases, the old migration should be removed after transition

---

**Philosophy Summary**: In Laraxot, migrations are the definitive history of your database schema. Keep that history clean, linear, and unambiguous. One table, one creation story.


---
## From MIGRATION-PHILOSOPHY.md

# Laraxot Migration Philosophy - Single Source of Truth

## The Sacred Rule

**ONE MIGRATION PER TABLE. NEVER CREATE REPAIR/FIX/ADD/ALTER MIGRATIONS.**

## The Philosophy

### Why This Exists

1. **Single Source of Truth**: Each table has ONE authoritative migration file
2. **No Confusion**: No guessing which file defines the current schema
3. **Idempotent Evolution**: `tableCreate()` + `tableUpdate()` handle both new and existing installations
4. **DRY/KISS**: One file to read, one file to modify, one file to understand

### The Pattern

```
✅ CORRECT - Single migration file
Modules/User/database/migrations/
└── 2026_03_12_170000_create_profiles_table.php  # THE ONLY FILE

❌ WRONG - Multiple migration files for same table
Modules/User/database/migrations/
├── 2024_01_01_000000_create_profiles_table.php
├── 2024_06_15_143000_add_uuid_to_profiles.php      # FORBIDDEN
├── 2025_01_20_093000_repair_profiles_id.php       # FORBIDDEN
└── 2026_03_12_162500_fix_profiles_contract.php    # FORBIDDEN
```

## How to Evolve Schema

### Step 1: Find the EXISTING migration
```bash
find Modules -name "*create_{table}_table.php"
```

### Step 2: Modify the existing file
- Add new columns to `tableCreate()` section
- Add same columns to `tableUpdate()` with `if (! $this->hasColumn('column'))` guard

### Step 3: Update the timestamp in filename
```bash
# Old: 2026_03_12_170000_create_profiles_table.php
# New: 2026_03_12_171000_create_profiles_table.php  (updated time)
```

### Step 4: Run migration
```bash
php artisan migrate --path=Modules/User/database/migrations/2026_03_12_171000_create_profiles_table.php
```

## XotBaseMigration Structure

```php
return new class extends XotBaseMigration {
    protected ?string $model_class = Profile::class;

    public function up(): void
    {
        // -- CREATE (new installations) --
        $this->tableCreate(static function (Blueprint $table): void {
            $table->id();
            $table->string('uuid', 36)->index()->nullable();
            // ... all columns
        });

        // -- UPDATE (existing installations: additive, idempotent) --
        $this->tableUpdate(function (Blueprint $table): void {
            if (! $this->hasColumn('new_column')) {
                $table->string('new_column')->nullable();
            }
        });
    }
};
```

## Forbidden Patterns

| Pattern | Reason | Correct Approach |
|---------|--------|------------------|
| `add_*_to_table.php` | Violates single source | Modify existing `create_table.php` |
| `fix_*_table.php` | Violates single source | Modify existing `create_table.php` |
| `repair_*_table.php` | Violates single source | Modify existing `create_table.php` |
| `alter_*_table.php` | Violates single source | Modify existing `create_table.php` |
| Multiple `create_*_table.php` | Confusion | Keep only ONE, delete duplicates |

## The ID+UUID Contract

Every table MUST have:
- `id` - bigint unsigned AUTO_INCREMENT PRIMARY KEY (internal DB reference)
- `uuid` - char(36) nullable indexed (external/public reference)

The `id` is NEVER exposed in APIs or URLs; `uuid` is used for all external references.

## Current Issue: profiles table missing uuid

**Problem**: `profiles` table exists without `uuid` column
**WRONG Solution**: Create `2026_03_12_162500_repair_profiles_id_and_uuid_contract.php`
**CORRECT Solution**: 
1. The existing migration `2026_03_12_170000_create_profiles_table.php` ALREADY has uuid logic
2. Update timestamp to `2026_03_12_171000_create_profiles_table.php`
3. Run migration

## Forbidden Commands - DATA DESTRUCTION

**NEVER USE THESE COMMANDS - THEY DESTROY DATA:**

| Command | Why Forbidden |
|---------|---------------|
| `php artisan migrate:fresh` | Drops ALL tables, loses ALL data |
| `php artisan migrate --force` | Forces migrations in production, dangerous |
| `php artisan migrate:refresh` | Rolls back ALL migrations, loses ALL data |
| `RefreshDatabase` trait in tests | Only for isolated test databases |

### Why These Are Forbidden

1. **Production Data Loss**: These commands destroy real user data
2. **Irreversible**: No rollback possible after fresh/refresh
3. **Violates Trust**: Users expect their data to persist
4. **Breaks Multi-tenant**: Other tenants' data destroyed

### The Correct Approach

Migrations must be:
- **Additive**: Only add columns/tables, never remove
- **Idempotent**: Safe to run multiple times via `hasColumn()` checks
- **Non-destructive**: Preserve existing data at all costs

```php
// ✅ CORRECT - Idempotent, non-destructive
$this->tableUpdate(function (Blueprint $table): void {
    if (! $this->hasColumn('new_field')) {
        $table->string('new_field')->nullable();
    }
});

// ❌ WRONG - Destructive
Schema::dropIfExists('profiles');  // NEVER DO THIS
$table->dropColumn('old_field');   // NEVER DO THIS
```

### If You Need to Run Migrations

```bash
# ✅ CORRECT - Safe, additive only
php artisan migrate

# ✅ CORRECT - Specific migration file
php artisan migrate --path=Modules/User/database/migrations/2026_03_12_171000_create_profiles_table.php
```

## Update History

- 2026-03-12: Added forbidden commands section after user correction
- 2026-03-12: Documented after user correction on migration naming

