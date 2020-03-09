<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class addUserController extends FormRequest
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
            'user' => 'required|email',
            'pin' => 'required|max:6|min:6',
            'password' => 'required',
            'checkpass' => 'required|same:password',
        ];
    }
    public function messages(){
        return [
            'user.required' => 'Vui lòng nhập lại tên email',
            'pin.required' => 'Chưa nhập mã xác nhận',
            'pin.max' => 'Mã xác nhận không hợp lệ',
            'pin.min' => 'Mã xác nhận không hợp lệ',
            'password.required' => 'Chưa đặt mật khẩu',
            'checkpass.required' => 'Vui lòng nhập lại mật khẩu',
            'checkpass.same' => 'Mật khẩu nhập lại không khớp',
        ];
    }
}
