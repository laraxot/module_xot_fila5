<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\ModelClass;

<<<<<<< HEAD
use InvalidArgumentException;
use RuntimeException;
=======
>>>>>>> c7fd73eb (.)
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\QueueableAction\QueueableAction;
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
>>>>>>> c7fd73eb (.)

class FakeSeederAction
{
    use QueueableAction;

<<<<<<< HEAD
    private const MAX_RECORDS = 200;

    private const CHUNK_SIZE = 50;
=======
    private const int MAX_RECORDS = 200;

    private const int CHUNK_SIZE = 50;
>>>>>>> c7fd73eb (.)

    /**
     * Execute the fake data seeding process.
     *
<<<<<<< HEAD
     * @param class-string<Model> $modelClass The fully qualified model class name
     * @param int<1, max>         $qty        Number of records to generate
     *
     * @throws InvalidArgumentException When model class is invalid
=======
     * @param  class-string<Model>  $modelClass  The fully qualified model class name
     * @param  int<1, max>  $qty  Number of records to generate
     *
     * @throws \InvalidArgumentException When model class is invalid
>>>>>>> c7fd73eb (.)
     */
    public function execute(string $modelClass, int $qty): void
    {
        if (
<<<<<<< HEAD
            !class_exists($modelClass) ||
                !is_subclass_of($modelClass, Model::class) ||
                !in_array(HasFactory::class, class_uses_recursive($modelClass), strict: true)
        ) {
            throw new InvalidArgumentException("Invalid model class or missing HasFactory trait: {$modelClass}");
=======
            ! class_exists($modelClass)
                || ! is_subclass_of($modelClass, Model::class)
                || ! in_array(HasFactory::class, class_uses_recursive($modelClass), strict: true)
        ) {
            throw new \InvalidArgumentException("Invalid model class or missing HasFactory trait: {$modelClass}");
>>>>>>> c7fd73eb (.)
        }

        $qtyToDo = min($qty, self::MAX_RECORDS);

        $factory = $this->getModelFactory($modelClass);
        /** @var Collection<int, Model> $rows */
        $rows = $factory->count($qtyToDo)->make();

<<<<<<< HEAD
        /** @var Collection<int, Collection> $chunks */
        $chunks = $rows->chunk(self::CHUNK_SIZE);

        $chunks->each(function (Collection $chunk) use ($modelClass): void {
            /** @var array<int, array<string, mixed>> $data */
            $data = $chunk->map(function ($item) {
                assert($item instanceof Model);

                return $item->getAttributes();
            })->all();
=======
        /** @var Collection<int, Collection<int, Model>> $chunks */
        $chunks = $rows->chunk(self::CHUNK_SIZE);

        $chunks->each(function (Collection $chunk) use ($modelClass): void {
            $data = $chunk->map(fn (Model $item) => $item->getAttributes())->all();
>>>>>>> c7fd73eb (.)
            $modelClass::insert($data);
        });

        $this->sendNotification($modelClass, $qtyToDo);

        if ($qty > self::MAX_RECORDS) {
            $this->queueRemainingRecords($modelClass, $qty);
        }
    }

    /**
     * Get the model factory.
     *
<<<<<<< HEAD
     * @param class-string<Model> $modelClass
     *
     * @throws RuntimeException
=======
     * @param  class-string<Model>  $modelClass
     * @return Factory<Model>
     * @return Factory<Model>
     *
     * @throws \RuntimeException
>>>>>>> c7fd73eb (.)
     */
    private function getModelFactory(string $modelClass): Factory
    {
        if (method_exists($modelClass, 'factory')) {
<<<<<<< HEAD
            return $modelClass::factory();
        }

        throw new RuntimeException("Unable to create factory for model: {$modelClass}");
=======
            /** @var Factory<Model> $factory */
            $factory = $modelClass::factory();

            return $factory;
        }

        throw new \RuntimeException("Unable to create factory for model: {$modelClass}");
>>>>>>> c7fd73eb (.)
    }

    /**
     * Send a notification about the seeding completion.
     *
<<<<<<< HEAD
     * @param class-string<Model> $modelClass
     * @param int<1, max>         $count
=======
     * @param  class-string<Model>  $modelClass
     * @param  int<1, max>  $count
>>>>>>> c7fd73eb (.)
     */
    private function sendNotification(string $modelClass, int $count): void
    {
        $title = sprintf('Created %d %s !', $count, $modelClass);
        Notification::make()
            ->title($title)
            ->success()
            ->send();
    }

    /**
     * Queue remaining records for processing.
     *
<<<<<<< HEAD
     * @param class-string<Model> $modelClass
     * @param int<1, max>         $qty
=======
     * @param  class-string<Model>  $modelClass
     * @param  int<1, max>  $qty
>>>>>>> c7fd73eb (.)
     */
    private function queueRemainingRecords(string $modelClass, int $qty): void
    {
        if ($qty <= self::MAX_RECORDS) {
            return;
        }
        app(self::class)->onQueue()->execute($modelClass, $qty - self::MAX_RECORDS);
    }
<<<<<<< HEAD

    private function getTableName(string $modelClass): string
    {
        Assert::classExists($modelClass, 'La classe del modello deve esistere');

        /** @var Model */
        $model = app($modelClass);

        return $model->getTable();
    }
=======
    /*
        private function getTableName(string $modelClass): string
        {
            Assert::classExists($modelClass, 'La classe del modello deve esistere');

            //@var Model
            $model = app($modelClass);

            return $model->getTable();
        }
            */
>>>>>>> c7fd73eb (.)
}
