            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Admin</h3>
                    <ul>
                        <li>
                            <a href="index.html">Admin</a>
                        </li>
                        <li>Add Session</li>
                    </ul>
                </div>
                <!-- Breadcrumbs Area End Here -->
                <!-- Add Expense Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add Session</h3>
                            </div>
                         
                        </div>
                        <?=\Zikzay\core\Session::has('submitError') ?
                            '<div class="alert alert-success"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                        <form class="new-added-form" method="post" action="<?= SR.'/admin/storeSession'?>">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Session</label>
                                    <input required type="text" name="session" placeholder="Format: 2019/2020" class="form-control">
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