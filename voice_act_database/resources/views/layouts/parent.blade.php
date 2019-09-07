<!doctype html>
<html lang="ja">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:type" content="website"/>
<meta property="og:description" content="声優・舞台女優として活躍する伊波杏樹さんのイベントやラジオ、雑誌等の出演情報をまとめた非公式ファンサイトです。"/>
<meta property="og:site_name" content="inaminfo"/>
<meta property="og:image" content="images/home001.png"/>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.1.1/css/hover.css">

<link href="{{ asset('/css/pc/parent.css') }}" rel="stylesheet">
<link href="{{ asset('/css/common.css') }}" rel="stylesheet">
<script src="{{ asset('/js/parent.js') }}"></script>

<head>
    <meta charset="UTF-8">
    <title>inaminfo</title>
</head>
<body>
<!--mobile nav-menu-->
<p id="page-top"><a href="#wrap">PAGE TOP</a></p>
<div class="mobile-nav">
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
        <!--<a class="js-mobile-nav-close mobile-nav-close">閉じる</a>-->
        </div>
    </div>
</div>
<!--mobile nav-menu-->

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed js-mobile-nav-click" data-toggle="collapse"">
        <span class="menu-trigger">
        <span></span>
        <span></span>
        <span></span>
        </span>
        <!--
        <span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
        <span class="icon-bar"></span>
        -->
			</button>
			<a class="navbar-brand" href="/">
				inaminfo
			</a>
		</div>
		<div class="collapse navbar-collapse" id="navbarEexample7">
			<ul class="nav navbar-nav">
				<li class="<?php if( $_SERVER['REQUEST_URI'] == "/") echo "active"; ?>"><a href="/">HOME</a></li>
				<li class="<?php if( strpos($_SERVER['REQUEST_URI'],"/about") !== false)  echo "active"; ?>""><a href="/about">ABOUT</a></li>
				<li class="<?php if( strpos($_SERVER['REQUEST_URI'],"/library") !== false)  echo "active"; ?>""><a href="/library">LIBRARY</a></li>
				<li class="<?php if( strpos($_SERVER['REQUEST_URI'],"/calendar") !== false)  echo "active"; ?>""><a href="/calendar">CALENDAR</a></li>
			</ul>
		</div>
	</div>
</nav>
<main>
      <div class="container">
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
</html>