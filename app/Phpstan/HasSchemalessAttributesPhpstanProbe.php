<?php

declare(strict_types=1);

namespace Modules\Xot\Phpstan;

use Modules\Xot\Traits\HasSchemalessAttributes;
use Spatie\SchemalessAttributes\SchemalessAttributes;

/**
 * PHPStan probes — tests/ excluded from scan.
 *
 * @property SchemalessAttributes|null $extra_attributes
 */
final class HasSchemalessAttributesPhpstanProbe extends XotPhpstanProbeModel
{
    use HasSchemalessAttributes;
}