<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'sport_id' => 'required',
            'prefecture' => 'between:1,47',
            'title' => 'required|string|max:50',
            'event_start_date' => 'required|date|after:today',
            'event_start_time' => 'required',
            'event_end_date' => 'required|date|after:today|after_or_equal:event_start_date',
            'event_end_time' => 'required',
            'apply_end_date' => 'required|date|before:event_start_date',
            'apply_end_time' => 'required',
            'capacity' => 'required|integer|between:2,100',
            'payment' => 'required|integer',
            'venue' => 'required|max:150',
            'address' => 'required|max:150',
            'comment' => 'required|max:150',
        ];
    }

    public function messages()
    {
        return [
            'sport_id.required' => 'スポーツジャンルを選択してください',
            'prefecture.between' => '都道府県を選択してください',
            'title.required' => 'イベントタイトルを入力してください',
            'title.max' => 'イベントタイトルは50文字以内で入力してください',
            'event_start_date.required' => '開催日を入力してください',
            'event_start_date.after' => 'イベント作成日以降の日付を入力してください',
            'event_start_time.required' => '開始時刻を入力してください',
            'event_end_date.required' => '終了日を入力してください',
            'event_end_date.after' => 'イベント作成日以降の日付を入力してください',
            'event_end_date.after_or_equal' => '開催日以降の日付を入力してください',
            'event_end_time.required' => '終了時刻を入力してください',
            'apply_end_date.required' => '募集締切日を入力してください',
            'apply_end_date.before' => '開催日より前の日付を入力してください',
            'apply_end_time.required' => '募集締切時刻を入力してください',
            'capacity.required' => '定員を入力してください',
            'capacity.integer' => '定員は数字で入力してください',
            'capacity.between' => '定員は2人から100人で設定してください',
            'payment.required' => '料金を入力してください',
            'payment.integer' => '料金は数字で入力してください',
            'venue.required' => '会場名を入力してください',
            'venue.max' => '会場名は150文字以内で入力してください',
            'address.required' => '会場住所を入力してください',
            'address.max' => '会場住所は150文字以内で入力してください',
            'comment.required' => 'イベント詳細を入力してください',
            'comment.max' => 'イベント詳細は150文字以内で入力してください',
        ];
    }
}
