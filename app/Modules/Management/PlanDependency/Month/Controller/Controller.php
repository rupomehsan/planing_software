<?php

namespace App\Modules\Management\PlanDependency\Month\Controller;
use App\Modules\Management\PlanDependency\Month\Actions\GetAllData;
use App\Modules\Management\PlanDependency\Month\Actions\DestroyData;
use App\Modules\Management\PlanDependency\Month\Actions\GetSingleData;
use App\Modules\Management\PlanDependency\Month\Actions\StoreData;
use App\Modules\Management\PlanDependency\Month\Actions\UpdateData;
use App\Modules\Management\PlanDependency\Month\Actions\UpdateStatus;
use App\Modules\Management\PlanDependency\Month\Actions\SoftDelete;
use App\Modules\Management\PlanDependency\Month\Actions\RestoreData;
use App\Modules\Management\PlanDependency\Month\Actions\ImportData;
use App\Modules\Management\PlanDependency\Month\Validations\BulkActionsValidation;
use App\Modules\Management\PlanDependency\Month\Validations\DataStoreValidation;
use App\Modules\Management\PlanDependency\Month\Actions\BulkActions;
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
    public function updateStatus()
    {
        $data = UpdateStatus::execute($request, $slug);
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