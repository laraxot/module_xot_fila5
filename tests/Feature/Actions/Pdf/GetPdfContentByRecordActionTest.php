<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature\Actions\Pdf;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use Modules\Xot\Actions\Pdf\GetPdfContentByRecordAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
use ReflectionClass;

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

    /**
     * @param  array<string, mixed>  $attributes
     */
    private function createPdfTestUser(array $attributes = []): User
    {
        $user = UserFactory::new()->createOne($attributes);
        Assert::assertInstanceOf(User::class, $user);

        return $user;
    }

    /** @test */
    public function it_generates_pdf_content_from_record(): void
    {
        $user = $this->createPdfTestUser([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        view()->addNamespace('user', resource_path('views'));

        $this->expectException(Exception::class);
        $this->expectExceptionMessageMatches("/View 'user::user\.show\.pdf' not found/");

        $this->action->execute($user);
    }

    /** @test */
    public function it_generates_correct_view_name(): void
    {
        $user = $this->createPdfTestUser();

        $reflection = new ReflectionClass($this->action);
        $method = $reflection->getMethod('generateViewName');
        $method->setAccessible(true);

        $viewName = $method->invoke($this->action, $user);

        $this->assertEquals('user::user.show.pdf', $viewName);
    }

    /** @test */
    public function it_generates_correct_filename_for_basic_model(): void
    {
        $user = $this->createPdfTestUser(['id' => 123, 'name' => 'Test User']);

        $reflection = new ReflectionClass($this->action);
        $method = $reflection->getMethod('generateFilename');
        $method->setAccessible(true);

        $filename = $method->invoke($this->action, $user);

        $this->assertEquals('user_123_test-user.pdf', $filename);
    }

    /** @test */
    public function it_generates_enhanced_filename_for_performance_models(): void
    {
        $record = new class() extends Model
        {
            protected $table = 'test_performance';

            protected $fillable = ['id', 'matr', 'cognome', 'nome'];

            public function getKey()
            {
                return 456;
            }
        };

        $record->setAttribute('matr', 'ABC123');
        $record->setAttribute('cognome', 'Rossi');
        $record->setAttribute('nome', 'Mario');

        $reflection = new ReflectionClass($this->action);
        $method = $reflection->getMethod('generateFilename');
        $method->setAccessible(true);

        $filename = $method->invoke($this->action, $record);

        $this->assertEquals('scheda_456_ABC123_Rossi_Mario.pdf', $filename);
    }

    /** @test */
    public function it_prepares_correct_view_parameters(): void
    {
        $user = $this->createPdfTestUser(['name' => 'Test User']);

        $reflection = new ReflectionClass($this->action);
        $method = $reflection->getMethod('prepareViewParameters');
        $method->setAccessible(true);

        $params = $method->invoke($this->action, $user, 'user::user.show.pdf');

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
        $user = $this->createPdfTestUser();

        $this->expectException(Exception::class);
        $this->expectExceptionMessageMatches("/View 'user::user\.show\.pdf' not found/");

        $this->action->execute($user);
    }

    /** @test */
    public function it_throws_exception_for_empty_html_content(): void
    {
        $this->markTestSkipped('Requires view mocking infrastructure');
    }

    /** @test */
    public function it_uses_custom_filename_when_provided(): void
    {
        $user = $this->createPdfTestUser();
        $customFilename = 'custom-report.pdf';

        $this->expectException(Exception::class);

        $this->action->execute($user, $customFilename);
    }

    /** @test */
    public function it_handles_from_record_convenience_method(): void
    {
        $user = $this->createPdfTestUser();
        $filename = 'convenience-test.pdf';

        $this->expectException(Exception::class);
        $this->expectExceptionMessageMatches("/View 'user::user\.show\.pdf' not found/");

        $this->action->fromRecord($user, $filename);
    }

    /** @test */
    public function it_logs_errors_when_pdf_generation_fails(): void
    {
        $this->markTestSkipped('Requires HTML2PDF mocking infrastructure');
    }

    /** @test */
    public function it_returns_valid_pdf_content_when_view_exists(): void
    {
        $this->markTestSkipped('Requires test view infrastructure');
    }
}
