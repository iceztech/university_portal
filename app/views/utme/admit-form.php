<div class="dashboard-content-one" xmlns="http://www.w3.org/1999/html">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Students</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Student Admit Form</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Please Enter Your Details</h3>
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
                        <div class="basic-tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link <?= ($bioData) ? 'active' : ''?> px-5" data-toggle="tab" href="#tab1" role="tab" aria-selected="<?=$bioData?>">Bio Data</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link <?= ($address) ? 'active' : ''?> px-5" data-toggle="tab" href="#tab2" role="tab" aria-selected="<?=$address?>">Address</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link px-5 <?= ($kin) ? 'active' : ''?>" data-toggle="tab" href="#tab3" role="tab" aria-selected="<?=($kin)?>">Next of Kin</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link px-5 <?= ($sponsor) ? 'active' : ''?>" data-toggle="tab" href="#tab4" role="tab" aria-selected="<?= ($sponsor)?>">Sponsor Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-5 <?= ($education) ? 'active' : ''?>" data-toggle="tab" href="#tab5" role="tab" aria-selected="<?= ($education)?>">Education History</a>
                                </li>
                                <li class="nav-item">
                                 <a class="nav-link px-5 <?= ($oLevel) ? 'active' : ''?>" data-toggle="tab" href="#tab6" role="tab" aria-selected="<?= ($oLevel)?>">O-Level</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <?php require_once VIEWS_PATH.'/utme/required/bio-data.php'?>
                                <?php require_once VIEWS_PATH.'/utme/required/address.php'?>
                                <?php require_once VIEWS_PATH.'/utme/required/kin.php'?>
                                <?php require_once VIEWS_PATH.'/utme/required/sponsor.php'?>
                                <?php require_once VIEWS_PATH.'/utme/required/education.php'?>
                                <?php require_once VIEWS_PATH.'/utme/required/o-level.php'?>
                            </div>


                        </div>


                    </div>
