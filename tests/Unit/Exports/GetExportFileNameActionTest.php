<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Exports;

use Modules\Xot\Actions\Export\GetExportFileNameAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('GetExportFileNameAction — stesso nome file per export_xls e export_xlsx', function (): void {
    test('class_basename della pagina + filtri appiattiti, come il custom storico', function (): void {
<<<<<<< .merge_file_WEjVH5
        $page = new ListRecordsStub();
=======
<<<<<<< .merge_file_w1gt4w
        $page = new ListRecordsStub;
=======
        $page = new ListRecordsStub();
>>>>>>> .merge_file_Kz90HC
>>>>>>> .merge_file_eqMnjz
        $page->tableFilters = [
            'anno_valutatore' => [
                'anno' => 2026,
                'valutatore_id' => '580',
            ],
            'ha_diritto' => [
                'value' => true,
            ],
        ];

        Assert::assertSame('ListRecordsStub-2026-580-1', app(GetExportFileNameAction::class)->execute($page));
    });

    test('filtri assenti o nulli non rompono il nome', function (): void {
<<<<<<< .merge_file_WEjVH5
        $page = new ListRecordsStub();
=======
<<<<<<< .merge_file_w1gt4w
        $page = new ListRecordsStub;
=======
        $page = new ListRecordsStub();
>>>>>>> .merge_file_Kz90HC
>>>>>>> .merge_file_eqMnjz
        $page->tableFilters = [
            'anno_valutatore' => [
                'anno' => null,
            ],
        ];

        Assert::assertSame('ListRecordsStub-', app(GetExportFileNameAction::class)->execute($page));
    });
});
