<?php

declare(strict_types=1);

namespace Modules\Xot\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\SchemalessAttributes\SchemalessAttributes;

/**
 * Trait per implementare Schemaless Attributes in modo consistente.
 *
 * Fornisce metodi standard per lavorare con extra_attributes
 * seguendo le best practices di Spatie.
 *
 * @property SchemalessAttributes|null $extra_attributes
 *
 * @see https://github.com/spatie/laravel-schemaless-attributes
 * @see https://github.com/spatie/laravel-schemaless-attributes
 *
 * @phpstan-ignore trait.unused
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
    /**
     * @return array<string, string>
     */
    protected function schemalessCasts(): array
    {
        /** @var array<string, string> $casts */
        $casts = is_array($this->casts) ? $this->casts : [];

        return array_merge($casts, [
            'extra_attributes' => SchemalessAttributes::class,
        ]);
    }

    /**
     * Scope per filtrare per attributi schemaless.
     *
     * @template TModel of Model
     *
     * @param  Builder<TModel>  $query
     * @return Builder<TModel>
     */
    public function scopeWithExtraAttributes(Builder $query): Builder
    {
        if (isset($this->extra_attributes) && is_object($this->extra_attributes)) {
            return $this->extra_attributes->modelScope();
        }

        return $query;
    }

    /**
     * Scope per query specifiche su extra_attributes.
     *
     * @template TModel of Model
     *
     * @param  Builder<TModel>  $query
     * @return Builder<TModel>
     */
    public function scopeWhereExtraAttribute(Builder $query, string $key, mixed $value): Builder
    {
        return $query->where("extra_attributes->{$key}", $value);
    }

    /**
     * Get un valore da extra_attributes.
     */
    public function getExtraAttribute(string $key, mixed $default = null): mixed
    {
        return $this->extra_attributes?->get($key, $default) ?? $default;
    }

    /**
     * Set un valore in extra_attributes.
     */
    public function setExtraAttribute(string $key, mixed $value): void
    {
        if ($this->extra_attributes === null) {
            // Spatie expects model+attribute; prefer attribute mutation when cast is configured.
            $this->setAttribute('extra_attributes', [$key => $value]);

            return;
        }

        $this->extra_attributes->set($key, $value);
    }

    /**
     * Get tutti gli extra_attributes come array.
     *
     * @return array<string, mixed>
     */
    public function getExtraAttributes(): array
    {
        /** @var array<string, mixed> $all */
        $all = $this->extra_attributes?->all() ?? [];

        return $all;
    }

    /**
     * Controlla se esiste un attributo in extra_attributes.
     */
    public function hasExtraAttribute(string $key): bool
    {
        return $this->extra_attributes?->has($key) ?? false;
    }

    /**
     * Rimuove un attributo da extra_attributes.
     */
    public function removeExtraAttribute(string $key): void
    {
        $this->extra_attributes?->forget($key);
    }

    /**
     * Sincronizza gli extra_attributes con il database.
     */
    public function syncExtraAttributes(): void
    {
        $this->save();
    }
}
