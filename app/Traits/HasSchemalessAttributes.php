<?php

declare(strict_types=1);

namespace Modules\Xot\Traits;

use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\SchemalessAttributes;

/**
 * Trait per implementare Schemaless Attributes in modo consistente.
 *
 * Fornisce metodi standard per lavorare con extra_attributes
 * seguendo le best practices di Spatie.
 *
 * @see https://github.com/spatie/laravel-schemaless-attributes
 */
trait HasSchemalessAttributes
{
    /**
     * Scope per filtrare per attributi schemaless.
     */
    public function scopeWithExtraAttributes(Builder $query): Builder
    {
        if (isset(// @var mixed extra_attributes
            return // @var mixed extra_attributes->modelScope(;
        }

        return $query;
    }

    /**
     * Scope per query specifiche su extra_attributes.
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
        if (// @var mixed extra_attributes instanceof SchemalessAttributes
            return // @var mixed extra_attributes->get($key, $default;
        }

        if (is_array(// @var mixed extra_attributes
            return // @var mixed extra_attributes[$key] ?? $default;
        }

        return $default;
    }

    /**
     * Set un valore in extra_attributes.
     */
    public function setExtraAttribute(string $key, mixed $value): void
    {
        if (! // @var mixed extra_attributes instanceof SchemalessAttributes
            // @var mixed extra_attributes = SchemalessAttributes::createForModel($this, 'extra_attributes';
        }

        // @var mixed extra_attributes->set($key, $value;
    }

    /**
     * Get tutti gli extra_attributes come array.
     *
     * @return array<string, mixed>
     */
    public function getExtraAttributes(): array
    {
        if (// @var mixed extra_attributes instanceof SchemalessAttributes
            return // @var mixed extra_attributes->all(;
        }

        if (is_array(// @var mixed extra_attributes
            return // @var mixed extra_attributes;
        }

        return [];
    }

    /**
     * Controlla se esiste un attributo in extra_attributes.
     */
    public function hasExtraAttribute(string $key): bool
    {
        if (// @var mixed extra_attributes instanceof SchemalessAttributes
            return // @var mixed extra_attributes->has($key;
        }

        if (is_array(// @var mixed extra_attributes
            return array_key_exists($key, // @var mixed extra_attributes;
        }

        return false;
    }

    /**
     * Rimuove un attributo da extra_attributes.
     */
    public function removeExtraAttribute(string $key): void
    {
        if (// @var mixed extra_attributes instanceof SchemalessAttributes
            // @var mixed extra_attributes->forget($key;

            return;
        }

        if (is_array(// @var mixed extra_attributes
            $attributes = // @var mixed extra_attributes;
            unset($attributes[$key]);
            // @var mixed extra_attributes = $attributes;
        }
    }

    /**
     * Sincronizza gli extra_attributes con il database.
     */
    public function syncExtraAttributes(): void
    {
        // @var mixed save(;
    }

    /**
     * Aggiunge extra_attributes al fillable.
     *
     * @return array<string>
     */
    protected function schemalessFillable(): array
    {
        return array_merge(// @var mixed fillable, [
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
        return array_merge(// @var mixed casts ?? [], [
            'extra_attributes' => SchemalessAttributes::class,
        ]);
    }
}
