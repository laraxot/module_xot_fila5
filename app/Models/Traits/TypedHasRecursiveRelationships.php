<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Database\Eloquent\Model;
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
 *
 * Le classi che implementano il contratto devono usare QUESTO trait, non quello vendor:
 * il vendor non tipizza i ritorni e PHP rende fatale il caricamento della classe.
 *
 * Il `@var` va sull'assegnazione: davanti a un `return` PHPStan lo ignora.
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
        /** @var string $value */
        $value = $this->vendorGetParentKeyName();

        return $value;
    }

    public function getQualifiedParentKeyName(): string
    {
        /** @var string $value */
        $value = $this->vendorGetQualifiedParentKeyName();

        return $value;
    }

    public function getLocalKeyName(): string
    {
        /** @var string $value */
        $value = $this->vendorGetLocalKeyName();

        return $value;
    }

    public function getQualifiedLocalKeyName(): string
    {
        /** @var string $value */
        $value = $this->vendorGetQualifiedLocalKeyName();

        return $value;
    }

    public function getDepthName(): string
    {
        /** @var string $value */
        $value = $this->vendorGetDepthName();

        return $value;
    }

    public function getPathName(): string
    {
        /** @var string $value */
        $value = $this->vendorGetPathName();

        return $value;
    }

    public function getPathSeparator(): string
    {
        /** @var string $value */
        $value = $this->vendorGetPathSeparator();

        return $value;
    }

    public function getExpressionName(): string
    {
        /** @var string $value */
        $value = $this->vendorGetExpressionName();

        return $value;
    }

    public function getFirstPathSegment(): string
    {
        /** @var string $value */
        $value = $this->vendorGetFirstPathSegment();

        return $value;
    }

    /**
     * @return array<string>
     */
    public function getCustomPaths(): array
    {
        /** @var array<string> $paths */
        $paths = $this->vendorGetCustomPaths();

        return $paths;
    }

    /**
     * @return Ancestors<Model, Model>
     */
    public function ancestors(): Ancestors
    {
        /** @var Ancestors<Model, Model> $relation */
        $relation = $this->vendorAncestors();

        return $relation;
    }

    /**
     * @return Ancestors<Model, Model>
     */
    public function ancestorsAndSelf(): Ancestors
    {
        /** @var Ancestors<Model, Model> $relation */
        $relation = $this->vendorAncestorsAndSelf();

        return $relation;
    }

    /**
     * @return Bloodline<Model, Model>
     */
    public function bloodline(): Bloodline
    {
        /** @var Bloodline<Model, Model> $relation */
        $relation = $this->vendorBloodline();

        return $relation;
    }

    /**
     * @return HasMany<Model, Model>
     */
    public function children(): HasMany
    {
        /** @var HasMany<Model, Model> $relation */
        $relation = $this->vendorChildren();

        return $relation;
    }

    /**
     * @return Descendants<Model, Model>
     */
    public function childrenAndSelf(): Descendants
    {
        /** @var Descendants<Model, Model> $relation */
        $relation = $this->vendorChildrenAndSelf();

        return $relation;
    }

    /**
     * @return Descendants<Model, Model>
     */
    public function descendants(): Descendants
    {
        /** @var Descendants<Model, Model> $relation */
        $relation = $this->vendorDescendants();

        return $relation;
    }

    /**
     * @return Descendants<Model, Model>
     */
    public function descendantsAndSelf(): Descendants
    {
        /** @var Descendants<Model, Model> $relation */
        $relation = $this->vendorDescendantsAndSelf();

        return $relation;
    }

    /**
     * @return BelongsTo<Model, Model>
     */
    public function parent(): BelongsTo
    {
        /** @var BelongsTo<Model, Model> $relation */
        $relation = $this->vendorParent();

        return $relation;
    }

    /**
     * @return Ancestors<Model, Model>
     */
    public function parentAndSelf(): Ancestors
    {
        /** @var Ancestors<Model, Model> $relation */
        $relation = $this->vendorParentAndSelf();

        return $relation;
    }

    /**
     * @return RootAncestor<Model, Model>
     */
    public function rootAncestor(): RootAncestor
    {
        /** @var RootAncestor<Model, Model> $relation */
        $relation = $this->vendorRootAncestor();

        return $relation;
    }

    /**
     * @return RootAncestorOrSelf<Model, Model>
     */
    public function rootAncestorOrSelf(): RootAncestorOrSelf
    {
        /** @var RootAncestorOrSelf<Model, Model> $relation */
        $relation = $this->vendorRootAncestorOrSelf();

        return $relation;
    }

    /**
     * @return Siblings<Model, Model>
     */
    public function siblings(): Siblings
    {
        /** @var Siblings<Model, Model> $relation */
        $relation = $this->vendorSiblings();

        return $relation;
    }

    /**
     * @return Siblings<Model, Model>
     */
    public function siblingsAndSelf(): Siblings
    {
        /** @var Siblings<Model, Model> $relation */
        $relation = $this->vendorSiblingsAndSelf();

        return $relation;
    }

    public function hasNestedPath(): bool
    {
        /** @var bool $result */
        $result = $this->vendorHasNestedPath();

        return $result;
    }

    public function isIntegerAttribute(string $attribute): bool
    {
        /** @var bool $result */
        $result = $this->vendorIsIntegerAttribute($attribute);

        return $result;
    }
}
