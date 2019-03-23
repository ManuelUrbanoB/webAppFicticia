<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
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
        return [
            'name',
            'last_name_one',
            'last_name_two',
            'cc_user',
            'born_date',
            'gender',
            'entry_date',
            'employee_number',
            'role',
            'number_boss',
            'zone',
            'municipality',
            'department',
            'sales',
            'email',
            'url_img',
            'cel_phone',
            'password',

        ];
    }
}