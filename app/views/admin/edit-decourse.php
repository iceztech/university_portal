        <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Accounts</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Edit Departmental Course</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add Expense Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Edit Departmental Course</h3>
                            </div>
                         
                        </div>
                        <?=\Zikzay\core\Session::has('submitError') ?
                            '<div class="alert alert-success"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                        <form class="new-added-form" method="post" action="<?=SR. "/admin/update-departmental-course/{$deCourses->id}"?>">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Department *</label>
                                    <select name="department" id="department" required class="select2">
                                        <option>Please Select</option>
                                        <?php foreach ($departments as $department):?>
                                            <?php $selected = '' ;  if(isset($deCourses->department)){
                                                if($deCourses->department == $department->id){
                                                    $selected = 'selected';
                                                }
                                            }
                                            ?>
                                            <option <?= $selected?> value="<?= $department->id?>"><?= $department->name?></option>
                                        <?php endforeach; ?>
                                        <small class="department-e"></small>
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Level</label>
                                    <select name="level" id="level" required class="select2">
                                        <option value="">Please Select</option>
                                        <option  <?= (displayObj($deCourses, 'level')  == '600') ? 'selected' : '' ?> value="600">600L</option>
                                        <option  <?= (displayObj($deCourses, 'level')  == '500') ? 'selected' : '' ?> value="500">500L</option>
                                        <option  <?= (displayObj($deCourses, 'level')  == '400') ? 'selected' : '' ?> value="400">400L</option>
                                        <option  <?= (displayObj($deCourses, 'level')  == '300') ? 'selected' : '' ?> value="300">300L</option>
                                        <option  <?= (displayObj($deCourses, 'level')  == '200') ? 'selected' : '' ?> value="200">200L</option>
                                        <option  <?= (displayObj($deCourses, 'level')  == '100') ? 'selected' : '' ?> value="100">100L</option>
                                    </select>
                                    <small class="level-e"></small>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Course</label>
                                    <select name="course" id="course" required class="select2">
                                        <option>Please Select</option>
                                        <?php foreach ($courses as $course):?>
                                            <?php $selected = '' ;  if(isset($deCourses->course)){
                                                if($deCourses == $course->id){
                                                    $selected = 'selected';
                                                }
                                            }
                                            ?>
                                                <option <?= $selected?> value="<?= $course->id?>"><?= $course->title?></option>
                                        <?php endforeach; ?>
                                        <small class="course-e"></small>
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Credit load</label>
                                    <input type="text" name="credit_load" value="<?= displayObj($deCourses,'credit_load') ?>" id="credit_load" placeholder="" required class="form-control">
                                    <small class="credit_load-e"></small>
                                </div>
                                <div>
                                    <a href="#"><button type="submit" class="ml-3 btn-fill-lg text-light shadow-orange-peel bg-orange-peel add">Update</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add Expense Area End Here -->