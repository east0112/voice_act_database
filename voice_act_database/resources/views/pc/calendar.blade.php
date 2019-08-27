@extends("layouts.parent")
@section("content")
<div class="row">
    <div class="container col-lg-1 col-md-1 col-sm-1 hidden-xs">
    </div>
    <div class="container col-lg-10 col-md-10 col-sm-10 col-xs-12">
        <div class="index-content">
            <div class="card">
                <h4>カレンダー検索</h4>
                <p>イベントやラジオ、雑誌等の出演情報をカレンダーから検索できます。</p>
                </br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
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
                            @endif
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
        </div>
    </div>
    <div class="container col-lg-1 col-md-1 col-sm-1 hidden-xs">
    </div>
</div>
@endsection