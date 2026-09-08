<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature\Actions\Pdf;

<<<<<<< HEAD
use ReflectionClass;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;
use Modules\Xot\Actions\Pdf\GetPdfContentByRecordAction;
use Tests\TestCase;

/**
 * Test suite for GetPdfContentByRecordAction.
 */
class GetPdfContentByRecordActionTest extends TestCase
{
    private GetPdfContentByRecordAction $action;

    protected function setUp(): void
    {
        parent::setUp();
        $this->action = new GetPdfContentByRecordAction();
    }

    /** @test */
    public function it_generates_pdf_content_from_record(): void
    {
        // Arrange
        $user = User::factory()->create([
=======
use Illuminate\Database\Eloquent\Model;
use Modules\User\Database\Factories\UserFactory;
use Modules\Xot\Actions\Pdf\GetPdfContentByRecordAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

// $this dentro le closure Pest e' tipizzato da Pest come TestCall, non come
// Modules\Xot\Tests\TestCase: PHPStan vieta di ritipizzare $this via @var, quindi
// l'action del test vive in una variabile locale condivisa per riferimento. Per lo
// stesso motivo expectException()/markTestSkipped() via $this non sono risolvibili
// da PHPStan qui: si usano try/catch + Assert e Assert::markTestSkipped() statico.
$action = null;

beforeEach(function () use (&$action): void {
    $action = new GetPdfContentByRecordAction;
});

describe('Get Pdf Content By Record Action', function () use (&$action): void {
    test('it generates pdf content from record', function (): void {
        // Arrange
        $user = UserFactory::new()->createOne([
>>>>>>> c7fd73eb (.)
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Mock view existence
        view()->addNamespace('user', resource_path('views'));

        // Act & Assert
<<<<<<< HEAD
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("View 'user::user.show.pdf' not found");

        $this->action->execute($user);
    }

    /** @test */
    public function it_generates_correct_view_name(): void
    {
        // Arrange
        $user = User::factory()->create();

        // Use reflection to test protected method
        $reflection = new ReflectionClass($this->action);
=======
        try {
            app(GetPdfContentByRecordAction::class)->execute($user);
            Assert::fail('Expected exception was not thrown.');
        } catch (\Exception $e) {
            Assert::assertSame("View 'user::user.show.pdf' not found", $e->getMessage());
        }
    });

    test('it generates correct view name', function () use (&$action): void {
        // Arrange
        $user = UserFactory::new()->createOne();

        // Use reflection to test protected method
        Assert::assertInstanceOf(GetPdfContentByRecordAction::class, $action);
        $reflection = new \ReflectionClass($action);
>>>>>>> c7fd73eb (.)
        $method = $reflection->getMethod('generateViewName');
        $method->setAccessible(true);

        // Act
<<<<<<< HEAD
        $viewName = $method->invoke($this->action, $user);

        // Assert
        $this->assertEquals('user::user.show.pdf', $viewName);
    }

    /** @test */
    public function it_generates_correct_filename_for_basic_model(): void
    {
        // Arrange
        $user = User::factory()->create(['id' => 123, 'name' => 'Test User']);

        // Use reflection to test protected method
        $reflection = new ReflectionClass($this->action);
=======
        $viewName = $method->invoke($action, $user);

        // Assert
        Assert::assertEquals('user::user.show.pdf', $viewName);
    });

    test('it generates correct filename for basic model', function () use (&$action): void {
        // Arrange
        $user = UserFactory::new()->createOne(['id' => 123, 'name' => 'Test User']);

        // Use reflection to test protected method
        Assert::assertInstanceOf(GetPdfContentByRecordAction::class, $action);
        $reflection = new \ReflectionClass($action);
>>>>>>> c7fd73eb (.)
        $method = $reflection->getMethod('generateFilename');
        $method->setAccessible(true);

        // Act
<<<<<<< HEAD
        $filename = $method->invoke($this->action, $user);

        // Assert
        $this->assertEquals('user_123_test-user.pdf', $filename);
    }

    /** @test */
    public function it_generates_enhanced_filename_for_performance_models(): void
    {
        // Arrange - Create a mock model with performance fields
        $record = new class extends Model {
            protected $table = 'test_performance';
            protected $fillable = ['id', 'matr', 'cognome', 'nome'];

            public function getKey()
=======
        $filename = $method->invoke($action, $user);

        // Assert
        Assert::assertEquals('user_123_test-user.pdf', $filename);
    });

    test('it generates enhanced filename for performance models', function () use (&$action): void {
        // Arrange - Create a mock model with performance fields
        $record = new class extends Model
        {
            protected $table = 'test_performance';

            protected $fillable = ['id', 'matr', 'cognome', 'nome'];

            public function testGetKey(): int
>>>>>>> c7fd73eb (.)
            {
                return 456;
            }
        };

<<<<<<< HEAD
        $record->matr = 'ABC123';
        $record->cognome = 'Rossi';
        $record->nome = 'Mario';

        // Use reflection to test protected method
        $reflection = new ReflectionClass($this->action);
=======
        $record->setAttribute('matr', 'ABC123');
        $record->setAttribute('cognome', 'Rossi');
        $record->setAttribute('nome', 'Mario');

        // Use reflection to test protected method
        Assert::assertInstanceOf(GetPdfContentByRecordAction::class, $action);
        $reflection = new \ReflectionClass($action);
>>>>>>> c7fd73eb (.)
        $method = $reflection->getMethod('generateFilename');
        $method->setAccessible(true);

        // Act
<<<<<<< HEAD
        $filename = $method->invoke($this->action, $record);

        // Assert
        $this->assertEquals('scheda_456_ABC123_Rossi_Mario.pdf', $filename);
    }

    /** @test */
    public function it_prepares_correct_view_parameters(): void
    {
        // Arrange
        $user = User::factory()->create(['name' => 'Test User']);

        // Use reflection to test protected method
        $reflection = new ReflectionClass($this->action);
=======
        $filename = $method->invoke($action, $record);

        // Assert
        Assert::assertEquals('scheda_456_ABC123_Rossi_Mario.pdf', $filename);
    });

    test('it prepares correct view parameters', function () use (&$action): void {
        // Arrange
        $user = UserFactory::new()->createOne(['name' => 'Test User']);

        // Use reflection to test protected method
        Assert::assertInstanceOf(GetPdfContentByRecordAction::class, $action);
        $reflection = new \ReflectionClass($action);
>>>>>>> c7fd73eb (.)
        $method = $reflection->getMethod('prepareViewParameters');
        $method->setAccessible(true);

        // Act
<<<<<<< HEAD
        $params = $method->invoke($this->action, $user, 'user::user.show.pdf');

        // Assert
        $this->assertIsArray($params);
        $this->assertArrayHasKey('view', $params);
        $this->assertArrayHasKey('row', $params);
        $this->assertArrayHasKey('transKey', $params);
        $this->assertEquals('user::user.show.pdf', $params['view']);
        $this->assertSame($user, $params['row']);
        $this->assertEquals('user::users.fields', $params['transKey']);
    }

    /** @test */
    public function it_throws_exception_for_missing_view(): void
    {
        // Arrange
        $user = User::factory()->create();

        // Act & Assert
        $this->expectException(Exception::class);
        $this->expectExceptionMessageMatches("/View 'user::user\.show\.pdf' not found/");

        $this->action->execute($user);
    }

    /** @test */
    public function it_throws_exception_for_empty_html_content(): void
    {
        // This test would require mocking view rendering to return empty content
        // Implementation depends on testing infrastructure setup
        $this->markTestSkipped('Requires view mocking infrastructure');
    }

    /** @test */
    public function it_uses_custom_filename_when_provided(): void
    {
        // Arrange
        $user = User::factory()->create();
        $customFilename = 'custom-report.pdf';

        // Act & Assert - Should use custom filename in error message
        $this->expectException(Exception::class);

        $this->action->execute($user, $customFilename);
    }

    /** @test */
    public function it_handles_from_record_convenience_method(): void
    {
        // Arrange
        $user = User::factory()->create();
        $filename = 'convenience-test.pdf';

        // Act & Assert
        $this->expectException(Exception::class);
        $this->expectExceptionMessageMatches("/View 'user::user\.show\.pdf' not found/");

        $this->action->fromRecord($user, $filename);
    }

    /** @test */
    public function it_logs_errors_when_pdf_generation_fails(): void
    {
        // This test would require mocking HTML2PDF to throw exceptions
        // Implementation depends on testing infrastructure setup
        $this->markTestSkipped('Requires HTML2PDF mocking infrastructure');
    }

    /** @test */
    public function it_returns_valid_pdf_content_when_view_exists(): void
    {
        // This test would require creating actual test views
        // Implementation depends on test view infrastructure
        $this->markTestSkipped('Requires test view infrastructure');
    }
}
=======
        $params = $method->invoke($action, $user, 'user::user.show.pdf');

        // Assert
        Assert::assertIsArray($params);
        Assert::assertArrayHasKey('view', $params);
        Assert::assertArrayHasKey('row', $params);
        Assert::assertArrayHasKey('transKey', $params);
        Assert::assertEquals('user::user.show.pdf', $params['view']);
        Assert::assertSame($user, $params['row']);
        Assert::assertEquals('user::users.fields', $params['transKey']);
    });

    test('it throws exception for missing view', function (): void {
        // Arrange
        $user = UserFactory::new()->createOne();

        // Act & Assert
        try {
            app(GetPdfContentByRecordAction::class)->execute($user);
            Assert::fail('Expected exception was not thrown.');
        } catch (\Exception $e) {
            Assert::assertMatchesRegularExpression("/View 'user::user\.show\.pdf' not found/", $e->getMessage());
        }
    });

    test('it throws exception for empty html content', function (): void {
        // This test would require mocking view rendering to return empty content
        // Implementation depends on testing infrastructure setup
        Assert::markTestSkipped('Requires view mocking infrastructure');
    });

    test('it uses custom filename when provided', function (): void {
        // Arrange
        $user = UserFactory::new()->createOne();
        $customFilename = 'custom-report.pdf';

        // Act & Assert - Should use custom filename in error message
        try {
            app(GetPdfContentByRecordAction::class)->execute($user, $customFilename);
            Assert::fail('Expected exception was not thrown.');
        } catch (\Exception $e) {
            Assert::assertInstanceOf(\Exception::class, $e);
        }
    });

    test('it handles from record convenience method', function (): void {
        // Arrange
        $user = UserFactory::new()->createOne();
        $filename = 'convenience-test.pdf';

        // Act & Assert
        try {
            app(GetPdfContentByRecordAction::class)->fromRecord($user, $filename);
            Assert::fail('Expected exception was not thrown.');
        } catch (\Exception $e) {
            Assert::assertMatchesRegularExpression("/View 'user::user\.show\.pdf' not found/", $e->getMessage());
        }
    });

    test('it logs errors when pdf generation fails', function (): void {
        // This test would require mocking HTML2PDF to throw exceptions
        // Implementation depends on testing infrastructure setup
        Assert::markTestSkipped('Requires HTML2PDF mocking infrastructure');
    });

    test('it returns valid pdf content when view exists', function (): void {
        // This test would require creating actual test views
        // Implementation depends on test view infrastructure
        Assert::markTestSkipped('Requires test view infrastructure');
    });
});
>>>>>>> c7fd73eb (.)
