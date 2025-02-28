<?php

namespace App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Controller;

use App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Actions\GetAllData;
use App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Actions\DestroyData;
use App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Actions\GetSingleData;
use App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Actions\StoreData;
use App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Actions\UpdateData;
use App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Actions\UpdateStatus;
use App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Actions\SoftDelete;
use App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Actions\RestoreData;
use App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Actions\ImportData;
use App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Validations\BulkActionsValidation;
use App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Validations\DataStoreValidation;
use App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Actions\BulkActions;
use App\Http\Controllers\Controller as ControllersController;


class Controller extends ControllersController
{

    public function index()
    {

        $data = GetAllData::execute();
        return $data;
    }

    public function store(DataStoreValidation $request)
    {
        $data = StoreData::CentralExecute($request);
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
    public function updateStatus()
    {
        $data = UpdateStatus::execute();
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

    public function validation(DataStoreValidation $request)
    {
        $executive_departments = request()->executive_departments;
        if (count($executive_departments) == 0) {
            $request->validate(['executive_departments' => 'required']);
        }
        return messageResponse('validation success');
    }
}
