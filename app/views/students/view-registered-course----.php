
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>View Registered Courses</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Registered Courses</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- All Subjects Area Start Here -->
                <div class="row">
                    
                    <div class="col-8-xxl col-12">
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>View Courses</h3>
                                    </div>
                                  
                                </div>
                                <form method="POST">
                                    <div class="table-responsive">
                                        <table class="table table-hover display tab table-striped text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="">
                                                            <label class="form-check-label">ID</label>
                                                        </div>
                                                    </th>
                                                    <th>Course Code</th>
                                                    <th>Course Title</th>
                                                    <th class="text-center">Semester</th>
                                                    <th>Level</th>
                                                    <th class="text-center">Credit Unit</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $sn = 0; foreach ($courses as $course) :?>
                                                <tr>
                                                    <td>
                                                        <div class="">
                                                            <label class="form-check-label"><?= ++$sn?></label>
                                                        </div>
                                                    </td>
                                                    <td><?=$course->c_code?></td>
                                                    <td><?=$course->c_title?></td>
                                                    <td class="text-center"><?=$course->rc_semester?></td>
                                                    <td><?=$course->dc_level?>L</td>
                                                    <td class="text-center"><?=$course->dc_credit_load?></td>
                                                    <th> <button type="submit" class="btn btn-lg btn-danger btn-hover-bluedark">Del</button></th>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- All Subjects Area End Here -->
               