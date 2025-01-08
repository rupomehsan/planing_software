<?php

namespace App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Actions;



class GetSingleData
{
    static $model = \App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Models\Model::class;

    public static function execute($slug)
    {
        try {
            $with = [
                'session:id,title',
                'helper_department_user:id,name',
                'helper_department:id,title',
                'department_sub_section_user:id,name',
                'department_sub_section:id,title',
                'department_section:id,title',
                'schedule:id,title',
                'schedule_type:id,title',
                'department_yearly_plan:id,title',
            ];
            $fields = request()->input('fields') ?? ['*'];
            if (!$data = self::$model::query()->with($with)->select($fields)->where('slug', $slug)->first()) {
                return messageResponse('Data not found...', $data, 404, 'error');
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }
}
