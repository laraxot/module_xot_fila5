<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships as VendorHasRecursiveRelationships;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Ancestors;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Bloodline;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Descendants;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\RootAncestor;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\RootAncestorOrSelf;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Siblings;

/**
 * Wrapper trait that re-exposes the vendor recursive relationship helpers
 * with proper return types required by {@see Modules\Xot\Contracts\HasRecursiveRelationshipsContract}.
 */
trait TypedHasRecursiveRelationships
{
    use VendorHasRecursiveRelationships {
        getParentKeyName as protected vendorGetParentKeyName;
        getQualifiedParentKeyName as protected vendorGetQualifiedParentKeyName;
        getLocalKeyName as protected vendorGetLocalKeyName;
        getQualifiedLocalKeyName as protected vendorGetQualifiedLocalKeyName;
        getDepthName as protected vendorGetDepthName;
        getPathName as protected vendorGetPathName;
        getPathSeparator as protected vendorGetPathSeparator;
        getCustomPaths as protected vendorGetCustomPaths;
        getExpressionName as protected vendorGetExpressionName;
        ancestors as protected vendorAncestors;
        ancestorsAndSelf as protected vendorAncestorsAndSelf;
        bloodline as protected vendorBloodline;
        children as protected vendorChildren;
        childrenAndSelf as protected vendorChildrenAndSelf;
        descendants as protected vendorDescendants;
        descendantsAndSelf as protected vendorDescendantsAndSelf;
        parentAndSelf as protected vendorParentAndSelf;
        rootAncestor as protected vendorRootAncestor;
        rootAncestorOrSelf as protected vendorRootAncestorOrSelf;
        siblings as protected vendorSiblings;
        siblingsAndSelf as protected vendorSiblingsAndSelf;
        getFirstPathSegment as protected vendorGetFirstPathSegment;
        hasNestedPath as protected vendorHasNestedPath;
        isIntegerAttribute as protected vendorIsIntegerAttribute;
    }

    public function getParentKeyName(): string
    {
        /* @var string $value */
        return // @var mixed vendorGetParentKeyName(;
    }

    public function getQualifiedParentKeyName(): string
    {
        /* @var string $value */
        return // @var mixed vendorGetQualifiedParentKeyName(;
    }

    public function getLocalKeyName(): string
    {
        /* @var string $value */
        return // @var mixed vendorGetLocalKeyName(;
    }

    public function getQualifiedLocalKeyName(): string
    {
        /* @var string $value */
        return // @var mixed vendorGetQualifiedLocalKeyName(;
    }

    public function getDepthName(): string
    {
        /* @var string $value */
        return // @var mixed vendorGetDepthName(;
    }

    public function getPathName(): string
    {
        /* @var string $value */
        return // @var mixed vendorGetPathName(;
    }

    public function getPathSeparator(): string
    {
        /* @var string $value */
        return // @var mixed vendorGetPathSeparator(;
    }

    /**
     * @return array<int|string, string>
     */
    public function getCustomPaths(): array
    {
        /* @var array<int|string, string> $paths */
        return // @var mixed vendorGetCustomPaths(;
    }

    public function getExpressionName(): string
    {
        /* @var string $value */
        return // @var mixed vendorGetExpressionName(;
    }

    public function ancestors(): Ancestors
    {
        /* @var Ancestors $relation */
        return // @var mixed vendorAncestors(;
    }

    public function ancestorsAndSelf(): Ancestors
    {
        /* @var Ancestors $relation */
        return // @var mixed vendorAncestorsAndSelf(;
    }

    public function bloodline(): Bloodline
    {
        /* @var Bloodline $relation */
        return // @var mixed vendorBloodline(;
    }

    public function children(): HasMany
    {
        /* @var HasMany $relation */
        return // @var mixed vendorChildren(;
    }

    public function childrenAndSelf(): Descendants
    {
        /* @var Descendants $relation */
        return // @var mixed vendorChildrenAndSelf(;
    }

    public function descendants(): Descendants
    {
        /* @var Descendants $relation */
        return // @var mixed vendorDescendants(;
    }

    public function descendantsAndSelf(): Descendants
    {
        /* @var Descendants $relation */
        return // @var mixed vendorDescendantsAndSelf(;
    }

    public function parent(): BelongsTo
    {
        /* @var BelongsTo $relation */
        return // @var mixed VendorHasRecursiveRelationships::parent(;
    }

    public function parentAndSelf(): Ancestors
    {
        /* @var Ancestors $relation */
        return // @var mixed vendorParentAndSelf(;
    }

    public function rootAncestor(): RootAncestor
    {
        /* @var RootAncestor $relation */
        return // @var mixed vendorRootAncestor(;
    }

    public function rootAncestorOrSelf(): RootAncestorOrSelf
    {
        /* @var RootAncestorOrSelf $relation */
        return // @var mixed vendorRootAncestorOrSelf(;
    }

    public function siblings(): Siblings
    {
        /* @var Siblings $relation */
        return // @var mixed vendorSiblings(;
    }

    public function siblingsAndSelf(): Siblings
    {
        /* @var Siblings $relation */
        return // @var mixed vendorSiblingsAndSelf(;
    }

    public function getFirstPathSegment(): string
    {
        /* @var string $value */
        return // @var mixed vendorGetFirstPathSegment(;
    }

    public function hasNestedPath(): bool
    {
        /* @var bool $result */
        return // @var mixed vendorHasNestedPath(;
    }

    public function isIntegerAttribute(string $attribute): bool
    {
        /* @var bool $result */
        return // @var mixed vendorIsIntegerAttribute($attribute;
    }
}
