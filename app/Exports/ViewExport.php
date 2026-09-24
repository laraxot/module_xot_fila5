<?php

declare(strict_types=1);

namespace Modules\Xot\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ViewExport implements FromView
{
    use Exportable;

    public View $view;

    /**
     * Summary of fields.
     *
     * @var array<string>
     */
    public ?array $fields = null;

    public ?string $transKey = null;

    /**
     * Summary of __construct.
     *
     * <<<<<<< .merge_file_iIkpeV
     *
     * @param array<string> $fields
     *                              =======
     *                              <<<<<<< HEAD
     * @param array<string> $fields
     *                              =======
     * @param array<string> $fields
     *                              >>>>>>> laraxot/dev
     *                              >>>>>>> .merge_file_NEgiQb
     */
    public function __construct(View $view, ?string $transKey = null, ?array $fields = null)
    {
        $this->view = $view;
        $this->transKey = $transKey;
        $this->fields = $fields;
    }

    public function view(): View
    {
        return $this->view;
    }
}
