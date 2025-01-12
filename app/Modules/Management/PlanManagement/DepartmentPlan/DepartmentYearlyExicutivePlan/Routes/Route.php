<?php

use App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyExicutivePlan\Controller\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::prefix('department-yearly-exicutive-plans')->group(function () {
        Route::get('', [Controller::class, 'index']);
        Route::get('{slug}', [Controller::class, 'show']);
        Route::post('store', [Controller::class, 'store']);
        Route::post('update/{slug}', [Controller::class, 'update']);
        Route::post('update-status', [Controller::class, 'updateStatus']);
        Route::post('soft-delete', [Controller::class, 'softDelete']);
        Route::post('destroy/{slug}', [Controller::class, 'destroy']);
        Route::post('restore', [Controller::class, 'restore']);
        Route::post('import', [Controller::class, 'import']);
        Route::post('bulk-action', [Controller::class, 'bulkAction']);
    });

    Route::post('department-yearly-executive-plan/completion/{id}', [Controller::class, 'TaskCompletion']);
    Route::post('department-yearly-executive-plan/add-to-favourite/{id}', [Controller::class, 'AddToFavourite']);
    Route::post('department-yealy-executive-plan-add-comment', [Controller::class, 'AddComment']);
});
