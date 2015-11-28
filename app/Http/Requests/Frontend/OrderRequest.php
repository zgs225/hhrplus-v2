<?php

namespace App\Http\Requests\Frontend;

use App\Http\Requests\Request;

class OrderRequest extends Request
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
            'package_good_id' => 'required|exists:package_goods,id',
            'buyer_name' => 'required|max:45',
            'buyer_email' => 'required|email',
            'buyer_telephone' => 'required',
            'smscode' => 'required|sms_check'
        ];
    }
}
