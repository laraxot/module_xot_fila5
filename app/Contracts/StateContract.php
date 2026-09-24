<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Filament\Schemas\Components\Component;
use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Xot\Contracts\SateContract.
 *
 * @property string $name
 */
interface StateContract
{
    public function label(): string;

    public function color(): string;

    public function bgColor(): string;

    public function icon(): string;

    public function modalHeading(): string;

    public function modalDescription(): string;

    /**
     * Get the modal form schema.
     *
     * @return array<string, Component>
     */
    public function modalFormSchema(): array;

    /**
     * Fill form data by record.
     *
     * @return array<string, mixed>
     */
    public function modalFillFormByRecord(Model $record): array;

    /**
     * Execute modal action by record.
     *
<<<<<<< .merge_file_uuxng6
     * @param  array<string, mixed>  $data
=======
     * <<<<<<< .merge_file_0ishpY
     *
     * @param array<string, mixed> $data
     *                                   =======
     *                                   <<<<<<< HEAD
     * @param array<string, mixed> $data
     *                                   =======
     * @param array<string, mixed> $data
     *                                   >>>>>>> laraxot/dev
     *                                   >>>>>>> .merge_file_Hh7ips
>>>>>>> .merge_file_QzzON8
     */
    public function modalActionByRecord(Model $record, array $data): void;
}
