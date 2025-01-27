<?php

namespace App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Actions;

class GetAllData
{
    static $CentralYearlyPlanmodel = \App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Models\Model::class;
    static $model = \App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Models\Model::class;

    public static function execute()
    {
        try {

            $pageLimit = request()->input('limit') ?? 10;
            $orderByColumn = request()->input('sort_by_col') ?? 'id';
            $orderByType = request()->input('sort_type') ?? 'desc';
            $status = request()->input('status') ?? 'active';
            $fields = request()->input('fields') ?? '*';
            $start_date = request()->input('start_date');
            $end_date = request()->input('end_date');
            $with = ['plan_dep_dofa', 'plan_dep_orjitobbo_target'];
            $condition = [];


            $data = self::$model::query();

            if (request()->has('search') && request()->input('search')) {
                $searchKey = request()->input('search');
                $data = $data->where(function ($q) use ($searchKey) {
                    $q->where('central_yearly_plan_id', 'like', '%' . $searchKey . '%');
                    $q->orWhere('plan_dep_dofas_id', 'like', '%' . $searchKey . '%');
                    $q->orWhere('plan_dep_orjitobbo_target_id', 'like', '%' . $searchKey . '%');
                    $q->orWhere('title', 'like', '%' . $searchKey . '%');
                    $q->orWhere('serial_no', 'like', '%' . $searchKey . '%');
                    $q->orWhere('description', 'like', '%' . $searchKey . '%');
                    $q->orWhere('previous_unfinished_parcent', 'like', '%' . $searchKey . '%');
                    $q->orWhere('rating', 'like', '%' . $searchKey . '%');
                    $q->orWhere('is_published', 'like', '%' . $searchKey . '%');
                    $q->orWhere('is_approved', 'like', '%' . $searchKey . '%');
                });
            }

            if ($start_date && $end_date) {
                if ($end_date > $start_date) {
                    $data->whereBetween('created_at', [$start_date . ' 00:00:00', $end_date . ' 23:59:59']);
                } elseif ($end_date == $start_date) {
                    $data->whereDate('created_at', $start_date);
                }
            }

            if ($status == 'trased') {
                $data = $data->trased();
            }

            if (request()->has('get_all') && (int)request()->input('get_all') === 1) {
                $data = $data
                    ->with($with)
                    ->select($fields)
                    ->where($condition)
                    ->where('status', $status)
                    ->limit($pageLimit)
                    ->orderBy($orderByColumn, $orderByType)
                    ->get();
                return entityResponse($data);
            } else if ($status == 'trased') {
                $data = $data
                    ->with($with)
                    ->select($fields)
                    ->where($condition)
                    ->orderBy($orderByColumn, $orderByType)
                    ->get();
            } else {
                $data = $data
                    ->with($with)
                    ->select($fields)
                    ->where($condition)
                    ->where('status', $status)
                    ->orderBy($orderByColumn, $orderByType)
                    ->get();
            }



            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }
}
