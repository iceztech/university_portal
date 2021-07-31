
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
                                    <h2 class="mb1 pt-5">Education</h2>
                                    <div class="row">
                                        <?php for ($i = 0; $i < count($edu); $i++) : ?>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="item-content">
                                                    <div class="info-table table-responsive">
                                                        <h4 class="mb1 pt-5"><?=ucwords($edu[$i]->type)?></h4>
                                                        <table class="table text-nowrap">
                                                            <tbody>
                                                            <tr>
                                                                <td>Institution</td>
                                                                <td class="font-medium text-dark-medium"><?=$edu[$i]->institution?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Qualification</td>
                                                                <td class="font-medium text-dark-medium"><?=$edu[$i]->qualification?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Period</td>
                                                                <td class="font-medium text-dark-medium"><?="{$edu[$i]->start_year} - {$edu[$i]->end_year}"?></td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Student Details Area End Here -->