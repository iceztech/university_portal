            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Accounts</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Add Payment</li>
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
                               <div class="col-md-8 form-group">
                                    <label>Purpose</label>
                                    <input required type="text" name="purpose" placeholder="" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Amount</label>
                                    <input required type="text" name="amount" placeholder="" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="late_payment_date">Late Payment Date</label>
                                    <input id="late_payment_date" type="text" name="late_payment" placeholder="dd/mm/yyyy"  class="form-control air-datepicker" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="late_payment_amount">Late Payment Amount</label>
                                    <input id="late_payment_amount" required type="text" name="late_payment_amount" placeholder="" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="level">Level</label>
                                    <select id="level" name="level" class="select2">
                                        <option value="">Please select</option>
                                        <option value="0">All Levels</option>
                                        <option value="100">100 Level</option>
                                        <option value="200">200 Level</option>
                                        <option value="300">300 Level</option>
                                        <option value="400">400 Level</option>
                                        <option value="500">500 Level</option>
                                        <option value="600">600 Level</option>
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