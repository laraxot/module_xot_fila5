<?php

declare(strict_types=1);

namespace Modules\Xot\Phpstan;

use Modules\Xot\Traits\HasCustomRelations;

/**
 * PHPStan probes — tests/ excluded from scan.
 */
final class HasCustomRelationsPhpstanProbe extends XotPhpstanProbeModel
{
    use HasCustomRelations;
}