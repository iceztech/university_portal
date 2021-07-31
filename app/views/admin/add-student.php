<div class="dashboard-content-one" xmlns="http://www.w3.org/1999/html">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Students</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Student Admit Form</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Please Enter Your Details</h3>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">...</a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div>
                        </div>
                        <div class="basic-tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link <?= ($bioData) ? 'active' : ''?> px-5" data-toggle="tab" href="#tab1" role="tab" aria-selected="<?=$bioData?>">Bio Data</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link <?= ($address) ? 'active' : ''?> px-5" data-toggle="tab" href="#tab2" role="tab" aria-selected="<?=$address?>">Address</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link px-5 <?= ($kin) ? 'active' : ''?>" data-toggle="tab" href="#tab3" role="tab" aria-selected="<?=($kin)?>">Next of Kin</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link px-5 <?= ($sponsor) ? 'active' : ''?>" data-toggle="tab" href="#tab4" role="tab" aria-selected="<?= ($sponsor)?>">Sponsor Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-5 <?= ($education) ? 'active' : ''?>" data-toggle="tab" href="#tab5" role="tab" aria-selected="<?= ($education)?>">Education History</a>
                                </li>
                                <li class="nav-item">
                                 <a class="nav-link px-5 <?= ($oLevel) ? 'active' : ''?>" data-toggle="tab" href="#tab6" role="tab" aria-selected="<?= ($oLevel)?>">O-Level</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade  <?= ($bioData) ? 'show active' : ''?>" id="tab1" role="tabpanel">
                                    <form action="<?=SR."/admin/submitBioData"?>" method="post" class="new-added-form" enctype="multipart/form-data">
                                        <?=\Zikzay\core\Session::has('submitError') ?
                                            '<div class="alert alert-info">'.\Zikzay\core\Session::get('submitError').'</div>' : ''?>
                                        <div class="row">
                                            <div class="col-12 form-group mg-t-10 pb-4">
                                                <div class="form-group">
                                                    <label class="text-dark-medium">Upload Student Photo (150px X 150px)</label>
                                                    <input type="file" name="image" id="image" class="form-control-file">
                                                    <small id="image-e"></small>
                                                </div>
                                                <div class="">
                                                    <img src="<?=UTME_ASSET_PATH?>img/figure/user5.jpg" width="120px">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <h5>Admission Details</h5>
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Jamb Registration Number*</label>
                                                        <input type="text" placeholder="" name="jamb_reg_no" required id="jamb_reg_no" class="form-control">
                                                        <small id="jamb_reg_no-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Gender</label>
                                                        <select class="select2" name="gender" id="gender" required>
                                                            <option value="">Please Select Option</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                        <small id="gender-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Religion</label>
                                                        <input type="text" placeholder="" name="religion" id="religion" class="form-control" required>
                                                        <small id="religion-e"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                    <h5 class="pb-2">Name Details</h5>
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Surname</label>
                                                        <input type="text" placeholder="" required name="surname" id="last_name" class="form-control" >
                                                        <small id="last_name-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>First Name</label>
                                                        <input type="text" placeholder="" required name="first_name" id="first_name" class="form-control">
                                                        <small id="first_name-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Middle Name</label>
                                                        <input type="text" placeholder="" required name="middle_name" id="middle_name" class="form-control">
                                                        <small id="middle_name-e"></small>
                                                    </div>
                                                 </div>
                                            </div>
                                            <div class="col-12">
                                                <h5 class="pb-2">Contact Details</h5>
                                                <div class = "row">
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Phone Number</label>
                                                        <input type="text" placeholder="" required name="phone_number" id="phone_number" class="form-control" >
                                                        <small id="phone_number-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Email Address</label>
                                                        <input type="text" placeholder="" required name="email_address" id="email_address" class="form-control">
                                                        <small id="email_address-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Date Of Birth</label>
                                                        <input type="text" name="dob" id="dob" placeholder="dd/mm/yyyy" class="form-control air-datepicker" required>
                                                        <small id="dob-e"></small>
                                                        <i class="far fa-calendar-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <h5 class="pb-2">Location Details</h5>
                                                <div class = "row">
                                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                                        <label>Nationality</label>
                                                        <input type="text" placeholder="" name="country" id="country" class="form-control" required>
                                                        <small id="country-e"></small>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                                        <label>State Of Origin</label>
                                                        <input type="text" placeholder="" name="state" id="state" class="form-control" required>
                                                        <small id="state-e"></small>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                                        <label>L.G.A</label>
                                                        <input type="text" placeholder="" name="town" id="town" class="form-control" required>
                                                        <small id="town-e"></small>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                                        <label>Hometown</label>
                                                        <input type="text" placeholder="" name="address" id="address" class="form-control" required>
                                                        <small id="address-e"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group mg-t-8">
                                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade  <?= ($address) ? 'show active' : ''?>" id="tab2" role="tabpanel">
                                    <form class="new-added-form" action="<?=SR."/admin/submitAddress"?>" method="post">
                                        <?=\Zikzay\core\Session::has('submitError') ?
                                            '<div class="alert alert-info"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                                        <div class="row">
                                            <div class="col-12 pb-3">
                                                <h5 class="pb-2">Contact Address Details</h5>
                                                <div class = "row">
                                                    <div class="col-xl-7 col-lg-6 col-12 form-group">
                                                        <label>Address</label>
                                                        <input type="text" placeholder="" name="address[]" id="address[]" class="form-control" required>
                                                        <small id="address[]-e"></small>
                                                    </div>
                                                    <div class="col-xl-5 col-lg-6 col-12 form-group">
                                                        <label>City</label>
                                                        <input type="text" placeholder="" name="town[]" id="town[]" class="form-control" required>
                                                        <small id="town[]-e"></small>
                                                    </div>
                                                    <div class="col-xl-7 col-lg-6 col-12 form-group">
                                                        <label>State</label>
                                                        <input type="text" placeholder="" name="state[]" id="state[]" class="form-control" required>
                                                        <small id="state[]-e"></small>
                                                    </div>
                                                    <div class="col-xl-5 col-lg-6 col-12 form-group">
                                                        <label>Country</label>
                                                        <input type="text" placeholder=" " name="country[]" id="country[]" class="form-control" required>
                                                        <small id="country[]-e"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 pb-3">
                                                <h5 class="pb-2">Permanent Address Details</h5>
                                                <div class = "row">
                                                    <div class="col-xl-7 col-lg-6 col-12 form-group">
                                                        <label>Address</label>
                                                        <input type="text" placeholder="" name="address[]" id="address[]" class="form-control" required>
                                                        <small id="address[]-e"></small>
                                                    </div>
                                                    <div class="col-xl-5 col-lg-6 col-12 form-group">
                                                        <label>City</label>
                                                        <input type="text" placeholder="" name="town[]"  id="town[]" class="form-control" required>
                                                        <small id="town[]-e"></small>
                                                    </div>
                                                    <div class="col-xl-7 col-lg-6 col-12 form-group">
                                                        <label>State</label>
                                                        <input type="text" placeholder="" name="state[]" id="state[]" class="form-control" required>
                                                        <small id="state[]-e"></small>
                                                    </div>
                                                    <div class="col-xl-5 col-lg-6 col-12 form-group">
                                                        <label>Country</label>
                                                        <input type="text" placeholder="" name="country[]"  id="country[]" class="form-control" required>
                                                        <small id="country[]-e"></small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 form-group mg-t-8">
                                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade  <?= ($kin) ? 'show active' : ''?>" id="tab3" role="tabpanel">
                                    <form class="new-added-form" action="<?=SR."/admin/submitKinDetails"?>" method="post">
                                        <?=\Zikzay\core\Session::has('submitError') ?
                                            '<div class="alert alert-info">'.\Zikzay\core\Session::get('submitError').'</div>' : ''?>
                                        <div class="row">
                                            <div class="col-12 pb-3">
                                                <h5 class="pb-2">Next of kin Details</h5>
                                                <div class = "row">
                                                    <div class="col-xl-8 col-lg-6 col-12 form-group">
                                                        <label>Name</label>
                                                        <input type="text" placeholder="" name="name"  id="name" class="form-control" required>
                                                        <small id="name-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Relationship</label>
                                                        <input type="text" placeholder="" name="relationship" id="relationship" class="form-control" required>
                                                        <small id="relationship-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Phone Number</label>
                                                        <input type="text" placeholder="" name="phone_number" id="phone_number" class="form-control" required>
                                                        <small id="phone_number-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Email Address</label>
                                                        <input type="text" placeholder="" name="email_address" id="email_address" class="form-control" required>
                                                        <small id="email_address-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Address</label>
                                                        <input type="text" placeholder="" name="address" id="address" class="form-control" required>
                                                        <small id="address-e"></small>
                                                    </div>
                                                    <div class="col-12 form-group mg-t-8">
                                                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade  <?= ($sponsor) ? 'show active' : ''?>" id="tab4" role="tabpanel">
                                    <form class="new-added-form" action="<?=SR."/admin/submitSponsorDetails"?>" method="post">
                                        <?=\Zikzay\core\Session::has('submitError') ?
                                            '<div class="alert alert-info">'.\Zikzay\core\Session::get('submitError').'</div>' : ''?>
                                        <div class="row">
                                            <div class="col-12 pb-3">
                                                <h5 class="pb-2">Sponsor Details</h5>
                                                <div class = "row">
                                                    <div class="col-xl-8 col-lg-6 col-12 form-group">
                                                        <label>Name</label>
                                                        <input type="text" placeholder="" name="name" id="name" class="form-control" required>
                                                        <small id="name-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Relationship</label>
                                                        <input type="text" placeholder="" name="relationship" id="relationship" class="form-control" required>
                                                        <small id="relationship-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Phone Number</label>
                                                        <input type="text" placeholder="" name="phone_number" id="phone_number" class="form-control" required>
                                                        <small id="phone_number-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Email Address</label>
                                                        <input type="text" placeholder="" name="email_address" id="email_address" class="form-control" required>
                                                        <small id="email_address-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Address</label>
                                                        <input type="text" placeholder="" name="address" id="address" class="form-control" required>
                                                        <small id="address-e"></small>
                                                    </div>
                                                    <div class="col-12 form-group mg-t-8">
                                                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade  <?= ($education) ? 'show active' : ''?>" id="tab5" role="tabpanel">
                                    <form action="<?=SR."/admin/submitEducationDetails"?>" method="post" class="new-added-form">
                                        <?=\Zikzay\core\Session::has('submitError') ?
                                            '<div class="alert alert-info">'.\Zikzay\core\Session::get('submitError').'</div>' : ''?>
                                        <div class="row">
                                            <div class="col-12">
                                                <h5>Primary School Details 1</h5>
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Institution Type</label>
                                                        <select class="select2" name="type[]" id="type" required>
                                                            <option value="primary school">Primary School</option>
                                                        </select>
                                                        <small id="type-e"></small>
                                                    </div>
                                                    <div class="col-xl-8 col-lg-6 col-12 form-group">
                                                        <label>Name of Institution</label>
                                                        <input type="text" placeholder="" name="institution[]" id="institution[]" class="form-control" required>
                                                        <small id="institution[]-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Qualification</label>
                                                        <select class="select2" name="qualification[]" id="qualification[]" required>
                                                            <option value="first school leaving certificate">First School Leaving Certificate</option>
                                                        </select>
                                                        <small id="qualification-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">

                                                        <label>Start Year</label>
                                                        <select name="start_year[]" class="select2" required>
                                                            <option value="" >Please Select Option</option>
                                                            <?php
                                                            $year = date('Y');
                                                            for ($i = 0; $i < 50; $i++) {
                                                                echo '<option value="'.$year.'">'.$year.'</option>';
                                                                $year--;
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">

                                                        <label>End Year</label>
                                                        <select name="end_year[]" class="select2" required>
                                                            <option value="" >Please Select Option</option>
                                                            <?php
                                                            $year = date('Y');
                                                            for ($i = 0; $i < 50; $i++) {
                                                                echo '<option value="'.$year.'">'.$year.'</option>';
                                                                $year--;
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <hr class="pb-5">
                                                <h5>Secondary School Details</h5>
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Institution Type</label>
                                                        <select class="select2" name="type[]" id="type2" required>
                                                            <option value="secondary school">Secondary School</option>
                                                        </select>
                                                        <small id="type2-e"></small>
                                                    </div>
                                                    <div class="col-xl-8 col-lg-6 col-12 form-group">
                                                        <label>Name of Institution</label>
                                                        <input type="text" placeholder="" name="institution[]" id="institution[]" class="form-control" required>
                                                        <small id="institution[]-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Qualification</label>
                                                        <select class="select2" name="qualification[]" id="qualification" required>
                                                            <option value="" >Please Select Option</option>
                                                            <option value="WAEC">WAEC</option>
                                                            <option value="NECO">NECO</option>
                                                            <option value="NAPTEB">NAPTEB</option>
                                                        </select>
                                                        <small id="qualification-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Start Year</label>
                                                        <select name="start_year[]" class="select2" required>
                                                            <option value="" >Please Select Option</option>
                                                            <?php
                                                            $year = date('Y');
                                                            for ($i = 0; $i < 50; $i++) {
                                                                echo '<option value="'.$year.'">'.$year.'</option>';
                                                                $year--;
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">

                                                        <label>End Year</label>
                                                        <select name="end_year[]" class="select2" required>
                                                            <option value="" >Please Select Option</option>
                                                            <?php
                                                            $year = date('Y');
                                                            for ($i = 0; $i < 50; $i++) {
                                                                echo '<option value="'.$year.'">'.$year.'</option>';
                                                                $year--;
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <hr class="pb-5">
                                                <h5>Other Educational details</h5>
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Institution Type</label>
                                                        <select class="select2" name="type[]" id="type3">
                                                            <option value="" >Please Select Option</option>
                                                            <option value="Polytechnic">Polytechnic</option>
                                                            <option value="College Of Education">College Of Education</option>
                                                            <option value="University">University</option>
                                                        </select>
                                                        <small id="type-e"></small>
                                                    </div>
                                                    <div class="col-xl-8 col-lg-6 col-12 form-group">
                                                        <label>Name of Institution</label>
                                                        <input type="text" placeholder="" name="institution[]" id="institution[]" class="form-control">
                                                        <small id="institution[]-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Qualification</label>
                                                        <input type="text" placeholder="" name="qualification[]" id="qualification[]" class="form-control">
                                                        <small id="qualification-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">

                                                        <label>Start Year</label>
                                                        <select name="start_year[]" class="select2">
                                                            <option value="" >Please Select Option</option>
                                                            <?php
                                                            $year = date('Y');
                                                            for ($i = 0; $i < 50; $i++) {
                                                                echo '<option value="'.$year.'">'.$year.'</option>';
                                                                $year--;
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">

                                                        <label>End Year</label>
                                                        <select name="end_year[]" class="select2">
                                                            <option value="" >Please Select Option</option>
                                                            <?php
                                                            $year = date('Y');
                                                            for ($i = 0; $i < 50; $i++) {
                                                                echo '<option value="'.$year.'">'.$year.'</option>';
                                                                $year--;
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <hr class="pb-5">
                                                <h5>Other Educational details</h5>
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Institution Type</label>
                                                        <select class="select2" name="type[]" id="type4">
                                                            <option value="" >Please Select Option</option>
                                                            <option value="Polytechnic">Polytechnic</option>
                                                            <option value="College Of Education">College Of Education</option>
                                                            <option value="University">University</option>
                                                        </select>
                                                        <small id="type-e"></small>
                                                    </div>
                                                    <div class="col-xl-8 col-lg-6 col-12 form-group">
                                                        <label>Name of Institution</label>
                                                        <input type="text" placeholder="" name="institution[]" id="institution[]" class="form-control">
                                                        <small id="institution[]-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Qualification</label>
                                                        <input type="text" placeholder="" name="qualification[]" id="qualification[]" class="form-control">
                                                        <small id="qualification-e"></small>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                                        <label>Start Year</label>
                                                        <select name="start_year[]" class="select2">
                                                            <option value="" >Please Select Option</option>
                                                            <?php
                                                            $year = date('Y');
                                                            for ($i = 0; $i < 50; $i++) {
                                                                echo '<option value="'.$year.'">'.$year.'</option>';
                                                                $year--;
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-12 form-group">

                                                        <label>End Year</label>
                                                        <select name="end_year[]" class="select2">
                                                            <option value="" >Please Select Option</option>
                                                            <?php
                                                            $year = date('Y');
                                                            for ($i = 0; $i < 50; $i++) {
                                                                echo '<option value="'.$year.'">'.$year.'</option>';
                                                                $year--;
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group mg-t-8">
                                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade  <?= ($oLevel) ? 'show active' : ''?>" id="tab6" role="tabpanel">
                                    <form method="post" action="<?=SR."/admin/submitOLevel"?>" class="new-added-form">
                                        <?=\Zikzay\core\Session::has('submitError') ?
                                            '<div class="alert alert-info">'.\Zikzay\core\Session::get('submitError').'</div>' : ''?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-lg-12 form-group">
                                                        <h5 class="pb-2" >O'level Results</h5>
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-6 col-12  pb-1">
                                                                <label>Name</label>
                                                                <input type="text" placeholder="" name="name[]" id="name[]" class="form-control" required>
                                                                <small id="name[]-e"></small>
                                                            </div>
                                                            <div class="col-xl-3 col-lg-3 col-12  pb-1">
                                                                <label>Exam Number</label>
                                                                <input type="text" placeholder="" name="exam_number[]" id="exam_number[]" class="form-control" required>
                                                                <small id="exam_number[]-e"></small>
                                                            </div>
                                                            <div class="col-xl-3 col-lg-3 col-12 pb-1">
                                                                <label>Exam Type</label>
                                                                <select name="certificate[]" class="select2" required>
                                                                    <option value="" >Please Select Option</option>
                                                                    <option value="
                                                                    <option value="WAEC">WAEC</option>
                                                                    <option value="NECO">NECO</option>
                                                                    <option value="GCE">GCE</option>
                                                                    <option value="NABTEB">NABTEB</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-xl-8 col-lg-8 col-12  pt-3">
                                                                <label>School</label>
                                                                <input type="text" placeholder="" name="institution[]" class="form-control" required>
                                                                <small id="institution[]-e"></small>
                                                            </div>
                                                            <div class="col-xl-4 col-lg-4 col-12 form-group pt-3">
                                                                <label>Exam Year</label>
                                                                <select name="exam_year[]" class="select2" required>
                                                                    <option value="" >Please Select Option</option>
                                                                    <?php
                                                                    $year = date('Y');
                                                                    for ($i = 0; $i < 50; $i++) {
                                                                        echo '<option value="'.$year.'">'.$year.'</option>';
                                                                        $year--;
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <small id="exam_year[]-e"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "col-12">
                                                        <div class="row">
                                                            <div class="col-12 pb-3 pt-5">
                                                                <h5>Enter Exam Results</h5>
                                                            </div>
                                                            <?php for($i = 1; $i <= 9; $i++) : ?>
                                                            <div class="col-8 form-group">
                                                                <label>Subject <?=$i?></label>
                                                                <select name="subject[]" class="select2">
                                                                    <option value="">Please Select</option>
                                                                    <?php foreach (SUBJECT_OPTIONS as $subject) : ?>
                                                                    <option value="<?=$subject?>"><?=$subject?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-4 form-group">
                                                                <label>Grade</label>
                                                                <select name="grade[]" class="select2">
                                                                    <option value="">Please Select</option>
                                                                    <?php foreach (GRADE_OPTIONS as $grade) : ?>
                                                                        <option value="<?=$grade?>"><?=$grade?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <?php endfor; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <!--Enter second details-->
                                                    <div class="col-lg-12 form-group">
                                                        <h5 class="pb-2 pt-" >Second O'level Results (OPTIONAL)</h5>
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-6 col-12  pb-1">
                                                                <label>Name</label>
                                                                <input type="text" placeholder="" name="name[]" id="name[]" class="form-control">
                                                                <small id="name[]-e"></small>
                                                            </div>
                                                            <div class="col-xl-3 col-lg-3 col-12  pb-1">
                                                                <label>Exam Number</label>
                                                                <input type="text" placeholder="" name="exam_number[]" id="exam_number[]" class="form-control">
                                                                <small id="exam_number[]-e"></small>
                                                            </div>
                                                            <div class="col-xl-3 col-lg-3 col-12 pb-1">
                                                                <label>Exam Type</label>
                                                                <select name="certificate[]" class="select2">
                                                                    <option value="" >Please Select Option</option>
                                                                    <option value="WAEC">WAEC</option>
                                                                    <option value="NECO">NECO</option>
                                                                    <option value="GCE">GCE</option>
                                                                    <option value="NABTEB">NABTEB</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-xl-8 col-lg-8 col-12  pt-3">
                                                                <label>School</label>
                                                                <input type="text" placeholder="" name="institution[]" class="form-control">
                                                                <small id="institution[]-e"></small>
                                                            </div>
                                                            <div class="col-xl-4 col-lg-4 col-12 form-group pt-3">
                                                                <label>Exam Year</label>
                                                                <select name="exam_year[]" class="select2">
                                                                    <option value="" >Please Select Option</option>
                                                                    <?php
                                                                    $year = date('Y');
                                                                    for ($i = 0; $i < 50; $i++) {
                                                                        echo '<option value="'.$year.'">'.$year.'</option>';
                                                                        $year--;
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12 pb-3 pt-5">
                                                            <h5>Enter Exam Results</h5>
                                                        </div>
                                                        <?php for($i = 1; $i <= 9; $i++) : ?>
                                                            <div class="col-8 form-group">
                                                                <label>Subject <?=$i?></label>
                                                                <select name="subject[]" class="select2">
                                                                    <option value="">Please Select</option>
                                                                    <?php foreach (SUBJECT_OPTIONS as $subject) : ?>
                                                                        <option value="<?=$subject?>"><?=$subject?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-4 form-group">
                                                                <label>Grade</label>
                                                                <select name="grade[]" class="select2">
                                                                    <option value="">Please Select</option>
                                                                    <?php foreach (GRADE_OPTIONS as $grade) : ?>
                                                                        <option value="<?=$grade?>"><?=$grade?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        <?php endfor; ?>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-12 form-group mg-t-8">
                                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>


                        </div>


                    </div>
