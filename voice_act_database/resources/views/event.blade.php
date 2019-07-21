<link href="/css/event.css" rel="stylesheet" type="text/css">

@extends("layouts.parent")
@section("content")
<div class="row">
    <div class="col s10 push-s1">
        <div class="card">
            <div class="card-content">
            <span class="card-title">{{$eventDetail->event_name}}</span>
            <table>
                <tbody>
                        <tr>
                            <th class="thcol">日時</th>
                            <td class="tdcol">{{$eventDetail->date}} {{$eventDetail->start_time}}</td>
                        </tr>
                        <tr class="detail">
                            <th class="thcol">種類</th>
                            <td class="tdcol">{{$eventDetail->type_name}}</td>
                        </tr>
                        @if($eventDetail->place_name)
                        <tr class="detail">
                            <th class="thcol">会場</th>
                            <td class="tdcol">{{$eventDetail->place_name}}</td>
                        </tr>
                        @endif
                        @if($eventDetail->capacity)
                        <tr class="detail">
                        <th class="thcol">キャパ</th>
                        <td class="tdcol">{{$eventDetail->capacity}} 人</td>
                        </tr>
                        @endif
                </tbody>
            </table>
            </div>
        </div>
    </div>
    @if(sizeof($eventSetlist) >0)
    <div class="col s10 push-s1">
        <div class="card">
            <div class="card-content">
            <span class="card-title">セットリスト</span>
            <br>
            <table class="striped">
                <tbody>
                    <thead>
                        <tr>
                            <th class="setTrunCol">曲順</th>
                            <th class="setNameCol">曲名</th>
                        </tr>
                    </thead>
                    @foreach($eventSetlist as $setlist)
                        <tr>
                            <td>{{ $setlist->turn }}.</td>
                            <td>{{ $setlist->song_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    @endif
    @if(sizeof($eventUrl) >0)
    <div class="col s10 push-s1">
        <div class="card">
            <div class="card-content">
            <span class="card-title">関連情報 Webサイト</span>
                @foreach($eventUrl as $url)
                    <a href={{ $url->url }}>{{ $url->url }}</a></br>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <div class="col s5 push-s1">
        <div class="card">
            <div class="card-content">
            <span class="card-title">ご本人のTwitter</span>
            <blockquote class="twitter-tweet"><p lang="ja" dir="ltr">TBSテレビ『音楽の日』<br><br>ラブライブ！サンシャイン!!より<br>Aqours で<br>♪ Brightest Melodyを<br>披露させて頂きました(*ˊᵕˋ* )<br><br>深夜3時台での出演<br>起きて観てくださった皆様<br>本当にありがとうございました🍊<br><br>少しでも多く<br>〝Aqours〟が<br>広がっていくようにと<br><br>想いを込めて…っ<a href="https://twitter.com/hashtag/%E9%9F%B3%E6%A5%BD%E3%81%AE%E6%97%A52019?src=hash&amp;ref_src=twsrc%5Etfw">#音楽の日2019</a> <a href="https://twitter.com/hashtag/Aqours?src=hash&amp;ref_src=twsrc%5Etfw">#Aqours</a> <a href="https://t.co/EhV5VXVm75">pic.twitter.com/EhV5VXVm75</a></p>&mdash; 伊波 杏樹 (@anju_inami) <a href="https://twitter.com/anju_inami/status/1150119348997988357?ref_src=twsrc%5Etfw">July 13, 2019</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>
    <div class="col s5 push-s1">
        <div class="card">
            <div class="card-content">
            <span class="card-title">関係者のTwitter</span>
            <blockquote class="twitter-tweet"><p lang="ja" dir="ltr">TBSテレビ『音楽の日』<br><br>ラブライブ！サンシャイン!!より<br>Aqours で<br>♪ Brightest Melodyを<br>披露させて頂きました(*ˊᵕˋ* )<br><br>深夜3時台での出演<br>起きて観てくださった皆様<br>本当にありがとうございました🍊<br><br>少しでも多く<br>〝Aqours〟が<br>広がっていくようにと<br><br>想いを込めて…っ<a href="https://twitter.com/hashtag/%E9%9F%B3%E6%A5%BD%E3%81%AE%E6%97%A52019?src=hash&amp;ref_src=twsrc%5Etfw">#音楽の日2019</a> <a href="https://twitter.com/hashtag/Aqours?src=hash&amp;ref_src=twsrc%5Etfw">#Aqours</a> <a href="https://t.co/EhV5VXVm75">pic.twitter.com/EhV5VXVm75</a></p>&mdash; 伊波 杏樹 (@anju_inami) <a href="https://twitter.com/anju_inami/status/1150119348997988357?ref_src=twsrc%5Etfw">July 13, 2019</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>
</div>
@endsection