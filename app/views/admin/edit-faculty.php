		<div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Accounts</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Edit Faculty</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add Expense Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Edit Faculty</h3>
                            </div>
                         
                        </div>
                        <?=\Zikzay\core\Session::has('submitError') ?
                            '<div class="alert alert-success"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                        <form class="new-added-form" method="post" action="<?=SR. "/admin/update-faculty/{$faculty->id}"?>">
                            <div class="row">
                               <div class="col-lg-6 form-group">
                                    <label>Faculty</label>
                                    <input type="name" name="name" id="name" value='<?= displayObj($faculty, 'name')?>' placeholder="" class="form-control">
                                    <small id="name-e"></small>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Code</label>
                                    <input type="number" name="code" id="code" value='<?= displayObj($faculty, 'code')?>' placeholder="" class="form-control">
                                    <small id="code-e"></small>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Serial Number</label>
                                    <input type="text" name="serial" id="serial" value='<?= displayObj($faculty, 'serial')?>' placeholder="" class="form-control">
                                    <small id="serial-e"></small>
                                </div>
                            
                                <div class="mt-2">
                                    <a href=""><button type="submit" class="ml-3 mt-5 btn-fill-lg text-light shadow-orange-peel  bg-orange-peel add">Update</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add Expense Area End Here -->