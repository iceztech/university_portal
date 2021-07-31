<!--<div class="dashboard-page-one">-->
<div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Admin Dashboard</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Student</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <div class="row">
                    <!-- Student Info Area Start Here -->
                    <div class="col-4-xxxl col-12">
                        <div class="card dashboard-card-ten">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>About Me</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-expanded="false">...</a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-times text-orange-red"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="student-info">
                                    <div class="media media-none--xs">
                                        <?php

                                        $imageUrl = UTME_ASSET_PATH . "img/figure/user5.jpg";
                                        if (!empty($admin->image)) {
                                            $imageUrl = IMG_PATH . 'utme/' . $admin->image;
                                        }
                                        if (isset($admin->first_name)) {
                                            $name = $admin->surname . ' ' . $admin->first_name;
                                            $fullName = $admin->surname . ' ' . $admin->first_name . ' ' . $admin->middle_name;
                                        }

                                        ?>
                                        <div class="item-img">
                                            <img src="<?=UTME_ASSET_PATH?>img/figure/student.png" class="media-img-auto" alt="student">
                                        </div>
                                        <div class="media-body">
                                            <p><strong><?= $name ?></strong> Welcome. What do you want to do today?</p>
                                        </div>
                                    </div>
                                    <div class="table-responsive info-table">
                                        <table class="table text-nowrap">
                                            <tbody>
                                                <tr>
                                                    <td>Name:</td>
                                                    <td class="font-medium text-dark-medium">Jessia Rose</td>
                                                </tr>
                                                <tr>
                                                    <td>Gender:</td>
                                                    <td class="font-medium text-dark-medium">Female</td>
                                                </tr>
                                               
                                                <tr>
                                                    <td>Date Of Birth:</td>
                                                    <td class="font-medium text-dark-medium">07.08.2006</td>
                                                </tr>
                                                <tr>
                                                    <td>Nationality:</td>
                                                    <td class="font-medium text-dark-medium">Nigerian</td>
                                                </tr>
                                               
                                                <tr>
                                                    <td>E-Mail:</td>
                                                    <td class="font-medium text-dark-medium">jessiarose@gmail.com</td>
                                                </tr>
                                                <tr>
                                                    <td>Admission Status:</td>
                                                    <td class="font-medium text-dark-medium">_________</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Adress</td>
                                                    <td class="font-medium text-dark-medium">House #10, Road #6</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone:</td>
                                                    <td class="font-medium text-dark-medium">+ 88 9856418</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Student Info Area End Here -->
                    <div class="col-8-xxxl col-12">
                        <div class="row">
                            <!-- Summery Area Start Here -->
                            <div class="col-lg-4">
                                <div class="dashboard-summery-one">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="item-icon bg-light-magenta">
                                                <i class="flaticon-shopping-list text-magenta"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="item-content">
                                                <div class="item-title">Notification</div>
                                                <div class="item-number"><span class="counter" data-num="12">12</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="dashboard-summery-one">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="item-icon bg-light-blue">
                                                <i class="flaticon-calendar text-blue"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="item-content">
                                                <div class="item-title">Events</div>
                                                <div class="item-number"><span class="counter" data-num="06">06</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="dashboard-summery-one">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="item-icon bg-light-yellow">
                                                <i class="flaticon-percentage-discount text-orange"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="item-content">
                                                <div class="item-title">Attendance</div>
                                                <div class="item-number"><span class="counter" data-num="94">94</span><span>%</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Summery Area End Here -->
							<!-- Summery Area Start Here -->
                            <div class="col-sm-6">
                                <div class="dashboard-summery-one text-center">
                                    <div class="row">
                                        <div class="col-12 text-center p-5">
                                            <div class="item-icon2 bg-light-magenta">
                                                <i class="flaticon-shopping-list text-magenta"></i>
                                            </div>
                                            <div class="">
													<div class="item-title item-title-custom">
														<h3>Complete Registration</h3>
													</div>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="col-sm-6">
                                <div class="dashboard-summery-one text-center">
                                    <div class="row">
                                        <div class="col-12 text-center p-5">
                                            <div class="item-icon2 bg-light-magenta">
                                                <i class="flaticon-shopping-list text-magenta"></i>
                                            </div>
                                            <div class="">
													<div class="item-title item-title-custom">
														<h3>Upload O-Level Results</h3>
													</div>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="col-sm-6">
                                <div class="dashboard-summery-one text-center">
                                    <div class="row">
                                        <div class="col-12 text-center p-5">
                                            <div class="item-icon2 bg-light-magenta">
                                                <i class="flaticon-shopping-list text-magenta"></i>
                                            </div>
                                            <div class="">
													<div class="item-title item-title-custom">
														<h3>Upload O-Level Results</h3>
													</div>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="col-sm-6">
                                <div class="dashboard-summery-one text-center">
                                    <div class="row">
                                        <div class="col-12 text-center p-5">
                                            <div class="item-icon2 bg-light-magenta">
                                                <i class="flaticon-shopping-list text-magenta"></i>
                                            </div>
                                            <div class="">
													<div class="item-title item-title-custom">
														<h3>Upload O-Level Results</h3>
													</div>
											</div>
                                        </div>
                                    </div>
                                </div>
								<div class="row">
									
								</div>
                            </div>
                        </div>
                    </div>
                </div>