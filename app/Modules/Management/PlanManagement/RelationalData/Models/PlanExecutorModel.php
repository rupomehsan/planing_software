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

    public function user_department()
    {
        return $this->belongsTo(\App\Modules\Management\UserManagement\UserDepartment\Models\Model::class, 'user_depertment_id');
    }
}
