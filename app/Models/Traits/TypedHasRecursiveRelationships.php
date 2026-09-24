<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

<<<<<<< HEAD
=======
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).
// Xot — domain PHP (claude-audit documentation ratio).

>>>>>>> laraxot/dev
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
=======
use Webmozart\Assert\Assert;
>>>>>>> laraxot/dev

/**
 * Wrapper trait that re-exposes the vendor recursive relationship helpers
 * with proper return types required by {@see Modules\Xot\Contracts\HasRecursiveRelationshipsContract}.
<<<<<<< HEAD
 *
 * @phpstan-ignore trait.unused
=======
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetParentKeyName();
=======
        return Assert::string($this->vendorGetParentKeyName());
>>>>>>> laraxot/dev
    }

    public function getQualifiedParentKeyName(): string
    {
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetQualifiedParentKeyName();
=======
        return Assert::string($this->vendorGetQualifiedParentKeyName());
>>>>>>> laraxot/dev
    }

    public function getLocalKeyName(): string
    {
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetLocalKeyName();
=======
        return Assert::string($this->vendorGetLocalKeyName());
>>>>>>> laraxot/dev
    }

    public function getQualifiedLocalKeyName(): string
    {
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetQualifiedLocalKeyName();
=======
        return Assert::string($this->vendorGetQualifiedLocalKeyName());
>>>>>>> laraxot/dev
    }

    public function getDepthName(): string
    {
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetDepthName();
=======
        return Assert::string($this->vendorGetDepthName());
>>>>>>> laraxot/dev
    }

    public function getPathName(): string
    {
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetPathName();
=======
        return Assert::string($this->vendorGetPathName());
>>>>>>> laraxot/dev
    }

    public function getPathSeparator(): string
    {
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetPathSeparator();
=======
        return Assert::string($this->vendorGetPathSeparator());
>>>>>>> laraxot/dev
    }

    /**
     * @return array<int|string, string>
     */
    public function getCustomPaths(): array
    {
<<<<<<< HEAD
        /** @var array<int|string, string> $paths */
        return $this->vendorGetCustomPaths();
=======
        $paths = $this->vendorGetCustomPaths();
        Assert::isArray($paths);

        return $paths;
>>>>>>> laraxot/dev
    }

    public function getExpressionName(): string
    {
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetExpressionName();
=======
        return Assert::string($this->vendorGetExpressionName());
>>>>>>> laraxot/dev
    }

    public function ancestors(): Ancestors
    {
<<<<<<< HEAD
        /** @var Ancestors $relation */
        return $this->vendorAncestors();
=======
        $relation = $this->vendorAncestors();
        Assert::isInstanceOf($relation, Ancestors::class);

        return $relation;
>>>>>>> laraxot/dev
    }

    public function ancestorsAndSelf(): Ancestors
    {
<<<<<<< HEAD
        /** @var Ancestors $relation */
        return $this->vendorAncestorsAndSelf();
=======
        $relation = $this->vendorAncestorsAndSelf();
        Assert::isInstanceOf($relation, Ancestors::class);

        return $relation;
>>>>>>> laraxot/dev
    }

    public function bloodline(): Bloodline
    {
<<<<<<< HEAD
        /** @var Bloodline $relation */
        return $this->vendorBloodline();
=======
        $relation = $this->vendorBloodline();
        Assert::isInstanceOf($relation, Bloodline::class);

        return $relation;
>>>>>>> laraxot/dev
    }

    public function children(): HasMany
    {
<<<<<<< HEAD
        /** @var HasMany $relation */
        return $this->vendorChildren();
=======
        $relation = $this->vendorChildren();
        Assert::isInstanceOf($relation, HasMany::class);

        return $relation;
>>>>>>> laraxot/dev
    }

    public function childrenAndSelf(): Descendants
    {
<<<<<<< HEAD
        /** @var Descendants $relation */
        return $this->vendorChildrenAndSelf();
=======
        $relation = $this->vendorChildrenAndSelf();
        Assert::isInstanceOf($relation, Descendants::class);

        return $relation;
>>>>>>> laraxot/dev
    }

    public function descendants(): Descendants
    {
<<<<<<< HEAD
        /** @var Descendants $relation */
        return $this->vendorDescendants();
=======
        $relation = $this->vendorDescendants();
        Assert::isInstanceOf($relation, Descendants::class);

        return $relation;
>>>>>>> laraxot/dev
    }

    public function descendantsAndSelf(): Descendants
    {
<<<<<<< HEAD
        /** @var Descendants $relation */
        return $this->vendorDescendantsAndSelf();
=======
        $relation = $this->vendorDescendantsAndSelf();
        Assert::isInstanceOf($relation, Descendants::class);

        return $relation;
>>>>>>> laraxot/dev
    }

    public function parent(): BelongsTo
    {
<<<<<<< HEAD
        /** @var BelongsTo $relation */
        return $this->VendorHasRecursiveRelationships::parent();
=======
        $relation = $this->VendorHasRecursiveRelationships::parent();
        Assert::isInstanceOf($relation, BelongsTo::class);

        return $relation;
>>>>>>> laraxot/dev
    }

    public function parentAndSelf(): Ancestors
    {
<<<<<<< HEAD
        /** @var Ancestors $relation */
        return $this->vendorParentAndSelf();
=======
        $relation = $this->vendorParentAndSelf();
        Assert::isInstanceOf($relation, Ancestors::class);

        return $relation;
>>>>>>> laraxot/dev
    }

    public function rootAncestor(): RootAncestor
    {
<<<<<<< HEAD
        /** @var RootAncestor $relation */
        return $this->vendorRootAncestor();
=======
        $relation = $this->vendorRootAncestor();
        Assert::isInstanceOf($relation, RootAncestor::class);

        return $relation;
>>>>>>> laraxot/dev
    }

    public function rootAncestorOrSelf(): RootAncestorOrSelf
    {
<<<<<<< HEAD
        /** @var RootAncestorOrSelf $relation */
        return $this->vendorRootAncestorOrSelf();
=======
        $relation = $this->vendorRootAncestorOrSelf();
        Assert::isInstanceOf($relation, RootAncestorOrSelf::class);

        return $relation;
>>>>>>> laraxot/dev
    }

    public function siblings(): Siblings
    {
<<<<<<< HEAD
        /** @var Siblings $relation */
        return $this->vendorSiblings();
=======
        $relation = $this->vendorSiblings();
        Assert::isInstanceOf($relation, Siblings::class);

        return $relation;
>>>>>>> laraxot/dev
    }

    public function siblingsAndSelf(): Siblings
    {
<<<<<<< HEAD
        /** @var Siblings $relation */
        return $this->vendorSiblingsAndSelf();
=======
        $relation = $this->vendorSiblingsAndSelf();
        Assert::isInstanceOf($relation, Siblings::class);

        return $relation;
>>>>>>> laraxot/dev
    }

    public function getFirstPathSegment(): string
    {
<<<<<<< HEAD
        /** @var string $value */
        return $this->vendorGetFirstPathSegment();
=======
        return Assert::string($this->vendorGetFirstPathSegment());
>>>>>>> laraxot/dev
    }

    public function hasNestedPath(): bool
    {
<<<<<<< HEAD
        /** @var bool $result */
        return $this->vendorHasNestedPath();
=======
        return Assert::boolean($this->vendorHasNestedPath());
>>>>>>> laraxot/dev
    }

    public function isIntegerAttribute(string $attribute): bool
    {
<<<<<<< HEAD
        /** @var bool $result */
        return $this->vendorIsIntegerAttribute($attribute);
=======
        return Assert::boolean($this->vendorIsIntegerAttribute($attribute));
>>>>>>> laraxot/dev
    }
}
