<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Fixtures\Models;

use Modules\Xot\Models\XotBaseModel;
use Modules\Xot\Traits\HasSchemalessAttributes;
use Spatie\SchemalessAttributes\SchemalessAttributes;

class SchemalessTestModel extends XotBaseModel
{
    use HasSchemalessAttributes;

    protected $table = 'schemaless_test_models';

    /** @var array<string, string> */
    protected $casts = [
        'extra_attributes' => SchemalessAttributes::class,
    ];

    public ?SchemalessAttributes $extra_attributes = null;

    public bool $saved = false;

    public function save(array $options = []): bool
    {
        $this->saved = true;

        return true;
    }
}
