<?php

declare(strict_types=1);

namespace Modules\Xot\Phpstan;

use Illuminate\Support\Carbon;
use Modules\Xot\Filament\Traits\TransFuncTrait;
use Modules\Xot\Filament\Traits\TransKeyTrait;
use Modules\Xot\Models\Traits\HasCommonScopes;
use Modules\Xot\Models\Traits\HasUuid;
use Modules\Xot\Models\Traits\TypedHasRecursiveRelationships;
use Modules\Xot\Models\XotBaseModel;
use Modules\Xot\Traits\HasCustomRelations;
use Modules\Xot\Traits\HasSchemalessAttributes;
use Spatie\SchemalessAttributes\SchemalessAttributes;

/**
 * PHPStan probes — tests/ excluded from scan.
 */
abstract class XotPhpstanProbeModel extends XotBaseModel
{
    protected $table = 'xot_phpstan_trait_probes';
}

/**
 * @property bool|null   $is_active
 * @property Carbon|null $published_at
 */
final class HasCommonScopesPhpstanProbe extends XotPhpstanProbeModel
{
    use HasCommonScopes;
}

final class HasCustomRelationsPhpstanProbe extends XotPhpstanProbeModel
{
    use HasCustomRelations;
}

/**
 * @property SchemalessAttributes|null $extra_attributes
 */
final class HasSchemalessAttributesPhpstanProbe extends XotPhpstanProbeModel
{
    use HasSchemalessAttributes;
}

final class TransFuncTraitPhpstanProbe
{
    use TransFuncTrait;
}

final class TransKeyTraitPhpstanProbe
{
    use TransKeyTrait;
}

/**
 * @property string|null $uuid
 */
final class HasUuidPhpstanProbe extends XotPhpstanProbeModel
{
    use HasUuid;
}

/**
 * @property int|null $parent_id
 */
final class TypedHasRecursiveRelationshipsPhpstanProbe extends XotPhpstanProbeModel
{
    use TypedHasRecursiveRelationships;
}
