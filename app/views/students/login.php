
    <div class="login-page-wrap">
        <div class="login-page-content">
            <div class="login-box">
                <div class="item-logo">
                    <img src="<?=UTME_ASSET_PATH?>img/logo2.png" alt="logo">
                </div>
                <?=\Zikzay\core\Session::has('submitError') ?
                    '<div class="alert alert-danger">'.\Zikzay\core\Session::get('submitError').'</div>' : ''?>
                <form action="<?=SR."/login/loginStudent"?>" method="post"" class="login-form">
                    <div class="form-group">
                        <label>Registration Number</label>
                        <input type="text" placeholder="Enter Jamb Reg Number" name="username" class="form-control">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" placeholder="Enter password" name="password" class="form-control">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember-me">
                            <label for="remember-me" class="form-check-label">Remember Me</label>
                        </div>
                        <a href="#" class="forgot-btn">Forgot Password?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="login-btn">Login</button>
                    </div>
                </form>
                
            </div>
            <div class="sign-up">Don't have an account ? <a href="#">Signup now!</a></div>
        </div>
    </div>