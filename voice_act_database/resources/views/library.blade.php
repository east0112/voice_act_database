@extends("layouts.parent")
@section("content")
<div class="row">
    <div class="col s10 push-s1">
        <div class="card">
            <div class="card-content">
                <span class="card-title">データベース検索</span>
                <p>イベントやラジオ、雑誌等の出演情報を検索できます。</p>
                <form>
                    <div class="input-field">
                        <input id="search" type="search" placeholder="キーワードを入力してください">
                        <i class="material-icons">close</i>
                    </div>
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
                        <th>日時</th>
                        <th>種類</th>
                        <th>イベント名</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->event_id }}</td>
                            <td>{{ $item->event_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
