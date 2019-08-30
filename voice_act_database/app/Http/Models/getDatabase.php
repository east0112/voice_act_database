<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class getDatabase
{
    /**
     * 一覧表示用データの取得（トップ画面・当月データ検索）
     *
     * @return items $items
     */
    public static function getListThisMonth(){

      $items = DB::table("events")
        ->join("event_type","events.event_type","=","event_type.type_id")
        ->whereYear("events.date","=",date("Y"))
        ->whereMonth("events.date","=",date("m"))
        ->orderByRaw("events.date ASC")
        ->orderByRaw("events.start_time ASC")
        ->get();
      return $items;
    }
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
        //実験用
        ->paginate(5);
        //->get();
      return $items;
    }
    /**
     * 一覧表示用データの取得（検索）
     *
     * @return items $items
     */
    public static function searchList($searchWord,$type,$sort,$from,$to){
        $items = DB::table("events")
            ->join("event_type","events.event_type","=","event_type.type_id")
            ->when($searchWord, function ($query) {
              return $query->leftjoin("acts","events.act_id","=","acts.act_id");
            })
            ->when($searchWord, function ($query) use($searchWord) {
                return $query->where("events.event_name","LIKE","%".$searchWord."%");
            })
            ->when($searchWord, function ($query) use($searchWord) {
              return $query->orwhere("acts.act_name","LIKE","%".$searchWord."%");
            })
            ->when(!empty($type), function ($query) use($type) {
                return $query->whereIn("events.event_type",$type);
            })
            ->when($from, function ($query) use($from) {
              return $query->whereDate("events.date",">=",$from);
            })
            ->when($to, function ($query) use($to) {
              return $query->whereDate("events.date","<=",$to);
            })
            ->when($sort == "", function ($query) use($type) {
              return $query->orderByRaw("events.date DESC");
            })
            ->when($sort == "old", function ($query) use($type) {
              return $query->orderByRaw("events.date ASC");
            })
            ->orderByRaw("events.start_time DESC")
            //実験用
            ->paginate(5);
            //->get();
        return $items;
    }
    /**
     * カレンダーの取得（検索）
     *
     * @return dates $dates
     */

    public static function getCalendarDates($year, $month)
    {
        $dateStr = sprintf('%04d-%02d-01', $year, $month);
        $date = new Carbon($dateStr);
        // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
        $date->subDay($date->dayOfWeek);
        // 同上。右下の隙間のための計算。
        $count = 31 + $date->dayOfWeek;
        $count = ceil($count / 7) * 7;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDay()) {
            // copyしないと全部同じオブジェクトを入れてしまうことになる
            $dates[] = $date->copy();
        }
        return $dates;
    }
    /**
     * モーダル画面表示用データの取得（カレンダー検索）
     *
     * @return items $items
     */
    public static function getModalList($year,$month){

      $items = DB::table("events")
        ->join("event_type","events.event_type","=","event_type.type_id")
        ->whereYear("events.date","=",$year)
        ->whereMonth("events.date","=",$month)
        ->orderByRaw("events.date ASC")
        ->orderByRaw("events.start_time ASC")
        ->get();
      return $items;
    }

  }
