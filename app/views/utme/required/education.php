<div class="tab-pane fade  <?= ($education) ? 'show active' : ''?>" id="tab5" role="tabpanel">
    <form action="<?=SR."/postUTME/submitEducationDetails"?>" method="post" class="new-added-form">
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
                        <input type="text" placeholder="" name="institution[]" value="<?= displayObjArray($eduDetails, 0, 'institution')?>" id="institution[]" class="form-control" required>
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
                            <?php if($eduDetails[0]->start_year == null): ?>
                                <option value=""><?=$show_data?></option>
                            <?php else:?>
                                <option value="<?=$eduDetails[0]->start_year?>"><?=$eduDetails[0]->start_year?></option>
                            <?php endif; ?>
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
                            <?php if($eduDetails[0]->end_year == null): ?>
                                <option value=""><?=$show_data?></option>
                            <?php else:?>
                                <option value="<?=$eduDetails[0]->end_year?>"><?=$eduDetails[0]->end_year?></option>
                            <?php endif; ?>
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
                        <input type="text" placeholder="" name="institution[]" value="<?=displayObjArray($eduDetails, 1, 'institution')?>"  id="institution[]" class="form-control" required>
                        <small id="institution[]-e"></small>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Qualification</label>
                        <select class="select2" name="qualification[]" id="qualification" required>
                            <?php if($eduDetails[1]->qualification == null): ?>
                                <option value=""><?=$show_data?></option>
                            <?php else:?>
                                <option value="<?=$eduDetails[1]->qualification?>"><?=$eduDetails[1]->qualification?></option>
                            <?php endif; ?>
                            <option value="WAEC">WAEC</option>
                            <option value="NECO">NECO</option>
                            <option value="NAPTEB">NAPTEB</option>
                        </select>
                        <small id="qualification-e"></small>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Start Year</label>
                        <select name="start_year[]" class="select2" required>
                            <?php if($eduDetails[1]->start_year == null): ?>
                                <option value=""><?=$show_data?></option>
                            <?php else:?>
                                <option value="<?=$eduDetails[1]->start_year?>"><?=$eduDetails[1]->start_year?></option>
                            <?php endif; ?>
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
                            <?php if($eduDetails[1]->end_year == null): ?>
                                <option value=""><?=$show_data?></option>
                            <?php else:?>
                                <option value="<?=$eduDetails[1]->end_year?>"><?=$eduDetails[1]->end_year?></option>
                            <?php endif; ?>
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
                            <?php if($eduDetails[2]->type == null): ?>
                                <option value=""><?=$show_data?></option>
                            <?php else:?>
                                <option value="<?=$eduDetails[2]->type?>"><?=ucwords($eduDetails[2]->type)?></option>
                            <?php endif; ?>
                            <option value="Polytechnic">Polytechnic</option>
                            <option value="College Of Education">College Of Education</option>
                            <option value="University">University</option>
                        </select>
                        <small id="type-e"></small>
                    </div>
                    <div class="col-xl-8 col-lg-6 col-12 form-group">
                        <label>Name of Institution</label>
                        <input type="text" placeholder="" value="<?=displayObjArray($eduDetails, 2, 'institution')?>" name="institution[]" id="institution[]" class="form-control">
                        <small id="institution[]-e"></small>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Qualification</label>
                        <input type="text" placeholder="" value="<?= displayObjArray($eduDetails, 2, 'qualification') ?>" name="qualification[]" id="qualification[]" class="form-control">
                        <small id="qualification-e"></small>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">

                        <label>Start Year</label>
                        <select name="start_year[]" class="select2">
                            <?php if($eduDetails[2]->start_year == null): ?>
                                <option value=""><?=$show_data?></option>
                            <?php else:?>
                                <option value="<?=$eduDetails[2]->start_year?>"><?=$eduDetails[2]->start_year?></option>
                            <?php endif; ?>
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
                            <?php if($eduDetails[2]->end_year == null): ?>
                                <option value=""><?=$show_data?></option>
                            <?php else:?>
                                <option value="<?=$eduDetails[2]->end_year?>"><?=$eduDetails[2]->end_year?></option>
                            <?php endif; ?>
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
                            <?php if($eduDetails[3]->type == null): ?>
                                <option value=""><?=$show_data?></option>
                            <?php else:?>
                                <option value="<?=$eduDetails[3]->type?>"><?=ucwords($eduDetails[3]->type)?></option>
                            <?php endif; ?>
                            <option value="Polytechnic">Polytechnic</option>
                            <option value="College Of Education">College Of Education</option>
                            <option value="University">University</option>
                        </select>
                        <small id="type-e"></small>
                    </div>
                    <div class="col-xl-8 col-lg-6 col-12 form-group">
                        <label>Name of Institution</label>
                        <input type="text" placeholder="" value="<?=displayObjArray($eduDetails, 3, 'institution')?>" name="institution[]" id="institution[]" class="form-control">
                        <small id="institution[]-e"></small>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Qualification</label>
                        <input type="text" placeholder="" name="qualification[]" value="<?=displayObjArray($eduDetails, 3, 'qualification')?>" id="qualification[]" class="form-control">
                        <small id="qualification-e"></small>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Start Year</label>
                        <select name="start_year[]" class="select2">
                            <?php if($eduDetails[3]->start_year == null): ?>
                                <option value=""><?=$show_data?></option>
                            <?php else:?>
                                <option value="<?=$eduDetails[3]->start_year?>"><?=$eduDetails[3]->start_year?></option>
                            <?php endif; ?>
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
                            <?php if($eduDetails[3]->end_year == null): ?>
                                <option value=""><?=$show_data?></option>
                            <?php else:?>
                                <option value="<?=$eduDetails[3]->end_year?>"><?=$eduDetails[3]->end_year?></option>
                            <?php endif; ?>
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