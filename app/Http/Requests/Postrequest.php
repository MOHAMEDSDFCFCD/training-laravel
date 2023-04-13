<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Postrequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'posts_id'=>'required|max:100|numeric',
            'title'=>'required|unique:posts,title',
            'body'=>'required',
            'photo'=>'required|max:1000|mimes:png,jpg,jpeg'
        
        ];
            //
        
    }
    public function messages()
    {
        return [
            'posts_id.required'=>trans(key:'you should enter post_id'),
            'title.required'=>trans(key:'you should enter title'),
            'body.required'=>'you should enter body',
            'posts_id.numeric'=>'please,enter number',
            'title.unique'=>'you should anthor title because it used'
        ];
            //
        
    }
}
