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

        $link = ShortLink::create([
            ShortLink::HASHID => $this->getRandomString(6),
            ShortLink::LINK => $request->post('url'),

        ]);

        return url('') .'/'. $link->{ShortLink::HASHID};
    }

    function getRandomString($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}
