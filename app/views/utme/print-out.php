
    <div class="login-page-wrap lpw">
        <div class="login-page-content lpc">
            <div class="row">
                <div class="col-lg-10 col-md-10 offset-md-1">
                    <div class="login-box ">
                        <div class="item-logo">
                            <img src="<?=UTME_ASSET_PATH?>img/logo2.png" alt="logo">
                        </div>
                        <div class="single-info-details"  style=" display: block">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-12 item-content">
                                            <div class="header-inline item-header">
                                                <h3 class="text-dark-medium font-medium"><?= $student->surname.' '.$student->first_name?></h3>
                                                <div class="header-elements ml-3">
                                                    <ul>
                                                        <li><a href="#"><i class="far fa-edit"></i></a></li>
                                                        <li><a  id="print-out" href="#"><i class="fas fa-print"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-download"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-3 col-sm-4">
                                            <div class="item-img">
                                                <img src="<?=UTME_ASSET_PATH?>img/figure/teacher.jpg" alt="teacher">
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-4">
                                            <div class="item-content">
                                                <div id="printThis" class="info-table table-responsive form-group">
                                                    <table class="table text-nowrap">
                                                        <tbody>
                                                        <tr>
                                                            <td>Jamb Reg Number:</td>
                                                            <td class="font-medium text-dark-medium"><?=$student->jamb_reg_no?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Name:</td>
                                                            <td class="font-medium text-dark-medium"><?=$student->surname?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>First name:</td>
                                                            <td class="font-medium text-dark-medium"><?=$student->first_name?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Middle name:</td>
                                                            <td class="font-medium text-dark-medium"><?=$student->middle_name?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gender:</td>
                                                            <td class="font-medium text-dark-medium"><?=$student->gender?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date Of Birth:</td>
                                                            <td class="font-medium text-dark-medium"><?=$student->dob?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone number:</td>
                                                            <td class="font-medium text-dark-medium"><?=$student->phone_number?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>E-mail Address:</td>
                                                            <td class="font-medium text-dark-medium"><?=$student->email_address?></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div
                                    </div>
<!--            <div class="sign-up sp">Don't have an account ? <a href="#">Signup now!</a></div>-->
        </div>
    </div>