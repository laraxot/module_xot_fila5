<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures;

use Illuminate\Database\Eloquent\Model;

class DemoModel extends Model
{
    protected $table = 'demo_models';

    public $timestamps = false;
}
