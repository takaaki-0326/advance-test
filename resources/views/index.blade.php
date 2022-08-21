<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>お問い合わせ</h1>
    <form method="POST" action="{{ route('confirm') }}">
        @csrf
        <label>お名前</label>
        <input name="first_name" value="{{ old('first_name') }}" type= "text">
        <input name="last_name" value="{{ old('last_name') }}" type= "text">
        @error('first_name')
        <p class="error-message">{{$message}}</p>
        @enderror
        <br>
        <label>性別</label>
        <input name="gender" value="1" type="radio" checked>男性
        <input name="gender" value="2" type= "radio">女性
        <br>
        <label>メールアドレス</label>
        <input name="email" value="{{ old('email') }}" type="text">
        @error('email')
        <p class="error-message">{{$message}}</p>
        @enderror
        <br>
        <label>郵便番号</label>
        <span>〒</span>
        <input name="postcode" value="{{ old('postcode') }}" type="text" onKeyUp="AjaxZip3.zip2addr(this, '', 'address', 'address');">
        @error('postcode')
        <p class="error-message">{{$message}}</p>
        @enderror
        <br>
        <label>住所</label>
        <input name="address" value="{{ old('address') }}" type= "text">
        @error('address')
        <p class="error-message">{{$message}}</p>
        @enderror
        <br>
        <label>建物名</label>
        <input name="building_name" value="{{ old('building_name') }}" type= "text">
        <br>
        <label>ご意見</label>
        <textarea name="opinion">{{ old('opinion') }}</textarea>
        @error('opinion')
        <p class="error-message">{{$message}}</p>
        @enderror
        <br>
        <button type="submit">確認</button>
    </form>


    <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
</body>

</html>
