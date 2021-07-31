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
                                    <label>Session</label>
                                    <select name="semester" required class="select2">
                                        <option value="">Please Select</option>
                                        <?php  foreach ($semesters as $semester):?>
                                        <?php
                                            $selected = '';
                                                if(isset($activity->semester)){
                                                    if($activity->semester == $semester->id ){
                                                        $selected = 'selected';
                                                    }
                                                }
                                            ?>
                                        <option <?= $selected ?> value="<?= $semester->id?>"><?= $semester->semester?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Activity</label>
                                    <input type="text" name="activity" value="<?= displayObj($activity, 'activity') ?>" required placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Date</label>
                                    <input type="text" name="date" id="date" value="<?=date('d/m/Y', strtotime(displayObj($activity, 'date')))?>" placeholder="dd/mm/yyyy" class="form-control air-datepicker" required data-position="bottom right">
                                    <small id="date-e"></small>
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <button type="submit" class="mt-5 btn-fill-lg text-light gradient-orange-peel">ADD</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add Session Area End Here -->        