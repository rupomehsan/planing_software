<?php

namespace App\Modules\Management\PlanBudgetManagement\PlanBudget\Actions;

class GetAllData
{
    static $model = \App\Modules\Management\PlanBudgetManagement\PlanBudget\Models\Model::class;

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
            $with = [];
            $condition = [];

            $data = self::$model::query();

            if (request()->has('search') && request()->input('search')) {
                $searchKey = request()->input('search');
                $data = $data->where(function ($q) use ($searchKey) {
                    $q->where('central_yearly_plan_id', 'like', '%' . $searchKey . '%');

                    $q->orWhere('central_yearly_executive_plan_id', 'like', '%' . $searchKey . '%');

                    $q->orWhere('department_yearly_plan_id', 'like', '%' . $searchKey . '%');

                    $q->orWhere('department_yearly_executive_plan_id', 'like', '%' . $searchKey . '%');

                    $q->orWhere('department_id', 'like', '%' . $searchKey . '%');

                    $q->orWhere('department_section_id', 'like', '%' . $searchKey . '%');

                    $q->orWhere('department_sub_section_id', 'like', '%' . $searchKey . '%');

                    $q->orWhere('date', 'like', '%' . $searchKey . '%');

                    $q->orWhere('rating', 'like', '%' . $searchKey . '%');

                    $q->orWhere('amount', 'like', '%' . $searchKey . '%');

                    $q->orWhere('type', 'like', '%' . $searchKey . '%');

                    $q->orWhere('plan_budget_category_id', 'like', '%' . $searchKey . '%');

                    $q->orWhere('plan_budget_sub_category_id', 'like', '%' . $searchKey . '%');
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
                    ->paginate($pageLimit);
            } else {
                $data = $data
                    ->with($with)
                    ->select($fields)
                    ->where($condition)
                    ->where('status', $status)
                    ->orderBy($orderByColumn, $orderByType)
                    ->paginate($pageLimit);
            }

            return entityResponse([
                ...$data->toArray(),
                "active_data_count" => self::$model::active()->count(),
                "inactive_data_count" => self::$model::inactive()->count(),
                "trased_data_count" => self::$model::trased()->count(),
            ]);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }
}
