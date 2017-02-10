<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class AboutController extends Controller
{
    public function about(){
        $top_menu = DB::table('top_menu')->get();

        return view('about', [
            'title' => 'Dobrotex - комфортный и качественный сон.',
            'top_menu' => $top_menu
        ]);
    }
}
