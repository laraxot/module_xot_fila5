<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> laraxot/dev
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/*
 * Undocumented class.
 */
<<<<<<< .merge_file_DHdkWO
return new class extends XotBaseMigration
{
=======
<<<<<<< HEAD
return new class extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_x5n0rO
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });
    }
};
