<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Models;

use Illuminate\Database\Eloquent\Model;

class ProbeGoodAttachments extends Model
{
    protected $guarded = [];

    /**
     * @return array<int, mixed>
     */
    public static function getAttachments(): array
    {
        return ['one', 7, 'two'];
    }
}
