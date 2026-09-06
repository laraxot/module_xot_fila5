<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
<<<<<<< HEAD
use Illuminate\Support\Arr;
=======
>>>>>>> 7f6cf6be (.)
use Illuminate\Support\Str;
use Modules\Xot\Models\Traits\HasXotFactory;
use Modules\Xot\Models\Traits\RelationX;
use Modules\Xot\Traits\Updater;
use Webmozart\Assert\Assert;

/**
 * Class XotBaseModel.
 */
abstract class XotBaseModel extends EloquentModel
{
<<<<<<< HEAD
=======
    /** @use HasXotFactory<\Illuminate\Database\Eloquent\Factories\Factory<static>> */
>>>>>>> 7f6cf6be (.)
    use HasXotFactory;

    use RelationX;
    use Updater;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see https://laravel-news.com/6-eloquent-secrets
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    /** @var int */
    protected $perPage = 30;

    /** @var string */
    protected $connection = 'xot';

    /** @var list<string> */
    protected $appends = [];

    /** @var list<string> */
    protected $hidden = [
        // 'password'
    ];

    /**
<<<<<<< HEAD
     * Risolve il concreto del **modulo chiamante** mantenendo il basename di `static`.
     *
     * Il namespace non viene dedotto da `static` (che resta sul prototype del modulo
     * base, es. `Ptv\Models\CriteriOption`) ma dall'**oggetto chiamante** trovato nel
     * backtrace: una `Scheda` di Progressioni che invoca `CriteriOption::getClassName()`
     * ottiene `Progressioni\Models\CriteriOption`. Per questo la chiamata è
     * `CriteriOption::getClassName()` senza argomenti e senza `static::`.
     *
     * Funziona anche dai contesti Filament (`Filament\Resources\`), dove il modello
     * viene risolto via `getModelClass()` dell'oggetto chiamante.
     *
     * @return class-string<EloquentModel>
     */
    public static function getClassName(): string
    {
        $object = Arr::first(debug_backtrace(), function (array $value) {
            return isset($value['object'])
            && (Str::contains($value['object']::class, 'Models\\') || Str::contains($value['object']::class, 'Filament\\Resources\\'));
        });

        if (! isset($object['object'])) {
            throw new \RuntimeException('Unable to resolve caller object for getClassName()');
        }

        $objectClass = $object['object']::class;
        if (method_exists($object['object'], 'getModelClass')) {
            $objectClass = $object['object']->getModelClass();
        }
        Assert::string($objectClass);
        /** @var string $objectClass */
        $namespace = Str::beforeLast((string) $objectClass, '\Models\\');
        $className = Str::afterLast(static::class, '\\');

        $res = $namespace.'\\Models\\'.$className;
        Assert::classExists($res);
        Assert::subclassOf($res, EloquentModel::class);

        return $res;
=======
     * Sibling model in the same `Models\` namespace as the calling leaf (`static::class`).
     *
     * Call from the leaf/base that owns the relation context, e.g. from `BaseScheda`:
     * `static::getClassName(CriteriOption::class)` → `Progressioni\Models\CriteriOption`
     * when `static` is `Progressioni\Models\Scheda`.
     *
     * Do **not** call as `CriteriOption::getClassName()` — LSB would stay on the prototype.
     *
     * @param class-string<EloquentModel> $fallback Prototype FQCN (basename reused; used if sibling missing)
     *
     * @return class-string<EloquentModel>
     */
    public static function getClassName(string $fallback): string
    {
        Assert::subclassOf($fallback, EloquentModel::class);

        $short = class_basename($fallback);
        $candidate = Str::of(static::class)
            ->beforeLast('\\')
            ->append('\\'.$short)
            ->toString();

        if (is_string($candidate) && '' !== $candidate && class_exists($candidate)) {
            Assert::subclassOf($candidate, EloquentModel::class);

            /* @var class-string<EloquentModel> $candidate */
            return $candidate;
        }

        /* @var class-string<EloquentModel> $fallback */
        return $fallback;
>>>>>>> 7f6cf6be (.)
    }

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'published_at' => 'datetime',
            'verified_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
    }
}
