<?php

namespace App\Modules\Management\PlanManagement\RelationalData\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanExecutorModel extends EloquentModel
{
    use SoftDeletes;
    protected $table = "plan_executors";
    protected $guarded = [];
}
