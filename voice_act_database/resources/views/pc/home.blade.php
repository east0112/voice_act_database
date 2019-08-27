<link href="{{ asset('/css/pc/home.css') }}" rel="stylesheet">

@extends("layouts.parent")
@section("content")
<div class="row">
    <div class="container col-lg-1 col-md-1 col-sm-1 hidden-xs">
    </div>
    <div class="container col-lg-10 col-md-10 col-sm-10 col-xs-12">
        <div class="index-content">
            <div class="card">
                <img src="images/home001.png">
                <p>「inaminfo」は、声優・舞台女優として活躍する伊波杏樹さんのイベントやラジオ、雑誌等の出演情報をまとめた非公式ファンサイトです。</p>
                </br>
                <a href="/about" class="button">More</a>
            </div>
        </div>
        <div class="index-content">
            <div class="card">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="dateCol">日時</th>
                            <th class="typeCol">種類</th>
                            <th class="nameCol">タイトル</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                            <td><?php echo(date("Y/m/d",(strtotime($item->date)))) ?></td>
                                <td>{{ $item->type_name }}</td>
                                <td><a href="/library/event/{{ $item->event_id }}">{{ $item->event_name }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="/about" class="button">More</a>
            </div>
        </div>
    </div>
    <div class="container col-lg-1 col-md-1 col-sm-1 hidden-xs">
    </div>
</div>
@endsection