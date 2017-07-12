<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class LanguageController extends Controller
{

    public function change(Request $request)
    {
        $lang = app()->getLocale() === 'en' ? 'ru' : 'en';

        $request->session()->put('locale', $lang);

        return redirect()->back()
            ->withCookie(
                cookie(
                    'locale',
                    $lang,
                    Carbon::now()->addMonth()->diffInMinutes(
                        Carbon::now()
                    )
                )
            );
    }

}
