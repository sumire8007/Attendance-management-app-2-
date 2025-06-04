<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>勤怠管理</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/staff_register.css') }}" />

</head>

<body>
    <header>
        <img src="{{ asset('../../img/logo.png') }}" alt="coachtech">
    </header>

    <main>
        <div class="register-form__content">
            <div class="register-form__heading">
                <h2>会員登録</h2>
            </div>
            <div class="register-form__input">
                <form class="form" action="/register" method="post">
                    @csrf
                    <!-- ユーザー名のフォーム -->
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">名前</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__error">
                                @error('name')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form__input--text">
                                <input type="text" name="name" value="{{ old('name') }}" />
                            </div>
                        </div>
                    </div>
                    <!-- メールアドレスのフォーム -->
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">メールアドレス</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__error">
                                @error('email')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form__input--text">
                                <input type="email" name="email" value="{{ old('email') }}" />
                            </div>
                        </div>
                    </div>
                    <!-- パスワードのフォーム -->
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">パスワード</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__error">
                                @error('password')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form__input--text">
                                <input type="password" name="password" value="{{ old('password') }}" />
                            </div>
                        </div>
                    </div>
                    <!-- 確認用パスワードのフォーム -->
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">確認用パスワード</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__error">
                                @error('password')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form__input--text">
                                <input type="password" name="password_confirmation" />
                            </div>
                        </div>
                    </div>
                    <!-- 登録するをクリックするとプロフィール設定画面に遷移 -->
                    <div class="form__button">
                        <button class="form__button-submit" type="submit">登録する</button>
                    </div>
                </form>
                    <a class="transition" href="/login">ログインはこちら</a>
            </div>

    </main>
</body>

</html>