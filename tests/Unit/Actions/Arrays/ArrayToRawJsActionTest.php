<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_0apQTX
=======
<<<<<<< .merge_file_QZfLki

=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_YT0UEI
=======
<<<<<<< .merge_file_EKSg60
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

>>>>>>> .merge_file_3EbYMp
>>>>>>> laraxot/dev
<<<<<<< .merge_file_0apQTX
=======
>>>>>>> .merge_file_IuITVM
>>>>>>> .merge_file_YT0UEI
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
