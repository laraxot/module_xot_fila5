<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\Tenant;
use Spatie\QueueableAction\QueueableAction;

class XotAction
{
    use QueueableAction;

    /**
     * @return class-string<Model>
     */
    public function getTenantClass(): string
    {
        return Tenant::class;
    }

<<<<<<< .merge_file_cwM2se
<<<<<<< HEAD
<<<<<<< HEAD
    public function execute(): void {}
=======
<<<<<<< .merge_file_nC2nlc
<<<<<<< HEAD
    public function execute(): void
    {
    }
=======
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)
    public function execute(): void
    {
    }
=======
    public function execute(): void {}
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    public function execute(): void
    {
    }
>>>>>>> .merge_file_xXOav4
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
    public function execute(): void {}
>>>>>>> .merge_file_xMy2HJ
}
