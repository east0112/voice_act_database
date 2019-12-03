<meta property="og:title" content="{{$eventDetail->event_name}}"/>

<link href="/css/pc/event.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>

@extends("layouts.parent")
@section("content")
<div class="row">
    <div class="container col-lg-1 col-md-1 col-sm-1 hidden-xs">
    </div>
    <div class="container col-lg-10 col-md-10 col-sm-10 col-xs-12">
        <div class="index-content">
            <div class="card">
                <div class="event-title">
                    <h4>{{$eventDetail->event_name}}</h4>
                </div>
                <table class="event-detail-table">
                    <tbody>
                            <tr>
                                <th class="thcol">日時</th>
                                <td class="tdcol">{{$eventDetail->date}} {{$eventDetail->start_time}}</td>
                            </tr>
                            <tr class="detail">
                                <th class="thcol">種類</th>
                                <td class="tdcol">{{$eventDetail->type_name}}</td>
                            </tr>
                            @if($eventDetail->act_name)
                            <tr class="detail">
                                <th class="thcol">役名</th>
                                <td class="tdcol">{{$eventDetail->act_name}} 役</td>
                            </tr>
                            @endif
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
                <br>
            </div>
        </div>
    @if(sizeof($eventSetlist) >0)
    <div class="index-content">
        <div class="card">
            <h4>セットリスト</h4>
            <table class="event-detail-table  table-striped">
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
            <br>
        </div>
    </div>
    @endif
    @if(sizeof($eventUrl) >0)
        @foreach($eventUrl as $url)
        <div class="container col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <a href={{ $url->url }}>
                <div class="index-content">
                    <div class="card thumbnail-card">
                        <img class="thumbnail-img" src= <?php echo "https://s.wordpress.com/mshots/v1/".$url->url."?w=150" ?> >
                        <div class="thumbnail-text">
                            <p>
                            <?php
                                $source = @file_get_contents($url->url);
                                if (preg_match('/<title>(.*?)<\/title>/i', mb_convert_encoding($source, 'UTF-8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS'), $result)) {
                                    $title = $result[1];
                                } else {
                                    //TITLEタグが存在しない場合
                                    $title = $url->url;
                                }
                                echo $title;
                            ?>
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
    @endif
    @if(sizeof($eventTweetSelf) >0)
    <div class="container col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="index-content">
            <div class="card">
            <h4>ご本人のTwitter</h4>
            @foreach($eventTweetSelf as $tweet)
                <div id= <?php echo '"container'.$tweet->turn.'"' ?>></div>
                <script>
                    twttr.widgets.createTweet(
                        <?php echo '"'.$tweet->tweet_id.'"' ?>,
                        document.getElementById(<?php echo '"container'.$tweet->turn.'"' ?>),
                        {
                            theme: "white",
                            align: "center",
                            dnt:true
                        }
                    );
                </script>
            @endforeach
            </div>
        </div>
    </div>
    @endif
    @if(sizeof($eventTweetOther) >0)
    <div class="container col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="index-content">
            <div class="card">
            <h4>関係者のTwitter</h4>
            @foreach($eventTweetOther as $tweet)
                <div id= <?php echo '"containerOther'.$tweet->turn.'"' ?>></div>
                <script>
                    twttr.widgets.createTweet(
                        <?php echo '"'.$tweet->tweet_id.'"' ?>,
                        document.getElementById(<?php echo '"containerOther'.$tweet->turn.'"' ?>),
                        {
                            theme: "white",
                            align: "center",
                            dnt:true
                        }
                    );
                </script>
            @endforeach
            </div>
        </div>
    </div>
    @endif
    </div>
    <div class="container col-lg-1 col-md-1 col-sm-1 hidden-xs">
    </div>
</div>
@endsection