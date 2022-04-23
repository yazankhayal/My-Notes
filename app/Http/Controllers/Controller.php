<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function allowExIamges(){
        return "png,jpg,jpeg,PNG,JPG,JPEG,SVG,svg";
    }

    public function upload_fun($request, $dir = 'user', $ids = null)
    {
        $img = $request;
        $imageName = $ids . time() . '.' . $img->getClientOriginalExtension();
        $direction = public_path('/upload/' . $dir . '/');
        $img->move($direction, $imageName);
        return $saveImge = 'upload/' . $dir . '/' . $imageName;
    }
}
