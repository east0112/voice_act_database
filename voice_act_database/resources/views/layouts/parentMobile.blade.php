<!doctype html>
<html lang="ja">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<link href="{{ asset('/css/mobile/parent.css') }}" rel="stylesheet">
<script src="{{ asset('/js/parent.js') }}"></script>

<head>
    <meta charset="UTF-8">
    <title>inaminfo</title>
</head>
<body>
<nav class="pink accent-2">
  <div class="nav-wrapper">
          <div class="ncontent">
            <a href="/" class="brand-logo center"><img src="{{ asset('images/logo.png') }}" alt="inaminfo" /></a>
            <a href="/" data-activates="mobile-demo" class="button-collapse"><i class="large material-icons large-size">menu</i></a>
          </div>
            <ul class="right hide-on-med-and-down">
              <li><a href="/">Home</a></li>
              <li><a href="/about">About</a></li>
              <li><a href="/library">Library</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
            <div class="pink accent-1">
            <br>
            </div>
            <ul class="collection">
                    <a href="/" class="collection-item" style ="font-size:30px;height:120px;line-height: 95px;">
                    <div class="row">
                      <div class="col s2">
                      <i class="material-icons menu">home</i>
                      </div>
                      <div class="col s10">
                      トップページ
                      </div>
                    </div>
                    </a>
                    <a href="/about" class="collection-item" style ="font-size:30px;height:120px;line-height: 95px;">
                    <div class="row">
                      <div class="col s2">
                      <i class="material-icons menu">info</i>
                      </div>
                      <div class="col s10">
                      当サイトについて
                      </div>
                    </div>
                    </a>
                    <a href="/library" class="collection-item" style ="font-size:30px;height:120px;line-height: 95px;">
                    <div class="row">
                      <div class="col s2">
                      <i class="material-icons menu">library_books</i>
                      </div>
                      <div class="col s10">
                      データベース
                      </div>
                    </div>
                    </a>
              </ul>
            </ul>
  </div>
</nav>
<main>
        @yield('content')
        </main>
    </body>
<footer class="page-footer pink accent-2">
          <div class="container" style ="font-size:25px">
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