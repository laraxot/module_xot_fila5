<?php

declare(strict_types=1);

namespace Modules\Xot\Phpstan;

use Illuminate\Support\Carbon;
use Modules\Xot\Models\Traits\HasCommonScopes;

/**
 * PHPStan probes — tests/ excluded from scan.
 *
 * @property bool|null   $is_active
 * @property Carbon|null $published_at
 */
final class HasCommonScopesPhpstanProbe extends XotPhpstanProbeModel
{
    use HasCommonScopes;
}