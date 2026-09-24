<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> laraxot/dev
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Models\HealthCheckResultHistoryItem;

<<<<<<< .merge_file_TszRjl
return new class extends XotBaseMigration
{
=======
<<<<<<< HEAD
return new class extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_iqHnQb
    protected ?string $model_class = HealthCheckResultHistoryItem::class;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(function (Blueprint $table): void {
            $table->id();

            $table->string('check_name');
            $table->string('check_label');
            $table->string('status');
            $table->text('notification_message')->nullable();
            $table->string('short_summary')->nullable();
            $table->json('meta');
            $table->timestamp('ended_at');
            $table->uuid('batch')->index();
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            $this->updateTimestamps($table, false);
        });
    }
};
