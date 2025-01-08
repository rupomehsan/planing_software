<?php

namespace App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Actions;

class StoreData
{
    static $model = \App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Models\Model::class;
    static $PlanExecutorModel = \App\Modules\Management\PlanManagement\RelationalData\Models\PlanExecutorModel::class;

    public static function execute($request)
    {
        try {
            $requestData = $request->all();

            foreach ($requestData as $key => $value) {



                $data = [
                    'title' => $value['title'],
                    'department_yearly_plan_id' => $value['department_yearly_plan']['id'],
                    'session_id' => $value['session']['id'],
                    'department_id' => auth()->user()->user_department_id ?? null,
                    'department_section_id' => $value['user_department_section']['id'] ?? null,
                    'department_sub_section_id' => $value['user_department_sub_section']['id'] ?? null,
                    'department_user_id' => $value['user_department_sub_section_user']['id'] ?? null,
                    'helper_department_id' => $value['helper_user_department']['id'] ?? null,
                    'helper_department_user_id' => $value['helper_user_department_user']['id'] ?? null,
                    'plan_dep_schedule_type_id' => $value['schedule_type']['id'] ?? null,
                    'plan_dep_schedule_id' => $value['schedule']['id'] ?? null,
                    'description' => $value['plan_details'] ?? null,
                    'bastobayoner_mash' => $value['bastobayoner_mash'] ?? null,
                    'rating' => $value['rating'] ?? null,
                ];

                $departmentYearlyExecutivePlan = self::$model::create($data);

                $plan_executors = [
                    'table_name' => 'department_yearly_executive_plans',
                    'table_id' => $departmentYearlyExecutivePlan->id,
                    'user_id' => auth()->user()->id ?? null,
                    'user_depertment_id' => auth()->user()->user_department_id,
                    'description' => $departmentYearlyExecutivePlan->description,
                    'rating' => $departmentYearlyExecutivePlan->rating,
                ];

                // dd($plan_executors);

                self::$PlanExecutorModel::create($plan_executors);

                return messageResponse('Item carated successfully', $data, 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }
}
