<?php

namespace App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Actions;

class StoreData
{
    static $model = \App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Models\Model::class;
    static $PlanExecutorModel = \App\Modules\Management\PlanManagement\RelationalData\Models\PlanExecutorModel::class;

    public static function execute($request)
    {
        try {
            $requestData = $request->all();

            foreach ($requestData as $key => $value) {

                $data = [
                    'serial_no' => $value['serial_no'],
                    'title' => $value['title'],
                    'plan_dep_session_id' => $value['plan_dep_session']['id'],
                    'plan_dep_dofas_id' => $value['plan_dep_dofa']['id'],
                    'plan_dep_orjitobbo_target_id' => $value['plan_dep_orjitobbo_target']['id'],
                    'description' => $value['description'] ?? null,
                    'previous_unfinished_parcent' => $value['previous_unfinished_parcent'] ?? null,
                    'creator' => auth()->user()->id ?? null
                ];


                if ($departmentYearlyPlan = self::$model::create($data)) {
                    foreach ($value['executive_departments'] as $item) {
                        $plan_executors = [
                            'table_name' => 'department_yearly_plans',
                            'table_id' => $departmentYearlyPlan->id,
                            'user_id' => auth()->user()->id ?? null,
                            'user_depertment_id' => $item['id'],
                            'rating' => $item['rating'],
                        ];
                        self::$PlanExecutorModel::create($plan_executors);
                    }
                }
            }

            return messageResponse('Item added successfully', [], 201);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }
}
