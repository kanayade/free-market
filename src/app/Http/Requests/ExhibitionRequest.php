<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required|max:255',
            'image_path' => 'required|image|mimes:png,jpeg',
            'condition' => 'required|in:1,2,3,4',
            'price' => 'required|min:0|integer',
            'category_id' => 'required|array|min:1',
            'category_id.*' => 'exists:categories,id',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'description.required' => '商品説明を入力してください',
            'description.max' => '商品説明を255文字以内で入力してください',
            'image_path.required' => '商品画像を登録してください',
            'image_path.mimes' => '画像をpng,jpeg形式で貼ってください',
            'condition.required' => '状態を選択してください',
            'price.required' => '金額を入力してください',
            'category_id.required' => 'カテゴリを選択してください',
        ];
    }
}
