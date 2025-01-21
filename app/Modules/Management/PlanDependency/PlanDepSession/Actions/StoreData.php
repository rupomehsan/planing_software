<?php

namespace App\Modules\Management\PlanDependency\PlanDepSession\Actions;

class StoreData
{
    static $model = \App\Modules\Management\PlanDependency\PlanDepSession\Models\Model::class;

    public static function execute($request)
    {
        try {
            $requestData = $request->validated();
            if ($data = self::$model::query()->create($requestData)) {
                self::set_serial($data);
                return messageResponse('Item added successfully', $data, 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }

    public static function set_serial($data)
    {

        $requestedSerial = $data->serial;
        self::$model::query()
            ->where('serial', '>=', $requestedSerial)
            ->where('id', '!=', $data->id)
            ->increment('serial');

        $data->serial = $requestedSerial;
        $data->save();
    }
}
