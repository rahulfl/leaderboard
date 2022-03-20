<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreGameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date'=>'required',
            'player1_id'=>'required|numeric',
            'player1_color'=>'required',
            'player2_id'=>'required|numeric',
            'player2_color'=>'required',
            'win'=>'required|numeric',
            'winner_player_id'=>'required_if:win,1',
            'moves'=>'required|numeric',
        ];
    }
}
