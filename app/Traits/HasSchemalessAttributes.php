<?php

declare(strict_types=1);

namespace Modules\Xot\Traits;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< .merge_file_l1GrQz
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_jVdqmf
use Spatie\SchemalessAttributes\SchemalessAttributes;

use function Safe\json_encode;

<<<<<<< .merge_file_l1GrQz
=======
=======
>>>>>>> 3792da0d (Check & fix styling)

use function Safe\json_encode;

use Spatie\SchemalessAttributes\SchemalessAttributes;

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_jVdqmf
/**
 * Trait per implementare Schemaless Attributes in modo consistente.
 *
 * Fornisce metodi standard per lavorare con extra_attributes
 * seguendo le best practices di Spatie.
 *
 * @property SchemalessAttributes|null $extra_attributes
 *
 * @see https://github.com/spatie/laravel-schemaless-attributes
<<<<<<< HEAD
 *
 * @phpstan-ignore trait.unused
=======
>>>>>>> 3792da0d (Check & fix styling)
 */
trait HasSchemalessAttributes
{
    /**
     * Aggiunge extra_attributes al fillable.
     *
     * @return array<string>
     */
    protected function schemalessFillable(): array
    {
        return array_merge($this->fillable, [
            'extra_attributes',
        ]);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function schemalessCasts(): array
    {
        /** @var array<string, string> $casts */
        $casts = $this->casts;

        return array_merge($casts, [
            'extra_attributes' => SchemalessAttributes::class,
        ]);
    }

    /**
     * Scope per filtrare per attributi schemaless.
     *
<<<<<<< .merge_file_l1GrQz
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Builder<static>  $query
=======
     * @param Builder<static> $query
     *
>>>>>>> laraxot/dev
=======
     * @param Builder<static> $query
     *
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  Builder<static>  $query
>>>>>>> .merge_file_jVdqmf
     * @return Builder<static>
     */
    public function scopeWithExtraAttributes(Builder $query): Builder
    {
        if ($this->extra_attributes instanceof SchemalessAttributes) {
            return $this->extra_attributes->modelScope();
        }

        return $query;
    }

    /**
     * Scope per query specifiche su extra_attributes.
     *
<<<<<<< HEAD
<<<<<<< .merge_file_l1GrQz
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Builder<static>  $query
     * @param  scalar|array<array-key, mixed>|null  $value  Valore JSON-serializzabile da confrontare
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
     * @param Builder<static>                     $query
     * @param scalar|array<array-key, mixed>|null $value Valore JSON-serializzabile da confrontare
=======
     * @param Builder<static> $query
>>>>>>> 930f8146 (Check & fix styling)
     *
>>>>>>> laraxot/dev
=======
     * @param Builder<static> $query
     *
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  Builder<static>  $query
     * @param  scalar|array<array-key, mixed>|null  $value  Valore JSON-serializzabile da confrontare
>>>>>>> .merge_file_jVdqmf
     * @return Builder<static>
     */
    public function scopeWhereExtraAttribute(Builder $query, string $key, mixed $value): Builder
    {
        return $query->where("extra_attributes->{$key}", $value);
    }

    /**
     * Spatie persiste extra_attributes come array sul modello dopo set/forget.
     * Re-idratare sempre il wrapper prima di leggere o scrivere.
     */
    protected function extraAttributesWrapper(): SchemalessAttributes
    {
        if ($this->extra_attributes instanceof SchemalessAttributes) {
            return $this->extra_attributes;
        }

        $raw = $this->attributes['extra_attributes'] ?? null;
        if (is_array($raw)) {
            $this->attributes['extra_attributes'] = json_encode($raw);
        }

        $wrapper = SchemalessAttributes::createForModel($this, 'extra_attributes');
        $this->extra_attributes = $wrapper;

        return $wrapper;
    }

    /**
     * Get un valore da extra_attributes.
<<<<<<< HEAD
     *
     * @param  scalar|array<array-key, mixed>|null  $default  Fallback JSON-serializzabile
     * @return mixed Valore schemaless (scalar|array|null nel dominio JSON)
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public function getExtraAttribute(string $key, mixed $default = null): mixed
    {
        return $this->extraAttributesWrapper()->get($key, $default);
    }

    /**
     * Set un valore in extra_attributes.
<<<<<<< HEAD
     *
     * @param  scalar|array<array-key, mixed>|null  $value  Valore JSON-serializzabile
<<<<<<< .merge_file_l1GrQz
=======
     * @param scalar|array<array-key, mixed>|null $value Valore JSON-serializzabile
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_jVdqmf
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public function setExtraAttribute(string $key, mixed $value): void
    {
        $this->extraAttributesWrapper()->set($key, $value);
        $this->syncExtraAttributesWrapper();
    }

    /**
     * Get tutti gli extra_attributes come array.
     *
     * @return array<string, mixed>
     */
    public function getExtraAttributes(): array
    {
        $raw = $this->extraAttributesWrapper()->all();
        $result = [];

        foreach ($raw as $key => $value) {
            if (is_string($key)) {
                $result[$key] = $value;
            }
        }

        return $result;
    }

    /**
     * Controlla se esiste un attributo in extra_attributes.
     */
    public function hasExtraAttribute(string $key): bool
    {
        return $this->extraAttributesWrapper()->has($key);
    }

    /**
     * Rimuove un attributo da extra_attributes.
     */
    public function removeExtraAttribute(string $key): void
    {
        $this->extraAttributesWrapper()->forget($key);
        $this->syncExtraAttributesWrapper();
    }

    protected function syncExtraAttributesWrapper(): void
    {
        $raw = $this->attributes['extra_attributes'] ?? null;
        if (is_array($raw)) {
            $this->attributes['extra_attributes'] = json_encode($raw);
        }

        $this->extra_attributes = SchemalessAttributes::createForModel($this, 'extra_attributes');
    }

    /**
     * Sincronizza gli extra_attributes con il database.
     */
    public function syncExtraAttributes(): void
    {
        $this->save();
    }
}
