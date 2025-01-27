<?php

namespace App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Actions;

class UpdateData
{
    static $model = \App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Models\Model::class;
    static $PlanExecutorModel = \App\Modules\Management\PlanManagement\RelationalData\Models\PlanExecutorModel::class;

    public static function execute($request, $slug)
    {
        try {


            if (!$data = self::$model::query()->where('slug', $slug)->first()) {
                return messageResponse('Data not found...', $data, 404, 'error');
            }
            $requestData = [
                'serial_no' => $request['serial_no'],
                'title' => $request['title'],
                'plan_dep_session_id' => $request['plan_dep_session']['id'],
                'plan_dep_dofas_id' => $request['plan_dep_dofa']['id'],
                'plan_dep_orjitobbo_target_id' => $request['plan_dep_orjitobbo_target']['id'],
                'description' => $request['description'] ?? null,
                'previous_unfinished_parcent' => $request['previous_unfinished_parcent'] ?? null,
                'creator' => auth()->user()->id ?? null
            ];


            if ($data->update($requestData)) {
                $tableName = 'department_yearly_plans';
                self::$PlanExecutorModel::where('table_id', $data->id)
                    ->delete();
                foreach ($request['executive_departments'] as $item) {
                    $executorData = [
                        'table_name' => $tableName,
                        'table_id' => $data->id,
                        'user_id' => auth()->user()->id ?? null,
                        'user_depertment_id' => $item['id'] ?? null,
                        'rating' => $item['rating'] ?? null,
                    ];
                    self::$PlanExecutorModel::create($executorData);
                }
            }

            return messageResponse('Item updated successfully', $data, 201);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }
}
