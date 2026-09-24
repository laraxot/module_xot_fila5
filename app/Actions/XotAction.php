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

<<<<<<< HEAD
<<<<<<< .merge_file_Z2Y1St
<<<<<<< HEAD
<<<<<<< HEAD
    public function execute(): void {}
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_nC2nlc
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
    public function execute(): void
    {
    }
=======
<<<<<<< HEAD
    public function execute(): void
    {
    }
=======
    public function execute(): void {}
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
    public function execute(): void
    {
    }
>>>>>>> .merge_file_xXOav4
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    public function execute(): void
    {
    }
>>>>>>> 3792da0d (Check & fix styling)
=======
    public function execute(): void {}
>>>>>>> .merge_file_zinEkp
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
}
