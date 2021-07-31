<div class="tab-pane fade  <?= ($oLevel) ? 'show active' : ''?>" id="tab6" role="tabpanel">
    <form method="post" action="<?=SR."/postUTME/submitOLevel"?>" class="new-added-form">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-lg-12 form-group">
                        <h5 class="pb-2" >O'level Results</h5>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12  pb-1">
                                <label>Name</label>
                                <input type="text" value="<?=displayObjArray($oLevelDetails,0,'name')?>" placeholder="" name="name[]" id="name[]" class="form-control" required>
                                <small id="name[]-e"></small>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-12  pb-1">
                                <label>Exam Number</label>
                                <input type="text" placeholder="" value=" <?=displayObjArray($oLevelDetails,0,'exam_number')?>" name="exam_number[]" id="exam_number[]" class="form-control" required>
                                <small id="exam_number[]-e"></small>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-12 pb-1">
                                <label>Exam Type</label>
                                <select name="certificate[]" class="select2" required>
                                    <?php if($oLevelDetails[0]->certificate == null):?>
                                        <option value=""><?=$show_data?></option>
                                    <?php else : ?>
                                        <option value="<?=$oLevelDetails[0]->certificate?>"><?=$oLevelDetails[0]->certificate?></option>
                                    <?php endif;?>
                                    <option value="
                                                                    <option value="WAEC">WAEC</option>
                                    <option value="NECO">NECO</option>
                                    <option value="GCE">GCE</option>
                                    <option value="NABTEB">NABTEB</option>
                                </select>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-12  pt-3">
                                <label>School</label>
                                <input type="text" placeholder="" value="<?=displayObjArray($oLevelDetails,0,'institution')?>" name="institution[]" class="form-control" required>
                                <small id="institution[]-e"></small>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12 form-group pt-3">
                                <label>Exam Year</label>
                                <select name="exam_year[]" class="select2" required>
                                    <?php if ($oLevelDetails[0]->exam_year == null) :?>
                                        <option value=""><?=$show_data?></option>
                                    <?php else: ?>
                                        <option value="<?=$oLevelDetails[0]->exam_year?>"><?=$oLevelDetails[0]->exam_year?></option>
                                    <?php endif; ?>
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

                                            <?php
                                            $selected = '';
                                            if(isset($oLevelDetails[0]->subjects[$i - 1]->subject)) {
                                                if($oLevelDetails[0]->subjects[$i - 1]->subject == $subject) {
                                                    $selected = 'selected';
                                                }
                                            }
                                            ?>

                                            <option <?=$selected?> value="<?=$subject?>"><?=$subject?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-4 form-group">
                                    <label>Grade</label>
                                    <select name="grade[]" class="select2">
                                        <option value="">Please Select</option>
                                        <?php foreach (GRADE_OPTIONS as $grade) : ?>
                                            <?php
                                            $selected = '';
                                            if(isset($oLevelDetails[0]->subjects[$i - 1]->grade)) {
                                                if($oLevelDetails[0]->subjects[$i - 1]->grade == $grade) {
                                                    $selected = 'selected';
                                                }
                                            }
                                            ?>

                                            <option <?=$selected?> value="<?=$grade?>"><?=$grade?></option>
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
                                <input type="text" placeholder="" value="<?=displayObjArray($oLevelDetails,1,'name')?>" name="name[]" id="name[]" class="form-control">
                                <small id="name[]-e"></small>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-12  pb-1">
                                <label>Exam Number</label>
                                <input type="text" placeholder="" value="<?=displayObjArray($oLevelDetails,1,'exam_number')?>" name="exam_number[]" id="exam_number[]" class="form-control">
                                <small id="exam_number[]-e"></small>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-12 pb-1">
                                <label>Exam Type</label>
                                <select name="certificate[]" class="select2">
                                    <?php if($oLevelDetails[1]->certificate == null): ?>
                                        <option value=""><?=$show_data?></option>
                                    <?php else : ?>
                                        <option value="<?=$oLevelDetails[1]->certificate?>"><?=$oLevelDetails[1]->certificate?></option>
                                    <?php endif;?>
                                    <option value="WAEC">WAEC</option>
                                    <option value="NECO">NECO</option>
                                    <option value="GCE">GCE</option>
                                    <option value="NABTEB">NABTEB</option>
                                </select>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-12  pt-3">
                                <label>School</label>
                                <input type="text" placeholder="" value="<?=displayObjArray($oLevelDetails,1,'institution')?>" name="institution[]" class="form-control">
                                <small id="institution[]-e"></small>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12 form-group pt-3">
                                <label>Exam Year</label>
                                <select name="exam_year[]" class="select2">
                                    <?php if($oLevelDetails[1]->exam_year == null): ?>
                                        <option value=""><?=$show_data?></option>
                                    <?php else : ?>
                                        <option value="<?=$oLevelDetails[1]->exam_year?>"><?=$oLevelDetails[1]->exam_year?></option>
                                    <?php endif;?>
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

                                        <?php
                                        $selected = '';
                                        if(isset($oLevelDetails[1]->subjects[$i - 1]->subject)) {
                                            if($oLevelDetails[1]->subjects[$i - 1]->subject == $subject) {
                                                $selected = 'selected';
                                            }
                                        }
                                        ?>

                                        <option <?=$selected?> value="<?=$subject?>"><?=$subject?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-4 form-group">
                                <label>Grade</label>
                                <select name="grade[]" class="select2">
                                    <option value="">Please Select</option>
                                    <?php foreach (GRADE_OPTIONS as $grade) : ?>
                                        <?php
                                        $selected = '';
                                        if(isset($oLevelDetails[1]->subjects[$i - 1]->grade)) {
                                            if($oLevelDetails[1]->subjects[$i - 1]->grade == $grade) {
                                                $selected = 'selected';
                                            }
                                        }
                                        ?>

                                        <option <?=$selected?> value="<?=$grade?>"><?=$grade?></option>
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