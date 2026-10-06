<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arr;

use Webmozart\Assert\Assert;

class ScratchNarrowingTest2
{
    /** @return string */
    public function testOffset(): string
    {
        $tableNames = config('permission.table_names');
        Assert::isArray($tableNames);
        Assert::string($tableNames['permissions']);

        return $tableNames['permissions'];
    }

    /** @return array<string, mixed> */
    public function testAllString(): array
    {
        $tableNames = config('permission.table_names');
        Assert::isArray($tableNames);
        Assert::allString($tableNames);

        return array_combine(
            array_keys($tableNames),
            array_map(static fn (string $v): string => $v, $tableNames),
        );
    }
}
