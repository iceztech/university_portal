
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
                                    <table class="table text-nowrap">   
                                        <tbody>
                                            <h4>PERSONAL INFORMATION</h4>
                                            <tr>
                                                <td>Name:</td>
                                                <td class="font-medium text-dark-medium"><?= $fullName?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender:</td>
                                                <td class="font-medium text-dark-medium"><?= $student->gender?></td>
                                            </tr>
                                            <tr>
                                                <td>Date Of Birth:</td>
                                                <td class="font-medium text-dark-medium"><?= convertDate($student->dob)?></td>
                                            </tr>
                                            <tr>
                                                <td>Religion:</td>
                                                <td class="font-medium text-dark-medium"><?= $student->religion?></td>
                                            </tr>
                                            <tr>
                                                <td>Nationality</td>
                                                <td class="font-medium text-dark-medium"><?=$student->nationality ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table text-nowrap">
                                        <tbody>
                                        <h4>CONTACT INFORMATION</h4>
                                            <tr>
                                                <td>E-mail:</td>
                                                <td class="font-medium text-dark-medium"><?= $student->email_address ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone:</td>
                                                <td class="font-medium text-dark-medium"><?=$student->phone_number ?></td>
                                            </tr>
                                            <tr>
                                                <td>Contact Address:</td>
                                                <td class="font-medium text-dark-medium"><?= $student->contact_address->address .'<br>'.$student->contact_address->town.', '.$student->contact_address->state  ?></td>
                                            </tr>
                                            <tr>
                                                <td>Contact Address Country:</td>
                                                <td class="font-medium text-dark-medium"><?= $student->contact_address->country ?></td>
                                            </tr>
                                            <td><h3>Permanent Address</h3></td>
                                            <tr>
                                                <td>Permanent Address:</td>
                                                <td class="font-medium text-dark-medium"><?= $student->permanent_address->address .'<br>'.$student->permanent_address->town.', '.$student->permanent_address->state  ?></td>
                                            </tr>
                                            <tr>
                                                <td>Permanent Address Country:</td>
                                                <td class="font-medium text-dark-medium"><?= $student->permanent_address->country ?></td>
                                            </tr>
                                            <td><h3>Origin Data</h3></td>
                                            <tr>
                                                <td>Village:</td>
                                                <td class="font-medium text-dark-medium"><?= $student->origin->address .'<br>'.$student->origin->town.', '.$student->origin->state  ?></td>
                                            </tr>
                                            <tr>
                                                <td>Country:</td>
                                                <td class="font-medium text-dark-medium"><?= $student->origin->country ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table text-nowrap">
                                        <tbody>
                                            <h4>School INFORMATION</h4>
                                            <tr>
                                                <td>Admission Date:</td>
                                                <td class="font-medium text-dark-medium">07.08.2019</td>
                                            </tr>
                                            <tr>
                                                <td>Registration number:</td>
                                                <td class="font-medium text-dark-medium">2032334673</td>
                                            </tr>
                                            <tr>
                                                <td>Level:</td>
                                                <td class="font-medium text-dark-medium">2</td>
                                            </tr>
                                            <tr>
                                                <td>Faculty:</td>
                                                <td class="font-medium text-dark-medium">Medicine</td>
                                            </tr>
                                            <tr>
                                                <td>Department:</td>
                                                <td class="font-medium text-dark-medium">Medicine</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table text-nowrap">
                                        <tbody>
                                        <h4>OTHER INFORMATION</h4>
                                            <tr>
                                                <td>Sponsor Details:</td>
                                                <td class="font-medium text-dark-medium"><?= $student->sponsor->name ?></td>
                                            </tr>
                                            <tr>
                                                <td>Certificate:</td>
                                                <td class="font-medium text-dark-medium"><?= $student->sponsor->relationship.'<br> '.$student->sponsor->phone_number ?></td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Student Details Area End Here -->