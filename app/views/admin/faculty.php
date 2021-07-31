            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Admin Dashboard</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Admin</li>
                    </ul>
                </div>
				<!-- Dashboard summery Start Here -->
                <div class="row gutters-20">
                    <div class="col-xl-4 col-sm-6 col-12 pb-5">
                        <ul>
                            <a href="<?= SR.'/admin/add-faculty'?>"><li><button type="button" class=" pill btn-fill-lmd radius-30 text-light shadow-red bg-red">Add Faculty</button></li>
                            </a>          
                        </ul>
                    </div>
                </div>
                <!-- Dashboard summery End Here -->

              
				
 				<div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Faculties</h3>
                            </div>
                        </div>
                        <?=\Zikzay\core\Session::has('submitError') ?
                            '<div class="alert alert-success"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                        <div class="table-responsive">

                            <table class="table data-table text-nowrap">
                                 <tbody>
                                     <tr>
                                         <th>
                                             <div class="form-check">
                                                 <input type="checkbox" class="form-check-input checkAll">
                                                 <label class="form-check-label">S/N</label>
                                             </div>
                                         </th>
                                         <th>Name</th>
                                         <th>Code</th>
                                         <th colspan="2">Serial No</th>

                                     </tr>
                                 </tbody>
                                <?php $sn = 0; foreach ($faculties as $faculty) : ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input">
                                                <label class="form-check-label"><?=++$sn?></label>
                                            </div>
                                        </td>
                                        <td><?=$faculty->name?></td>
                                        <td><?=$faculty->code ?></td>
                                        <td><?=$faculty->serial?></td>
                                        <td>
                                            <div class=" form-group ml-8 mt-3">
                                                <a href='<?= SR."/admin/edit-faculty/{$faculty->id}"?>'><button type="submit" class="btn-fill-sm btn-gradient-yellow btn-hover-bluedark">Edit</button></a>
                                                <a href='<?= SR."/admin/delete-faculty/{$faculty->id}"?>'><button type="reset" class="btn-fill-sm bg-blue-dark btn-hover-yellow">Delete</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                  </tbody>
                                <?php endforeach;?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Fees Table Area End Here -->