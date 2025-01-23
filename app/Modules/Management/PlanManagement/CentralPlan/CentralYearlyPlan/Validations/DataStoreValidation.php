<?php

namespace App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Validations;

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
            'serial_no' => 'required | sometimes',
            'plan_dep_session.id' => 'required | sometimes',
            'plan_dep_dofa.id' => 'required | sometimes',
            'plan_dep_orjitobbo_target.id' => 'required | sometimes',
           'executive_departments' => 'required | sometimes| array| min:1',
            'previous_unfinished_parcent' => 'required | sometimes',
            'title' => 'required | sometimes',
            'description' => 'required | sometimes',
            'status' => ['sometimes', Rule::in(['active', 'inactive'])],
        ];
    }

    public function messages()
    {
        return [
            'plan_dep_session.id.required' => 'Session is required',
            'plan_dep_dofa.id.required' => 'Dofa is required',
            'plan_dep_orjitobbo_target.id.required' => 'Orjitobbo target is required',
        ];
    }
}
