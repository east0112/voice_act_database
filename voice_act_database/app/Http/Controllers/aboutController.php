<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Models\common;

class aboutController extends Controller
{
    /**
     * 一覧表示
     *
     * @param Request $request
     * @return Response
     */
    public function about(Request $request){
      //端末判定
      $view = common::getDevice($request,"about");

      return view($view);
    }
}
