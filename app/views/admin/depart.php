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
                    <div class="col-xl-4 col-sm-6 col-12">
                        <ul>
                            <a href="<?=SR. "/admin/add-department"?>"><button type="button" class=" pill btn-fill-lmd radius-30 text-light shadow-red bg-red">Add Department</button>                          </a>
                        </ul>
                    </div>
                </div>
 				<div class="card height-auto pt-5">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Departments</h3>
                            </div>
                        </div>
                        <?=\Zikzay\core\Session::has('submitError') ?
                            '<div class="alert alert-success"><small>'.\Zikzay\core\Session::get('submitError').'</small></div>' : ''?>
                        <div class="table-responsive">
                            <table class="table data-table text-nowrap">
                                
                                    <tr>
                                        <th> 
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input checkAll">
                                                <label class="form-check-label">S/N</label>
                                          </div>
                                        </th>
                                        <th>Faculty</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th colspan="2">Serial Number</th>

                                    </tr>
                                <?php $sn = 0; foreach ($departments as $department): ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input">
                                                <label class="form-check-label"><?= ++$sn ?></label>
                                            </div>
                                        </td>
                                        <td><?= $department->facultyName?></td>
                                        <td><?= $department->name?></td>
                                        <td><?= $department->code?></td>
                                        <td><?= $department->serial?></td>
                                        <td>
                                            <div class=" form-group ml-8 mt-3">
                                                <a href="<?= SR."/admin/edit-department/{$department->id}"?>"><button type="submit" class="btn-fill-sm btn-gradient-yellow btn-hover-bluedark">Edit</button></a>
                                                <a href="<?= SR."/admin/delete-department/{$department->id}"?>"><button type="reset" class="btn-fill-sm bg-blue-dark btn-hover-yellow">Delete</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                  </tbody>
                                <?php endforeach ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Fees Table Area End Here -->