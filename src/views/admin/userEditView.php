<?php
    var_dump($data);
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h1 class="text-center login-title">Изменить пользователя (id = <?= $data['id'] ?>)</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://i.ytimg.com/vi/gu-rGAAWr-8/hqdefault.jpg"
                     alt="">
                <form class="form-signin" method="post" action="/admin/users?method=change">
                    <input type="hidden" class="form-control" name="id" value="<?= $data['id'] ?>">
                    <input type="text" class="form-control" name="name" placeholder="Name" required value="<?= $data['name'] ?>">
                    <input type="radio" name="role" value="Customer"  checked="checked"> Customer<br>
                    <input type="radio" name="role" value="Admin"> Admin<br>
                    <input type="text" class="form-control" name="email" placeholder="Email" required value="<?= $data['email']?>">
                    <input type="text" class="form-control" name="login" placeholder="Login" required value="<?= $data['login']?>">
                    <input type="text" class="form-control" name="pass" placeholder="Password" required value="<?= $data['password']?>">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Изменить пользователя</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .form-signin
    {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-signin .form-signin-heading, .form-signin .checkbox
    {
        margin-bottom: 10px;
    }
    .form-signin .checkbox
    {
        font-weight: normal;
    }
    .form-signin .form-control
    {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .form-signin .form-control:focus
    {
        z-index: 2;
    }
    .form-signin input[type="text"]
    {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    .form-signin input[type="password"]
    {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    .account-wall
    {
        margin-top: 20px;
        padding: 40px 0px 20px 0px;
        background-color: #f7f7f7;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    }
    .login-title
    {
        color: #555;
        font-size: 18px;
        font-weight: 400;
        display: block;
    }
    .profile-img
    {
        width: 96px;
        height: 96px;
        margin: 0 auto 10px;
        display: block;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
    }
    .need-help
    {
        margin-top: 10px;
    }
    .new-account
    {
        display: block;
        margin-top: 10px;
    }
</style>