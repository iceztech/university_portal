            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Accounts</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Add Faculty</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add Expense Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add Faculty</h3>
                            </div>
                        </div>
                        <?=\Zikzay\core\Session::has('submitError') ?
                            '<div class="alert alert-success"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                        <form class="new-added-form" method="post" action="<?= SR.'/admin/storeFaculty'?>">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Faculty</label>
                                    <input type="text" required name="name" id="name" placeholder="" class="form-control">
                                    <small id="name-e"></small>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Code</label>
                                    <input type="number" required name="code" id="code" placeholder="" class="form-control">
                                    <small id="code-e"></small>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Serial no</label>
                                    <input type="text" required name="serial" id="serial" placeholder="" class="form-control">
                                    <small id="serial-e"></small>
                                </div>
                               
                                 <div class="col-lg-6 form-group mt-2">
                                     <button type="submit" class="mt-5 btn-fill-lg text-light gradient-orange-peel">ADD</button>
                                </div>                                
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add Expense Area End Here -->