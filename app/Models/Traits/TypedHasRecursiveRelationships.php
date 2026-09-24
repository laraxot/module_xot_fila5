<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships as VendorHasRecursiveRelationships;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Ancestors;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Bloodline;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Descendants;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\RootAncestor;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\RootAncestorOrSelf;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Siblings;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Webmozart\Assert\Assert;
>>>>>>> laraxot/dev
=======
use Webmozart\Assert\Assert;
>>>>>>> 8d801bbe (Check & fix styling)

/**
 * Wrapper trait that re-exposes the vendor recursive relationship helpers
 * with proper return types required by {@see Modules\Xot\Contracts\HasRecursiveRelationshipsContract}.
<<<<<<< HEAD
 *
 * @phpstan-ignore trait.unused
=======
>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< HEAD
<<<<<<< HEAD
=======
        parent as protected vendorParent;
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetParentKeyName();
=======
        $value = $this->vendorGetParentKeyName();
        Assert::string($value);

        return $value;
>>>>>>> laraxot/dev
=======
        return Assert::string($this->vendorGetParentKeyName());
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function getQualifiedParentKeyName(): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetQualifiedParentKeyName();
=======
        $value = $this->vendorGetQualifiedParentKeyName();
        Assert::string($value);

        return $value;
>>>>>>> laraxot/dev
=======
        return Assert::string($this->vendorGetQualifiedParentKeyName());
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function getLocalKeyName(): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetLocalKeyName();
=======
        $value = $this->vendorGetLocalKeyName();
        Assert::string($value);

        return $value;
>>>>>>> laraxot/dev
=======
        return Assert::string($this->vendorGetLocalKeyName());
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function getQualifiedLocalKeyName(): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetQualifiedLocalKeyName();
=======
        $value = $this->vendorGetQualifiedLocalKeyName();
        Assert::string($value);

        return $value;
>>>>>>> laraxot/dev
=======
        return Assert::string($this->vendorGetQualifiedLocalKeyName());
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function getDepthName(): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetDepthName();
=======
        $value = $this->vendorGetDepthName();
        Assert::string($value);

        return $value;
>>>>>>> laraxot/dev
=======
        return Assert::string($this->vendorGetDepthName());
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function getPathName(): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetPathName();
=======
        $value = $this->vendorGetPathName();
        Assert::string($value);

        return $value;
>>>>>>> laraxot/dev
=======
        return Assert::string($this->vendorGetPathName());
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function getPathSeparator(): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetPathSeparator();
=======
        $value = $this->vendorGetPathSeparator();
        Assert::string($value);

        return $value;
>>>>>>> laraxot/dev
=======
        return Assert::string($this->vendorGetPathSeparator());
>>>>>>> 8d801bbe (Check & fix styling)
    }

    /**
     * @return array<int|string, string>
     */
    public function getCustomPaths(): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var array<int|string, string> $paths */
        return $this->vendorGetCustomPaths();
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
        $paths = $this->vendorGetCustomPaths();
        Assert::isArray($paths);

        return $paths;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function getExpressionName(): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetExpressionName();
=======
        $value = $this->vendorGetExpressionName();
        Assert::string($value);

        return $value;
>>>>>>> laraxot/dev
=======
        return Assert::string($this->vendorGetExpressionName());
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function ancestors(): Ancestors
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Ancestors $relation */
        return $this->vendorAncestors();
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
        $relation = $this->vendorAncestors();
        Assert::isInstanceOf($relation, Ancestors::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function ancestorsAndSelf(): Ancestors
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Ancestors $relation */
        return $this->vendorAncestorsAndSelf();
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
        $relation = $this->vendorAncestorsAndSelf();
        Assert::isInstanceOf($relation, Ancestors::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function bloodline(): Bloodline
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Bloodline $relation */
        return $this->vendorBloodline();
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
        $relation = $this->vendorBloodline();
        Assert::isInstanceOf($relation, Bloodline::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function children(): HasMany
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var HasMany $relation */
        return $this->vendorChildren();
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
        $relation = $this->vendorChildren();
        Assert::isInstanceOf($relation, HasMany::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function childrenAndSelf(): Descendants
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Descendants $relation */
        return $this->vendorChildrenAndSelf();
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
        $relation = $this->vendorChildrenAndSelf();
        Assert::isInstanceOf($relation, Descendants::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function descendants(): Descendants
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Descendants $relation */
        return $this->vendorDescendants();
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
        $relation = $this->vendorDescendants();
        Assert::isInstanceOf($relation, Descendants::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function descendantsAndSelf(): Descendants
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Descendants $relation */
        return $this->vendorDescendantsAndSelf();
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
        $relation = $this->vendorDescendantsAndSelf();
        Assert::isInstanceOf($relation, Descendants::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function parent(): BelongsTo
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var BelongsTo $relation */
        return $this->VendorHasRecursiveRelationships::parent();
=======
        $relation = $this->vendorParent();
        Assert::isInstanceOf($relation, BelongsTo::class);

        return $relation;
>>>>>>> laraxot/dev
=======
        $relation = $this->VendorHasRecursiveRelationships::parent();
        Assert::isInstanceOf($relation, BelongsTo::class);

        return $relation;
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function parentAndSelf(): Ancestors
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Ancestors $relation */
        return $this->vendorParentAndSelf();
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
        $relation = $this->vendorParentAndSelf();
        Assert::isInstanceOf($relation, Ancestors::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function rootAncestor(): RootAncestor
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var RootAncestor $relation */
        return $this->vendorRootAncestor();
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
        $relation = $this->vendorRootAncestor();
        Assert::isInstanceOf($relation, RootAncestor::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function rootAncestorOrSelf(): RootAncestorOrSelf
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var RootAncestorOrSelf $relation */
        return $this->vendorRootAncestorOrSelf();
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
        $relation = $this->vendorRootAncestorOrSelf();
        Assert::isInstanceOf($relation, RootAncestorOrSelf::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function siblings(): Siblings
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Siblings $relation */
        return $this->vendorSiblings();
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
        $relation = $this->vendorSiblings();
        Assert::isInstanceOf($relation, Siblings::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function siblingsAndSelf(): Siblings
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Siblings $relation */
        return $this->vendorSiblingsAndSelf();
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
        $relation = $this->vendorSiblingsAndSelf();
        Assert::isInstanceOf($relation, Siblings::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function getFirstPathSegment(): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetFirstPathSegment();
=======
        $value = $this->vendorGetFirstPathSegment();
        Assert::string($value);

        return $value;
>>>>>>> laraxot/dev
=======
        return Assert::string($this->vendorGetFirstPathSegment());
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function hasNestedPath(): bool
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var bool $result */
        return $this->vendorHasNestedPath();
=======
        $result = $this->vendorHasNestedPath();
        Assert::boolean($result);

        return $result;
>>>>>>> laraxot/dev
=======
        return Assert::boolean($this->vendorHasNestedPath());
>>>>>>> 8d801bbe (Check & fix styling)
    }

    public function isIntegerAttribute(string $attribute): bool
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var bool $result */
        return $this->vendorIsIntegerAttribute($attribute);
=======
        $result = $this->vendorIsIntegerAttribute($attribute);
        Assert::boolean($result);

        return $result;
>>>>>>> laraxot/dev
=======
        return Assert::boolean($this->vendorIsIntegerAttribute($attribute));
>>>>>>> 8d801bbe (Check & fix styling)
    }
}
