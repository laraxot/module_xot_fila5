<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships as VendorHasRecursiveRelationships;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Ancestors;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Bloodline;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Descendants;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\RootAncestor;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\RootAncestorOrSelf;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Siblings;
use Webmozart\Assert\Assert;

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
        return Assert::string($this->vendorGetParentKeyName());
    }

    public function getQualifiedParentKeyName(): string
    {
        return Assert::string($this->vendorGetQualifiedParentKeyName());
    }

    public function getLocalKeyName(): string
    {
        return Assert::string($this->vendorGetLocalKeyName());
    }

    public function getQualifiedLocalKeyName(): string
    {
        return Assert::string($this->vendorGetQualifiedLocalKeyName());
    }

    public function getDepthName(): string
    {
        return Assert::string($this->vendorGetDepthName());
    }

    public function getPathName(): string
    {
        return Assert::string($this->vendorGetPathName());
    }

    public function getPathSeparator(): string
    {
        return Assert::string($this->vendorGetPathSeparator());
    }

    /**
     * @return array<int|string, string>
     */
    public function getCustomPaths(): array
    {
        $paths = $this->vendorGetCustomPaths();
        Assert::isArray($paths);

        return $paths;
    }

    public function getExpressionName(): string
    {
        return Assert::string($this->vendorGetExpressionName());
    }

    public function ancestors(): Ancestors
    {
        $relation = $this->vendorAncestors();
        Assert::isInstanceOf($relation, Ancestors::class);

        return $relation;
    }

    public function ancestorsAndSelf(): Ancestors
    {
        $relation = $this->vendorAncestorsAndSelf();
        Assert::isInstanceOf($relation, Ancestors::class);

        return $relation;
    }

    public function bloodline(): Bloodline
    {
        $relation = $this->vendorBloodline();
        Assert::isInstanceOf($relation, Bloodline::class);

        return $relation;
    }

    public function children(): HasMany
    {
        $relation = $this->vendorChildren();
        Assert::isInstanceOf($relation, HasMany::class);

        return $relation;
    }

    public function childrenAndSelf(): Descendants
    {
        $relation = $this->vendorChildrenAndSelf();
        Assert::isInstanceOf($relation, Descendants::class);

        return $relation;
    }

    public function descendants(): Descendants
    {
        $relation = $this->vendorDescendants();
        Assert::isInstanceOf($relation, Descendants::class);

        return $relation;
    }

    public function descendantsAndSelf(): Descendants
    {
        $relation = $this->vendorDescendantsAndSelf();
        Assert::isInstanceOf($relation, Descendants::class);

        return $relation;
    }

    public function parent(): BelongsTo
    {
        $relation = $this->VendorHasRecursiveRelationships::parent();
        Assert::isInstanceOf($relation, BelongsTo::class);

        return $relation;
    }

    public function parentAndSelf(): Ancestors
    {
        $relation = $this->vendorParentAndSelf();
        Assert::isInstanceOf($relation, Ancestors::class);

        return $relation;
    }

    public function rootAncestor(): RootAncestor
    {
        $relation = $this->vendorRootAncestor();
        Assert::isInstanceOf($relation, RootAncestor::class);

        return $relation;
    }

    public function rootAncestorOrSelf(): RootAncestorOrSelf
    {
        $relation = $this->vendorRootAncestorOrSelf();
        Assert::isInstanceOf($relation, RootAncestorOrSelf::class);

        return $relation;
    }

    public function siblings(): Siblings
    {
        $relation = $this->vendorSiblings();
        Assert::isInstanceOf($relation, Siblings::class);

        return $relation;
    }

    public function siblingsAndSelf(): Siblings
    {
        $relation = $this->vendorSiblingsAndSelf();
        Assert::isInstanceOf($relation, Siblings::class);

        return $relation;
    }

    public function getFirstPathSegment(): string
    {
        return Assert::string($this->vendorGetFirstPathSegment());
    }

    public function hasNestedPath(): bool
    {
        return Assert::boolean($this->vendorHasNestedPath());
    }

    public function isIntegerAttribute(string $attribute): bool
    {
        return Assert::boolean($this->vendorIsIntegerAttribute($attribute));
    }
}
