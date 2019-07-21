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
  }
