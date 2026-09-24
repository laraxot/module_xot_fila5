<?php

declare(strict_types=1);

namespace Modules\Xot\Exports;

/**
 * Exporter generico: tutto arriva da `XotBaseExporter` (colonne da
 * `getXlsFields()` del Resource della pagina, celle come PhpSpreadsheet, eager
 * load dei rating, notifica tradotta). Esiste perche' Filament vuole un
 * exporter concreto per `ExportAction::exporter()`.
 *
 * Montato da `ExportXlsxAction` (`export_xlsx`). Un modulo con esigenze proprie
 * fa `ExportXlsxAction::make('export_xlsx')->exporter(MioExporter::class)` con
 * `MioExporter extends XotBaseExporter`.
 */
<<<<<<< .merge_file_PylwzF
class XlsFieldsExporter extends XotBaseExporter
{
}
=======
<<<<<<< .merge_file_4nOw4D
class XlsFieldsExporter extends XotBaseExporter {}
=======
class XlsFieldsExporter extends XotBaseExporter
{
}
>>>>>>> .merge_file_vOb6AI
>>>>>>> .merge_file_b770uJ
