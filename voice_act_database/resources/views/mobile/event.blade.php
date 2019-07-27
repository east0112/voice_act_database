<link href="/css/mobile/event.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>

@extends("layouts.parentMobile")
@section("content")
        <div class="card">
            <div class="card-content">
            <span class="card-title" style="font-size:30px">{{$eventDetail->event_name}}</span>
            <table style="font-size:25px">
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
            </div>
        </div>
    @if(sizeof($eventSetlist) >0)
        <div class="card">
            <div class="card-content">
            <span class="card-title" style="font-size:30px">セットリスト</span>
            <br>
            <table class="striped" style="font-size:25px">
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
    @endif
    @if(sizeof($eventUrl) >0)
    <div class="col s10 push-s1">
                @foreach($eventUrl as $url)
                    <a href={{ $url->url }}>
                        <div class="card horizontal">
                            <div class="card-image" style="width: 200px;">
                                <img class="img-link" src= <?php echo "https://s.wordpress.com/mshots/v1/".$url->url."?w=200" ?> >
                            </div>
                            <div class="card-stacked">
                                <div class="card-content" style="font-size:25px">
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
                                </div>
                            </div>
                        </div>
                    </a>
            @endforeach
    </div>    @endif
    @if(sizeof($eventTweetSelf) >0)
    <div class="row">
    <div class="col s10 push-s1">
        <div class="card">
            <div class="card-content">
            <span class="card-title" style="font-size:30px">ご本人のTwitter</span>
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
    <div class="col s10 push-s1">
        <div class="card">
            <div class="card-content">
            <span class="card-title" style="font-size:30px">関係者のTwitter</span>
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
</div>
@endsection