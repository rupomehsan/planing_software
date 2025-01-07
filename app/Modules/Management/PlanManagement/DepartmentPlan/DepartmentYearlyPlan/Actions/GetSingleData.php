<?php

namespace App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Actions;



class GetSingleData
{
    static $model = \App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Models\Model::class;

    public static function execute($slug)
    {
        try {
            $with = ['central_yearly_plan:id,title', 'plan_dep_orjitobbo_target:id,title', 'plan_dep_dofa:id,title', 'user_department:id,title'];
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
