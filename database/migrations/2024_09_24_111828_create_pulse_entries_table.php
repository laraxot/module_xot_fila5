<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
<<<<<<< .merge_file_LsM8t8
=======
return new class extends XotBaseMigration {
>>>>>>> laraxot/dev
=======

=======
=======

>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_QLS8tl
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(function (Blueprint $table): void {
            $table->id();
            $table->unsignedInteger('timestamp');
            $table->string('type');
            $table->mediumText('key');
            $table->string('key_hash');
            $table->bigInteger('value')->nullable();

            $table->index('timestamp'); // For trimming...
            $table->index('type'); // For purging...
            $table->index('key_hash'); // For mapping...
            $table->index(['timestamp', 'type', 'key_hash', 'value']); // For aggregate queries...
        });
    }
};
