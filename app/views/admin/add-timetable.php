            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Accounts</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Add Courses</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add Expense Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add Timetable for <?= $deCoursesFirst[0]->dc_level .' Level '?><?= $deCoursesFirst[0]->d_name    ?></h3>
                            </div>
                         
                        </div>
                        <?=\Zikzay\core\Session::has('submitError') ?
                            '<div class="alert alert-success"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                        <div class="row">
                            <form class="new-added-form col-md-6" method="post" action="<?= SR.'/admin/storeTimetable'?>">
                                <h4>First Semester</h4>
                                <div class="row">
                                    <input type="text" name="department" value="<?= $deCoursesFirst[0]->dc_department?>" hidden class="form-control">
                                    <input type="text" name="semester" value="<?= $firstSemester?>" hidden class="form-control">
                                    <div class="col-lg-6 col-12 form-group">
                                        <label>Course</label>
                                        <select  name="departmental_course" class="select2">
                                            <option value="">Please Select *</option>
                                            <?php foreach ($deCoursesFirst as $deCourse):?>
                                                <option value="<?= $deCourse->dc_id?>"><?= $deCourse->c_title?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-12 form-group">
                                        <label>Day</label>
                                        <select name="day"  class="select2">
                                            <option value="">Please Select *</option>
                                            <option value="1">Monday</option>
                                            <option value="2">Tuesday</option>
                                            <option value="3">Wednesday</option>
                                            <option value="4">Thursday</option>
                                            <option value="5">Friday</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-12 form-group">
                                        <label>Start Time</label>
                                        <input type="time" name="start_time" class="form-control" >
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="col-lg-6 col-12 form-group">
                                        <label>End Time</label>
                                        <input type="time" name="end_time" class="form-control" >
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="col-lg-12 col-12 form-group">
                                        <label>Venue</label>
                                        <input name="venue" type="text" placeholder="" class="form-control" >
                                    </div>
                                    <div class="col-12 form-group mg-t-8">
                                        <button type="submit" class="btn-fill-sm btn-gradient-yellow btn-hover-bluedark">Save</button>
                                        <button type="reset" class="btn-fill-sm bg-blue-dark btn-hover-yellow">Reset</button>
                                    </div>
                                </div>
                            </form>
                            <form class="new-added-form col-md-6" method="post" action="<?= SR.'/admin/storeTimetable'?>">
                                <h4>Second Semester</h4>
                                <div class="row">
                                    <input type="text" name="semester" value="<?= $secondSemester?>" hidden class="form-control">
                                    <input type="text" name="department" value="<?= $deCoursesSecond[0]->dc_department?>" hidden class="form-control">
                                    <div class="col-lg-6 col-12 form-group">
                                        <label>Course</label>
                                        <select  name="departmental_course" class="select2">
                                            <option value="">Please Select *</option>
                                            <?php foreach ($deCoursesSecond as $deCourse):?>
                                                <option value="<?= $deCourse->dc_id?>"><?= $deCourse->c_title?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-12 form-group">
                                        <label>Day</label>
                                        <select name="day"  class="select2">
                                            <option value="">Please Select *</option>
                                            <option value="1">Monday</option>
                                            <option value="2">Tuesday</option>
                                            <option value="3">Wednesday</option>
                                            <option value="4">Thursday</option>
                                            <option value="5">Friday</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-12 form-group">
                                        <label>Start Time</label>
                                        <input type="time" name="start_time" class="form-control" >
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="col-lg-6 col-12 form-group">
                                        <label>End Time</label>
                                        <input type="time" name="end_time" class="form-control" >
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="col-lg-12 col-12 form-group">
                                        <label>Venue</label>
                                        <input name="venue" type="text" placeholder="" class="form-control" >
                                    </div>
                                    <div class="col-12 form-group mg-t-8">
                                        <button type="submit" class="btn-fill-sm btn-gradient-yellow btn-hover-bluedark">Save</button>
                                        <button type="reset" class="btn-fill-sm bg-blue-dark btn-hover-yellow">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-12 pt-5">
                            <div class="card height-auto pt-4">
                                <div class="card-body">
                                    <div class="heading-layout1">
                                        <div class="item-title pb-3">
                                            <h3 class="text-center">First Semester Timetable</h3>
                                        </div>

                                    </div>
                                    <div class="table-responsive">
                                        <table class="table display data-table text-nowrap">
                                            <thead>
                                            <tr>
                                                <th><label class="form-check-label">Course Title</label></th>
                                                <th>Course Code</th>
                                                <th>Day</th>
                                                <th>Time</th>
                                                <th colspan="2">Venue</th>
                                            </tr>
                                            </thead>
                                        <?php foreach ($timetableFirsts as $timetableFirst) :?>
                                            <?php
                                                if($timetableFirst->ct_department != null): ?>

                                                    <tbody>
                                                        <tr>
                                                            <td><label class="form-check-label"><?= $timetableFirst->c_title?></label></td>
                                                            <td><?= $timetableFirst->c_code?></td>
                                                            <td><?= DAYS[$timetableFirst->ct_day - 1] ?></td>
                                                            <td><?= $timetableFirst->ct_start_time .'-'.$timetableFirst->ct_end_time?></td>
                                                            <td><?= $timetableFirst->ct_venue?></td>
                                                            <td>
                                                                <div class=" form-group ml-8 mt-3">
                                                                    <a href='<?=SR."/admin/edit-class-timetable/{$timetableFirst->ct_id}"?>'><button type="submit" class="btn-fill-sm btn-gradient-yellow btn-hover-bluedark">Edit</button></a>
                                                                    <a href='<?=SR."/admin/delete-class-timetable/{$timetableFirst->ct_id}"?>'><button type="reset" class="btn-fill-sm bg-blue-dark btn-hover-yellow">Delete</button></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                        </table>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 pt-5">
                            <div class="card height-auto pt-4">
                                <div class="card-body">
                                    <div class="heading-layout1">
                                        <div class="item-title pb-3">
                                            <h3 class="text-center">Second Semester Timetable</h3>
                                        </div>

                                    </div>
                                    <div class="table-responsive">
                                        <table class="table display data-table text-nowrap">
                                            <thead>
                                            <tr>
                                                <th><label class="form-check-label">Course Title</label></th>
                                                <th>Course Code</th>
                                                <th>Day</th>
                                                <th>Time</th>
                                                <th colspan="2">Venue</th>
                                            </tr>
                                            </thead>
                                            <?php foreach ($timetableSeconds as $timetableSecond) :?>
                                                <?php
                                                if($timetableSecond->ct_department != null): ?>
                                                <tbody>
                                                    <tr>
                                                        <td><label class="form-check-label"><?= $timetableSecond->c_title?></label></td>
                                                        <td><?= $timetableSecond->c_code?></td>
                                                        <td><?= DAYS[$timetableSecond->ct_day - 1] ?></td>
                                                        <td><?= $timetableSecond->ct_start_time .'-'.$timetableSecond->ct_end_time?></td>
                                                        <td><?= $timetableSecond->ct_venue?></td>
                                                        <td>
                                                            <div class=" form-group ml-8 mt-3">
                                                                <a href='<?=SR."/admin/edit-class-timetable/{$timetableSecond->ct_id}"?>'><button type="submit" class="btn-fill-sm btn-gradient-yellow btn-hover-bluedark">Edit</button></a>
                                                                <a href='<?=SR."/admin/delete-class-timetable/{$timetableSecond->ct_id}"?>'><button type="reset" class="btn-fill-sm bg-blue-dark btn-hover-yellow">Delete</button></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>

                                            <?php endif;?>
                                        <?php endforeach;?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>