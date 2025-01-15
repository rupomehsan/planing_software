<?php

namespace App\Modules\Management\PlanDependency\PlanDepSession\Actions;

class UpdateData
{
    static $model = \App\Modules\Management\PlanDependency\PlanDepSession\Models\Model::class;

    public static function execute($request, $slug)
    {
        try {
            if (!$data = self::$model::query()->where('slug', $slug)->first()) {
                return messageResponse('Data not found...', $data, 404, 'error');
            }

            self::set_serial($request, $data);
            return messageResponse('Item updated successfully', $data, 201);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }

    public static function set_serial($request, $data)
    {
        if ($data->serial >= request()->serial) {
            $data->update($request->validated());
            $nextdata = self::$model::query()->select('id', 'serial')->where('serial', '>=', $data->serial)
                ->where('id', '!=', $data->id)
                ->orderBy('serial', 'asc')
                ->get();
            $serialNumber = $data->serial + 1;
            foreach ($nextdata as $key => $value) {
                $value->serial = $serialNumber++;
                $value->save();
            }
        }

        if ($data->serial < request()->serial) {
            $oldSerial = $data->serial;
            $newSerial = request()->serial;
            $data->update(['serial' => null]);
            self::$model::query()
                ->whereBetween('serial', [$oldSerial + 1, $newSerial])
                ->decrement('serial');
            $data->serial = $newSerial;
            $data->save();
        }
    }
}
