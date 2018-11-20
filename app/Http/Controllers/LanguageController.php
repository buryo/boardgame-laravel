<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /*
     * Puts locale in the session.
     * this way we can work with it in Language middleware
     */
    public function changeLanguage(Request $request)
    {
        if ($request) {
            $request->session()->put('locale', $request['locale']);
            return back();
        }
    }
}
