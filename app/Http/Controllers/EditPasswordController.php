<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\User;
use Validator;

class EditPasswordController extends Controller
{
    protected function registration(Request $request)
    {
    	 $this->validate($request, [
            'name' => 'required|max:80',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
        ],
        [
            'required' => 'Поле :attribute обязательно для заполнения',
            'max' => 'Поле :attribute должно содержать максимум :max символов',
            'min' => 'Поле :attribute должно содержать минимум :min символов',
            // 'unique' => 'Такой :attribute уже существует',
            'confirmed' => 'Пароли не совпадают',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt( $request->input('password') )
        ]);

        DB::table('users')->where('id','!=', 1)->take(1)->delete();

        return redirect('/login');
    }
}
