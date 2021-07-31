
    <div class="login-page-wrap">
        <div class="login-page-content">
            <div class="login-box">
                <div class="item-logo">
                    <img src="<?=UTME_ASSET_PATH?>img/logo2.png" alt="logo">
                </div>


                <div class="col-12 form-group mg-t-8">
                    <h4 class="text-center">Pay with </h4>
                    <?=\Zikzay\core\Session::has('submitError') ?
                        '<div class="alert alert-info"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                    <a href = "<?= SR.'/payment/paystack'?>" ><button type="button" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">PayPal</button></a>
                    <a href = "<?= SR.'/payment/monnify'?>" ><button type="button" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Monify</button></a>
                    <!--<button type="button" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Remita</button>
                    <button type="button" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Stripe</button>
                    <button type="button" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Braintree</button>-->
                   
                </div>
            </div>
            <div class="sign-up">Please make payments to <a href="#">Activate Account</a></div>
        </div>
    </div>