<div class="tab-pane fade  <?= ($address) ? 'show active' : ''?>" id="tab2" role="tabpanel">
    <form class="new-added-form" action="<?=SR."/postUTME/submitAddress"?>" method="post">
        <?=\Zikzay\core\Session::has('submitError') ?
            '<div class="alert alert-danger"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
        <div class="row">
            <div class="col-12 pb-3">
                <h5 class="pb-2">Contact Address Details</h5>
                <div class = "row">
                    <div class="col-xl-7 col-lg-6 col-12 form-group">
                        <label>Address</label>
                        <input type="text" placeholder="" value="<?=displayObj($contactDetails,'address')?>" name="address[]" id="address[]" class="form-control" required>
                        <small id="address[]-e"></small>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-12 form-group">
                        <label>City</label>
                        <input type="text" placeholder="" name="town[]"value="<?=displayObj($contactDetails, 'town')?>" id="town[]" class="form-control" required>
                        <small id="town[]-e"></small>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-12 form-group">
                        <label>State</label>
                        <input type="text" placeholder="" name="state[]" value="<?=displayObj($contactDetails, 'state')?>" id="state[]" class="form-control" required>
                        <small id="state[]-e"></small>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-12 form-group">
                        <label>Country</label>
                        <input type="text" placeholder="" value="<?=displayObj($contactDetails, 'country')?> " name="country[]" id="country[]" class="form-control" required>
                        <small id="country[]-e"></small>
                    </div>
                </div>
            </div>
            <div class="col-12 pb-3">
                <h5 class="pb-2">Permanent Address Details</h5>
                <div class = "row">
                    <div class="col-xl-7 col-lg-6 col-12 form-group">
                        <label>Address</label>
                        <input type="text" placeholder="" value="<?=displayObj($permanentAddressDetails, 'address')?>" name="address[]" id="address[]" class="form-control" required>
                        <small id="address[]-e"></small>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-12 form-group">
                        <label>City</label>
                        <input type="text" placeholder="" name="town[]" value="<?=displayObj($permanentAddressDetails, 'town')?>" id="town[]" class="form-control" required>
                        <small id="town[]-e"></small>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-12 form-group">
                        <label>State</label>
                        <input type="text" placeholder="" name="state[]"  value="<?=displayObj($permanentAddressDetails, 'state')?>" id="state[]" class="form-control" required>
                        <small id="state[]-e"></small>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-12 form-group">
                        <label>Country</label>
                        <input type="text" placeholder="" name="country[]" value="<?=displayObj($permanentAddressDetails, 'country')?>"  id="country[]" class="form-control" required>
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