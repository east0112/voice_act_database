<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

<link href="/css/pc/library.css" rel="stylesheet" type="text/css">
<script src="{{ asset('/js/library.js') }}"></script>


<?php
$checkEvent = "checked";
$checkRadio = "checked";
$checkMedia = "checked";
$checkProgram = "checked";
$checkStage = "checked";
$dateFrom = "";
$dateTo = "";
$radioDesc = "checked";
$radioAsc = "";
$textSearch = "";
//検索キーワードの保持
if(!empty($searchWord)){
    $textSearch = $searchWord;
}
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
//日付指定の保持（From）
if(!empty($from)){
    $dateFrom = $from;
}
//日付指定の保持（To）
if(!empty($to)){
    $dateTo = $to;
}
//ソート順の保持
if($sort == "old"){
    $radioDesc = "";
    $radioAsc = "checked";
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
                        <input name="search" type="text" placeholder="キーワードを入力してください" value={{ $textSearch }} >
                    </div>
                    <div class="col s2">
                    <input type="checkbox" id="checkEvent" value="1" name="checkEvent" {{ $checkEvent }} />
                    <label for="checkEvent">イベント</label>
                    </div>
                    <div class="col s2">
                    <input type="checkbox" id="checkStage" value="5" name="checkStage" {{ $checkStage }} />
                    <label for="checkStage">舞台</label>
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
                    <div class="row">
                        <div class="col s3">
                        <input type="date" id="dateFrom" name="dateFrom" value={{ $dateFrom }} ></label>
                        </div>
                        <div class="col s1"">
                        <p style="text-align:center;line-height:60px;font-size:15px;">～</p>
                        </div>
                        <div class="col s3">
                        <input type="date" id="dateTo" name="dateTo" value={{ $dateTo }} ></label>
                        </div>
                    </div>
                    <div class="col s3">
                    <input type="radio" id="radioDesc" value="new" name="radioSort" {{ $radioDesc }} />
                    <label for="radioDesc">日時が新しい順</label>
                    </div>
                    <div class="col s3">
                    <input type="radio" id="radioAsc" value="old" name="radioSort" {{ $radioAsc }} />
                    <label for="radioAsc">日時が古い順</label>
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
            </div>
        </div>
    </div>
</div>
@endsection
