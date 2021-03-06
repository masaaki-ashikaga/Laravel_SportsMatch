<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name' => 'required|max:50',
            'detail' => 'required|max:150',
            'area' => 'required',
            'sport_id' => 'required',
            'main_imgpath' => 'required',
            'sub_imgpath' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'チーム名を入力してください',
            'name.max' => 'チーム名は50文字以内で入力してください',
            'detail.required' => 'チーム紹介文を入力してください',
            'detail.max' => 'チーム紹介文は150文字以内で入力してください',
            'area.required' => '都道府県を選択してください',
            'sport_id.required' => 'スポーツジャンルを選択してください',
            'main_imgpath.required' => 'メイン画像を選択してください',
            'sub_imgpath.required' => 'サブ画像を選択してください',
        ];
    }
}
