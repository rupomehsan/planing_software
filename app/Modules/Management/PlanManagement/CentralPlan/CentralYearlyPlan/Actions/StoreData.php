<?php

namespace App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Actions;

use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Actions\StoreData as ActionsStoreData;

class StoreData
{
    static $model = \App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Models\Model::class;
    static $departmentYearlyPlanModel = \App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Models\Model::class;
    static $PlanExecutorModel = \App\Modules\Management\PlanManagement\RelationalData\Models\PlanExecutorModel::class;

    public static function CentralExecute($request)
    {
        try {

            $requestData = $request->all();

            // foreach ($requestData as $key => $value) {
            //     $isExist = self::$model::where('serial_no', $value['serial_no'])->first();
            //     if ($isExist) {
            //         return messageResponse('Item already exist serial no : ' . $value['serial_no'], [], 201);
            //     }
            // }

            foreach ($requestData as $key => $value) {

                $data = [
                    'serial_no' => $value['serial_no'],
                    'title' => $value['title'],
                    'plan_dep_session_id' => $value['plan_dep_session']['id'],
                    'plan_dep_dofas_id' => $value['plan_dep_dofa']['id'],
                    'plan_dep_orjitobbo_target_id' => $value['plan_dep_orjitobbo_target']['id'],
                    'description' => $value['description'] ?? null,
                    'previous_unfinished_parcent' => $value['previous_unfinished_parcent'] ?? null,
                ];


                // dd($value['executive_departments']);
                if ($centralYearlyPlan = self::$model::create($data)) {

                    foreach ($value['executive_departments'] as $item) {

                        $plan_executors = [
                            'table_name' => 'central_yearly_plans',
                            'table_id' => $centralYearlyPlan->id,
                            'user_id' => auth()->user()->id ?? null,
                            'user_depertment_id' => $item['id'],
                            'rating' => $item['rating'],
                        ];

                        // dd($plan_executors);

                        self::$PlanExecutorModel::create($plan_executors);
                    }
                }

                self::DepartmentExecute($data);
            }




            return messageResponse('Item added successfully', [], 201);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }

    public static function DepartmentExecute($data)
    {
        try {


            $lastSerialNo = self::$departmentYearlyPlanModel::orderBy('serial_no', 'desc')->first();
            $data['serial_no'] = $lastSerialNo ? $lastSerialNo->serial_no + 1 : 1;
            self::$departmentYearlyPlanModel::create($data);

            return messageResponse('Item added successfully', [], 201);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }
}
