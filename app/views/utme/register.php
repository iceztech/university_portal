    <div class="login-page-wrap lpw">
        <div class="login-page-content lpc">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="login-box">
                        <div class="item-logo">
                            <img src="<?=UTME_ASSET_PATH?>img/logo2.png" alt="logo">
                        </div>
                        <form action="<?=SR."/register/createAccountPUTME"?>" method="post" class="login-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Surname</label>
                                    <input type="text" name="surname" id="surname" placeholder="Enter Surname" class="form-control">
                                    <small id="surname-e"></small>
                                </div>
                                 <div class="col-md-6 form-group">
                                    <label>First name</label>
                                    <input type="text"  name="first_name" id="first_name" placeholder="Enter First name" class="form-control">
                                     <small id="middle_name-e"></small>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Middle Names</label>
                                    <input type="text"  name="middle_name" id="middle_name"  placeholder="Middle name" class="form-control">
                                    <small id="middle_name-e"></small>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Phone number</label>
                                    <input type="text"  name="phone_number" id="phone_number" placeholder="Enter Phone number" class="form-control">
                                    <small id="phone_number-e"></small>
                                </div>
                                <div class="col-md-6 col-12 form-group">
                                    <label>Email address</label>
                                    <input type="email" name="email_address" id="email_address"  placeholder="Enter a Valid Email" class="form-control">
                                    <small id="email_address-e"></small>
                                    <i class="fas fa-envelope px-3"></i>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Password</label>
                                    <input type="Password" name="password" id="password"  placeholder="Enter Password" class="form-control">
<!--                                    <small id="password-e"></small>-->
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Confirm Password</label>
                                    <input type="Password" disabled  placeholder="Enter Password" class="form-control">
<!--                                    <small id="password-e"></small>-->
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="login-btn">Register</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>