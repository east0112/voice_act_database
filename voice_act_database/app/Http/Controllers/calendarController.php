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
      //リクエストの処理
      if($request->input("currentYear") && $request->input("currentMonth")){
        $currentYear = $request->input("currentYear");
        $currentMonth = $request->input("currentMonth");
      }else{
        //リクエストが空の場合は当月の値を設定する
        $currentYear = date("Y");
        $currentMonth = date("m");
      }

      $currentMonth = 8;
      //カレンダー情報の取得
      $dates = getDatabase::getCalendarDates($currentYear,$currentMonth);
      //イベント情報の取得
      $items = getDatabase::getModalList($currentYear,$currentMonth);

      //カレンダー情報にイベント情報をセットする
      $dayEvent = array(31);
      $dayStage = array(31);
      $dayRadio = array(31);
      $dayMedia = array(31);
      $dayProgram = array(31);

      for($i=0;$i<=31;$i++){
        $dayEvent[$i] = false;
        $dayStage[$i] = false;
        $dayRadio[$i] = false;
        $dayMedia[$i] = false;
        $dayProgram[$i] = false;
      }

      foreach($items as $item){
        if($item->type_name == "イベント"){
          $dayEvent[date("d",(strtotime($item->date)))] = true;
        }
        if($item->type_name == "舞台"){
          $dayStage[date("d",(strtotime($item->date)))] = true;
        }
        if($item->type_name == "ラジオ"){
          $dayRadio[date("d",(strtotime($item->date)))] = true;
        }
        if($item->type_name == "雑誌"){
          $dayMedia[date("d",(strtotime($item->date)))] = true;
        }
        if($item->type_name == "番組出演"){
          $dayProgram[date("d",(strtotime($item->date)))] = true;
        }
      }
      return view($view,["dates"=>$dates,"items"=>$items,"currentYear"=>$currentYear,"currentMonth"=>$currentMonth,"dayEvent"=>$dayEvent,"dayStage"=>$dayStage,"dayRadio"=>$dayRadio,"dayMedia"=>$dayMedia,"dayProgram"=>$dayProgram]);
    }
}
