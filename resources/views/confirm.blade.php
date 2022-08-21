<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
        <h1>内容確認</h1>
        <form method="POST" action="{{ route('send') }}">
        @csrf

        <label>お名前</label>
        {{ $inputs['first_name'] }}
        <input name="first_name" value="{{ $inputs['first_name'] }}" type="hidden">
        {{ $inputs['last_name'] }}
        <input name="last_name" value="{{ $inputs['last_name'] }}" type="hidden">
        <br>
        <label>性別</label>
        {{ $inputs['gender'] === 1 ? '女性':'男性'}}
        <input name="gender" value="{{ $inputs['gender'] }}" type="hidden">
        <br>
        <label>メールアドレス</label>
        {{ $inputs['email'] }}
        <input name="email" value="{{ $inputs['email'] }}" type="hidden">
        <br>
        <label>郵便番号</label>
        {{ $inputs['postcode'] }}
        <input name="postcode" value="{{ $inputs['postcode'] }}" type="hidden">
        <br>
        <label>住所</label>
        {{ $inputs['address'] }}
        <input name="address" value="{{ $inputs['address'] }}" type="hidden">
        <br>
        <label>建物名</label>
        {{ $inputs['building_name'] }}
        <input name="building_name" value="{{ $inputs['building_name'] }}" type="hidden">
        <br>
        <label>ご意見</label>
        {{ $inputs['opinion'] }}
        <input name="opinion" value="{{ $inputs['opinion'] }}" type="hidden">
        <br>
        <button type="submit" name="action" value="submit">送信する</button>
        <button type="submit" name="action" value="back">修正する</button>
    </form>
</body>

</html>
