            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Accounts</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Make Payment</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add Expense Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add Payment</h3>
                            </div>
                         
                        </div>
                        <?=\Zikzay\core\Session::has('submitError') ?
                            '<div class="alert alert-success"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                        <form class="new-added-form" method="post" action="<?=SR. '/admin/storePayment'?>">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="level">Payment</label>
                                    <select id="level" name="level" class="select2">
                                        <option value="">Please select</option>
                                        <option value="id">Departmental Dues</option>
                                        <option value="id">Matriculation</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <fieldset>
                                        <legend>Faculty</legend>
                                        <div class="form-check">
                                            <input value="0" name="faculty[]" type="checkbox" class="form-check-input">
                                            <label class="form-check-label checkbox-label">All Faculties</label>
                                        </div>
                                        <?php foreach ($faculties as $faculty) :?>
                                            <div class="form-check">
                                                <input value="<?= $faculty->id?>" name="faculty[]" type="checkbox" class="form-check-input">
                                                <label class="form-check-label checkbox-label"><?= $faculty->name?></label>
                                            </div>
                                        <?php endforeach;?>
                                    </fieldset>

                                </div>
                                <div class="col-md-3 form-group">
                                    <fieldset>
                                        <legend>Department</legend>
                                        <div class="form-check">
                                            <input value="0" name="department[]" type="checkbox" class="form-check-input">
                                            <label class="form-check-label checkbox-label">All Departments</label>
                                        </div>
                                        <?php foreach ($departments as $department) :?>
                                            <div class="form-check">
                                                <input value="<?= $department->id?>" name="department[]" type="checkbox" class="form-check-input">
                                                <label class="form-check-label checkbox-label"><?= $department->name?></label>
                                            </div>
                                        <?php endforeach;?>
                                    </fieldset>
                                </div>
                               
                                 <div class="col-md-6 form-group">
                                     <button type="submit" class="mt-5 btn-fill-lg text-light gradient-orange-peel">ADD</button>
                                     <a href="<?=SR. '/admin/view-payments'?>"><button type="button" class="mt-5 btn-fill-lg bg-blue-dark btn-hover-yellow">View Courses</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>