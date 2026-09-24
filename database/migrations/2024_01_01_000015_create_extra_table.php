<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> laraxot/dev
use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/*
 * Class CreateExtraTable.
 */
<<<<<<< .merge_file_1JoHo5
return new class extends XotBaseMigration
{
=======
<<<<<<< HEAD
return new class extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_PhNODB
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $table->increments('id');
            $table->uuidMorphs('model');
            $table->schemalessAttributes('extra_attributes');
            $table->unique(['model_id', 'model_type'], 'morph_unique');
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // if (! $this->hasColumn('name')) {
            //    $table->string('name')->nullable();
            // }
            $this->updateTimestamps(
                table: $table,
                hasSoftDeletes: true,
            );
            // if (! $this->hasIndex('morph_unique')) {
            //    $table->unique(['model_id', 'model_type'], 'morph_unique');
            // }

<<<<<<< .merge_file_1JoHo5
            if ($this->hasColumn('model_id') && $this->getColumnType('model_id') === 'bigint') {
=======
<<<<<<< HEAD
            if ($this->hasColumn('model_id') && $this->getColumnType('model_id') === 'bigint') {
=======
            if ($this->hasColumn('model_id') && 'bigint' === $this->getColumnType('model_id')) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_PhNODB
                $table->string('model_id', 36)->index()->change();
            }
        });
    }

    // end up
    // end down
};
