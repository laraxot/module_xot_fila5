<?php

declare(strict_types=1);

/**
 * @see https://github.com/paulvl/backup/blob/master/src/Console/Commands/MysqlDump.php
 */

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use Modules\Xot\Actions\Generate\GenerateModelByModelClass;
use Webmozart\Assert\Assert;

class GenerateModelByModelClassCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xot:generate-model {model_class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'generate a model from model_class';

    /**
     * Create a new command instance.
<<<<<<< HEAD
     *
     * @return void
     */
    
=======
     */
>>>>>>> c7fd73eb (.)

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Assert::classExists(
            $model_class = $this->argument('model_class'),
<<<<<<< HEAD
            '[' . __LINE__ . '][' . class_basename($this) . ']',
=======
            '['.__LINE__.']['.class_basename($this).']',
>>>>>>> c7fd73eb (.)
        );

        app(GenerateModelByModelClass::class)
            ->setCustomReplaces(['DummyTable' => 'lime_survey_xxx'])
            ->execute($model_class);
    }
}
