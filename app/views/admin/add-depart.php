           <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Accounts</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Add Department</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add Expense Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add Department</h3>
                            </div>
                         
                        </div>
                        <?=\Zikzay\core\Session::has('submitError') ?
                            '<div class="alert alert-success"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                        <form class="new-added-form" method="post" action="<?= SR.'/admin/storeDepartment'?>">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Faculty *</label>
                                    <select name="faculty" class="select2">
                                        <option value="">Please Select</option>
                                        <?php for($i = 0; $i<count($faculty);$i++):?>
                                            <option value="<?=$faculty[$i]->id?>" ><?= $faculty[$i]->name ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                              
                                <div class="col-lg-6 form-group">
                                    <label>Department *</label>
                                    <input required type="text" name="name" id="department" placeholder="" class="form-control">
                                    <small class="department-e"></small>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Code *</label>
                                    <input required type="text" name="code" id="code" placeholder="" class="form-control">
                                    <small class="department-e"></small>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Serial no *</label>
                                    <input required type="text" name="serial" id="serial" placeholder="" class="form-control">
                                    <small class="department-e"></small>
                                </div>
                               
                                 <div class="col-lg-6 form-group">
                                     <button type="submit" class="mt-5 btn-fill-xl text-light gradient-orange-peel">ADD</button>
                                </div>                                
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add Expense Area End Here -->