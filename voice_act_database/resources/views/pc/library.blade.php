<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<link href="/css/pc/library.css" rel="stylesheet" type="text/css">
<script src="{{ asset('/js/library.js') }}"></script>

<?php
$checkEvent = "checked";
$checkRadio = "checked";
$checkMedia = "checked";
$checkProgram = "checked";
$checkStage = "checked";
$from = "";
$to = "";
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
if(!empty($dateFrom)){
    $from = $dateFrom;
}
//日付指定の保持（To）
if(!empty($dateTo)){
    $to = $dateTo;
}
//ソート順の保持
if($radioSort == "old"){
    $radioDesc = "";
    $radioAsc = "checked";
}else{
    $radioDesc = "checked";
    $radioAsc = "";
}

?>
@extends("layouts.parent")
@section("content")
<div class="row">
    <div class="container col-lg-1 col-md-1 col-sm-1 hidden-xs">
    </div>
    <div class="container col-lg-7 col-md-7 col-sm-10 col-xs-12">
        <div class="index-content">
            <div class="card">
                <div class="card-content">
                    <h4>データベース検索</h4>
                    <p>イベントやラジオ、雑誌等の出演情報を検索できます。</p>
                    <form action="/library" method="GET">
                    @csrf
                        <div class="row">
                            <div class="input-group col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
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
                                    <div class="col-md-4 col-xs-6">
                                    <input type="checkbox" id="checkEvent" value="1" name="checkEvent" {{ $checkEvent }} />
                                    <label for="checkEvent">イベント</label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                    <input type="checkbox" id="checkStage" value="5" name="checkStage" {{ $checkStage }} />
                                    <label for="checkStage">舞台</label>
                                    </div>
                                    <div class="visible-sm visible-xs">
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                    <input type="checkbox" id="checkRadio" value="2" name="checkRadio" {{ $checkRadio }} />
                                    <label for="checkRadio">ラジオ</label>
                                    </div>
                                    <div class="hidden-sm hidden-xs">
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                    <input type="checkbox" id="checkMedia" value="3" name="checkMedia" {{ $checkMedia }} />
                                    <label for="checkMedia">雑誌</label>
                                    </div>
                                    <div class="visible-sm visible-xs">
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                    <input type="checkbox" id="checkProgram" value="4" name="checkProgram" {{ $checkProgram }} />
                                    <label for="checkProgram">番組出演</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class='col-md-1 col-sm-1 col-xs-1'>
                            </div>
                            <div class="col-lg-10 col-xs-10">
                                <div class="row">
                                    <div class='col-md-6 col-sm-6 col-xs-12'>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control date" id="dateFrom" name="dateFrom" value={{ $from }} />
                                                <span class="input-group-addon">から</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-md-6 col-sm-6 col-xs-12'>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control date" id="dateTo" name="dateTo" value={{ $to }} />
                                                <span class="input-group-addon">まで</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1 col-xs-1">
                            </div>
                            <div class="col-lg-10 col-xs-10">
                                <div class="row">
                                    <div class='col-md-4 col-sm-6 col-xs-6'>
                                        <input type="radio" id="radioDesc" value="" name="radioSort" {{ $radioDesc }} />
                                        <label for="radioDesc">日時が新しい順</label>
                                    </div>
                                    <div class='col-md-4 col-sm-6 col-xs-6'>
                                        <input type="radio" id="radioAsc" value="old" name="radioSort" {{ $radioAsc }} />
                                        <label for="radioAsc">日時が古い順</label>
                                    </div>
                                    <div class="visible-xs">
                                        <br>
                                        <br>
                                    </div>
                                    <div class='col-md-4 col-sm-6 col-xs-6'>
                                        <button class="button" type="submit" name="action" style="margin: 0 auto;">検索</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container col-lg-3 col-md-3 hidden-sm hidden-xs">
    <div class="index-content">
            <div class="card">
                <div class="card-content">
                    <h4>Sub Contant</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container col-lg-1 col-md-1 col-sm-1 hidden-xs">
    </div>
</div>
<div class="row">
    <div class="container col-lg-1 col-md-1 col-sm-1 hidden-xs">
    </div>
    <div class="container col-lg-10 col-md-10 col-sm-10 col-xs-12">
        <div class="index-content">
            <div class="card">
            <nav>
                <ul class="pagination">
                {{ $items->appends($param)->links() }}
                </ul>
            </nav>
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
    <div class="container col-lg-1 col-md-1 col-sm-1 hidden-xs">
    </div>
</div>
@endsection
