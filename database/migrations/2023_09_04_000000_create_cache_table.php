<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> 8d801bbe (Check & fix styling)
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/*
 * Undocumented class.
 */
<<<<<<< .merge_file_9WP1Zd
<<<<<<< HEAD
<<<<<<< HEAD
return new class extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> laraxot/dev
=======
return new class extends XotBaseMigration {
>>>>>>> 8d801bbe (Check & fix styling)
=======
return new class extends XotBaseMigration
{
>>>>>>> .merge_file_RGeoom
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
