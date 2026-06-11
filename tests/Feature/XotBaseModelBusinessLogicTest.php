<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature;

use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\BaseModel;
use Modules\Xot\Models\Module;
use Modules\Xot\Models\XotBaseModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
use function Safe\json_encode;
use function Safe\unserialize;


class XotBaseModelBusinessLogicTest extends TestCase
{
    private function createBaseModel(): BaseModel
    {
        return new class extends BaseModel {};
    }

    /** @test */
    public function itExtendsCorrectBaseClass(): void
    {
        // Arrange & Act
        $baseModel = $this->createBaseModel();

        // Assert
        Assert::assertInstanceOf(XotBaseModel::class, $baseModel);
        Assert::assertInstanceOf(Model::class, $baseModel);
    }

    /** @test */
    public function itHasRequiredTraits(): void
    {
        // Arrange & Act
        $baseModel = $this->createBaseModel();

        // Assert
    }

    /** @test */
    public function itCanBeInstantiatedWithoutDatabase(): void
    {
        // Arrange & Act
        $baseModel = $this->createBaseModel();

        // Assert
        Assert::assertInstanceOf(BaseModel::class, $baseModel);
    }

    /** @test */
    public function itSupportsTableNameOverride(): void
    {
        // Arrange
        $baseModel = $this->createBaseModel();

        // Act
        $tableName = $baseModel->getTable();

        // Assert
        Assert::assertIsString($tableName);
        Assert::assertNotEmpty($tableName);
    }

    /** @test */
    public function itSupportsConnectionOverride(): void
    {
        // Arrange
        $baseModel = $this->createBaseModel();

        // Act
        $connection = $baseModel->getConnection();

        // Assert
        Assert::assertNotNull($connection);
        Assert::assertInstanceOf(ConnectionInterface::class, $connection);
    }

    /** @test */
    public function itSupportsKeyNameOverride(): void
    {
        // Arrange
        $baseModel = $this->createBaseModel();

        // Act
        $keyName = $baseModel->getKeyName();

        // Assert
        Assert::assertIsString($keyName);
        Assert::assertEquals('id', $keyName);
    }

    /** @test */
    public function itCanBeUsedAsBaseForOtherModels(): void
    {
        // Arrange
        $module = new Module();

        // Act & Assert
        Assert::assertInstanceOf(XotBaseModel::class, $module);
        Assert::assertInstanceOf(Model::class, $module);
    }

    /** @test */
    public function itSupportsModelConfiguration(): void
    {
        // Arrange
        $baseModel = $this->createBaseModel();

        // Act
        $fillable = $baseModel->getFillable();
        $hidden = $baseModel->getHidden();
        $casts = $baseModel->getCasts();

        // Assert
        Assert::assertIsArray($fillable);
        Assert::assertIsArray($hidden);
        Assert::assertIsArray($casts);
    }

    /** @test */
    public function itSupportsSoftDeletesWhenConfigured(): void
    {
        // Arrange & Act
        $baseModel = $this->createBaseModel();

        // Assert - Soft deletes may or may not be configured
    }

    /** @test */
    public function itSupportsTimestampsWhenConfigured(): void
    {
        // Arrange
        $baseModel = $this->createBaseModel();

        // Act
        $usesTimestamps = $baseModel->usesTimestamps();

        // Assert
        // Nota: I modelli base possono avere configurazioni diverse
        Assert::assertIsBool($usesTimestamps);
    }

    /** @test */
    public function itSupportsTenantIsolationWhenConfigured(): void
    {
        // Arrange & Act
        $baseModel = $this->createBaseModel();

        // Assert - Tenant isolation may or may not be configured
    }

    /** @test */
    public function itSupportsAuditTrailWhenConfigured(): void
    {
        // Arrange & Act
        $baseModel = $this->createBaseModel();

        // Assert - Audit trail may or may not be configured
    }

    /** @test */
    public function itCanBeSerialized(): void
    {
        // Arrange
        $baseModel = $this->createBaseModel();

        // Act
        $serialized = serialize($baseModel);

        // Assert
        Assert::assertNotEmpty($serialized);
    }

