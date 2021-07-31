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
                        <form class="new-added-form" method="post" action="<?= SR.'/admin/storeSemester'?>">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Session</label>
                                    <select name="session" class="select2">
                                        <option value="">Please Select</option>
                                        <?php foreach ($sessions as $session):?>
                                        <option value="<?= $session->id?>"><?= $session->session?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Semester</label>
                                    <input type="text" name="semester" placeholder="Enter: 1st or 2nd" class="form-control">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Start Date</label>
                                    <input type="text" name="start_date" id="start_date" placeholder="dd/mm/yyyy" class="form-control air-datepicker" required data-position="bottom right">
                                    <small id="start_date-e"></small>
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>End Date</label>
                                    <input type="text" name="end_date" id="end_date" placeholder="dd/mm/yyyy" class="form-control air-datepicker" required data-position="bottom right">
                                    <small id="end_date-e"></small>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <button type="submit" class="mt-5 btn-fill-xl text-light gradient-orange-peel">ADD</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add Session Area End Here -->        