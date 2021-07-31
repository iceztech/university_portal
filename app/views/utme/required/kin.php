<div class="tab-pane fade  <?= ($kin) ? 'show active' : ''?>" id="tab3" role="tabpanel">
    <form class="new-added-form" action="<?=SR."/postUTME/submitKinDetails"?>" method="post">
        <div class="row">
            <div class="col-12 pb-3">
                <h5 class="pb-2">Next of kin Details</h5>
                <div class = "row">
                    <div class="col-xl-8 col-lg-6 col-12 form-group">
                        <label>Name</label>
                        <input type="text" placeholder="" name="name" value="<?=displayObj($kinDetails, 'name')?>"  id="name" class="form-control" required>
                        <small id="name-e"></small>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Relationship</label>
                        <input type="text" placeholder="" value="<?=displayObj($kinDetails, 'relationship')?>" name="relationship" id="relationship" class="form-control" required>
                        <small id="relationship-e"></small>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Phone Number</label>
                        <input type="text" placeholder="" name="phone_number" value="<?=displayObj($kinDetails, 'phone_number')?>" id="phone_number" class="form-control" required>
                        <small id="phone_number-e"></small>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Email Address</label>
                        <input type="text" placeholder="" name="email_address" id="email_address" value="<?=displayObj($kinDetails, 'email_address')?>" class="form-control" required>
                        <small id="email_address-e"></small>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Address</label>
                        <input type="text" placeholder="" name="address" id="address" value="<?=displayObj($kinDetails, 'address')?>" class="form-control" required>
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