<?php

namespace App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends EloquentModel
{
    use SoftDeletes;
    protected $table = "department_yearly_plans";
    protected $guarded = [];
    protected static $CentralYearlyPlan = \App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Models\Model::class;


    protected static function booted()
    {
        static::created(function ($data) {
            $random_no = random_int(100, 999) . $data->id . random_int(100, 999);
            $slug = $data->title . " " . $random_no;
            $data->slug = Str::slug($slug); //use Illuminate\Support\Str;
            if (strlen($data->slug) > 50) {
                $data->slug = substr($data->slug, strlen($data->slug) - 50, strlen($data->slug));
            }
            if (auth()->check()) {
                $data->creator = auth()->user()->id;
            }
            $data->save();
        });
    }

    public function scopeActive($q)
    {
        return $q->where('status', 'active');
    }

    public function scopeInactive($q)
    {
        return $q->where('status', 'inactive');
    }
    public function scopeTrased($q)
    {
        return $q->onlyTrashed();
    }
    public function plan_dep_dofa()
    {
        return $this->belongsTo(\App\Modules\Management\PlanDependency\PlanDepDofas\Models\Model::class, 'plan_dep_dofas_id');
    }

    public function plan_dep_orjitobbo_target()
    {
        return $this->belongsTo(\App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Models\Model::class, 'plan_dep_orjitobbo_target_id');
    }
    public function central_yearly_plan()
    {
        return $this->belongsTo(\App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Models\Model::class, 'central_yearly_plan_id');
    }
    public function user_department()
    {
        return $this->belongsTo(\App\Modules\Management\UserManagement\UserDepartment\Models\Model::class, 'user_depertment_id');
    }


    public function plan_dep_session()
    {
        return $this->belongsTo(\App\Modules\Management\PlanDependency\PlanDepSession\Models\Model::class, 'plan_dep_session_id');
    }


    public function executive_departments()
    {
        return $this->hasMany(\App\Modules\Management\PlanManagement\RelationalData\Models\PlanExecutorModel::class, 'table_id');
    }
}
