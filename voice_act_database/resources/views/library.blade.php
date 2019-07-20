<link href="css/library.css" rel="stylesheet" type="text/css">

<?php
$checkEvent = "";
$checkRadio = "";
$checkMedia = "";
$checkProgram = "";
if(empty($type) == false){
    if(in_array("1",$type)){
        $checkEvent = "checked";
    }
    if(in_array("2",$type)){
        $checkRadio = "checked";
    }
    if(in_array("3",$type)){
        $checkMedia = "checked";
    }
    if(in_array("4",$type)){
        $checkProgram = "checked";
    }
}

?>
@extends("layouts.parent")
@section("content")
<div class="row">
    <div class="col s10 push-s1">
        <div class="card">
            <div class="card-content">
                <span class="card-title">データベース検索</span>
                <p>イベントやラジオ、雑誌等の出演情報を検索できます。</p>
                <form action="/library" method="POST">
                @csrf
                    <div class="input-field">
                        <input name="search" type="search" placeholder="キーワードを入力してください" >
                        <i class="material-icons">close</i>
                    </div>
                    <div class="col s2">
                    <input type="checkbox" id="checkEvent" value="1" name="checkEvent" {{ $checkEvent }} />
                    <label for="checkEvent">イベント</label>
                    </div>
                    <div class="col s2">
                    <input type="checkbox" id="checkRadio" value="2" name="checkRadio" {{ $checkRadio }} />
                    <label for="checkRadio">ラジオ</label>
                    </div>
                    <div class="col s2">
                    <input type="checkbox" id="checkMedia" value="3" name="checkMedia" {{ $checkMedia }} />
                    <label for="checkMedia">雑誌</label>
                    </div>
                    <div class="col s2">
                    <input type="checkbox" id="checkProgram" value="4" name="checkProgram" {{ $checkProgram }} />
                    <label for="checkProgram">番組出演</label>
                    </div>
                    </br>
                    </br>
                    <button class="btn waves-effect waves-light pink accent-2" type="submit" name="action">検索</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s10 push-s1">
        <div class="card">
            <div class="card-content">
            <table class="striped">
                <thead>
                    <tr>
                        <th class="dateCol">日時</th>
                        <th class="typeCol">種類</th>
                        <th class="nameCol">イベント名</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->type_name }}</td>
                            <td><a href="/library/event/{{ $item->event_id }}">{{ $item->event_name }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
