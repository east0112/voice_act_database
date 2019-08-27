<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Models\common;

class calendarController extends Controller
{
    /**
     * 一覧表示
     *
     * @param Request $request
     * @return Response
     */
    public function searchDisplay(Request $request){
      //端末判定
      $view = common::getDevice($request,"calendar");

      return view($view);
    }
}
