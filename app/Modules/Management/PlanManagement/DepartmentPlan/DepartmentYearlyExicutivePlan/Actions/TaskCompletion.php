<?php

namespace App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Actions;

class TaskCompletion
{
    static $model = \App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Models\Model::class;


    public static function execute()
    {
        try {



            if (!$data = self::$model::query()->where('id', request('id'))->first()) {
                return messageResponse('Data not found...', $data, 404, 'error');
            }
            if ($data->is_completed == 1) {
                $data->is_completed = 0;
            } else {
                $data->is_completed = 1;
            }
            $data->update();
            return messageResponse('Item updated successfully', $data, 201);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }
}
