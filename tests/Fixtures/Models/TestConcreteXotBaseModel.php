<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Models;

use Modules\Xot\Models\XotBaseModel;

class TestConcreteXotBaseModel extends XotBaseModel
{
    protected $table = 'test_xot_table';
}
