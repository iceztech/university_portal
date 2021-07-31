            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Accounts</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Add Courses</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add Expense Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add Courses</h3>
                            </div>
                         
                        </div>
                        <?=\Zikzay\core\Session::has('submitError') ?
                            '<div class="alert alert-success"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                        <form class="new-added-form" method="post" action="<?=SR. '/admin/new-course'?>">
                            <div class="row">
                               <div class="col-lg-6 form-group">
                                    <label>Course</label>
                                    <input required type="text" name="title" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Course code</label>
                                    <input required type="text" name="code" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Semester</label>
                                    <select required name="semester" class="select2">
                                        <option value="">Please Select</option>
                                        <option value="1">First</option>
                                        <option value="2">Second</option>
                                    </select>
                                </div>
                               
                                 <div class="col-lg-6 form-group">
                                     <button type="submit" class="mt-5 btn-fill-lg text-light gradient-orange-peel">ADD</button>
                                     <a href="<?=SR. '/admin/view-course'?>"><button type="button" class="mt-5 btn-fill-lg bg-blue-dark btn-hover-yellow">View Courses</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>