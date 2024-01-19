<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class ImagesDataComposer
{
    public function compose(View $view)
    {
       $images = DB ::table('images')->pluck('image_link', 'ref_id');
        $view->with('images', $images);
    }
}












?>
