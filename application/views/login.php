<div class="login-card"><img src="<?=base_url();?>assets/img/avatar_2x.png" class="profile-img-card">
    <p class="profile-name-card"> </p>
        <form class="form-signin" method="post" action="<?=site_url('home/proses_login');?>"><span class="reauth-email"> </span>
            <input class="form-control" type="text" required="" placeholder="Username" name="username" autofocus="" id="inputEmail">
            <input class="form-control" type="password" required="" name="password" placeholder="Password" id="inputPassword">
            <div class="checkbox"></div>
            <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Sign in</button>
        </form>
        <a href="#" class="forgot-password">Forgot your password?</a>
</div>