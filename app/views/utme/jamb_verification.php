
    <div class="login-page-wrap">
        <div class="login-page-content">
            <div class="login-box">
                <div class="item-logo">
                    <img src="<?=UTME_ASSET_PATH?>img/logo2.png" alt="logo">
                </div>
                <?=\Zikzay\core\Session::has('submitError') ?
                '<div class="alert alert-danger">'.\Zikzay\core\Session::get('submitError').'</div>' : ''?>

                <form  action="<?=SR."/register/createPUTME"?>" method="post" class="login-form">
                    <div class="form-group">
                        <label>Jamb Registration Number</label>
                        <input type="text" id="jamb_reg_no" name="jamb_reg_no" placeholder="Enter Jamb Reg No" class="form-control">
                        <small id="jamb_reg_no-e"></small>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="login-btn">Verify</button>
                    </div>
                </form>
                
            </div>
            <div class="sign-up">Have an accout ? <a class="text-warning" href="<?=SR."/postUTME/sign-in"?>">Login instead!</a></div>
        </div>