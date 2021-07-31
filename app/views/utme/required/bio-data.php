
<div class="tab-pane fade  <?= ($bioData) ? 'show active' : ''?>" id="tab1" role="tabpanel">
    <form action="<?=SR."/postUTME/submitBioData"?>" method="post" class="new-added-form" enctype="multipart/form-data">
        <?=\Zikzay\core\Session::has('submitError') ?
            '<div class="alert alert-danger">'.\Zikzay\core\Session::get('submitError').'</div>' : ''?>
        <div class="row">
            <div class="col-12 form-group mg-t-10 pb-4">
                <div class="form-group">
                    <label class="text-dark-medium">Upload Student Photo (150px X 150px)</label>
                    <input type="file" name="image" id="image" class="form-control-file" required style="display: none">
                    <small id="image-e"></small>
                </div>
                <div class="">
                    <?php
                    $imageUrl = UTME_ASSET_PATH."img/figure/user5.jpg";
                    if(!empty($student->image)) {
                        $imageUrl = IMG_PATH.'utme/'.$student->image;
                    }
                    ?>
                    <img id="image-img" src="<?=$imageUrl?>" width="120px">
                </div>
            </div>
            <div class="col-12">
                <h5>Admission Details</h5>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Jamb Registration Number*</label>
                        <input type="text" placeholder="" name="jamb_reg_no" id="jamb_reg_no" value="<?=display($student->jamb_reg_no)?>" class="form-control">
                        <small id="jamb_reg_no-e"></small>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Gender</label>
                        <?php $show_data = 'Please Select Option *'?>
                        <select class="select2" name="gender" id="gender" required>
                            <?php if($student->gender == null): ?>
                                <option value=""><?=$show_data?></option>
                            <?php else:?>
                                <option value="<?=$student->gender?>"><?=$student->gender?></option>
                            <?php endif; ?>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <small id="gender-e"></small>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Religion</label>
                        <input type="text" placeholder="" name="religion" value="<?=display($student->religion)?>" id="religion" class="form-control" required>
                        <small id="religion-e"></small>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h5 class="pb-2">Name Details</h5>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Surname</label>
                        <input type="text" placeholder="" name="last_name" id="last_name" value="<?=display($student->surname)?>" class="form-control" >
                        <small id="last_name-e"></small>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>First Name</label>
                        <input type="text" placeholder="" name="first_name" id="first_name" value="<?=display($student->first_name)?>"  class="form-control">
                        <small id="first_name-e"></small>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Middle Name</label>
                        <input type="text" placeholder="" name="middle_name" id="middle_name"  value="<?=display($student->middle_name)?>"  class="form-control">
                        <small id="middle_name-e"></small>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h5 class="pb-2">Contact Details</h5>
                <div class = "row">
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Phone Number</label>
                        <input type="text" placeholder="" name="phone_number" id="phone_number" value="<?=$student->phone_number?>" class="form-control" >
                        <small id="phone_number-e"></small>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Email Address</label>
                        <input type="text" placeholder="" name="email_address" id="email_address" class="form-control" value="<?=$student->email_address?>" >
                        <small id="email_address-e"></small>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Date Of Birth</label>
                        <input type="text" name="dob" id="dob" placeholder="dd/mm/yyyy" class="form-control air-datepicker" value="<?=date('d/m/Y', strtotime($student->dob))?>" required data-position="bottom right">
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
                        <input type="text" placeholder="" name="country" value="<?= displayObj($originDetails, 'country')?>" id="country" class="form-control" required>
                        <small id="country-e"></small>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>State Of Origin</label>
                        <input type="text" placeholder="" name="state" value="<?=displayObj($originDetails, 'state')?>" id="state" class="form-control" required>
                        <small id="state-e"></small>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>L.G.A</label>
                        <input type="text" placeholder="" name="town" id="town" value="<?=displayObj($originDetails,'town')?>"  class="form-control" required>
                        <small id="town-e"></small>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Hometown</label>
                        <input type="text" placeholder="" name="address" id="address" value="<?=displayObj($originDetails,'address')?>"  class="form-control" required>
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
