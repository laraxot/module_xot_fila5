<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arr;

use Webmozart\Assert\Assert;

class ScratchNarrowingTest
{
    public function test(): string
    {
        $mixed = config('modules.namespace');
        Assert::string($ns = $mixed);

        return $ns.'\\x';
    }

    /** @return array<string, mixed> */
    public function testArray(): array
    {
        $tableNames = config('permission.table_names');
        Assert::isArray($tableNames);

        return ['permissions' => (string) ($tableNames['permissions'] ?? '')];
    }

    public function testConcat(): string
    {
        $mixed = config('modules.namespace');

        return $mixed.'\\x';
    }
}
