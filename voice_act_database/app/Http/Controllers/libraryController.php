<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Models\getDatabase;
use App\Http\Models\getEventDetail;

class libraryController extends Controller
{
    /**
     * 一覧初期表示
     *
     * @return Response
     */
    public function initDisplay(){
      //ソート設定
      $sort = "new";
      //イベント一覧情報取得
      $items = getDatabase::getList();

      return view("library",["items" => $items, "sort" => $sort ]);
    }

    /**
     * 一覧検索表示
     *
     * @param Request $request
     * @return Response
     */
    public function seacrchDisplay(Request $request){
      //リクエストの取得・検索ワード
      $searchWord = $request->input("search");
      //リクエストの取得・種類
      $type = array();
      if($request->input("checkEvent")){array_push($type,$request->input("checkEvent"));}
      if($request->input("checkStage")){array_push($type,$request->input("checkStage"));}
      if($request->input("checkRadio")){array_push($type,$request->input("checkRadio"));}
      if($request->input("checkProgram")){array_push($type,$request->input("checkProgram"));}
      if($request->input("checkMedia")){array_push($type,$request->input("checkMedia"));}
      //リクエストの取得・ソート
      $sort = $request->input("radioSort");
      //イベント一覧情報取得
      $items = getDatabase::searchList($searchWord,$type,$sort);

      return view("library",["items" => $items ,"type" => $type,"sort" => $sort]);
    }

    /**
     * 詳細情報表示
     *
     * @param Request $request
     * @return Response
     */
    public function seacrchEvent(Request $request,$id){
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

      return view("event",["eventDetail" => $eventDetail,"eventSetlist" => $eventSetlist,"eventUrl" => $eventUrl,"eventTweetSelf" => $eventTweetSelf,"eventTweetOther" => $eventTweetOther ]);
    }
}
