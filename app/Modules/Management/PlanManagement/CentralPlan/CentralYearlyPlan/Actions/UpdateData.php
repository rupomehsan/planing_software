<?php

namespace App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Actions;

class UpdateData
{
    static $model = \App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Models\Model::class;
    static $PlanExecutorModel = \App\Modules\Management\PlanManagement\RelationalData\Models\PlanExecutorModel::class;

    public static function execute($request, $slug)
    {
        try {

            // dd($request->all());
            if (!$data = self::$model::query()->where('slug', $slug)->first()) {
                return messageResponse('Data not found...', $data, 404, 'error');
            }

            $isExist = self::$model::where('id', '!=', $data->id)->where('serial_no', $request['serial_no'])->first();
            if ($isExist) {
                return messageResponse('Item already exist serial no : ' . $request['serial_no'], [], 201);
            }

            // Prepare request data
            $requestData = [
                'serial_no' => $request['serial_no'],
                'title' => $request['title'],
                'plan_dep_session_id' => $request['plan_dep_session']['id'] ?? null,
                'plan_dep_dofas_id' => $request['plan_dep_dofa']['id'] ?? null,
                'plan_dep_orjitobbo_target_id' => $request['plan_dep_orjitobbo_target']['id'] ?? null,
                'description' => $request['description'] ?? null,
                'previous_unfinished_parcent' => $request['previous_unfinished_parcent'] ?? null,
            ];

            if ($data->update($requestData)) {
                $tableName = 'central_yearly_plans';
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
