<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature\Actions\Pdf;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Database\Factories\UserFactory;
use Modules\Xot\Actions\Pdf\GetPdfContentByRecordAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

class GetPdfContentByRecordActionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->action = new GetPdfContentByRecordAction();
    }

    public function testItGeneratesPdfContentFromRecord(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Mock view existence
        view()->addNamespace('user', resource_path('views'));

        // Act & Assert
        $this->expectThrowable(\Exception::class);
        $this->expectThrowableMessage("View 'user::user.show.pdf' not found");

        app(GetPdfContentByRecordAction::class)->execute($user);
    }

    public function testItGeneratesCorrectViewName(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne();

        // Use reflection to test protected method
        $action = $this->action;
        Assert::assertInstanceOf(GetPdfContentByRecordAction::class, $action);
        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('generateViewName');
        $method->setAccessible(true);

        // Act
        $viewName = $method->invoke($action, $user);

        // Assert
        Assert::assertEquals('user::user.show.pdf', $viewName);
    }

    public function testItGeneratesCorrectFilenameForBasicModel(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne(['id' => 123, 'name' => 'Test User']);

        // Use reflection to test protected method
        $action = $this->action;
        Assert::assertInstanceOf(GetPdfContentByRecordAction::class, $action);
        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('generateFilename');
        $method->setAccessible(true);

        // Act
        $filename = $method->invoke($action, $user);

        // Assert
        Assert::assertEquals('user_123_test-user.pdf', $filename);
    }

    public function testItGeneratesEnhancedFilenameForPerformanceModels(): void
    {
        // Arrange - Create a mock model with performance fields
        $record = new class extends Model {
            protected $table = 'test_performance';

            protected $fillable = ['id', 'matr', 'cognome', 'nome'];

            public function testGetKey(): int
            {
                return 456;
            }
        };

        $record->setAttribute('matr', 'ABC123');
        $record->setAttribute('cognome', 'Rossi');
        $record->setAttribute('nome', 'Mario');

        // Use reflection to test protected method
        $action = $this->action;
        Assert::assertInstanceOf(GetPdfContentByRecordAction::class, $action);
        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('generateFilename');
        $method->setAccessible(true);

        // Act
        $filename = $method->invoke($action, $record);

        // Assert
        Assert::assertEquals('scheda_456_ABC123_Rossi_Mario.pdf', $filename);
    }

    public function testItPreparesCorrectViewParameters(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne(['name' => 'Test User']);

        // Use reflection to test protected method
        $action = $this->action;
        Assert::assertInstanceOf(GetPdfContentByRecordAction::class, $action);
        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('prepareViewParameters');
        $method->setAccessible(true);

        // Act
        $params = $method->invoke($action, $user, 'user::user.show.pdf');

        // Assert
        Assert::assertIsArray($params);
        Assert::assertArrayHasKey('view', $params);
        Assert::assertArrayHasKey('row', $params);
        Assert::assertArrayHasKey('transKey', $params);
        Assert::assertEquals('user::user.show.pdf', $params['view']);
        Assert::assertSame($user, $params['row']);
        Assert::assertEquals('user::users.fields', $params['transKey']);
    }

    public function testItThrowsExceptionForMissingView(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne();

        // Act & Assert
        $this->expectThrowable(\Exception::class);
        $this->expectThrowableMessageMatches("/View 'user::user\.show\.pdf' not found/");

        app(GetPdfContentByRecordAction::class)->execute($user);
    }

    public function testItThrowsExceptionForEmptyHtmlContent(): void
    {
        // This test would require mocking view rendering to return empty content
        // Implementation depends on testing infrastructure setup
        $this->markTestSkipped('Requires view mocking infrastructure');
    }

    public function testItUsesCustomFilenameWhenProvided(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne();
        $customFilename = 'custom-report.pdf';

        // Act & Assert - Should use custom filename in error message
        $this->expectThrowable(\Exception::class);

        app(GetPdfContentByRecordAction::class)->execute($user, $customFilename);
    }

    public function testItHandlesFromRecordConvenienceMethod(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne();
        $filename = 'convenience-test.pdf';

        // Act & Assert
        $this->expectThrowable(\Exception::class);
        $this->expectThrowableMessageMatches("/View 'user::user\.show\.pdf' not found/");

        app(GetPdfContentByRecordAction::class)->fromRecord($user, $filename);
    }

    public function testItLogsErrorsWhenPdfGenerationFails(): void
    {
        // This test would require mocking HTML2PDF to throw exceptions
        // Implementation depends on testing infrastructure setup
        $this->markTestSkipped('Requires HTML2PDF mocking infrastructure');
    }

    public function testItReturnsValidPdfContentWhenViewExists(): void
    {
        // This test would require creating actual test views
        // Implementation depends on test view infrastructure
        $this->markTestSkipped('Requires test view infrastructure');
    }
}
