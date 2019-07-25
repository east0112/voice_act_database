<link href="/css/mobile/library.css" rel="stylesheet" type="text/css">

<?php
$checkEvent = "checked";
$checkRadio = "checked";
$checkMedia = "checked";
$checkProgram = "checked";
$checkStage = "checked";
$radioDesc = "checked";
$radioAsc = "";
//チェックボックスの保持
if(empty($type) == false){
    if(!in_array("1",$type)){
        $checkEvent = "";
    }
    if(!in_array("2",$type)){
        $checkRadio = "";
    }
    if(!in_array("3",$type)){
        $checkMedia = "";
    }
    if(!in_array("4",$type)){
        $checkProgram = "";
    }
    if(!in_array("5",$type)){
        $checkStage = "";
    }
}
//ソート順の保持
if($sort == "old"){
    $radioDesc = "";
    $radioAsc = "checked";
}

?>
@extends("layouts.parentMobile")
@section("content")
    <div class="col s10 push-s1">
        <div class="card">
            <div class="card-content">
                <span class="card-title" style="font-size:30px">データベース検索</span>
                <p style="font-size:25px">イベントやラジオ、雑誌等の出演情報を検索できます。</p>
                <form action="/library" method="POST">
                @csrf
                </br>
                <div class="input-field">
                        <input name="search" type="text" style="height:60px;font-size: 200%;" placeholder="キーワードを入力してください">
                    </div>
                    </br>
                    <div class="row">
                        <div class="col s2">
                        <input type="checkbox" id="checkEvent" value="1" name="checkEvent" {{ $checkEvent }} />
                        <label for="checkEvent" style="font-size:23px">イベント</label>
                        </div>
                        <div class="col s2">
                        <input type="checkbox" id="checkStage" value="5" name="checkStage" {{ $checkStage }} />
                        <label for="checkStage" style="font-size:23px">舞台</label>
                        </div>
                        <div class="col s2">
                        <input type="checkbox" id="checkRadio" value="2" name="checkRadio" {{ $checkRadio }} />
                        <label for="checkRadio" style="font-size:23px">ラジオ</label>
                        </div>
                        <div class="col s2">
                        <input type="checkbox" id="checkMedia" value="3" name="checkMedia" {{ $checkMedia }} />
                        <label for="checkMedia" style="font-size:23px">雑誌</label>
                        </div>
                        <div class="col s2">
                        <input type="checkbox" id="checkProgram" value="4" name="checkProgram" {{ $checkProgram }} />
                        <label for="checkProgram" style="font-size:23px">番組出演</label>
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col s3">
                        <input type="radio" id="radioDesc" value="new" name="radioSort" {{ $radioDesc }} />
                        <label for="radioDesc" style="font-size:23px">日時が新しい順</label>
                        </div>
                        <div class="col s3">
                        <input type="radio" id="radioAsc" value="old" name="radioSort" {{ $radioAsc }} />
                        <label for="radioAsc" style="font-size:23px">日時が古い順</label>
                        </div>
                    </div>
                    </br>
                    <button class="btn-large waves-effect waves-light pink accent-2" style="font-size:23px" type="submit" name="action">検索</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col s10 push-s1">
        <div class="card">
            <div class="card-content">
            <table class="striped" style ="font-size:25px">
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
@endsection
