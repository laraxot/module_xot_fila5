<?php

declare(strict_types=1);

namespace Modules\Xot\Services;

use Spatie\QueueableAction\QueueableAction;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\Tenant;

class XotService
{
    use QueueableAction;
    
    /**
     * Get the tenant class name.
     *
     * @return class-string<Model>
     */
    public function getTenantClass(): string
    {
        return Tenant::class;
    }

    /**
     * QueueableAction execute method for XotService.
     * Returns the tenant class name.
     *
     * @return class-string<Model>
     */
    public function execute(): string
    {
        return $this->getTenantClass();
    }
}