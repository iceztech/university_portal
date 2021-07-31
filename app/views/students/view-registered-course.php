			<div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Admin Dashboard</h3>
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>Students</li>
                        <li>View Registered Courses</li>
                    </ul>
                </div>
				<!-- Dashboard summery Start Here -->
                <div class="row gutters-20">
                    <div class="col-xl-4 col-sm-6 col-12">
                        <ul>
                            <a href="<?=SR.'/students/edit-registered-courses'?>"><li><button type="button" class=" pill btn-fill-lmd radius-30
                                 text-light shadow-red bg-red">Edit Registered Courses</button></li>
                            </a>          
                        </ul>
                    </div>
                </div>
                <div class="card height-auto pt-5">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Registered Courses</h3>
                            </div>
                        </div>
                    <?=\Zikzay\core\Session::has('submitError') ?
                        '<div class="alert alert-success"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                    <div class="table-responsive">
                            <table class="table data-table text-nowrap">
                                
                                    <tr>
                                        <th> 
                                            <div class="">
                                                <label class="form-check-label">S/N</label>
                                            </div>
                                        </th>
                                        <th>Course Title</th>
                                        <th>Course Code</th>
                                        <th>Credit Load</th>
                                        <th>Level</th>
                                        <th>Courses</th>
                                        <th>Result</th>
                                    </tr>
                                    <tbody class="pad-10">
                                    <?php $sn = 0; foreach ($courses as $course): ?>
                                        <tr class="padd-30">
                                            <td>
                                                <div class="">
                                                    <label><?= ++$sn ?></label>
                                                </div>
                                            </td>
                                            <td><?= $course->c_title ?></td>
                                            <td><?= $course->c_code?></td>
                                            <td class="text-center"><?= $course->dc_credit_load ?></td>
                                            <td><?= $course->dc_level ?> Level</td>
                                            <td class="text-center"><?= ($course->rc_semester == 1) ? '1st' : '2nd' ;?></td>
                                            <td class="text-center"><?= ($course->rc_semester == 1) ? '1st' : '2nd' ;?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                      </tbody>
                            </table>
                    </div>
                </div>
                <!-- Fees Table Area End Here -->