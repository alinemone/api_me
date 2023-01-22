<?php

namespace App\Http\Controllers\User\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShortLinkRequest;
use App\Models\ShortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    public function UrlShortener(ShortLinkRequest $request)
    {

        $link = ShortLink::firstOrNew(
            [ShortLink::LINK => $request->post('url')],
            [ShortLink::HASHID => $this->getRandomString(6)]
        );

        $link->save();

        return url('') .'/'. $link->{ShortLink::HASHID};
    }

    function getRandomString($length)
    {
        $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str), 0, $length);
    }
}
