<?php

namespace App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Controller;

use App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Actions\GetAllData;
use App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Actions\DestroyData;
use App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Actions\GetSingleData;
use App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Actions\StoreData;
use App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Actions\UpdateData;
use App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Actions\UpdateStatus;
use App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Actions\SoftDelete;
use App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Actions\RestoreData;
use App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Actions\ImportData;
use App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Validations\BulkActionsValidation;
use App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Validations\DataStoreValidation;
use App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Actions\BulkActions;
use App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Actions\GetAllOrjitobboTargetByDofaId;
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
}
