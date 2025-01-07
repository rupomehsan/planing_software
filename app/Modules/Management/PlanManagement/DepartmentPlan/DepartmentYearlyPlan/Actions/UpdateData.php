<?php

namespace App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Actions;

class UpdateData
{
    static $model = \App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Models\Model::class;

    public static function execute($request, $slug)
    {
        try {


            if (!$data = self::$model::query()->where('slug', $slug)->first()) {
                return messageResponse('Data not found...', $data, 404, 'error');
            }
            $requestData = [
                'title' => $request['title'],
                'central_yearly_plan_id' => $request['central_yearly_plan']['id'],
                'plan_dep_dofas_id' => $request['plan_dep_dofa']['id'],
                'plan_dep_orjitobbo_target_id' => $request['plan_dep_orjitobbo_target']['id'],
                'description' => $request['description'] ?? null,
                'previous_unfinished_parcent' => $request['previous_unfinished_parcent'] ?? null,
                'rating' => $request['rating'] ?? null,
                'user_depertment_id' => auth()->user()->id ?? null,
            ];

            $data->update($requestData);
            return messageResponse('Item updated successfully', $data, 201);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }
}
