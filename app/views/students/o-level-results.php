
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Students</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Student Details</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Student Details Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>About Me</h3>
                            </div>
                          
                        </div>
                        <?php
                        $imageUrl = UTME_ASSET_PATH."img/figure/user5.jpg";
                        if(!empty($student->image)) {
                            $imageUrl = IMG_PATH.'utme/'.$student->image;
                        }
                        if (isset($student->first_name)){
                            $name = $student->surname.' '.$student->first_name;
                            $fullName =  $student->surname.' '.$student->first_name.' '.$student->middle_name ;
                        }
                        ?>
                        <div class="single-info-details">
                            <div class="item-img">
                                <img src="<?=$imageUrl?>" alt="student">
                            </div>
                            <div class="item-content">
                                <div class="header-inline item-header">
                                    <h3 class="text-dark-medium font-medium"><?= $name?></h3>
                                    <div class="header-elements">
                                        <ul>
                                            <li><a href="#"><i class="far fa-edit"></i></a></li>
                                            <li><a href="#"><i class="fas fa-print"></i></a></li>
                                            <li><a href="#"><i class="fas fa-download"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="info-table table-responsive">
                                    <h4 class="mb1 pt-5">O Level Result(s)</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="item-content">
                                                <div class="info-table table-responsive">
                                                    <h4 class="mb1 pt-5">First Sitting</h4>
                                                    <table class="table text-nowrap">
                                                        <tbody>
                                                        <tr>
                                                            <td>Exam no: <span class="font-medium text-dark-medium"><?=$oLevel[0]->exam_number?></span></td>
                                                            <td><span class="font-medium text-dark-medium"><?=$oLevel[0]->certificate?> - <?=$oLevel[0]->exam_year?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Institution:</td>
                                                            <td class="font-medium text-dark-medium"><?=$oLevel[0]->institution?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Name:</td>
                                                            <td class="font-medium text-dark-medium"><?=$oLevel[0]->name?></td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                    <table class="table table-striped" style="width: 100%">
                                                        <tr>
                                                            <td class="font-medium text-dark-medium">Subject</td>
                                                            <td class="font-medium text-dark-medium">Grade</td>
                                                        </tr>
                                                        <?php foreach ($oLevel[0]->subjects as $subject) : ?>

                                                            <tr>
                                                                <td class="font-medium text-dark-medium"><?=$subject->subject?></td>
                                                                <td class="font-medium text-dark-medium"><?=$subject->grade?></td>
                                                            </tr>

                                                        <?php endforeach; ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if(isset($oLevel[1])): ?>

                                            <div class="col-md-6 col-sm-6">
                                                <div class="item-content">
                                                    <div class="info-table table-responsive">
                                                        <h4 class="mb1 pt-5">Second Sitting</h4>
                                                        <table class="table text-nowrap">
                                                            <tbody>
                                                            <tr>
                                                                <td>Exam no: <span class="font-medium text-dark-medium"><?=$oLevel[1]->exam_number?></span></td>
                                                                <td><span class="font-medium text-dark-medium"><?=$oLevel[1]->certificate?> - <?=$oLevel[1]->exam_year?></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Institution:</td>
                                                                <td class="font-medium text-dark-medium"><?=$oLevel[1]->institution?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Name:</td>
                                                                <td class="font-medium text-dark-medium"><?=$oLevel[1]->name?></td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                        <table class="table table-striped" style="width: 100%">
                                                            <tr>
                                                                <td class="font-medium text-dark-medium">Subject</td>
                                                                <td class="font-medium text-dark-medium">Grade</td>
                                                            </tr>
                                                            <?php foreach ($oLevel[1]->subjects as $subject) : ?>

                                                                <tr>
                                                                    <td class="font-medium text-dark-medium"><?=$subject->subject?></td>
                                                                    <td class="font-medium text-dark-medium"><?=$subject->grade?></td>
                                                                </tr>

                                                            <?php endforeach; ?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php else: ?>

                                            <div class="col-md-6 col-sm-6">
                                                <div class="item-content">
                                                    <div class="info-table table-responsive">
                                                        <h4 class="mb1 pt-5">Second Sitting</h4>
                                                        <p>No second sitting</p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Student Details Area End Here -->