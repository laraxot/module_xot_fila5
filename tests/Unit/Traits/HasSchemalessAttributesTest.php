<?php

declare(strict_types=1);

use Modules\Xot\Tests\Fixtures\Models\SchemalessTestModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Spatie\SchemalessAttributes\SchemalessAttributes;

function makeSchemalessTestModel(): XotBaseModel
{
    return new class extends XotBaseModel {
        use HasSchemalessAttributes;

        public $extra_attributes;

        public bool $saved = false;

        public function save(array $options = []): bool
        {
            $this->saved = true;

            return true;
        }
    };
}

it('creates schemaless attributes for the requested column', function (): void {
    $model = new SchemalessTestModel();

    Assert::assertInstanceOf(
        SchemalessAttributes::class,
        $model->extra_attributes
    );
});