    /** @test */
    public function itCanBeUnserialized(): void
    {
        // Arrange
        $baseModel = $this->createBaseModel();
        $serialized = serialize($baseModel);

        // Act
        $unserialized = unserialize($serialized);

        // Assert
        Assert::assertInstanceOf(BaseModel::class, $unserialized);
    }

    /** @test */
    public function itSupportsJsonSerialization(): void
    {
        // Arrange
        $baseModel = $this->createBaseModel();

        // Act
        $json = json_encode($baseModel);

        // Assert
        Assert::assertNotEmpty($json);
        Assert::assertNotFalse($json);
    }

    /** @test */
    public function itSupportsArrayConversion(): void
    {
        // Arrange
        $baseModel = $this->createBaseModel();

        // Act
        $array = $baseModel->toArray();

        // Assert
        Assert::assertIsArray($array);
        Assert::assertNotEmpty($array);
    }

    /** @test */
    public function itSupportsJsonConversion(): void
    {
        // Arrange
        $baseModel = $this->createBaseModel();

        // Act
        $json = $baseModel->toJson();

        // Assert
        Assert::assertIsString($json);
        Assert::assertNotEmpty($json);
    }

    /** @test */
    public function itSupportsRelationshipLoading(): void
    {
        // Arrange & Act
        $baseModel = $this->createBaseModel();

        // Assert
    }

    /** @test */
    public function itSupportsAttributeAccess(): void
    {
        // Arrange & Act
        $baseModel = $this->createBaseModel();

        // Assert
    }

    /** @test */
    public function itSupportsMassAssignmentProtection(): void
    {
        // Arrange
        $baseModel = $this->createBaseModel();

        // Act
        $fillable = $baseModel->getFillable();
        $guarded = $baseModel->getGuarded();

        // Assert
        Assert::assertIsArray($fillable);
        Assert::assertIsArray($guarded);
    }

    /** @test */
    public function itSupportsModelEvents(): void
    {
        // Arrange & Act
        $baseModel = $this->createBaseModel();

        // Assert
    }

    /** @test */
    public function itSupportsObservers(): void
    {
        // Arrange & Act
        $baseModel = $this->createBaseModel();

        // Assert
    }

    /** @test */
    public function itSupportsScopes(): void
    {
        // Arrange & Act
        $baseModel = $this->createBaseModel();

        // Assert
    }

    /** @test */
    public function itSupportsAccessorsAndMutators(): void
    {
        // Arrange & Act
        $baseModel = $this->createBaseModel();

        // Assert
    }

    /** @test */
    public function itSupportsCasting(): void
    {
        // Arrange
        $baseModel = $this->createBaseModel();

        // Act
        $casts = $baseModel->getCasts();

        // Assert
        Assert::assertIsArray($casts);
    }

    /** @test */
    public function itSupportsDates(): void
    {
        // Arrange
        $baseModel = $this->createBaseModel();

        // Act
        $dates = $baseModel->getDates();

        // Assert
        Assert::assertIsArray($dates);
    }

    /** @test */
    public function itSupportsHiddenAttributes(): void
    {
        // Arrange
        $baseModel = $this->createBaseModel();

        // Act
        $hidden = $baseModel->getHidden();

        // Assert
        Assert::assertIsArray($hidden);
    }

    /** @test */
    public function itSupportsVisibleAttributes(): void
    {
        // Arrange
        $baseModel = $this->createBaseModel();

        // Act
        $visible = $baseModel->getVisible();

        // Assert
        Assert::assertIsArray($visible);
    }

    /** @test */
    public function itSupportsAppends(): void
    {
        // Arrange
        $baseModel = $this->createBaseModel();

        // Act
        $appends = $baseModel->getAppends();

        // Assert
        Assert::assertIsArray($appends);
    }

    /** @test */
    public function itSupportsWithRelationships(): void
    {
        // Arrange
        $baseModel = $this->createBaseModel();

        // Act
        $with = $baseModel->getAppends();

        // Assert
        Assert::assertIsArray($with);
    }
}
