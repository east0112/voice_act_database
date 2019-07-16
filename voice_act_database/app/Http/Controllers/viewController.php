<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class viewController extends Controller
{
    /**
     * 一覧表示
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request){

      return "Hello World";
      /*
      return view("top.index", [
        "items" => $items
      ]);
      */
    }
}
