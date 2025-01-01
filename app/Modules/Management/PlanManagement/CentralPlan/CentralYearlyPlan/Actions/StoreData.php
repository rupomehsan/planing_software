<?php

namespace App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Actions;

class StoreData
{
    static $model = \App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Models\Model::class;
    static $PlanExecutorModel = \App\Modules\Management\PlanManagement\RelationalData\Models\PlanExecutorModel::class;

    public static function execute($request)
    {
        try {
            $requestData = $request->all();

            foreach ($requestData as $key => $value) {

                $data = [
                    'title' => $value['title'],
                    'plan_dep_dofas_id' => $value['plan_dep_dofa']['id'],
                    'plan_dep_orjitobbo_target_id' => $value['plan_dep_orjitobbo_target']['id'],
                    'description' => $value['description'] ?? null,
                    'previous_unfinished_parcent' => $value['previous_unfinished_parcent'] ?? null,
                    'rating' => $value['rating'] ?? null,
                    'user_depertment_id' => $value['user_department']['id'] ?? null,
                ];

                $centralYearlyPlan = self::$model::create($data);

                $plan_executors = [
                    'table_name' => 'central_yearly_plans',
                    'table_id' => $centralYearlyPlan->id,
                    'user_id' => auth()->user()->id ?? null,
                    'user_depertment_id' => $value['user_department']['id'],
                    'description' => $centralYearlyPlan->description,
                    'rating' => $centralYearlyPlan->rating,
                ];

                // dd($plan_executors);

                self::$PlanExecutorModel::create($plan_executors);
            }

            return messageResponse('Item added successfully', [], 201);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }
}
