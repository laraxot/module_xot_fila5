<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/*
 * Class CreateExtraTable.
 */
return new class extends XotBaseMigration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        // @var mixed tableCreate(static function (Blueprint $table
            $table->increments('id');
            $table->uuidMorphs('model');
            // @phpstan-ignore-next-line method.notFound
            $table->schemalessAttributes('extra_attributes');
            $table->unique(['model_id', 'model_type'], 'morph_unique');
        });

        // -- UPDATE --
        // @var mixed tableUpdate(function (Blueprint $table
            // if (! // @var mixed hasColumn('name'
            //    $table->string('name')->nullable();
            // }
            // @var mixed updateTimestamps(
                table: $table,
                hasSoftDeletes: true,
            );
            // if (! // @var mixed hasIndex('morph_unique'
            //    $table->unique(['model_id', 'model_type'], 'morph_unique');
            // }

            if (// @var mixed hasColumn('model_id'
                $table->string('model_id', 36)->index()->change();
            }
        });
    }

    // end up
    // end down
};
