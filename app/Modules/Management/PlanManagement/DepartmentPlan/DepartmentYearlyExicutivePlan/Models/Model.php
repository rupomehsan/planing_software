<?php

namespace App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends EloquentModel
{
    use SoftDeletes;
    protected $table = "department_yearly_executive_plans";
    protected $guarded = [];


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

    public function session()
    {
        return $this->belongsTo(\App\Modules\Management\PlanDependency\PlanDepSession\Models\Model::class, 'session_id');
    }
    public function department_yearly_plan()
    {
        return $this->belongsTo(\App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Models\Model::class, 'department_yearly_plan_id');
    }

    public function  schedule_type()
    {
        return $this->belongsTo(\App\Modules\Management\PlanDependency\PlanDepScheduleType\Models\Model::class, 'plan_dep_schedule_type_id');
    }

    public function schedule()
    {
        return $this->belongsTo(\App\Modules\Management\PlanDependency\PlanDepSchedule\Models\Model::class, 'plan_dep_schedule_id');
    }

    public function department_section()
    {
        return $this->belongsTo(\App\Modules\Management\UserManagement\UserDepartmentSection\Models\Model::class, 'department_section_id');
    }

    public function department_sub_section()
    {
        return $this->belongsTo(\App\Modules\Management\UserManagement\UserDepartmentSubSection\Models\Model::class, 'department_sub_section_id');
    }

    public function  department_sub_section_user()
    {
        return $this->belongsTo(\App\Modules\Management\UserManagement\User\Models\Model::class, 'department_user_id');
    }

    public function helper_department()
    {
        return $this->belongsTo(\App\Modules\Management\UserManagement\UserDepartment\Models\Model::class, 'helper_department_id');
    }
    public function helper_department_user()
    {
        return $this->belongsTo(\App\Modules\Management\UserManagement\User\Models\Model::class, 'helper_department_user_id');
    }
}
