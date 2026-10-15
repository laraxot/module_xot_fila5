<?php

declare(strict_types=1);
use Modules\Xot\Actions\String\GetStrBetweenStartsWithAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('extracts string between markers correctly', function (): void {
    $action = app(GetStrBetweenStartsWithAction::class);

    $body = 'prefix { content { inner } } suffix';
    $result = $action->execute($body, 'content', '{', '}');

    Assert::assertSame('content { inner }', $result);
});

it('throws exception when start marker is missing', function (): void {
    $action = app(GetStrBetweenStartsWithAction::class);

    expect(fn (): string => $action->execute('no markers here', 'content', '{', '}'))
        ->toThrow(\Exception::class, 'Cannot find content in no markers here');
});

it('returns the whole balanced call used to rewrite table columns', function (): void {
    // Stesso uso di GenerateTableColumnsByFileAction: il marker di apertura e' dentro lo start
    // e la chiamata successiva (->filters) non deve finire nel risultato.
    $action = app(GetStrBetweenStartsWithAction::class);

    $body = "\$table\n    ->columns([TextColumn::make('id'), TextColumn::make('name')])\n    ->filters([]);";
    $result = $action->execute($body, '->columns(', '(', ')');

    Assert::assertSame("->columns([TextColumn::make('id'), TextColumn::make('name')])", $result);
});

it('counts characters and not bytes with multibyte text', function (): void {
    $action = app(GetStrBetweenStartsWithAction::class);

    $result = $action->execute('caffè { crème { à } } fine', 'crème', '{', '}');

    Assert::assertSame('crème { à }', $result);
});
