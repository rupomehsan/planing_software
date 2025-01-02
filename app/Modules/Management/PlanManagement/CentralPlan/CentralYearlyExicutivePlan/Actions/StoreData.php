<?php

namespace App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyExicutivePlan\Actions;

class StoreData
{
    static $model = \App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyExicutivePlan\Models\Model::class;
    static $PlanExecutorModel = \App\Modules\Management\PlanManagement\RelationalData\Models\PlanExecutorModel::class;
    public static function execute($request)
    {
        try {

            $requestData = $request->all();

            foreach ($requestData as $key => $value) {

                $data = [
                    'title' => $value['title'],
                    'session' => $value['session'],
                    'central_yearly_plan_id' => $value['central_yearly_plan']['id'],
                    'user_department_id' => $value['user_department']['id'],
                    'user_department_section_id' => $value['user_department_section']['id'],
                    'user_department_sub_section_id' => $value['user_department_sub_section']['id'],
                    'plan_dep_category_id' => $value['plan_dep_category']['id'],
                    'plan_dep_sonkhatattik_tottho_id' => $value['plan_dep_sonkhatattik_tottho']['id'],
                    'plan_dep_dofa_id' => $value['plan_dep_dofa_id']['id'],
                    'execution_type' => $value['execution_type'],
                    'bastobayoner_mash' => $value['bastobayoner_mash'],
                    'obastobayeto_ongsho' => $value['obastobayeto_ongsho'],
                    'comments' => $value['comments'],
                    'is_archived' => $value['is_archived'],
                    'is_umbrella' => $value['is_umbrella'],
                    'umbrella_department_id' => $value['umbrella_departments'],
                    'plan_details' => $value['plan_details'],
                ];

                $centralYearlyPlan = self::$model::create($data);

                $plan_executors = [
                    'table_name' => 'central_yearly_exicutive_plans',
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
