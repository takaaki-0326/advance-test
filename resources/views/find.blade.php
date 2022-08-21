<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>管理システム</h1>
    <div class="contact">
    <form action="{{ route('search') }}" method="get" class="">
        {{-- @csrf --}}
        <label>お名前</label>
        <input type="text" class="" name="fullname"/>
        <label>性別</label>
        <input name="gender" value="all" type="radio" checked>全て
        <input name="gender" value="1" type="radio">男性
        <input name="gender" value="2" type= "radio">女性
        <label>登録日</label>
        <input type="text" class="" name="startdate"/>~<input type="text" class="" name="enddate"/>
        <label>メールアドレス</label>
        <input name="email" type="text">
        <input class="" type="submit" value="検索" />
    </form>
    <a href="{{ route('find') }}">リセット</a>

    {{ $contacts->links('paginate') }}
    <table>
        <tr>
        <th>ID</th>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>ご意見</th>
        </tr>
        @foreach($contacts as $contact)
        <tr>
        <td>
            {{ $contact->id }}
        </td>
        <td>
            {{ $contact->fullname }}
        </td>
        <td>
            {{ $contact->gender }}
        </td>
        <td>
            {{ $contact->email }}
        </td>
        <td>
            {{ $contact->opinion }}
        </td>
        <td>
            <form action="{{ route('delete', ['id' => $contact->id]) }}" method="post">
                @csrf
                <button class="">削除</button>
            </form>
        </td>
        </tr>
        @endforeach
    </table>




</body>

</html>
