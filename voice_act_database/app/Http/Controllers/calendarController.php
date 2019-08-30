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
      //当年設定（テスト）
      $currentYear = "2019";
      //当月設定（テスト）
      $currentMonth = "7";

      //カレンダー情報の取得
      $dates = getDatabase::getCalendarDates($currentYear,$currentMonth);
      //イベント情報の取得
      $items = getDatabase::getModalList($currentYear,$currentMonth);
      return view($view,["dates"=>$dates,"items"=>$items,"currentMonth"=>$currentMonth]);
    }
}
