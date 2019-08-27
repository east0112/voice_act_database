<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Models\getDatabase;
use App\Http\Models\getEventDetail;
use App\Http\Models\common;

class libraryController extends Controller
{
    /**
     * 一覧初期表示
     *
     * @param Request $request
     * @return Response
     */
    public function initDisplay(Request $request){
      //端末判定
      $view = common::getDevice($request,"library");
      //リクエストの取得・検索ワード
      $searchWord = $request->input("search");
      //リクエストの取得・種類
      $type = array();
      if($request->input("checkEvent")){array_push($type,$request->input("checkEvent"));}
      if($request->input("checkStage")){array_push($type,$request->input("checkStage"));}
      if($request->input("checkRadio")){array_push($type,$request->input("checkRadio"));}
      if($request->input("checkProgram")){array_push($type,$request->input("checkProgram"));}
      if($request->input("checkMedia")){array_push($type,$request->input("checkMedia"));}
      //リクエストの取得・日付指定
      $dateFrom = $request->input("dateFrom");
      $dateTo = $request->input("dateTo");
      //リクエストの取得・ソート
      //$radioDesc = $request->input("radioDesc");
      //$radioAsc = $request->input("radioAsc");
      //if($request->input("radioAsc") == "checked"){
      //  $radioSort = "old";
      //}else{
      //  $radioSort = "new";
      //}
      $radioSort = $request->input("radioSort");
      //イベント一覧情報取得
      $items = getDatabase::searchList($searchWord,$type,$radioSort,$dateFrom,$dateTo);

      //ページネーションの検索条件保持用
      $param = array("type" => $type,"radioSort" => $radioSort,"searchWord" => $searchWord,"dateFrom" => $dateFrom,"dateTo" => $dateTo);

      return view($view,["items" => $items ,"type" => $type,"radioSort" => $radioSort,"searchWord" => $searchWord,"dateFrom" => $dateFrom,"dateTo" => $dateTo,"param"=> $param ]);
    }


    /* 未使用関数 */
    /**
     * 一覧検索表示
     *
     * @param Request $request
     * @return Response
     */
    public function seacrchDisplay(Request $request){
      //端末判定
      $view = common::getDevice($request,"library");
      //リクエストの取得・検索ワード
      $searchWord = $request->input("search");
      //リクエストの取得・種類
      $type = array();
      if($request->input("checkEvent")){array_push($type,$request->input("checkEvent"));}
      if($request->input("checkStage")){array_push($type,$request->input("checkStage"));}
      if($request->input("checkRadio")){array_push($type,$request->input("checkRadio"));}
      if($request->input("checkProgram")){array_push($type,$request->input("checkProgram"));}
      if($request->input("checkMedia")){array_push($type,$request->input("checkMedia"));}
      //リクエストの取得・日付指定
      $from = $request->input("dateFrom");
      $to = $request->input("dateTo");
      //リクエストの取得・ソート
      $sort = $request->input("radioSort");
      //イベント一覧情報取得
      $items = getDatabase::searchList($searchWord,$type,$sort,$from,$to);

      return view($view,["items" => $items ,"type" => $type,"sort" => $sort,"searchWord" => $searchWord,"from" => $from,"to" => $to ]);
    }

    /**
     * 詳細情報表示
     *
     * @param Request $request
     * @return Response
     */
    public function seacrchEvent(Request $request,$id){
      //端末判定
      $view = common::getDevice($request,"event");
      //イベント詳細情報取得
      $eventDetail = getEventDetail::getDetail($id);
      //イベントセットリスト取得
      $eventSetlist = getEventDetail::getSetlist($id);
      //イベント関連URL取得
      $eventUrl = getEventDetail::getUrl($id);
      //イベント関連本人ツイート取得
      $eventTweetSelf = getEventDetail::getTweetSelf($id);
      //イベント関連関係者ツイート取得
      $eventTweetOther = getEventDetail::getTweetOther($id);

      return view($view,["eventDetail" => $eventDetail,"eventSetlist" => $eventSetlist,"eventUrl" => $eventUrl,"eventTweetSelf" => $eventTweetSelf,"eventTweetOther" => $eventTweetOther ]);
    }
}
