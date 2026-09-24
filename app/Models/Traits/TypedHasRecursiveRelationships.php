<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

<<<<<<< .merge_file_cBIyN5
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_reAx7M
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships as VendorHasRecursiveRelationships;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Ancestors;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Bloodline;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Descendants;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\RootAncestor;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\RootAncestorOrSelf;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Siblings;
<<<<<<< .merge_file_cBIyN5
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Webmozart\Assert\Assert;
>>>>>>> laraxot/dev
=======
use Webmozart\Assert\Assert;
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_reAx7M

/**
 * Wrapper trait that re-exposes the vendor recursive relationship helpers
 * with proper return types required by {@see Modules\Xot\Contracts\HasRecursiveRelationshipsContract}.
<<<<<<< HEAD
 *
 * @phpstan-ignore trait.unused
=======
>>>>>>> 3792da0d (Check & fix styling)
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
<<<<<<< .merge_file_cBIyN5
<<<<<<< HEAD
<<<<<<< HEAD
=======
        parent as protected vendorParent;
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_reAx7M
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
<<<<<<< .merge_file_cBIyN5
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
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var string $value */
        return $this->vendorGetParentKeyName();
>>>>>>> .merge_file_reAx7M
    }

    public function getQualifiedParentKeyName(): string
    {
<<<<<<< .merge_file_cBIyN5
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
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var string $value */
        return $this->vendorGetQualifiedParentKeyName();
>>>>>>> .merge_file_reAx7M
    }

    public function getLocalKeyName(): string
    {
<<<<<<< .merge_file_cBIyN5
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
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var string $value */
        return $this->vendorGetLocalKeyName();
>>>>>>> .merge_file_reAx7M
    }

    public function getQualifiedLocalKeyName(): string
    {
<<<<<<< .merge_file_cBIyN5
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
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var string $value */
        return $this->vendorGetQualifiedLocalKeyName();
>>>>>>> .merge_file_reAx7M
    }

    public function getDepthName(): string
    {
<<<<<<< .merge_file_cBIyN5
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
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var string $value */
        return $this->vendorGetDepthName();
>>>>>>> .merge_file_reAx7M
    }

    public function getPathName(): string
    {
<<<<<<< .merge_file_cBIyN5
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
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var string $value */
        return $this->vendorGetPathName();
>>>>>>> .merge_file_reAx7M
    }

    public function getPathSeparator(): string
    {
<<<<<<< .merge_file_cBIyN5
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
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var string $value */
        return $this->vendorGetPathSeparator();
>>>>>>> .merge_file_reAx7M
    }

    /**
     * @return array<int|string, string>
     */
    public function getCustomPaths(): array
    {
<<<<<<< .merge_file_cBIyN5
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var array<int|string, string> $paths */
        return $this->vendorGetCustomPaths();
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $paths = $this->vendorGetCustomPaths();
        Assert::isArray($paths);

        return $paths;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var array<int|string, string> $paths */
        return $this->vendorGetCustomPaths();
>>>>>>> .merge_file_reAx7M
    }

    public function getExpressionName(): string
    {
<<<<<<< .merge_file_cBIyN5
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
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var string $value */
        return $this->vendorGetExpressionName();
>>>>>>> .merge_file_reAx7M
    }

    public function ancestors(): Ancestors
    {
<<<<<<< .merge_file_cBIyN5
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Ancestors $relation */
        return $this->vendorAncestors();
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $relation = $this->vendorAncestors();
        Assert::isInstanceOf($relation, Ancestors::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var Ancestors $relation */
        return $this->vendorAncestors();
>>>>>>> .merge_file_reAx7M
    }

    public function ancestorsAndSelf(): Ancestors
    {
<<<<<<< .merge_file_cBIyN5
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Ancestors $relation */
        return $this->vendorAncestorsAndSelf();
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $relation = $this->vendorAncestorsAndSelf();
        Assert::isInstanceOf($relation, Ancestors::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var Ancestors $relation */
        return $this->vendorAncestorsAndSelf();
>>>>>>> .merge_file_reAx7M
    }

    public function bloodline(): Bloodline
    {
<<<<<<< .merge_file_cBIyN5
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Bloodline $relation */
        return $this->vendorBloodline();
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $relation = $this->vendorBloodline();
        Assert::isInstanceOf($relation, Bloodline::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var Bloodline $relation */
        return $this->vendorBloodline();
>>>>>>> .merge_file_reAx7M
    }

    public function children(): HasMany
    {
<<<<<<< .merge_file_cBIyN5
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var HasMany $relation */
        return $this->vendorChildren();
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $relation = $this->vendorChildren();
        Assert::isInstanceOf($relation, HasMany::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var HasMany $relation */
        return $this->vendorChildren();
>>>>>>> .merge_file_reAx7M
    }

    public function childrenAndSelf(): Descendants
    {
<<<<<<< .merge_file_cBIyN5
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Descendants $relation */
        return $this->vendorChildrenAndSelf();
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $relation = $this->vendorChildrenAndSelf();
        Assert::isInstanceOf($relation, Descendants::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var Descendants $relation */
        return $this->vendorChildrenAndSelf();
>>>>>>> .merge_file_reAx7M
    }

    public function descendants(): Descendants
    {
<<<<<<< .merge_file_cBIyN5
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Descendants $relation */
        return $this->vendorDescendants();
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $relation = $this->vendorDescendants();
        Assert::isInstanceOf($relation, Descendants::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var Descendants $relation */
        return $this->vendorDescendants();
>>>>>>> .merge_file_reAx7M
    }

    public function descendantsAndSelf(): Descendants
    {
<<<<<<< .merge_file_cBIyN5
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Descendants $relation */
        return $this->vendorDescendantsAndSelf();
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $relation = $this->vendorDescendantsAndSelf();
        Assert::isInstanceOf($relation, Descendants::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var Descendants $relation */
        return $this->vendorDescendantsAndSelf();
>>>>>>> .merge_file_reAx7M
    }

    public function parent(): BelongsTo
    {
<<<<<<< .merge_file_cBIyN5
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
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var BelongsTo $relation */
        return $this->VendorHasRecursiveRelationships::parent();
>>>>>>> .merge_file_reAx7M
    }

    public function parentAndSelf(): Ancestors
    {
<<<<<<< .merge_file_cBIyN5
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Ancestors $relation */
        return $this->vendorParentAndSelf();
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $relation = $this->vendorParentAndSelf();
        Assert::isInstanceOf($relation, Ancestors::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var Ancestors $relation */
        return $this->vendorParentAndSelf();
>>>>>>> .merge_file_reAx7M
    }

    public function rootAncestor(): RootAncestor
    {
<<<<<<< .merge_file_cBIyN5
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var RootAncestor $relation */
        return $this->vendorRootAncestor();
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $relation = $this->vendorRootAncestor();
        Assert::isInstanceOf($relation, RootAncestor::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var RootAncestor $relation */
        return $this->vendorRootAncestor();
>>>>>>> .merge_file_reAx7M
    }

    public function rootAncestorOrSelf(): RootAncestorOrSelf
    {
<<<<<<< .merge_file_cBIyN5
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var RootAncestorOrSelf $relation */
        return $this->vendorRootAncestorOrSelf();
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $relation = $this->vendorRootAncestorOrSelf();
        Assert::isInstanceOf($relation, RootAncestorOrSelf::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var RootAncestorOrSelf $relation */
        return $this->vendorRootAncestorOrSelf();
>>>>>>> .merge_file_reAx7M
    }

    public function siblings(): Siblings
    {
<<<<<<< .merge_file_cBIyN5
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Siblings $relation */
        return $this->vendorSiblings();
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $relation = $this->vendorSiblings();
        Assert::isInstanceOf($relation, Siblings::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var Siblings $relation */
        return $this->vendorSiblings();
>>>>>>> .merge_file_reAx7M
    }

    public function siblingsAndSelf(): Siblings
    {
<<<<<<< .merge_file_cBIyN5
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Siblings $relation */
        return $this->vendorSiblingsAndSelf();
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $relation = $this->vendorSiblingsAndSelf();
        Assert::isInstanceOf($relation, Siblings::class);

        return $relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var Siblings $relation */
        return $this->vendorSiblingsAndSelf();
>>>>>>> .merge_file_reAx7M
    }

    public function getFirstPathSegment(): string
    {
<<<<<<< .merge_file_cBIyN5
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
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var string $value */
        return $this->vendorGetFirstPathSegment();
>>>>>>> .merge_file_reAx7M
    }

    public function hasNestedPath(): bool
    {
<<<<<<< .merge_file_cBIyN5
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
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var bool $result */
        return $this->vendorHasNestedPath();
>>>>>>> .merge_file_reAx7M
    }

    public function isIntegerAttribute(string $attribute): bool
    {
<<<<<<< .merge_file_cBIyN5
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
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var bool $result */
        return $this->vendorIsIntegerAttribute($attribute);
>>>>>>> .merge_file_reAx7M
    }
}
