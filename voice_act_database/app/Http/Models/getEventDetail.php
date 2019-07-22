<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class getEventDetail
{
    /**
     * 詳細表示用データの取得（イベント情報）
     *
     * @param String $eventId
     * @return array $eventDetail
     */
    public static function getDetail(String $eventId){

      $eventDetail = DB::table("events")
        ->join("event_type","events.event_type","=","event_type.type_id")
        ->leftjoin("acts","events.act_id","=","acts.act_id")
        ->leftjoin("places","events.place_id","=","places.place_id")
        ->where("events.event_id","=",$eventId)
        ->first();
      return $eventDetail;
    }
    /**
     * 詳細表示用データの取得（セットリスト）
     *
     * @param String $eventId
     * @return array $eventSetlist
     */
    public static function getSetlist(String $eventId){

      $eventSetlist = DB::table("event_song")
        ->join("songs","event_song.song_id","=","songs.song_id")
        ->where("event_song.event_id","=",$eventId)
        ->orderByRaw("event_song.turn ASC")
        ->get();
      return $eventSetlist;
    }
    /**
     * 詳細表示用データの取得（関連サイト）
     *
     * @param String $eventId
     * @return array $eventUrl
     */
    public static function getUrl(String $eventId){

      $eventUrl = DB::table("event_url")
        ->where("event_url.event_id","=",$eventId)
        ->get();
      return $eventUrl;
    }
    /**
     * 詳細表示用データの取得（本人ツイート）
     *
     * @param String $eventId
     * @return array $eventTweetSelf
     */
    public static function getTweetSelf(String $eventId){

      $eventTweetSelf = DB::table("event_tweet_self")
        ->where("event_tweet_self.event_id","=",$eventId)
        ->orderByRaw("event_tweet_self.turn ASC")
        ->get();
      return $eventTweetSelf;
    }
  }
