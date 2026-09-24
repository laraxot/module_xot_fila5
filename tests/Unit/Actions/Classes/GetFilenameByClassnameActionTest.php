<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_ufWU9l
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======

>>>>>>> .merge_file_dQMLcK
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
use Modules\Xot\Actions\Classes\GetFilenameByClassnameAction;
use Modules\Xot\Models\Log;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-xot-db');

it('gets filename from classname correctly', function (): void {
    $action = app(GetFilenameByClassnameAction::class);

    $filename = $action->execute(Log::class);

    Assert::assertNotEmpty($filename);
    Assert::assertStringContainsString((string) 'Log.php', (string) $filename);
});
