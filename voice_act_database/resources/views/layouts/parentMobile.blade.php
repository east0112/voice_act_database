<!doctype html>
<html lang="ja">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<link href="{{ asset('/css/parent.css') }}" rel="stylesheet">

<head>
    <meta charset="UTF-8">
    <title>anju_inami Library</title>
</head>
<body>
<nav class="pink accent-2">
      <div class="nav-wrapper">
        <a href="/" class="brand-logo center">anju_inami Library</a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
          <li><a href="/">Home</a></li>
          <li><a href="/about">About</a></li>
          <li><a href="/library">Library</a></li>
        </ul>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        </ul>
      </div>
</nav>
<main>
    <div class="container">
        @yield('content')
        </div>
    </body>
</main>
<footer class="page-footer pink accent-2">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <p class="grey-text text-lighten-4">当サイトは非公式ファンサイトです。</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <ul>
                  <li><a class="grey-text text-lighten-3" href="http://smavoice.jp/"target="_blank">SMA VOICE</a></li>
                  <li><a class="grey-text text-lighten-3" href="https://anjuinami.com/"target="_blank">伊波杏樹 Official Site</a></li>
                  <li><a class="grey-text text-lighten-3" href="https://lineblog.me/anju_inami/"target="_blank">伊波杏樹 公式ブログ</a></li>
                </ul>
              </div>
            </div>
          </div>
</footer>
</html>