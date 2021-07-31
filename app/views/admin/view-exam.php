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
                                <h3>Add Timetable for <?= $timetableFirsts[0]->dc_level .' Level '?><?= $timetableFirsts[0]->d_name    ?></h3>
                            </div>
                         
                        </div>
                        <?=\Zikzay\core\Session::has('submitError') ?
                            '<div class="alert alert-success"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
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
                                                <th>Venue</th>
                                                <th colspan="2">Lecturer</th>
                                            </tr>
                                            </thead>
                                        <?php foreach ($timetableFirsts as $timetableFirst) :?>
                                            <?php
                                                if($timetableFirst->et_departments != null): ?>

                                                    <tbody>
                                                        <tr>
                                                            <td><label class="form-check-label"><?= $timetableFirst->c_title?></label></td>
                                                            <td><?= $timetableFirst->c_code?></td>
                                                            <td><?= $timetableFirst->et_date?></td>
                                                            <td><?= $timetableFirst->et_start_time .'-'.$timetableFirst->et_end_time?></td>
                                                            <td><?= $timetableFirst->et_venue?></td>
                                                            <td><?= (isset($timetableFirst->lecturer)) ? "$timetableFirst->lecturer" : 'NULL' ?></td>
                                                            <td>
                                                                <div class=" form-group ml-8 mt-3">
                                                                    <a href='<?=SR."/admin/edit-exam-timetable/{$timetableFirst->et_id}"?>'>
                                                                        <button type="submit" class="btn-fill-sm btn-gradient-yellow btn-hover-bluedark">Edit</button>
                                                                    </a>
                                                                    <a href='<?=SR."/admin/add-invigilator/{$timetableFirst->et_id}"?>'>
                                                                        <button type="reset" class="btn-fill-sm bg-blue-dark btn-hover-yellow">Add Invigilator</button>
                                                                    </a>
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
                                                <th>Venue</th>
                                                <th colspan="2">Lecturer</th>
                                            </tr>
                                            </thead>
                                            <?php foreach ($timetableSeconds as $timetableSecond) :?>
                                                <?php
                                                if($timetableSecond->et_departments != null): ?>
                                                <tbody>
                                                    <tr>
                                                        <td><label class="form-check-label"><?= $timetableSecond->c_title?></label></td>
                                                        <td><?= $timetableSecond->c_code?></td>
                                                        <td><?= $timetableSecond->et_date?></td>
                                                        <td><?= $timetableSecond->et_start_time .'-'.$timetableSecond->et_end_time?></td>
                                                        <td><?= $timetableSecond->et_venue?></td>
                                                        <td><?= (isset($timetableSecond->lecturer)) ? "$timetableSecond->lecturer" : 'NULL'?></td>
                                                        <td>
                                                            <div class=" form-group ml-8 mt-3">
                                                                <a href='<?=SR."/admin/edit-class-timetable/{$timetableSecond->et_id}"?>'>
                                                                    <button type="submit" class="btn-fill-sm btn-gradient-yellow btn-hover-bluedark">Edit</button>
                                                                </a>
                                                                <a href='<?=SR."/admin/add-invigilator/{$timetableSecond->et_id}"?>'>
                                                                    <button type="reset" class="btn-fill-sm bg-blue-dark btn-hover-yellow">Add Invigilator</button>
                                                                </a>
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