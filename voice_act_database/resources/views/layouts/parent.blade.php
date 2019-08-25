<!doctype html>
<html lang="ja">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
<link href="{{ asset('/css/pc/parent.css') }}" rel="stylesheet">
<script src="{{ asset('/js/parent.js') }}"></script>

<head>
    <meta charset="UTF-8">
    <title>inaminfo</title>
</head>
<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample7">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				inaminfo
			</a>
		</div>
		<div class="collapse navbar-collapse" id="navbarEexample7">
			<ul class="nav navbar-nav">
				<li class="<?php if( $_SERVER['REQUEST_URI'] == "/") echo "active"; ?>"><a href="/">Home</a></li>
				<li class="<?php if( strpos($_SERVER['REQUEST_URI'],"/about") !== false)  echo "active"; ?>""><a href="/about">About</a></li>
				<li class="<?php if( strpos($_SERVER['REQUEST_URI'],"/library") !== false)  echo "active"; ?>""><a href="/library">Library</a></li>
				<li class="<?php if( strpos($_SERVER['REQUEST_URI'],"/calendar") !== false)  echo "active"; ?>""><a href="/Calendar">Calendar</a></li>
			</ul>
		</div>
	</div>
</nav>
<main>
    <div class="container main-contant">
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