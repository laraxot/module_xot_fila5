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
        parent as protected vendorParent;
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
        $value = $this->vendorGetParentKeyName();
        Assert::string($value);

        return $value;
    }

    public function getQualifiedParentKeyName(): string
    {
        $value = $this->vendorGetQualifiedParentKeyName();
        Assert::string($value);

        return $value;
    }

    public function getLocalKeyName(): string
    {
        $value = $this->vendorGetLocalKeyName();
        Assert::string($value);

        return $value;
    }

    public function getQualifiedLocalKeyName(): string
    {
        $value = $this->vendorGetQualifiedLocalKeyName();
        Assert::string($value);

        return $value;
    }

    public function getDepthName(): string
    {
        $value = $this->vendorGetDepthName();
        Assert::string($value);

        return $value;
    }

    public function getPathName(): string
    {
        $value = $this->vendorGetPathName();
        Assert::string($value);

        return $value;
    }

    public function getPathSeparator(): string
    {
        $value = $this->vendorGetPathSeparator();
        Assert::string($value);

        return $value;
    }

    /**
     * @return array<int|string, string>
     */
    public function getCustomPaths(): array
    {
        $paths = $this->vendorGetCustomPaths();
        Assert::isArray($paths);

        $result = [];
        foreach ($paths as $key => $value) {
            Assert::string($value);
            $result[$key] = $value;
        }

        return $result;
    }

    public function getExpressionName(): string
    {
        $value = $this->vendorGetExpressionName();
        Assert::string($value);

        return $value;
    }

    /**
     * @return Ancestors<static, static>
     */
    public function ancestors(): Ancestors
    {
        $relation = $this->vendorAncestors();
        Assert::isInstanceOf($relation, Ancestors::class);

        return $relation;
    }

    /**
     * @return Ancestors<static, static>
     */
    public function ancestorsAndSelf(): Ancestors
    {
        $relation = $this->vendorAncestorsAndSelf();
        Assert::isInstanceOf($relation, Ancestors::class);

        return $relation;
    }

    /**
     * @return Bloodline<static, static>
     */
    public function bloodline(): Bloodline
    {
        $relation = $this->vendorBloodline();
        Assert::isInstanceOf($relation, Bloodline::class);

        return $relation;
    }

    /**
     * @return HasMany<static, static>
     */
    public function children(): HasMany
    {
        $relation = $this->vendorChildren();
        Assert::isInstanceOf($relation, HasMany::class);

        return $relation;
    }

    /**
     * @return Descendants<static, static>
     */
    public function childrenAndSelf(): Descendants
    {
        $relation = $this->vendorChildrenAndSelf();
        Assert::isInstanceOf($relation, Descendants::class);

        return $relation;
    }

    /**
     * @return Descendants<static, static>
     */
    public function descendants(): Descendants
    {
        $relation = $this->vendorDescendants();
        Assert::isInstanceOf($relation, Descendants::class);

        return $relation;
    }

    /**
     * @return Descendants<static, static>
     */
    public function descendantsAndSelf(): Descendants
    {
        $relation = $this->vendorDescendantsAndSelf();
        Assert::isInstanceOf($relation, Descendants::class);

        return $relation;
    }

    /**
     * @return BelongsTo<static, static>
     */
    public function parent(): BelongsTo
    {
        $relation = $this->vendorParent();
        Assert::isInstanceOf($relation, BelongsTo::class);

        return $relation;
    }

    /**
     * @return Ancestors<static, static>
     */
    public function parentAndSelf(): Ancestors
    {
        $relation = $this->vendorParentAndSelf();
        Assert::isInstanceOf($relation, Ancestors::class);

        return $relation;
    }

    /**
     * @return RootAncestor<static, static>
     */
    public function rootAncestor(): RootAncestor
    {
        $relation = $this->vendorRootAncestor();
        Assert::isInstanceOf($relation, RootAncestor::class);

        return $relation;
    }

    /**
     * @return RootAncestorOrSelf<static, static>
     */
    public function rootAncestorOrSelf(): RootAncestorOrSelf
    {
        $relation = $this->vendorRootAncestorOrSelf();
        Assert::isInstanceOf($relation, RootAncestorOrSelf::class);

        return $relation;
    }

    /**
     * @return Siblings<static, static>
     */
    public function siblings(): Siblings
    {
        $relation = $this->vendorSiblings();
        Assert::isInstanceOf($relation, Siblings::class);

        return $relation;
    }

    /**
     * @return Siblings<static, static>
     */
    public function siblingsAndSelf(): Siblings
    {
        $relation = $this->vendorSiblingsAndSelf();
        Assert::isInstanceOf($relation, Siblings::class);

        return $relation;
    }

    public function getFirstPathSegment(): string
    {
        $value = $this->vendorGetFirstPathSegment();
        Assert::string($value);

        return $value;
    }

    public function hasNestedPath(): bool
    {
        $result = $this->vendorHasNestedPath();
        Assert::boolean($result);

        return $result;
    }

    public function isIntegerAttribute(string $attribute): bool
    {
        $result = $this->vendorIsIntegerAttribute($attribute);
        Assert::boolean($result);

        return $result;
    }
}
