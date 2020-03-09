<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addOrderRequest extends FormRequest
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
            'fullName' => 'required',
            'numberPhone' =>'required',
            'district' => 'required',
            'province' => 'required',
            'town' => 'required',
            'payment' => 'required',
            'house' =>'required',
        ];
    }
    public function messages(){
        return[
            'fullName.required' => 'Vui lòng điền tên của bạn',
            'numberPhone.required' => 'Nhập số điện thoại',
            'district.required' => 'Vui lòng chọn quận/huyện',
            'province.required' => 'Vui lòng chọn tỉnh\Thành phố',
            'town.required' => 'Vui lòng chọn phường\Thị xã',
            'house.required' => 'vui lòng cung cấp tên đường số nhà',
            'payment.required' => 'Chọn phương thức thanh toán',
        ];
    }
}
