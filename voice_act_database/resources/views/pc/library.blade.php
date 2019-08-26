<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
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
    <div class="container col-lg-2 col-md-2 col-sm-2 hidden-xs">
    </div>
    <div class="container col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="index-content">
            <div class="card">
                <div class="card-content">
                    <h4>データベース検索</h4>
                    <p>イベントやラジオ、雑誌等の出演情報を検索できます。</p>
                    <form action="/library" method="GET">
                    @csrf
                        <div class="row">
                            <div class="input-group col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                                <input name="search" type="text" class="form-control" placeholder="キーワードを入力してください" value={{ $textSearch }} >
                                <span class="input-group-addon" id="basic-addon2"><a href="/about">カレンダーで探す</a></span>
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-lg-1 col-xs-1">
                            </div>
                            <div class="col-lg-10 col-xs-10">
                                <div class="row">
                                    <div class="col-md-2 col-xs-4">
                                    <input type="checkbox" id="checkEvent" value="1" name="checkEvent" {{ $checkEvent }} />
                                    <label for="checkEvent">イベント</label>
                                    </div>
                                    <div class="col-md-2  col-xs-4">
                                    <input type="checkbox" id="checkStage" value="5" name="checkStage" {{ $checkStage }} />
                                    <label for="checkStage">舞台</label>
                                    </div>
                                    <div class="col-md-2  col-xs-4">
                                    <input type="checkbox" id="checkRadio" value="2" name="checkRadio" {{ $checkRadio }} />
                                    <label for="checkRadio">ラジオ</label>
                                    </div>
                                    <div class="visible-sm visible-xs">
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-md-2  col-xs-4">
                                    <input type="checkbox" id="checkMedia" value="3" name="checkMedia" {{ $checkMedia }} />
                                    <label for="checkMedia">雑誌</label>
                                    </div>
                                    <div class="col-md-2  col-xs-4">
                                    <input type="checkbox" id="checkProgram" value="4" name="checkProgram" {{ $checkProgram }} />
                                    <label for="checkProgram">番組出演</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </br>
                        </br>
                        <div class="row">
                            <div class='col-md-1 col-sm-1 col-xs-1'>
                            </div>
                            <div class='col-md-3 col-sm-5 col-xs-5'>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control date" id="dateFrom" name="dateFrom" value={{ $dateFrom }} />
                                        <span class="input-group-addon">から</span>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-3 col-sm-5 col-xs-5'>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control date" id="dateTo" name="dateTo" value={{ $dateTo }} />
                                        <span class="input-group-addon">まで</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class='col-md-3 col-sm-1 col-xs-1'>
                            </div>
                            <div class='col-md-2 col-sm-4 col-xs-4'>
                                <input type="radio" id="radioDesc" value="new" name="radioSort" {{ $radioDesc }} />
                                <label for="radioDesc">日時が新しい順</label>
                            </div>
                            <div class='col-md-2 col-sm-4 col-xs-4'>
                                <input type="radio" id="radioAsc" value="old" name="radioSort" {{ $radioAsc }} />
                                <label for="radioAsc">日時が古い順</label>
                            </div>
                            <div class='col-md-2 col-sm-4 col-xs-4 col-sm-offset-4 col-xs-offset-4'>
                                <button class="button" type="submit" name="action">検索</button>
                            </div>
                        </div>
                        </br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container col-lg-2 col-md-2 hidden-sm hidden-xs">
    <div class="index-content">
            <div class="card">
                <div class="card-content">
                    <h4>Sub Contant</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container col-lg-2 col-md-2 col-sm-2 hidden-xs">
    </div>
</div>
<div class="row">
    <div class="container col-lg-2 col-md-2 col-sm-2 hidden-xs">
    </div>
    <div class="container col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="index-content">
            <div class="card">
            <ul class="pagination">
            {{ $items->links() }}
            </ul>
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
            </div>
        </div>
    </div>
    </div>
    <div class="container col-lg-2 col-md-2 col-sm-2 hidden-xs">
    </div>
</div>
@endsection
