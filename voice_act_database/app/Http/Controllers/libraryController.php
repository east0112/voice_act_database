<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Models\getDatabase;

class libraryController extends Controller
{
    /**
     * 一覧初期表示
     *
     * @return Response
     */
    public function initDisplay(){

      $items = getDatabase::getList();
      return view("library",["items" => $items ]);
    }


    /**
     * 一覧検索表示
     *
     * @param Request $request
     * @return Response
     */
    public function seacrchDisplay(Request $request){
      //リクエストの取得
      $searchWord = $request->input("search");
      $type = array();
      if($request->input("checkEvent")){array_push($type,$request->input("checkEvent"));}
      if($request->input("checkRadio")){array_push($type,$request->input("checkRadio"));}
      if($request->input("checkProgram")){array_push($type,$request->input("checkProgram"));}
      if($request->input("checkMedia")){array_push($type,$request->input("checkMedia"));}

      $items = getDatabase::searchList($searchWord,$type);
      return view("library",["items" => $items ,"type" => $type]);
    }

}
