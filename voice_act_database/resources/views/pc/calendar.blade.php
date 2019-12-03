<meta property="og:title" content="inaminfo calendar"/>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<link href="/css/pc/calendar.css" rel="stylesheet" type="text/css">
<script src="{{ asset('/js/calendar.js') }}"></script>


@extends("layouts.parent")
@section("content")
<div class="row">
    <!--modal-->
    <div class="modal">
        <div class="modal-bg js-modal-close"></div>
            <div class="modal-content-event modal-content">
                <div class="row">
                    <table class="table table-hover table-modal">
                        <thead>
                            <tr>
                                <th class="dateCol">日時</th>
                                <th class="typeCol">種類</th>
                                <th class="nameCol">タイトル</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr class={{"item".date("j",(strtotime($item->date)))}} style="display:none;">
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
                <div class="modal-content-select-month modal-content">
                <div class="row">
                    <p>年月を指定して検索できます。</p>
                        <form name="select_search" action="/calendar" method="GET">
                            <input type="hidden" name="currentYear" value={{$currentYear}}>
                            <input type="hidden" name="currentMonth" value="">
                            <div class="calendar-header">
                                    <div class="left-button">
                                            <div class="pager-button js-select-year-back">◀︎</div>
                                    </div>
                                    <div class="modal-calendar-header-date">
                                        {{$currentYear}}
                                    </div>
                                    <div class="right-button">
                                            <div class="pager-button js-select-year-next" disabled>▶︎</div>
                                    </div>
                            </div>
                            <table class="table table-modal">
                                <tbody>
                                    <tr>
                                        <th class="js-select-month-submit">1月</th><th class="js-select-month-submit">2月</th><th class="js-select-month-submit">3月</th><th class="js-select-month-submit">4月</th>
                                    </tr>
                                    <tr>
                                        <th class="js-select-month-submit">5月</th><th class="js-select-month-submit">6月</th><th class="js-select-month-submit">7月</th><th class="js-select-month-submit">8月</th>
                                    </tr>
                                    <tr>
                                        <th class="js-select-month-submit">9月</th><th class="js-select-month-submit">10月</th><th class="js-select-month-submit">11月</th><th class="js-select-month-submit">12月</th>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
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
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs">
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                        <div class="calendar-header">
                            <!--<div class="row">-->
                                <div class="left-button">
                                    <form action="/calendar" method="GET">
                                        <input type="hidden" name="currentYear" value={{$currentYear}}>
                                        <input type="hidden" name="currentMonth" value={{$currentMonth}}>
                                        <input type="hidden" name="pager" value="back">
                                        <button class="pager-button" type="submit" name="action">◀︎</button>
                                    </form>
                                </div>
                                <div class="calendar-header-date js-view-year">
                                {{$currentYear}} . {{$currentMonth}}
                                </div>
                                <div class="right-button">
                                    <form action="/calendar" method="GET">
                                        <input type="hidden" name="currentYear" value={{$currentYear}}>
                                        <input type="hidden" name="currentMonth" value={{$currentMonth}}>
                                        <input type="hidden" name="pager" value="next">
                                        <button class="pager-button" type="submit" name="action">▶︎</button>
                                    </form>
                                </div>
                            <!--</div>-->
                        </div>
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
                                        @if ($date->month == $currentMonth)
                                        class="view-detail js-view-detail"
                                        @else
                                        class="bg-secondary"
                                        @endif
                                        id=<?php echo '"'.$date->day.'"' ?>
                                    >
                                        {{ $date->day }}
                                    <?php
                                    $day = (int)$date->format("d");
                                    ?>
                                    @if ($date->month == $currentMonth)
                                        @if($dayEvent[(int)$date->format("d")])
                                        <div class="event-tag tag-size">
                                        イベント
                                        </div>
                                        @endif
                                        @if($dayStage[(int)$date->format("d")])
                                        <div class="stage-tag tag-size">
                                        舞台
                                        </div>
                                        @endif
                                        @if($dayRadio[(int)$date->format("d")])
                                        <div class="radio-tag tag-size">
                                        ラジオ
                                        </div>
                                        @endif
                                        @if($dayMedia[(int)$date->format("d")])
                                        <div class="media-tag tag-size">
                                        雑誌
                                        </div>
                                        @endif
                                        @if($dayProgram[(int)$date->format("d")])
                                        <div class="program-tag tag-size">
                                        番組
                                        </div>
                                        @endif
                                    @endif
                                    </td>
                                </div>
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