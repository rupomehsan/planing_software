<?php

namespace App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentMonthlyPlan\Controller;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentMonthlyPlan\Actions\GetAllData;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentMonthlyPlan\Actions\DestroyData;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentMonthlyPlan\Actions\GetSingleData;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentMonthlyPlan\Actions\StoreData;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentMonthlyPlan\Actions\UpdateData;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentMonthlyPlan\Actions\SoftDelete;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentMonthlyPlan\Actions\RestoreData;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentMonthlyPlan\Actions\ImportData;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentMonthlyPlan\Validations\BulkActionsValidation;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentMonthlyPlan\Validations\DataStoreValidation;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentMonthlyPlan\Actions\BulkActions;
use App\Http\Controllers\Controller as ControllersController;


class Controller extends ControllersController
{

    public function index( ){

        $data = GetAllData::execute();
        return $data;
    }

    public function store(DataStoreValidation $request)
    {
        $data = StoreData::execute($request);
        return $data;
    }

    public function show($slug)
    {
        $data = GetSingleData::execute($slug);
        return $data;
    }

    public function update(DataStoreValidation $request, $slug)
    {
        $data = UpdateData::execute($request, $slug);
        return $data;
    }

    public function softDelete()
    {
        $data = SoftDelete::execute();
        return $data;
    }
    public function destroy($slug)
    {
        $data = DestroyData::execute($slug);
        return $data;
    }
    public function restore()
    {
        $data = RestoreData::execute();
        return $data;
    }
    public function import()
    {
        $data = ImportData::execute();
        return $data;
    }
    public function bulkAction(BulkActionsValidation $request)
    {
        $data = BulkActions::execute($request);
        return $data;
    }

}