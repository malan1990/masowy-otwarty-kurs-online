<?php

namespace Laravast\Http\Controllers;

use SEO;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setSeo($title, $description) {
        SEO::setTitle($title);
        SEO::setDescription($description);
        SEO::opengraph()->setUrl(request()->url());
        SEO::setCanonical(request()->url());
        SEO::opengraph()->addProperty('type', 'screencasts');
        SEO::twitter()->setSite('@serenissima');
    }
}
