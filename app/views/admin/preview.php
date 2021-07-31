
    <div class="login-page-wrap lpw">
        <div class="login-page-content lpc">
            <div class="row">
                <div class="col-lg-10 col-md-10 offset-md-1">
                    <div class="login-box ">
                        <div class="item-logo">
                            <img src="<?=UTME_ASSET_PATH?>img/logo2.png" alt="logo">
                        </div>
                        <div class="single-info-details"  style=" display: block">
                            <?=\Zikzay\core\Session::has('submitError') ?
                                '<div class="alert alert-info">'.\Zikzay\core\Session::get('submitError').'</div>' : ''?>
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
                                                            <td>Surname:</td>
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
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="item-content">
                                                <div class="info-table table-responsive">
                                                    <table class="table text-nowrap">
                                                        <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td>Home Town<br><span  class="font-medium text-dark-medium"><?=$origin->address?></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>LGA of Origin<br><span  class="font-medium text-dark-medium"><?=$origin->town?></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>State of Origin<br><span  class="font-medium text-dark-medium"><?=$origin->state?></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Nationality<br><span  class="font-medium text-dark-medium"><?=$origin->country?></td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="item-content">
                                                <div class="info-table table-responsive">
                                                    <h4 class="mb1 pt-5">Contact Address</h4>
                                                    <table class="table text-nowrap">
                                                        <tbody>
                                                        <div class="address-details">
                                                            <tr>
                                                                <td class="font-medium text-dark-medium"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address:</td>
                                                                <td class="font-medium text-dark-medium"><?=$contact->address?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Town:</td>
                                                                <td class="font-medium text-dark-medium"><?=$contact->town?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>State:</td>
                                                                <td class="font-medium text-dark-medium"><?=$contact->state?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Country:</td>
                                                                <td class="font-medium text-dark-medium"><?=$contact->country?></td>
                                                            </tr>
                                                        </div>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="item-content">
                                                <div class="info-table table-responsive">
                                                    <h4 class="mb1 pt-5">Permanent Address</h4>
                                                    <table class="table text-nowrap">
                                                        <tbody>
                                                        <div class="address-details">
                                                            <tr>
                                                                <td class="font-medium text-dark-medium"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address:</td>
                                                                <td class="font-medium text-dark-medium"><?=$permanentAddress->address?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Town:</td>
                                                                <td class="font-medium text-dark-medium"><?=$permanentAddress->town?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>State:</td>
                                                                <td class="font-medium text-dark-medium"><?=$permanentAddress->state?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Country:</td>
                                                                <td class="font-medium text-dark-medium"><?=$permanentAddress->country?></td>
                                                            </tr>
                                                        </div>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="item-content">
                                                <div class="info-table table-responsive">
                                                    <h4 class="mb1 pt-5">Sponsor</h4>
                                                    <table class="table text-nowrap">
                                                        <tbody>
                                                        <div class="address-details">

                                                            <tr>
                                                                <td>Name:</td>
                                                                <td class="font-medium text-dark-medium"><?=$sponsor->name?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Relationship:</td>
                                                                <td class="font-medium text-dark-medium"><?=$sponsor->relationship?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phone Number:</td>
                                                                <td class="font-medium text-dark-medium"><?=$sponsor->phone_number?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email Address:</td>
                                                                <td class="font-medium text-dark-medium"><?=$sponsor->email_address?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address:</td>
                                                                <td class="font-medium text-dark-medium"><?=$sponsor->address?></td>
                                                            </tr>
                                                        </div>
                                                        </div>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="item-content">
                                                <div class="info-table table-responsive">
                                                    <h4 class="mb1 pt-5">Next of kin</h4>
                                                    <table class="table text-nowrap">
                                                        <tbody>
                                                            <tr>
                                                                <td>Name:</td>
                                                                <td class="font-medium text-dark-medium"><?=$kin->name?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Relationship:</td>
                                                                <td class="font-medium text-dark-medium"><?=$kin->relationship?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phone Number:</td>
                                                                <td class="font-medium text-dark-medium"><?=$kin->phone_number?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email Address:</td>
                                                                <td class="font-medium text-dark-medium"><?=$kin->email_address?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address:</td>
                                                                <td class="font-medium text-dark-medium"><?=$kin->address?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                <h2 class="mb1 pt-5">Education</h2>
                                    <div class="row">
                                        <?php for ($i = 0; $i < count($edu); $i++) : ?>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="item-content">
                                                <div class="info-table table-responsive">
                                                    <h4 class="mb1 pt-5"><?=ucwords($edu[$i]->type)?></h4>
                                                    <table class="table text-nowrap">
                                                        <tbody>
                                                            <tr>
                                                                <td>Institution</td>
                                                                <td class="font-medium text-dark-medium"><?=$edu[$i]->institution?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Qualification</td>
                                                                <td class="font-medium text-dark-medium"><?=$edu[$i]->qualification?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Period</td>
                                                                <td class="font-medium text-dark-medium"><?="{$edu[$i]->start_year} - {$edu[$i]->end_year}"?></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endfor; ?>
                                    </div>
                                    <hr>
                                <h4 class="mb1 pt-5">O Level Result(s)</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="item-content">
                                                <div class="info-table table-responsive">
                                                    <h4 class="mb1 pt-5">First Sitting</h4>
                                                    <table class="table text-nowrap">
                                                        <tbody>
                                                        <tr>
                                                            <td>Exam no: <span class="font-medium text-dark-medium"><?=$oLevel[0]->exam_number?></span></td>
                                                            <td><span class="font-medium text-dark-medium"><?=$oLevel[0]->certificate?> - <?=$oLevel[0]->exam_year?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Institution:</td>
                                                            <td class="font-medium text-dark-medium"><?=$oLevel[0]->institution?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Name:</td>
                                                            <td class="font-medium text-dark-medium"><?=$oLevel[0]->name?></td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                    <table class="table table-striped" style="width: 100%">
                                                        <tr>
                                                            <td class="font-medium text-dark-medium">Subject</td>
                                                            <td class="font-medium text-dark-medium">Grade</td>
                                                        </tr>
                                                        <?php foreach ($oLevel[0]->subjects as $subject) : ?>

                                                            <tr>
                                                                <td class="font-medium text-dark-medium"><?=$subject->subject?></td>
                                                                <td class="font-medium text-dark-medium"><?=$subject->grade?></td>
                                                            </tr>

                                                        <?php endforeach; ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if(isset($oLevel[1])): ?>

                                        <div class="col-md-6 col-sm-6">
                                            <div class="item-content">
                                                <div class="info-table table-responsive">
                                                    <h4 class="mb1 pt-5">Second Sitting</h4>
                                                    <table class="table text-nowrap">
                                                        <tbody>
                                                        <tr>
                                                            <td>Exam no: <span class="font-medium text-dark-medium"><?=$oLevel[1]->exam_number?></span></td>
                                                            <td><span class="font-medium text-dark-medium"><?=$oLevel[1]->certificate?> - <?=$oLevel[1]->exam_year?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Institution:</td>
                                                            <td class="font-medium text-dark-medium"><?=$oLevel[1]->institution?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Name:</td>
                                                            <td class="font-medium text-dark-medium"><?=$oLevel[1]->name?></td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                    <table class="table table-striped" style="width: 100%">
                                                        <tr>
                                                            <td class="font-medium text-dark-medium">Subject</td>
                                                            <td class="font-medium text-dark-medium">Grade</td>
                                                        </tr>
                                                        <?php foreach ($oLevel[1]->subjects as $subject) : ?>

                                                            <tr>
                                                                <td class="font-medium text-dark-medium"><?=$subject->subject?></td>
                                                                <td class="font-medium text-dark-medium"><?=$subject->grade?></td>
                                                            </tr>

                                                        <?php endforeach; ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <?php else: ?>

                                            <div class="col-md-6 col-sm-6">
                                                <div class="item-content">
                                                    <div class="info-table table-responsive">
                                                        <h4 class="mb1 pt-5">Second Sitting</h4>
                                                        <p>No second sitting</p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 form-group mg-t-8">
                            <a href ="<?=SR."/postUTME/save-putme"?>"><button type="" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button></a>
                            <a href="<?=SR."/postUTME/reset"?>"><button type="" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Edit</button></a>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="sign-up sp">Don't have an account ? <a href="#">Signup now!</a></div>-->
        </div>
    </div>