<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<link href="/css/pc/calendar.css" rel="stylesheet" type="text/css">
<script src="{{ asset('/js/calendar.js') }}"></script>


@extends("layouts.parent")
@section("content")
<div class="row">
    <!--modal-->
    <div class="modal">
        <div class="modal-bg js-modal-close"></div>
            <div class="modal-content">
                <div class="row">
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
                                <tr class={{"item".date("d",(strtotime($item->date)))}} style="display:none;">
                                <td><?php echo(date("Y/m/d",(strtotime($item->date)))) ?></td>
                                    <td>{{ $item->type_name }}</td>
                                    <td><a href="/library/event/{{ $item->event_id }}">{{ $item->event_name }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="js-modal-close modal-close">閉じる</a>
                </div>
        </div>
    </div>
    <!--modal-->
    <div class="container col-lg-1 col-md-1 col-sm-1 hidden-xs">
    </div>
    <div class="container col-lg-10 col-md-10 col-sm-10 col-xs-12">
        <div class="index-content">
            <div class="card">
                <h4>カレンダー検索</h4>
                <p>イベントやラジオ、雑誌等の出演情報をカレンダーから検索できます。</p>
                </br>
                <div class="row">
                    <div class="container col-lg-1 col-md-1 col-sm-1 hidden-xs">
                    </div>
                    <div class="container col-lg-10 col-md-10 col-sm-10 col-xs-12">
                        <table class="table calendar">
                            <thead>
                                <tr>
                                @foreach (['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $dayOfWeek)
                                <th>{{ $dayOfWeek }}</th>
                                @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dates as $date)
                                @if ($date->dayOfWeek == 0)
                                <tr>
                                @endif
                                <td
                                    @if ($date->month != $currentMonth)
                                    class="bg-secondary"
                                    @else
                                    class="js-view-detail"
                                    @endif
                                    id=<?php echo '"'.$date->day.'"' ?>
                                >
                                    {{ $date->day }}
                                </td>
                                @if ($date->dayOfWeek == 6)
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="container col-lg-1 col-md-1 col-sm-1 hidden-xs">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container col-lg-1 col-md-1 col-sm-1 hidden-xs">
    </div>
</div>
@endsection