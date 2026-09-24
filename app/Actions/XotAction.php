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

<<<<<<< .merge_file_nC2nlc
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
=======
    public function execute(): void
    {
    }
>>>>>>> .merge_file_xXOav4
}
