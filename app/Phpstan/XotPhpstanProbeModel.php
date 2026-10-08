<?php

declare(strict_types=1);

namespace Modules\Xot\Phpstan;

use Modules\Xot\Models\XotBaseModel;

/**
 * PHPStan probes — tests/ excluded from scan.
 */
abstract class XotPhpstanProbeModel extends XotBaseModel
{
    protected $table = 'xot_phpstan_trait_probes';
}