        <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Accounts</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Edit Timetable</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add Expense Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Edit Class Timetable</h3>
                            </div>
                         
                        </div>
                        <?=\Zikzay\core\Session::has('submitError') ?
                            '<div class="alert alert-success"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                        <form class="new-added-form" method="post" action="<?=SR. "/admin/update-invigilator/{$timetable->id}/{$invigilators->id}"?>">
                            <div class="row">
                                <div class="col-lg-3 col-12 form-group">
                                    <label>Course</label>
                                    <select disabled name="departmental_course" class="select2">
                                        <option value="">Please Select *</option>
                                        <?php foreach ($deCourses as $deCourse):?>
                                            <option <?= ($timetable->departmental_courses == $deCourse->dc_id ) ? $selected = 'selected': ''?> value="<?= $deCourse->dc_id?>"><?= $deCourse->c_title?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-12 form-group">
                                    <label>Department</label>
                                    <select disabled  name="department" class="select2">
                                        <option value="">Please Select *</option>
                                        <?php foreach ($deCourses as $deCourse):?>
                                        <?php if ($deCourse->d_name != null) :?>
                                            <option <?= ($timetable->departments == $deCourse->dc_department ) ? $selected = 'selected': '' ?>
                                                    value="<?= $deCourse->dc_department?>"><?= $deCourse->d_name?></option>
                                        <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-12 form-group">
                                    <label>Semester</label>
                                    <select disabled  name="semester" class="select2">
                                        <option value="">Please Select *</option>
                                        <option <?= ($timetable->semester == $firstSemester) ? $selected = 'selected' : '' ?>  value="<?=$firstSemester?>">First Semester</option>
                                        <option <?= ($timetable->semester == $secondSemester) ? $selected = 'selected' : '' ?> value="<?=$secondSemester?>">Second Semester</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-12 form-group">
                                    <label>Day</label>
                                    <input disabled value="<?=convertDate($timetable->date)?>" class="form-control">
                                </div>
                                <div class="col-lg-3 col-12 form-group">
                                    <label>Start Time</label>
                                    <input disabled type="time" name="start_time" value="<?= $timetable->start_time?>" class="form-control" >
                                    <i class="far fa-clock"></i>
                                </div>
                                <div class="col-lg-3 col-12 form-group">
                                    <label>End Time</label>
                                    <input disabled type="time" name="end_time" value="<?= $timetable->end_time?>"  class="form-control" >
                                    <i class="far fa-clock"></i>
                                </div>
                                <div class="col-lg-6 col-12 form-group">
                                    <label>Venue</label>
                                    <input disabled name="venue" value="<?= $timetable->venue?>"  type="text" placeholder="" class="form-control" >
                                </div>
                                <div class="col-12 pt-4 pb-3">
                                    <div class="row">
                                            <div class="col-lg-4 col-12 form-group">
                                                <label>Lecturer</label>
                                                <input name="invigilators" value="<?= displayObj($invigilators,'invigilators') ?>"  type="text" placeholder="" class="form-control" >
                                            </div>
                                    </div>
                                </div>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-sm btn-gradient-yellow btn-hover-bluedark">Save</button>
                                   <a href="<?=SR."/admin/delete-invigilator/{$invigilators->id}"?>">
                                       <button type="button" class="btn-fill-sm bg-blue-dark btn-hover-yellow">Delete</button>
                                   </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add Expense Area End Here -->