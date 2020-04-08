<?php

namespace App\Http\Requests\admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = isset($this->user) ? ','.$this->user.',' : '';
        return [
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required|min:8',
            'identity_card' => 'required|unique:users,identity_card'.$id,
            'address' => 'max:255',
            'gender' => 'required',
            'role' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => trans('admin.users.rules.required'),
            'name.max' => trans('admin.users.rules.max'),
            'email.required' => trans('admin.users.rules.required'),
            'password.required' => trans('admin.users.rules.required'),
            'password.min' => trans('admin.users.rules.min'),
            'identity_card.required' => trans('admin.users.rules.required'),
            'identity_card.unique' => trans('admin.users.rules.unique'),
            'address.max' => trans('admin.users.rules.max'),
            'gender.required' => trans('admin.users.rules.required'),
            'role.required' => trans('admin.users.rules.required'),
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        // throw (new ValidationException($validator))
        //             ->errorBag($this->errorBag)
        //             ->redirectTo($this->getRedirectUrl());
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json([
                "success" => false,
                "error" => true,
                "status" => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                "message" => @trans('foods.basic-infos.create_fails'),
                "data" => [
                    'errors' => $errors
                ]
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
