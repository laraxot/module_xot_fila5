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
     * <<<<<<< HEAD
     * =======.
     *
     * @var string
     *             >>>>>>> origin/dev
     */
    protected $signature = 'xot:generate-model {model_class}';

    /**
     * The console command description.
     * <<<<<<< HEAD
     * =======.
     *
     * @var string
     *             >>>>>>> origin/dev
     */
    protected $description = 'generate a model from model_class';

    /**
     * Create a new command instance.
     */

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Assert::classExists(
            $model_class = $this->argument('model_class'),
            '['.__LINE__.']['.class_basename($this).']',
        );

        app(GenerateModelByModelClass::class)
            ->setCustomReplaces(['DummyTable' => 'lime_survey_xxx'])
            ->execute($model_class);
    }
}
