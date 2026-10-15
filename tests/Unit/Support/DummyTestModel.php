<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Unit\Support;

use Illuminate\Database\Eloquent\Model;

class DummyTestModel extends Model
{
    protected $table = 'dummy_test_models';

    protected $fillable = ['name'];
}
