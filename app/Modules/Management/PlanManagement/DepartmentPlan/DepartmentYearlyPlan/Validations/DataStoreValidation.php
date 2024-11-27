<?php

namespace App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class DataStoreValidation extends FormRequest
{
    /**
     * Determine if the  is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    /**
     * validateError to make this request.
     */
    public function validateError($data)
    {
        $errorPayload =  $data->getMessages();
        return response(['status' => 'validation_error', 'errors' => $errorPayload], 422);
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->validateError($validator->errors()));
        if ($this->wantsJson() || $this->ajax()) {
            throw new HttpResponseException($this->validateError($validator->errors()));
        }
        parent::failedValidation($validator);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'central_yearly_plan_id' => 'required | sometimes',
            'plan_dep_dofas_id' => 'required | sometimes',
            'plan_dep_orjitobbo_target_id' => 'required | sometimes',
            'title' => 'required | sometimes',
            'serial_no' => 'required | sometimes',
            'description' => 'required | sometimes',
            'previous_unfinished_parcent' => 'required | sometimes',
            'rating' => 'required | sometimes',
            'is_published' => 'required | sometimes',
            'is_approved' => 'required | sometimes',
            'status' => ['sometimes', Rule::in(['active', 'inactive'])],
        ];
    }
}