<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class getDatabase
{
    /**
     * 一覧表示用データの取得（初期）
     *
     * @return items $items
     */
    public static function getList(){

      $items = DB::table("events")
        ->join("event_type","events.event_type","=","event_type.type_id")
        ->orderByRaw("events.date DESC")
        ->orderByRaw("events.start_time DESC")
        ->get();
      return $items;
    }
    /**
     * 一覧表示用データの取得（検索）
     *
     * @return items $items
     */
    public static function searchList($searchWord,$type){
        if($searchWord){
            if(empty($type)){
                $items = DB::table("events")
                    ->join("event_type","events.event_type","=","event_type.type_id")
                    ->where("events.event_name","LIKE","%".$searchWord."%")
                    ->orderByRaw("events.date DESC")
                    ->orderByRaw("events.start_time DESC")
                    ->get();
                return $items;
            }else{
                $items = DB::table("events")
                    ->join("event_type","events.event_type","=","event_type.type_id")
                    ->where("events.event_name","LIKE","%".$searchWord."%")
                    ->whereIn("events.event_type",$type)
                    ->orderByRaw("events.date DESC")
                    ->orderByRaw("events.start_time DESC")
                    ->get();
                return $items;
            }
        }else{
            if(empty($type)){
                $items = DB::table("events")
                    ->join("event_type","events.event_type","=","event_type.type_id")
                    ->orderByRaw("events.date DESC")
                    ->orderByRaw("events.start_time DESC")
                    ->get();
                return $items;
            }else{
                $items = DB::table("events")
                    ->join("event_type","events.event_type","=","event_type.type_id")
                    ->whereIn("events.event_type",$type)
                    ->orderByRaw("events.date DESC")
                    ->orderByRaw("events.start_time DESC")
                    ->get();
                return $items;
            }
        }
      }
  }
