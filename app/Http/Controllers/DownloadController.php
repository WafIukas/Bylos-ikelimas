<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    function getfile($filename){

        $fullpath = public_path('files').'/'.str_replace('"', "", $filename);

        return response()->download($fullpath);

    }
}
