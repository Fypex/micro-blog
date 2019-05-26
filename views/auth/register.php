<?php Flight::render('layouts/header'); ?>
    <body id="login">
    <div class="container">
        <div class="auth-form-wrapper">
            <div class="register-form">
                <h3>Админ панель </h3><p>Регистрация</p>
                <form id="register-form">
                    <div class="md-form form-lg">
                        <input name="login" id="login_input" type="text" class="form-control form-control-lg">
                        <label for="login_input">Логин</label>
                    </div>
                    <div class="md-form form-lg">
                        <input name="password" id="password_input" type="password"  class="form-control form-control-lg">
                        <label for="password_input">Пароль</label>
                    </div>
                    <div class="md-form form-lg">
                        <input name="password_verify" id="password_input" type="password"  class="form-control form-control-lg">
                        <label for="password_input">Повторите пароль</label>
                    </div>
                    <div class="btn-group w-100 d-flex justify-content-around" role="group" aria-label="Basic example">
                        <a href="/login" class="btn btn-primary w-45">Войти</a>
                        <button type="submit" id="login-button" class="btn btn-primary w-45">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/auth/register.js"></script>
</body>
<?php Flight::render('layouts/footer'); ?>