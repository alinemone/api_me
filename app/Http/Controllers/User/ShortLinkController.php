<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShortLink;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class ShortLinkController extends Controller
{

    public function index()
    {
        SEOMeta::setTitle(Lang::get('messages.seo.url'));
        return view('user/url/index');
    }

    public function redirect($hash_id)
    {
        $link = ShortLink::where(ShortLink::HASHID, $hash_id)->firstOrFail();
        return Redirect($link->{ShortLink::LINK});
    }
}
