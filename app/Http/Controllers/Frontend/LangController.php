<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LangController extends Controller
{
    public function change($lang)
    {
    	if (! in_array($lang, ['zh', 'en', 'jp'])) {
    		$lang = 'zh';
    	}    		

    	session()->put('language', $lang);

		return redirect()->back();
    }
}
