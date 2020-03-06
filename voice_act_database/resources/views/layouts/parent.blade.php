<!doctype html>
<html lang="ja">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="伊波杏樹さんの出演情報をまとめた非公式ファンサイトです。"/>
<meta name="keywords" content="SMA声優, SMA VOICE,ファンクラブ">
<meta property="og:type" content="website"/>
<meta property="og:description" content="伊波杏樹さんの出演情報をまとめた非公式ファンサイトです。"/>
<meta property="og:site_name" content="inaminfo"/>
<meta property="og:image" content="{{ asset('/images/home001.png') }}"/>
<meta property="og:locale" content="ja_JP" />
<meta property="og:type" content="website" />
<meta name="twitter:card" content="summary"/>
<meta name="twitter:title" content="inaminfo"/>
<meta name="twitter:description" content="伊波杏樹さんの出演情報をまとめた非公式ファンサイトです。"/>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.1.1/css/hover.css">

<!--<link href="{{ asset('/css/pc/parent.css') }}" rel="stylesheet">-->
<!--<link href="{{ asset('/css/common.css') }}" rel="stylesheet">-->
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<script src="{{ asset('/js/parent.js') }}"></script>

<head>
    <meta charset="UTF-8">
    <title>inaminfo</title>
</head>
<body>
<!--mobile nav-menu-->
<!-- <p id="page-top"><a href="#wrap">PAGE TOP</a></p> -->
<div id="app">
  <header-component></header-component>
<!--  <div class="mobile-nav">
      <div class="mobile-nav-bg js-mobile-nav-close"></div>
          <div class="mobile-nav-content">
              <div class="row">
                <a href="/"><div class="nav-item nav-item-1 <?php if( $_SERVER['REQUEST_URI'] == "/") echo "active"; ?>">
                <p>HOME</p>
                </div></a><br />
                <a href="/about"><div class="nav-item nav-item-2 <?php if( strpos($_SERVER['REQUEST_URI'],"/about") !== false)  echo "active"; ?>">
                <p>ABOUT</p>
                </div></a><br />
                <a href="/library"><div class="nav-item nav-item-3 <?php if( strpos($_SERVER['REQUEST_URI'],"/library") !== false)  echo "active"; ?>">
                <p>LIBRARY</p>
                </div></a><br />
                <a href="/calendar"><div class="nav-item nav-item-4 <?php if( strpos($_SERVER['REQUEST_URI'],"/calendar") !== false)  echo "active"; ?>">
                <p>CALENDAR</p>
                </div></a>
              </div>
          </div>
      </div>
  </div>
-->
  <!--mobile nav-menu-->

  <main>
        <div id="container">
          @yield('content')
          </div>
      </body>
  </main>
  <div class="page-footer">
    <div class="container">
      </br>
      <div class="row">
        <div class="col-md-8">
          <p>当サイトは非公式ファンサイトです。</p>
        </div>
        <div class="col-md-4">
          <div class="list-group">
            <a  href="http://smavoice.jp/" target="_blank">SMA VOICE</a>
            </br>
            <a  href="https://anjuinami.com/" target="_blank">伊波杏樹 Official Site</a>
            </br>
            <a  href="https://lineblog.me/anju_inami/" target="_blank">伊波杏樹 公式ブログ</a>
          </div>
        </div>
      </div>
      </br>
    </div>
  </div>
</div>
<script src=" {{ mix('js/app.js') }} "></script>
</html>