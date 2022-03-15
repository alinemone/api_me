<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class CodeController extends Controller
{
    public function code()
    {
        SEOMeta::setTitle(Lang::get('messages.seo.code'));
        return view('user/code/code');
    }
}
