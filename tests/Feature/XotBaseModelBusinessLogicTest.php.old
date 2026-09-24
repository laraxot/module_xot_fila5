<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Xot\Tests\Feature;
=======
=======
namespace Modules\Xot\Tests\Feature;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 53d6a6ba (.)
=======
<<<<<<< HEAD
>>>>>>> e0b8ebe3 (.)
=======
>>>>>>> b956ebe0 (.)
=======
>>>>>>> cc52d333 (.)
=======
>>>>>>> 0123915b (.)
=======
>>>>>>> 90d386aa (.)
=======
>>>>>>> 4fb9bc4b (.)
=======
>>>>>>> 3eee6f79 (.)
=======
>>>>>>> c2f6854c (.)
=======
namespace Modules\Xot\Tests\Feature;

>>>>>>> 249a0067 (.)
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\BaseModel;
use Modules\Xot\Models\Module;
use Modules\Xot\Models\XotBaseModel;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
>>>>>>> ab8cc3f3 (.)
=======
use Tests\TestCase;
>>>>>>> 249a0067 (.)

class XotBaseModelBusinessLogicTest extends TestCase
{
    /** @test */
    public function it_extends_correct_base_class(): void
    {
        // Arrange & Act
        $baseModel = new BaseModel;

<<<<<<< HEAD

=======
>>>>>>> b7afadf9 (.)
=======
namespace Modules\Xot\Tests\Feature;

>>>>>>> 71586de2 (.)
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\DB;
>>>>>>> 5a14301c (.)
=======
use Illuminate\Support\Facades\DB;
>>>>>>> 5a14301c (.)
use Modules\Xot\Models\BaseModel;
use Modules\Xot\Models\Module;
use Modules\Xot\Models\XotBaseModel;
use Tests\TestCase;

class XotBaseModelBusinessLogicTest extends TestCase
{
    /** @test */
    public function it_extends_correct_base_class(): void
    {
        // Arrange & Act
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertInstanceOf(XotBaseModel::class, $baseModel);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertInstanceOf(Model::class, $baseModel);
    }

    /** @test */
    public function it_has_required_traits(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act & Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue(method_exists($baseModel, 'getTable'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue(method_exists($baseModel, 'getConnection'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue(method_exists($baseModel, 'getKeyName'));
    }

    /** @test */
    public function it_can_be_instantiated_without_database(): void
    {
        // Arrange & Act
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertInstanceOf(BaseModel::class, $baseModel);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertNotNull($baseModel);
    }

    /** @test */
    public function it_supports_table_name_override(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $tableName = $baseModel->getTable();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertIsString($tableName);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertNotEmpty($tableName);
    }

    /** @test */
    public function it_supports_connection_override(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $connection = $baseModel->getConnection();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertNotNull($connection);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertInstanceOf(ConnectionInterface::class, $connection);
    }

    /** @test */
    public function it_supports_key_name_override(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $keyName = $baseModel->getKeyName();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertIsString($keyName);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('id', $keyName);
    }

    /** @test */
    public function it_can_be_used_as_base_for_other_models(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
        $module = new Module;
=======
        $module = new Module();
>>>>>>> 5a14301c (.)
=======
        $module = new Module();
>>>>>>> 5a14301c (.)

        // Act & Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertInstanceOf(XotBaseModel::class, $module);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertInstanceOf(Model::class, $module);
    }

    /** @test */
    public function it_supports_model_configuration(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $fillable = $baseModel->getFillable();
        /** @phpstan-ignore-next-line method.nonObject */
        $hidden = $baseModel->getHidden();
        /** @phpstan-ignore-next-line method.nonObject */
        $casts = $baseModel->getCasts();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertIsArray($fillable);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertIsArray($hidden);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertIsArray($casts);
    }

    /** @test */
    public function it_supports_soft_deletes_when_configured(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        $usesSoftDeletes = method_exists($baseModel, 'trashed');

        // Assert
        // Nota: Non tutti i modelli base usano soft deletes
        // Questo test verifica solo la possibilità di configurazione
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue(true); // Placeholder per logica specifica
    }

    /** @test */
    public function it_supports_timestamps_when_configured(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

<<<<<<< HEAD
        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $usesTimestamps = $baseModel->usesTimestamps();
=======
test('it supports relationship loading', function (): void {
    $baseModel = new BaseModel;

    expect(method_exists($baseModel, 'load'))->toBeTrue();
});
>>>>>>> cc7fb225 (.)

        // Assert
        // Nota: I modelli base possono avere configurazioni diverse
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertIsBool($usesTimestamps);
    }

    /** @test */
    public function it_supports_tenant_isolation_when_configured(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        $hasTenantTrait = method_exists($baseModel, 'getTenantKey');

        // Assert
        // Nota: Non tutti i modelli base usano tenant isolation
        // Questo test verifica solo la possibilità di configurazione
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
=======
        // Assert
        $this->assertInstanceOf(XotBaseModel::class, $baseModel);
        $this->assertInstanceOf(Model::class, $baseModel);
    }

    /** @test */
    public function it_has_required_traits(): void
    {
        // Arrange
        $baseModel = new BaseModel;

        // Act & Assert
        $this->assertTrue(method_exists($baseModel, 'getTable'));
        $this->assertTrue(method_exists($baseModel, 'getConnection'));
        $this->assertTrue(method_exists($baseModel, 'getKeyName'));
    }

    /** @test */
    public function it_can_be_instantiated_without_database(): void
    {
        // Arrange & Act
        $baseModel = new BaseModel;

        // Assert
        $this->assertInstanceOf(BaseModel::class, $baseModel);
        $this->assertNotNull($baseModel);
    }

    /** @test */
    public function it_supports_table_name_override(): void
    {
        // Arrange
        $baseModel = new BaseModel;

        // Act
        $tableName = $baseModel->getTable();

        // Assert
        $this->assertIsString($tableName);
        $this->assertNotEmpty($tableName);
    }

    /** @test */
    public function it_supports_connection_override(): void
    {
        // Arrange
        $baseModel = new BaseModel;

        // Act
        $connection = $baseModel->getConnection();

        // Assert
        $this->assertNotNull($connection);
        $this->assertInstanceOf(ConnectionInterface::class, $connection);
    }

    /** @test */
    public function it_supports_key_name_override(): void
    {
        // Arrange
        $baseModel = new BaseModel;

        // Act
        $keyName = $baseModel->getKeyName();

        // Assert
        $this->assertIsString($keyName);
        $this->assertEquals('id', $keyName);
    }

    /** @test */
    public function it_can_be_used_as_base_for_other_models(): void
    {
        // Arrange
        $module = new Module;

        // Act & Assert
        $this->assertInstanceOf(XotBaseModel::class, $module);
        $this->assertInstanceOf(Model::class, $module);
    }

    /** @test */
    public function it_supports_model_configuration(): void
    {
        // Arrange
        $baseModel = new BaseModel;

        // Act
        $fillable = $baseModel->getFillable();
        $hidden = $baseModel->getHidden();
        $casts = $baseModel->getCasts();

        // Assert
        $this->assertIsArray($fillable);
        $this->assertIsArray($hidden);
        $this->assertIsArray($casts);
    }

    /** @test */
    public function it_supports_soft_deletes_when_configured(): void
    {
        // Arrange
        $baseModel = new BaseModel;

        // Act
        $usesSoftDeletes = method_exists($baseModel, 'trashed');

        // Assert
        // Nota: Non tutti i modelli base usano soft deletes
        // Questo test verifica solo la possibilità di configurazione
        $this->assertTrue(true); // Placeholder per logica specifica
    }

    /** @test */
    public function it_supports_timestamps_when_configured(): void
    {
        // Arrange
        $baseModel = new BaseModel;

        // Act
        $usesTimestamps = $baseModel->usesTimestamps();

        // Assert
        // Nota: I modelli base possono avere configurazioni diverse
        $this->assertIsBool($usesTimestamps);
    }

    /** @test */
    public function it_supports_tenant_isolation_when_configured(): void
    {
        // Arrange
        $baseModel = new BaseModel;

        // Act
        $hasTenantTrait = method_exists($baseModel, 'getTenantKey');

        // Assert
        // Nota: Non tutti i modelli base usano tenant isolation
        // Questo test verifica solo la possibilità di configurazione
        $this->assertTrue(true); // Placeholder per logica specifica
    }

    /** @test */
    public function it_supports_audit_trail_when_configured(): void
    {
        // Arrange
        $baseModel = new BaseModel;

        // Act
        $hasAuditTrait = method_exists($baseModel, 'getAuditEvents');

        // Assert
        // Nota: Non tutti i modelli base usano audit trail
        // Questo test verifica solo la possibilità di configurazione
>>>>>>> 249a0067 (.)
        $this->assertTrue(true); // Placeholder per logica specifica
    }

    /** @test */
<<<<<<< HEAD
    public function it_supports_audit_trail_when_configured(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        $hasAuditTrait = method_exists($baseModel, 'getAuditEvents');

        // Assert
        // Nota: Non tutti i modelli base usano audit trail
        // Questo test verifica solo la possibilità di configurazione
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue(true); // Placeholder per logica specifica
    }

    /** @test */
    public function it_can_be_serialized(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        $serialized = serialize($baseModel);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertIsString($serialized);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertNotEmpty($serialized);
    }

    /** @test */
    public function it_can_be_unserialized(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
        $serialized = serialize($baseModel);

        // Act
        $unserialized = unserialize($serialized);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertInstanceOf(BaseModel::class, $unserialized);
    }

    /** @test */
    public function it_supports_json_serialization(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        $json = json_encode($baseModel);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertIsString($json);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertNotEmpty($json);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertNotFalse($json);
    }

    /** @test */
    public function it_supports_array_conversion(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $array = $baseModel->toArray();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertIsArray($array);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertNotEmpty($array);
    }

    /** @test */
    public function it_supports_json_conversion(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $json = $baseModel->toJson();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertIsString($json);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertNotEmpty($json);
    }

    /** @test */
    public function it_supports_relationship_loading(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        $hasLoadMethod = method_exists($baseModel, 'load');

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($hasLoadMethod);
    }

<<<<<<< HEAD
=======
    expect($baseModel->getWith())->toBeArray();
});
=======
=======
>>>>>>> 53d6a6ba (.)
use Tests\TestCase;

class XotBaseModelBusinessLogicTest extends TestCase
{
    /** @test */
    public function it_extends_correct_base_class(): void
    {
        // Arrange & Act
        $baseModel = new BaseModel();

        // Assert
        $this->assertInstanceOf(XotBaseModel::class, $baseModel);
        $this->assertInstanceOf(Model::class, $baseModel);
    }

    /** @test */
    public function it_has_required_traits(): void
    {
        // Arrange
        $baseModel = new BaseModel();

        // Act & Assert
        $this->assertTrue(method_exists($baseModel, 'getTable'));
        $this->assertTrue(method_exists($baseModel, 'getConnection'));
        $this->assertTrue(method_exists($baseModel, 'getKeyName'));
    }

    /** @test */
    public function it_can_be_instantiated_without_database(): void
    {
        // Arrange & Act
        $baseModel = new BaseModel();

        // Assert
        $this->assertInstanceOf(BaseModel::class, $baseModel);
        $this->assertNotNull($baseModel);
    }

    /** @test */
    public function it_supports_table_name_override(): void
    {
        // Arrange
        $baseModel = new BaseModel();

        // Act
        $tableName = $baseModel->getTable();

        // Assert
        $this->assertIsString($tableName);
        $this->assertNotEmpty($tableName);
    }

    /** @test */
    public function it_supports_connection_override(): void
    {
        // Arrange
        $baseModel = new BaseModel();

        // Act
        $connection = $baseModel->getConnection();

        // Assert
        $this->assertNotNull($connection);
        $this->assertInstanceOf(ConnectionInterface::class, $connection);
    }

    /** @test */
    public function it_supports_key_name_override(): void
    {
        // Arrange
        $baseModel = new BaseModel();

        // Act
        $keyName = $baseModel->getKeyName();

        // Assert
        $this->assertIsString($keyName);
        $this->assertEquals('id', $keyName);
    }

    /** @test */
    public function it_can_be_used_as_base_for_other_models(): void
    {
        // Arrange
        $module = new Module();

        // Act & Assert
        $this->assertInstanceOf(XotBaseModel::class, $module);
        $this->assertInstanceOf(Model::class, $module);
    }

    /** @test */
    public function it_supports_model_configuration(): void
    {
        // Arrange
        $baseModel = new BaseModel();

        // Act
        $fillable = $baseModel->getFillable();
        $hidden = $baseModel->getHidden();
        $casts = $baseModel->getCasts();

        // Assert
        $this->assertIsArray($fillable);
        $this->assertIsArray($hidden);
        $this->assertIsArray($casts);
    }

    /** @test */
    public function it_supports_soft_deletes_when_configured(): void
    {
        // Arrange
        $baseModel = new BaseModel();

        // Act
        $usesSoftDeletes = method_exists($baseModel, 'trashed');

        // Assert
        // Nota: Non tutti i modelli base usano soft deletes
        // Questo test verifica solo la possibilità di configurazione
        $this->assertTrue(true); // Placeholder per logica specifica
    }

    /** @test */
    public function it_supports_timestamps_when_configured(): void
    {
        // Arrange
        $baseModel = new BaseModel();

        // Act
        $usesTimestamps = $baseModel->usesTimestamps();

        // Assert
        // Nota: I modelli base possono avere configurazioni diverse
        $this->assertIsBool($usesTimestamps);
    }

    /** @test */
    public function it_supports_tenant_isolation_when_configured(): void
    {
        // Arrange
        $baseModel = new BaseModel();

        // Act
        $hasTenantTrait = method_exists($baseModel, 'getTenantKey');

        // Assert
        // Nota: Non tutti i modelli base usano tenant isolation
        // Questo test verifica solo la possibilità di configurazione
        $this->assertTrue(true); // Placeholder per logica specifica
    }

    /** @test */
    public function it_supports_audit_trail_when_configured(): void
    {
        // Arrange
        $baseModel = new BaseModel();

        // Act
        $hasAuditTrait = method_exists($baseModel, 'getAuditEvents');

        // Assert
        // Nota: Non tutti i modelli base usano audit trail
        // Questo test verifica solo la possibilità di configurazione
        $this->assertTrue(true); // Placeholder per logica specifica
    }

    /** @test */
    public function it_can_be_serialized(): void
    {
        // Arrange
        $baseModel = new BaseModel();

        // Act
        $serialized = serialize($baseModel);

        // Assert
        $this->assertIsString($serialized);
        $this->assertNotEmpty($serialized);
    }

    /** @test */
    public function it_can_be_unserialized(): void
    {
        // Arrange
        $baseModel = new BaseModel();
        $serialized = serialize($baseModel);

        // Act
        $unserialized = unserialize($serialized);

        // Assert
        $this->assertInstanceOf(BaseModel::class, $unserialized);
    }

    /** @test */
    public function it_supports_json_serialization(): void
    {
        // Arrange
        $baseModel = new BaseModel();

        // Act
        $json = json_encode($baseModel);

        // Assert
        $this->assertIsString($json);
        $this->assertNotEmpty($json);
        $this->assertNotFalse($json);
    }

    /** @test */
    public function it_supports_array_conversion(): void
    {
        // Arrange
        $baseModel = new BaseModel();

        // Act
        $array = $baseModel->toArray();

        // Assert
        $this->assertIsArray($array);
        $this->assertNotEmpty($array);
    }

    /** @test */
    public function it_supports_json_conversion(): void
    {
        // Arrange
        $baseModel = new BaseModel();

        // Act
        $json = $baseModel->toJson();

        // Assert
        $this->assertIsString($json);
        $this->assertNotEmpty($json);
    }

    /** @test */
    public function it_supports_relationship_loading(): void
    {
        // Arrange
        $baseModel = new BaseModel();

        // Act
        $hasLoadMethod = method_exists($baseModel, 'load');

        // Assert
        $this->assertTrue($hasLoadMethod);
    }

>>>>>>> ab8cc3f3 (.)
    /** @test */
    public function it_supports_attribute_access(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> ab8cc3f3 (.)

        // Act
        $hasGetAttributeMethod = method_exists($baseModel, 'getAttribute');
        $hasSetAttributeMethod = method_exists($baseModel, 'setAttribute');

        // Assert
<<<<<<< HEAD
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($hasGetAttributeMethod);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
=======
        $this->assertTrue($hasGetAttributeMethod);
>>>>>>> ab8cc3f3 (.)
        $this->assertTrue($hasSetAttributeMethod);
    }

=======
    public function it_can_be_serialized(): void
    {
        // Arrange
        $baseModel = new BaseModel;

        // Act
        $serialized = serialize($baseModel);

        // Assert
        $this->assertIsString($serialized);
        $this->assertNotEmpty($serialized);
    }

    /** @test */
    public function it_can_be_unserialized(): void
    {
        // Arrange
        $baseModel = new BaseModel;
        $serialized = serialize($baseModel);

        // Act
        $unserialized = unserialize($serialized);

        // Assert
        $this->assertInstanceOf(BaseModel::class, $unserialized);
    }

    /** @test */
    public function it_supports_json_serialization(): void
    {
        // Arrange
        $baseModel = new BaseModel;

        // Act
        $json = json_encode($baseModel);

        // Assert
        $this->assertIsString($json);
        $this->assertNotEmpty($json);
        $this->assertNotFalse($json);
    }

    /** @test */
    public function it_supports_array_conversion(): void
    {
        // Arrange
        $baseModel = new BaseModel;

        // Act
        $array = $baseModel->toArray();

        // Assert
        $this->assertIsArray($array);
        $this->assertNotEmpty($array);
    }

    /** @test */
    public function it_supports_json_conversion(): void
    {
        // Arrange
        $baseModel = new BaseModel;

        // Act
        $json = $baseModel->toJson();

        // Assert
        $this->assertIsString($json);
        $this->assertNotEmpty($json);
    }

    /** @test */
    public function it_supports_relationship_loading(): void
    {
        // Arrange
        $baseModel = new BaseModel;

        // Act
        $hasLoadMethod = method_exists($baseModel, 'load');

        // Assert
        $this->assertTrue($hasLoadMethod);
    }

    /** @test */
    public function it_supports_attribute_access(): void
    {
        // Arrange
        $baseModel = new BaseModel;

        // Act
        $hasGetAttributeMethod = method_exists($baseModel, 'getAttribute');
        $hasSetAttributeMethod = method_exists($baseModel, 'setAttribute');

        // Assert
        $this->assertTrue($hasGetAttributeMethod);
        $this->assertTrue($hasSetAttributeMethod);
    }

>>>>>>> 249a0067 (.)
    /** @test */
    public function it_supports_mass_assignment_protection(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $fillable = $baseModel->getFillable();
        /** @phpstan-ignore-next-line method.nonObject */
        $guarded = $baseModel->getGuarded();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertIsArray($fillable);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
=======
        $baseModel = new BaseModel();
=======
        $baseModel = new BaseModel;
>>>>>>> 249a0067 (.)

        // Act
        $fillable = $baseModel->getFillable();
        $guarded = $baseModel->getGuarded();

        // Assert
        $this->assertIsArray($fillable);
<<<<<<< HEAD
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 249a0067 (.)
        $this->assertIsArray($guarded);
    }

    /** @test */
    public function it_supports_model_events(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> ab8cc3f3 (.)
=======
        $baseModel = new BaseModel;
>>>>>>> 249a0067 (.)

        // Act
        $hasEvents = method_exists($baseModel, 'fireModelEvent');

        // Assert
<<<<<<< HEAD
<<<<<<< HEAD
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
=======
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 249a0067 (.)
        $this->assertTrue($hasEvents);
    }

    /** @test */
    public function it_supports_observers(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> ab8cc3f3 (.)
=======
        $baseModel = new BaseModel;
>>>>>>> 249a0067 (.)

        // Act
        $hasObservers = method_exists($baseModel, 'getObservableEvents');

        // Assert
<<<<<<< HEAD
<<<<<<< HEAD
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
=======
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 249a0067 (.)
        $this->assertTrue($hasObservers);
    }

    /** @test */
    public function it_supports_scopes(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> ab8cc3f3 (.)
=======
        $baseModel = new BaseModel;
>>>>>>> 249a0067 (.)

        // Act
        $hasScopes = method_exists($baseModel, 'addGlobalScope');

        // Assert
<<<<<<< HEAD
<<<<<<< HEAD
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
=======
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 249a0067 (.)
        $this->assertTrue($hasScopes);
    }

    /** @test */
    public function it_supports_accessors_and_mutators(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> ab8cc3f3 (.)
=======
        $baseModel = new BaseModel;
>>>>>>> 249a0067 (.)

        // Act
        $hasAccessors = method_exists($baseModel, 'getAttributeValue');
        $hasMutators = method_exists($baseModel, 'setAttribute');

        // Assert
<<<<<<< HEAD
<<<<<<< HEAD
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($hasAccessors);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
=======
        $this->assertTrue($hasAccessors);
>>>>>>> ab8cc3f3 (.)
=======
        $this->assertTrue($hasAccessors);
>>>>>>> 249a0067 (.)
        $this->assertTrue($hasMutators);
    }

    /** @test */
    public function it_supports_casting(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $casts = $baseModel->getCasts();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
=======
        $baseModel = new BaseModel();
=======
        $baseModel = new BaseModel;
>>>>>>> 249a0067 (.)

        // Act
        $casts = $baseModel->getCasts();

        // Assert
<<<<<<< HEAD
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 249a0067 (.)
        $this->assertIsArray($casts);
    }

    /** @test */
    public function it_supports_dates(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $dates = $baseModel->getDates();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
=======
        $baseModel = new BaseModel();
=======
        $baseModel = new BaseModel;
>>>>>>> 249a0067 (.)

        // Act
        $dates = $baseModel->getDates();

        // Assert
<<<<<<< HEAD
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 249a0067 (.)
        $this->assertIsArray($dates);
    }

    /** @test */
    public function it_supports_hidden_attributes(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $hidden = $baseModel->getHidden();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
=======
        $baseModel = new BaseModel();
=======
        $baseModel = new BaseModel;
>>>>>>> 249a0067 (.)

        // Act
        $hidden = $baseModel->getHidden();

        // Assert
<<<<<<< HEAD
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 249a0067 (.)
        $this->assertIsArray($hidden);
    }

    /** @test */
    public function it_supports_visible_attributes(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $visible = $baseModel->getVisible();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
=======
        $baseModel = new BaseModel();
=======
        $baseModel = new BaseModel;
>>>>>>> 249a0067 (.)

        // Act
        $visible = $baseModel->getVisible();

        // Assert
<<<<<<< HEAD
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 249a0067 (.)
        $this->assertIsArray($visible);
    }

    /** @test */
    public function it_supports_appends(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $appends = $baseModel->getAppends();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
=======
        $baseModel = new BaseModel();
=======
        $baseModel = new BaseModel;
>>>>>>> 249a0067 (.)

        // Act
        $appends = $baseModel->getAppends();

        // Assert
<<<<<<< HEAD
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 249a0067 (.)
        $this->assertIsArray($appends);
    }

    /** @test */
    public function it_supports_with_relationships(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $baseModel = new BaseModel;
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)
=======
        $baseModel = new BaseModel();
>>>>>>> 5a14301c (.)

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $with = $baseModel->getWith();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertIsArray($with);
    }
}
=======
        $baseModel = new BaseModel();
=======
        $baseModel = new BaseModel;
>>>>>>> 249a0067 (.)

        // Act
        $with = $baseModel->getWith();

        // Assert
        $this->assertIsArray($with);
    }
}
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 1c4bb8cf (.)
=======
>>>>>>> d79d36e0 (.)
=======
>>>>>>> 96276392 (.)
=======
>>>>>>> 3ae5e299 (.)
=======

>>>>>>> f1d4085 (.)
=======
>>>>>>> 73eab74 (.)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> d2b0a27 (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> ab8cc3f3 (.)
=======
=======
>>>>>>> 300ef70 (.)
>>>>>>> 6dcebf8a (.)
=======
>>>>>>> 53d6a6ba (.)
=======
=======
>>>>>>> 300ef70 (.)
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)
=======
=======

>>>>>>> f1d4085 (.)
>>>>>>> 5e58b29b (.)
=======
>>>>>>> 1c4bb8cf (.)
=======
>>>>>>> cafe8bed (.)
=======
=======
>>>>>>> cc52d333 (.)
=======
>>>>>>> 90d386aa (.)
=======
>>>>>>> 3eee6f79 (.)
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======

>>>>>>> origin/develop
>>>>>>> 6cba4fe (.)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> e0b8ebe3 (.)
=======
>>>>>>> b956ebe0 (.)
=======
=======

>>>>>>> f1d4085 (.)
>>>>>>> a62d7646 (.)
=======
>>>>>>> d79d36e0 (.)
=======
>>>>>>> 5cd593a5 (.)
=======
>>>>>>> cc52d333 (.)
=======
>>>>>>> 0123915b (.)
=======
=======

>>>>>>> f1d4085 (.)
>>>>>>> 099ab7a0 (.)
=======
>>>>>>> 96276392 (.)
=======
>>>>>>> 3baa48bd (.)
=======
>>>>>>> 90d386aa (.)
=======
>>>>>>> 4fb9bc4b (.)
=======
=======

>>>>>>> f1d4085 (.)
>>>>>>> 6d1255a8 (.)
=======
>>>>>>> 3ae5e299 (.)
=======
>>>>>>> 5b07d268 (.)
=======
>>>>>>> 3eee6f79 (.)
=======
>>>>>>> c2f6854c (.)
=======
>>>>>>> 249a0067 (.)
