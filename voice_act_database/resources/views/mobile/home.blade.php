@extends("layouts.parentMobile")
@section("content")
<div class="col s10 push-s1">
  <div class="card">
    <div class="card-image">
      <img src="images/home001.png">
      <span class="card-title" style ="font-size:30px"></span>
    </div>
    <div class="card-content">
      <p style ="font-size:25px">「inaminfo」は、声優・舞台女優として活躍する伊波杏樹さんのイベントやラジオ、雑誌等の出演情報をまとめた非公式ファンサイトです。</p>
    </div>
    <div class="card-action">
      <a href="about" style="font-size:25px">当サイトについて</a>
    </div>
  </div>
</div>
<div class="col s10 push-s1">
    <div class="card">
        <div class="card-content">
        <span class="card-title" style="font-size:30px">今月の予定</span>

        <table class="striped"  style ="font-size:25px">
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
      <div class="card-action">
        <a href="about"  style="font-size:25px">詳細を見る</a>
      </div>
    </div>
</div>
<div class="col s10 push-s1">
    <div class="card">
        <div class="card-content"  style="font-size:25px">
        <span class="card-title" style="font-size:30px">更新履歴</span>
        <p>履歴１</p>
        <p>履歴２</p>
        <p>履歴３</p>
        </div>
    </div>
</div>
@endsection