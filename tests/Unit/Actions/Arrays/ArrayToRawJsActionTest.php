<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_EKSg60
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

>>>>>>> .merge_file_3EbYMp
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
use Filament\Support\RawJs;
use Modules\Xot\Actions\Arr\ArrayToRawJsAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('converts array to raw js string correctly', function (): void {
    $action = app(ArrayToRawJsAction::class);

    $data = [
        'simpleKey' => 'value',
        'complex-key' => "it's simple",
        'number' => 123,
        'boolean' => true,
        'nullValue' => null,
        'nested' => [
            'inner' => 'val',
        ],
        'raw' => RawJs::make('function() { return 1; }'),
    ];

    $result = $action->execute($data);
    $html = $result->toHtml();

    Assert::assertStringContainsString('simpleKey: \'value\'', $html);
    Assert::assertStringContainsString('\'complex-key\': \'it\\\'s simple\'', $html);
    Assert::assertStringContainsString('number: 123', $html);
    Assert::assertStringContainsString('boolean: true', $html);
    Assert::assertStringContainsString('nullValue: null', $html);
    Assert::assertStringContainsString('nested: {inner: \'val\'}', $html);
    Assert::assertStringContainsString('raw: function', $html);
});
