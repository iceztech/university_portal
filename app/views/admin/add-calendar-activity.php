            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Admin</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Add Semester</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add Expense Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add Semester</h3>
                            </div>
                         
                        </div>
                        <?=\Zikzay\core\Session::has('submitError') ?
                            '<div class="alert alert-success"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                        <form class="new-added-form pb-3" method="post" action="<?= SR.'/admin/storeActivity'?>">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Semester</label>
                                    <select name="semester" required class="select2">
                                        <option value="">Please Select</option>
                                        <?php foreach ($semesters as $semester):?>
                                        <option value="<?= $semester->s_id?>"><?= $semester->s_semester?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Activity</label>
                                    <input type="text" name="activity" required placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Date</label>
                                    <input type="text" name="date" id="date" placeholder="dd/mm/yyyy" class="form-control air-datepicker" required data-position="bottom right">
                                    <small id="date-e"></small>
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <button type="submit" class="mt-5 btn-fill-lg text-light gradient-orange-peel">ADD</button>
                                </div>
                            </div>
                        </form>
                        <div class="pt-3 card height-auto">
                            <h3 class="card-header text-center pt-4"><?=$semesters[0]->s_session?></h3>
                            <div class="card-body">
                                <table class="table bs-table table-hover table-bordered text-nowrap">
                                    <thead>

                                    <tr class="">
                                        <th class="text-left">S/N</th>
                                        <th>First Semester</th>
                                        <th colspan="3">Activities</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $sn = 0 ; foreach ($firstSemesters as $firstSemester): ?>
                                        <tr>
                                            <td class="text-left"><?= ++$sn?></td>
                                            <td><?= $firstSemester->c_date?></td>
                                            <td><?= $firstSemester->c_activity?></td>
                                            <td><a class="delete-button" href='<?= SR."/admin/delete-activity/{$firstSemester->c_id}"?>'>Delete</a></td>
                                            <td><a class="update-button" href="<?= SR."/admin/edit-activity/{$firstSemester->c_id}"?>">Update</a></td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-body">
                                <table class="table bs-table table-striped table-bordered text-nowrap">
                                    <thead>

                                    <tr class="">
                                        <th class="text-left">S/N</th>
                                        <th>Second Semester</th>
                                        <th>Activities</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $sn = 0 ; foreach ($secondSemesters as $secondSemester): ?>
                                        <tr>
                                            <td class="text-left"><?= ++$sn?></td>
                                            <td><?= $secondSemester->c_date?></td>
                                            <td><?= $secondSemester->c_activity?></td>
                                            <td><a class="delete-button" href="<?= SR."/admin/delete-activity/{$secondSemester->c_id}"?>">Delete</a></td>
                                            <td><a class="update-button" href="<?= SR."/admin/edit-activity/{$secondSemester->c_id}"?>">Update</a></td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Session Area End Here -->        