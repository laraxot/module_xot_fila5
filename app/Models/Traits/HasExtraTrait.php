<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Str;
use Modules\Xot\Contracts\ExtraContract;
<<<<<<< .merge_file_V3A0A5
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_zmh52L
use Spatie\SchemalessAttributes\SchemalessAttributes;
use Webmozart\Assert\Assert;

use function Safe\json_encode;

/**
 * Modules\Xot\Models\HasExtraTrait.
 *
 * @property string $currency
 * @property float $price
 * @property string $price_complete
 * @property int $qty
<<<<<<< .merge_file_V3A0A5
=======
=======
>>>>>>> 3792da0d (Check & fix styling)

use function Safe\json_encode;

use Spatie\SchemalessAttributes\SchemalessAttributes;
use Webmozart\Assert\Assert;

/**
 * Modules\Xot\Models\HasExtraTrait.
 *
 * @property string             $currency
 * @property float              $price
 * @property string             $price_complete
 * @property int                $qty
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_zmh52L
 * @property ExtraContract|null $extra
 */
<<<<<<< HEAD
/** @phpstan-ignore trait.unused */
=======
<<<<<<< HEAD
 * @property ExtraContract|null $extra
 */
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
trait HasExtraTrait
{
    /**
     * Retrieves the morphed one-to-one relationship between the current model and the Extra model.
     *
     * @return MorphOne<Model, $this>
     */
    public function extra(): MorphOne
    {
        $extra_class = Str::of(static::class)
            ->before('\Models\\')
            ->append('\Models\Extra')
            ->toString();
        Assert::classExists($extra_class);
        Assert::isAOf(
            $extra_class,
            Model::class,
            '['.__LINE__.']['.class_basename($this).']['.$extra_class.']',
        );

        /** @var class-string<Model> $extraClass */
        $extraClass = $extra_class;

        return $this->morphOne($extraClass, 'model');
    }

    /** @return array<string, mixed>|bool|float|int|string|null */
    public function getExtra(string $name): array|bool|float|int|string|null
    {
        $extra = $this->extra;
        if (! $extra instanceof ExtraContract || ! $extra instanceof Model) {
            return null;
        }

        $attributes = $extra->extra_attributes;
        if (! $attributes instanceof SchemalessAttributes) {
            return null;
        }

        $value = $attributes->get($name);

        if (\is_array($value)) {
            $result = [];
            foreach ($value as $key => $item) {
                if (! \is_string($key)) {
                    continue;
                }

                $result[$key] = $item;
            }

            return $result;
        }

        if (\is_bool($value) || \is_float($value) || \is_int($value) || \is_string($value)) {
            return $value;
        }

        return null;
    }

    /**
<<<<<<< .merge_file_V3A0A5
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  int|float|string|array<string, mixed>|bool|null  $value
=======
     * @param int|float|string|array<string, mixed>|bool|null $value
>>>>>>> laraxot/dev
=======
     * @param int|float|string|array<string, mixed>|bool|null $value
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  int|float|string|array<string, mixed>|bool|null  $value
>>>>>>> .merge_file_zmh52L
     */
    public function setExtra(string $name, int|float|string|array|bool|null $value): void
    {
        $extra = $this->extra;
        if (! $extra instanceof ExtraContract || ! $extra instanceof Model) {
            $extra = $this->extra()->firstOrCreate([], ['extra_attributes' => json_encode([])]);
            if (! $extra instanceof ExtraContract || ! $extra instanceof Model) {
                return;
            }
        }

        $attributes = $extra->extra_attributes;
        if (! $attributes instanceof SchemalessAttributes) {
            $extra->extra_attributes = $attributes = new SchemalessAttributes($extra, 'extra_attributes');
        }

        $attributes->set($name, $value);
        $extra->save();
    }
}
