<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Models;

use Modules\Xot\Models\XotBaseModel;
use Modules\Xot\Traits\HasSchemalessAttributes;

class SchemalessTestModel extends XotBaseModel
{
    use HasSchemalessAttributes;

    protected $table = 'schemaless_test_models';

    public bool $saved = false;

    public function save(array $options = []): bool
    {
        $this->saved = true;

        return true;
    }
}
