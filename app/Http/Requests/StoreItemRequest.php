<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
          'name' => 'required|max:255',
          'description' => 'nullable|max:2000',
          'actual_price' => 'required|numeric',
          'sale_price' => 'required|numeric',
          'offer_start_date' => 'required',
          'offer_end_date' => 'required',
          'quantity' => 'integer',
          'offer_description' => 'max:2000',
          'brand_name' => 'required|max:255',
          'product_origin_page' => 'nullable|url|unique:items',
          'catagory' => 'required|max:255',
          'sub_catagory_1' => 'required|max:255',
          'sub_catagory_2' => 'required|max:255',
          'sub_catagory_2' => 'required|max:255',
          'keywords' => '',
          'is_featured' => 'required|boolean'

      ];
    }
}
