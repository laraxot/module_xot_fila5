<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Models;

use Modules\Xot\Models\BaseModel;

class TestConcreteBaseModel extends BaseModel
{
    protected $table = 'test_table';
}
