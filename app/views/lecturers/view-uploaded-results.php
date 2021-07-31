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
                            <a href="<?= SR. '/lecturers/edit-uploaded-results'?>"><li><button type="button" class=" pill btn-fill-lmd radius-30
                                 text-light shadow-red bg-red">Edit Uploaded Results</button></li>
                            </a>          
                        </ul>
                    </div>
                </div>
                <!-- Dashboard summery End Here -->

              
				
 				<div class="card height-auto pt-5">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3 class="pt-2">View Uploaded Results</h3>
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
                                        <th>C.A</th>
                                        <th>Exam</th>
                                        <th colspan="">Total</th>
                                        <th colspan="">Grade</th>
                                    </tr>

                                    <tbody class="pad-10">
                                    <?php $sn = 0; foreach ($courses as $course) :?>
                                        <tr>
                                            <td>
                                                <div class="form-check-1">
                                                    <label class="form-check-label"><?= ++$sn?></label>
                                                </div>
                                            </td>
                                            <td><?= displayObjProp($course, 'student','name')?></td>
                                            <td><?= displayObjProp($course, 'student','reg_no')?></td>
                                            <td><?= displayObjProp($course, 'student','total_score')?></td>
                                            <td><?= displayObj($course, 'rc_continuous_assessment_score') ?></td>
                                            <td><?= displayObj($course, 'rc_exam_score') ?></td>
                                            <td><?= displayObjProp($course, 'student','grade')?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Fees Table Area End Here -->