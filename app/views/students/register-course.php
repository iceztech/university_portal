
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Register Courses </h3>
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>Student</li>
                        <li>Register Course</li>
                    </ul>
                </div>
                <div class="row">
                    
                    <div class="col-8-xxl col-12">
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Select Courses</h3>
                                    </div>
                                  
                                </div>
                                <?=\Zikzay\core\Session::has('submitError') ?
                                    '<div class="alert alert-success">'.\Zikzay\core\Session::get('submitError').'</div>' : ''?>
                                <form method="post" action="<?=SR."/students/course-registration"?>">
                                    <div class="table-responsive">
                                        <table class="table table-hover display table-striped tab text-nowrap">
                                            <thead>
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
                                                    <th>Credit Unit</th>
                                                </tr>
                                            </thead>
                                            <tbody class="pad-10">
                                                <?php $sn = 0; foreach ($deCourses as $deCourse): ?>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input  name="departmental_course[]" value="<?= $deCourse->dc_id ?>" type="checkbox" class="form-check-input">
                                                            <label class="form-check-label"><?= ++$sn ?></label>
                                                            <input name="semester[]" value="<?= $deCourse->dc_id ?>-<?= $deCourse->c_semester?>" type="hidden" >
                                                        </div>
                                                    </td>
                                                    <td><?= $deCourse->c_code ?></td>
                                                    <td><?= $deCourse->c_title?></td>
                                                    <td><?= $deCourse->dc_level ?></td>
                                                    <td><?= $deCourse->dc_credit_load ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <div class="pt-3 col-12 form-group mg-t-8">
                                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                            <button type="reset" class="btn-fill-lg ml-3 bg-blue-dark btn-hover-yellow">Reset</button>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- All Subjects Area End Here -->