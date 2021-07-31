			<div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>View Academic Calendar</h3>
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>Students</li>
                        <li>Calendar</li>
                    </ul>
                </div>
				<!-- Dashboard summery Start Here -->
                <div class="row gutters-20">
                    <div class="col-xl-4 col-sm-6 col-12">
                        <ul>
                            <a href="<?=SR.'/students/index'?>"><li><button type="button" class=" pill btn-fill-lmd radius-30
                                 text-light shadow-red bg-red">Home</button></li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="card height-auto pt-5">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>View Academic Calendar</h3>
                            </div>
                        </div>
                    <?=\Zikzay\core\Session::has('submitError') ?
                        '<div class="alert alert-success"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                        <div class="pt-3 card height-auto">
                            <h3 class="card-header text-center pt-4"><?=$semesters[0]->s_session?></h3>
                            <div class="card-body">
                                <table class="table bs-table table-hover table-striped table-bordered text-nowrap">
                                    <thead>

                                    <tr class="">
                                        <th class="text-left">S/N</th>
                                        <th>First Semester</th>
                                        <th colspan="3">Activities</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $sn = 0 ; foreach ($firstSemesters as $firstSemester): ?>
                                        <tr>
                                            <td class="text-left"><?= ++$sn?></td>
                                            <td><?= $firstSemester->c_date?></td>
                                            <td><?= $firstSemester->c_activity?></td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-body">
                                <table class="table bs-table table-hover table-striped table-bordered text-nowrap">
                                    <thead>

                                    <tr class="">
                                        <th class="text-left">S/N</th>
                                        <th>Second Semester</th>
                                        <th>Activities</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $sn = 0 ; foreach ($secondSemesters as $secondSemester): ?>
                                        <tr>
                                            <td class="text-left"><?= ++$sn?></td>
                                            <td><?= $secondSemester->c_date?></td>
                                            <td><?= $secondSemester->c_activity?></td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fees Table Area End Here -->