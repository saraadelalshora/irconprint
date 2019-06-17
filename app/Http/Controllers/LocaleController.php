<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class LocaleController extends Controller
{
    public function set_lang($locale)
    {
        if (in_array($locale, Config::get('app.languages'))) {
            Session::put('locale', $locale);
        }
        return redirect()->back();
    }
}
