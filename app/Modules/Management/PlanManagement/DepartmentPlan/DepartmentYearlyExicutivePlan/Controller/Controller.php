<?php

namespace App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Controller;

use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Actions\GetAllData;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Actions\DestroyData;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Actions\GetSingleData;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Actions\StoreData;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Actions\UpdateData;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Actions\UpdateStatus;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Actions\SoftDelete;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Actions\RestoreData;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Actions\ImportData;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Validations\BulkActionsValidation;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Validations\DataStoreValidation;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Actions\BulkActions;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Actions\TaskCompletion;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Actions\AddComment;
use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Actions\AddToFavourite;
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
    public function TaskCompletion($id)
    {
        $data = TaskCompletion::execute($id);
        return $data;
    }
    public function AddComment()
    {
        $data = AddComment::execute();
        return $data;
    }
    public function AddToFavourite()
    {
        $data = AddToFavourite::execute();
        return $data;
    }
}
