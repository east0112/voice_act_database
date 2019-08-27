<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Models\common;
use App\Http\Models\getDatabase;

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
      //当月設定
      $currentMonth = "8";

      //カレンダー情報の取得
      $dates = getDatabase::getCalendarDates("2019",$currentMonth);

      return view($view,["dates"=>$dates,"currentMonth"=>$currentMonth]);
    }
}
