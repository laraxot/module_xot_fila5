<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Fixtures\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Collection;
use Modules\Xot\Contracts\ExtraContract;

/**
 * Minimal ExtraContract stub for HasExtraTrait tests.
 *
 * @property Collection<string, mixed> $extra_attributes
 */
class HasExtraMockExtra extends Model implements ExtraContract
{
    protected $table = 'has_extra_mock_extras';

    /** @var list<string> */
    protected $fillable = ['extra_attributes'];

    /**
<<<<<<< .merge_file_eWqfDm
<<<<<<< HEAD
     * @param  array<string, mixed>  $attributes
     */
    public static function withAttributes(array $attributes): self
    {
        $extra = new self;
=======
=======
>>>>>>> .merge_file_EDcINl
     * @param array<string, mixed> $attributes
     */
    public static function withAttributes(array $attributes): self
    {
        $extra = new self();
<<<<<<< .merge_file_eWqfDm
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_EDcINl
        $extra->extra_attributes = collect($attributes);

        return $extra;
    }

    /**
     * @return MorphTo<Model, $this>
     */
    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
