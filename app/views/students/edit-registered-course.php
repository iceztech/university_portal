			<div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Edit Registered Course</h3>
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>Students</li>
                        <li>Edit Registered Course</li>
                    </ul>
                </div>
				<!-- Dashboard summery Start Here -->
                <div class="row gutters-20">
                    <div class="col-xl-4 col-sm-6 col-12">
                        <ul>
                            <a href="<?=SR.'/students/view-registered-courses'?>"><li><button type="button" class=" pill btn-fill-lmd radius-30
                                 text-light shadow-red bg-red">View Registered Courses</button></li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="card height-auto pt-5">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Registered Courses</h3>
                            </div>
                        </div>
                    <?=\Zikzay\core\Session::has('submitError') ?
                        '<div class="alert alert-success"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                        <form method="post" action="<?= SR. "/students/course-registration"?>">
                            <div class="table-responsive">
                                <table class="table data-table text-nowrap">

                                    <tr>
                                        <th>
                                            <div class="form-check">
                                                <input type="checkbox" name="departmental_course[]" class="form-check-input checkAll">
                                                <label class="form-check-label">S/N</label>
                                            </div>
                                        </th>
                                        <th>Course Code</th>
                                        <th>Course Title</th>
                                        <th>Level</th>
                                        <th colspan="2">Credit Unit</th>
                                    </tr>
                                    <tbody class="pad-10">
                                    <?php $sn = 0; foreach ($courses as $course): ?>
                                        <tr class="pad-30">
                                            <td>
                                                <div class="form-check">
                                                    <input  <?= (displayObj($course, 'rc_student') == "$student") ? 'checked' : '' ;?>   name="departmental_course[]" value="<?= $course->dc_id ?>" type="checkbox" class="form-check-input">
                                                    <label class="form-check-label"><?= ++$sn ?></label>
                                                    <input name="semester[]" value="<?= $course->dc_id ?>-<?= $course->c_semester?>" type="hidden" >
                                                </div>
                                            </td>
                                            <td><?= $course->c_code ?></td>
                                            <td><?= $course->c_title?></td>
                                            <td><?= $course->dc_level ?> Level</td>
                                            <td class="text-center"><?= $course->dc_credit_load?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                    <td>
                                        <div class=" form-group ml-8 mt-3">
                                            <a><button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update</button></a>
                                        </div>
                                    </td>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Fees Table Area End Here -->