        <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Accounts</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Edit Courses</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add Expense Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Edit Courses</h3>
                            </div>
                         
                        </div>
                        <?=\Zikzay\core\Session::has('submitError') ?
                            '<div class="alert alert-success"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                        <form class="new-added-form" method="post" action="<?=SR. "/admin/update-course/{$course->id}"?>">
                            <div class="row">
                            <div class="col-lg-6 form-group">
                                <label>Course Title</label>
                                <input type="name" name="title" id="title" value='<?= displayObj($course, 'title')?>' placeholder="" class="form-control">
                                <small id="title-e"></small>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label> Course Code</label>
                                <input type="text" name="code" id="code" value='<?= displayObj($course, 'code')?>' placeholder="" class="form-control">
                                <small id="code-e"></small>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Semester</label>
                                <select name="semester" class="select2">
                                    <option value="">Please Select</option>
                                    <option  <?= (displayObj($course, 'semester')  == '1') ? 'selected' : '' ?> value="1">First</option>
                                    <option <?= (displayObj($course, 'semester')  == '2') ? 'selected' : '' ?> value="2">Second</option>
                                </select>
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