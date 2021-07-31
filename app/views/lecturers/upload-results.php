			<div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Upload Results</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Upload Results</li>
                    </ul>
                </div>
				<!-- Dashboard summery Start Here -->
                <div class="row gutters-20 pb-3">
                    <div class="col-xl-4 col-sm-6 col-12">
                        <ul>
                            <a href="<?= SR.'/lecturers/view-uploaded-results'?>"><li><button type="button" class=" pill btn-fill-lmd radius-30
                                 text-light shadow-red bg-red">View Uploaded Results</button></li>
                            </a>          
                        </ul>
                    </div>
                </div>
                <!-- Dashboard summery End Here -->

              
				
 				<div class="card height-auto pt-5">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Upload Student Results</h3>
								<br>
                            </div>
                        </div>
                        <?=\Zikzay\core\Session::has('submitError') ?
                            '<div class="alert alert-success">'.\Zikzay\core\Session::get('submitError').'</div>' : ''?>
                        <div class="table-responsive">
                            <form action="<?=SR."/lecturers/result-upload"?>" method="post">
                                <table class="table data-table text-nowrap">

                                    <tr>
                                        <th>
                                            <div class="form-check-1">
                                                <label class="form-check-label">S/N</label>
                                            </div>
                                        </th>
                                        <th>Name</th>
                                        <th>Reg Number</th>
                                        <th colspan="">C.A Results</th>
                                        <th colspan="">Exam Results</th>
                                    </tr>

                                    <tbody>
                                    <?php $sn = 0; foreach ($courses as $course) :?>
                                        <tr>
                                            <td>
                                                <div class="form-check-1">
                                                    <label class="form-check-label"><?= ++$sn?></label>
                                                </div>
                                            </td>
                                            <td><?= displayObjProp($course, 'student','name')?></td>
                                            <input name="student[]" value="<?=displayObj($course, 'rc_student')?>" hidden>
                                            <input type="text" name="departmental_course" value="<?=displayObj($course, 'rc_departmental_course')?>" hidden>
                                            <td><?= displayObjProp($course, 'student','reg_no')?></td>
                                            <td>
                                                <div class=" form-group ml-8 mt-3">
                                                    <input type="text" name="continuous_assessment_score[]" id="continuous_assessment_score" placeholder="" class="form-control">
                                                    <small class="continuous_assessment_score-e"></small>
                                                </div>
                                            </td>
                                            <td>
                                                <div class=" form-group ml-8 mt-3">
                                                    <input type="text" name="exam_score[]" id="exam_score" placeholder="" class="form-control">
                                                    <small class="exam_score-e"></small>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <hr>
                                <div class=" form-group ml-8 mt-3">
                                    <a><button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Fees Table Area End Here -->