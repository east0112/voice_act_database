<?php

namespace App\Http\Models;

class common
{
    /**
     * 端末情報からURL生成
     *
     * @param $request
     * @return string
     */
    public static function getDevice($request,$url){
      $user_agent = $request->header('User-Agent');
      if ((strpos($user_agent, 'iPhone') == true)
            || (strpos($user_agent, 'Android') == true)) {
        return '/mobile/'.$url;
      } else {
        return '/pc/'.$url;
      }
    }
  }
