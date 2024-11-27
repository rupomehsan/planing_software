<?php

namespace App\Modules\Management\PlanBudgetManagement\PlanBudget\Validations;

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
            'central_yearly_executive_plan_id' => 'required | sometimes',
            'department_yearly_plan_id' => 'required | sometimes',
            'department_yearly_executive_plan_id' => 'required | sometimes',
            'department_id' => 'required | sometimes',
            'department_section_id' => 'required | sometimes',
            'department_sub_section_id' => 'required | sometimes',
            'date' => 'required | sometimes',
            'rating' => 'required | sometimes',
            'amount' => 'required | sometimes',
            'type' => 'required | sometimes',
            'plan_budget_category_id' => 'required | sometimes',
            'plan_budget_sub_category_id' => 'required | sometimes',
            'status' => ['sometimes', Rule::in(['active', 'inactive'])],
        ];
    }
}