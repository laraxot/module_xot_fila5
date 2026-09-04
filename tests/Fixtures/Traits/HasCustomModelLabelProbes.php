<?php

declare(strict_types=1);

/**
 * PSR-4 compliant re-exports from Stubs namespace.
 * Classes moved to Modules\Xot\Tests\Fixtures\Stubs for autoloading compliance.
 *
 * @deprecated Import directly from Stubs namespace in new code
 */

namespace Modules\Xot\Tests\Fixtures\Traits;

use Modules\Xot\Tests\Fixtures\Stubs\HasCustomModelLabelProbeBase;
use Modules\Xot\Tests\Fixtures\Stubs\HasCustomModelLabelProbeWithLabels;
use Modules\Xot\Tests\Fixtures\Stubs\HasCustomModelLabelProbeWithoutLabels;

use function Safe\class_alias;

// Re-export for backward compatibility - import directly from Stubs namespace in new code
class_alias(HasCustomModelLabelProbeBase::class, __NAMESPACE__.'\HasCustomModelLabelProbeBase');
class_alias(HasCustomModelLabelProbeWithLabels::class, __NAMESPACE__.'\HasCustomModelLabelProbeWithLabels');
class_alias(HasCustomModelLabelProbeWithoutLabels::class, __NAMESPACE__.'\HasCustomModelLabelProbeWithoutLabels');
