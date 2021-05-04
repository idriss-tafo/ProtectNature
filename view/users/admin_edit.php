<?php
if (isset($user[0])) {
    $user = $user[0];
} elseif (isset($errorform)) {
    $user = $dataerror;
} else {

    $user->description = 'new user';
    $user->id = '';
    $user->token = '';
    $user->name = null;
    $user->password = '123456789';
    $user->subname = '';
    $user->email = '';
    $user->created_at = date('Y-m-d H:i:s');
    $user->last_sign_at = date('Y-m-d H:i:s');
    $user->last_sign_ip = '';
    $user->faceboock = '';
    $user->google = '';
    $user->instagram = '';
    $user->updated_at = null;
    $user->banned_at = null;
    $user->username = '';
    $user->country = '';
    $user->phones = '';
    $user->paypalid = '';
    $user->address = '';
    //die();

}

?>

<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
        <div class="pd-20 card-box height-100-p">
            <div class="profile-photo">
                <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
                <img src="<?php echo \BASE_URL . '/webroot/images/photo1.jpg'; ?>" alt="" class="avatar-photo">
                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body pd-5">
                                <div class="img-container">
                                    <img id="image" src="<?php echo \BASE_URL . '/webroot/images/photo1.jpg'; ?>" alt="Picture">
                                </div>
                            </div>
                            <div class="modal-footer" id="actions">
                                <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                                    <input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                    <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
                                        <span class="fa fa-upload"></span>
                                    </span>
                                </label>
                                <input type="submit" value="Update" class="btn btn-primary">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="text-center h5 mb-0"><?php echo $user->name . ' .' . $user->subname; ?></h5>
            <p class="text-center text-muted font-14"><?php echo $user->description; ?></p>
            <div class="profile-info">
                <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                <ul>
                    <li>
                        <span>Email Address:</span>
                        <?php echo $user->email; ?>
                    </li>
                    <li>
                        <span>Phone Number:</span>
                        <?php echo $user->phones; ?>
                    </li>
                    <li>
                        <span>Country:</span>
                        <?php echo $user->country; ?>
                    </li>
                    <li>
                        <span>Address:</span>
                        <?php echo $user->address; ?>
                    </li>
                </ul>
            </div>
            <div class="profile-social">
                <h5 class="mb-20 h5 text-blue">Social Links</h5>
                <ul class="clearfix">
                    <li><a href="#" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#" class="btn" data-bgcolor="#db4437" data-color="#ffffff"><i class="fa fa-google-plus"></i></a></li>

                </ul>
            </div>

        </div>
    </div>
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
        <div class="card-box height-100-p overflow-hidden">
            <div class="profile-tab height-100-p">
                <div class="tab height-100-p">
                    <ul class="nav nav-tabs customtab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Timeline</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- Timeline Tab start -->
                        <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                            <div class="pd-20">
                                <div class="profile-timeline">
                                    <div class="timeline-month">
                                        <h5>August, 2020</h5>
                                    </div>
                                    <div class="profile-timeline-list">
                                        <ul>
                                            <li>
                                                <div class="date">12 Aug</div>
                                                <div class="task-name"><i class="ion-android-alarm-clock"></i> Task Added</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <div class="task-time">09:30 am</div>
                                            </li>
                                            <li>
                                                <div class="date">10 Aug</div>
                                                <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <div class="task-time">09:30 am</div>
                                            </li>
                                            <li>
                                                <div class="date">10 Aug</div>
                                                <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <div class="task-time">09:30 am</div>
                                            </li>
                                            <li>
                                                <div class="date">10 Aug</div>
                                                <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <div class="task-time">09:30 am</div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="timeline-month">
                                        <h5>July, 2020</h5>
                                    </div>
                                    <div class="profile-timeline-list">
                                        <ul>
                                            <li>
                                                <div class="date">12 July</div>
                                                <div class="task-name"><i class="ion-android-alarm-clock"></i> Task Added</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <div class="task-time">09:30 am</div>
                                            </li>
                                            <li>
                                                <div class="date">10 July</div>
                                                <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <div class="task-time">09:30 am</div>
                                            </li>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- Timeline Tab End -->

                        <!-- Setting Tab start -->
                        <div class="tab-pane fade height-100-p" id="setting" role="tabpanel">
                            <div class="profile-setting">
                                <form action="<?php echo Router::affiche_url('admin/users/edit'); ?>" , method="post">
                                    <ul class="profile-edit-list row">
                                        <li class="weight-500 col-md-6">
                                            <h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>
                                            <div class="form-group">
                                                <input class="form-control form-control-lg" name="id" type="hidden" , value="<?php echo $user->id; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-lg" name="token" type="hidden" , value="<?php echo $user->token; ?>">
                                            </div>
                                            <?php if (isset($errorform['name'])) {
                                                echo '<div class="form-group has-danger">
                                                <label class="form-control-label">Name</label>
                                                <input type="text" name="name" class="form-control form-control-danger">
                                                <div class="form-control-feedback">' . $errorform['name'] . '</div>
                                                <small class="form-text text-muted">exemple: TAFO T</small>
                                            </div>';
                                            } else {
                                                echo '<div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control form-control-lg" name="name" type="text" , value="' . $user->name . '">
                                            </div>';
                                            }

                                            ?>

                                            <div class="form-group">
                                                <label>Subname</label>
                                                <input class="form-control form-control-lg" name="subname" type="text" , value="<?php echo $user->subname; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>password</label>
                                                <input class="form-control form-control-lg" name="password" type="password" , value="<?php echo $user->password; ?>">
                                            </div>

                                            <?php if (isset($errorform['email'])) {
                                                echo '<div class="form-group has-danger">
                                                <label class="form-control-label">Adresse Email</label>
                                                <input type="text" name="email" class="form-control form-control-danger">
                                                <div class="form-control-feedback">' . $errorform['email'] . '</div>
                                                <small class="form-text text-muted">exemple: idriss.tchoupetafo@esprit.tn</small>
                                            </div>';
                                            } else {
                                                echo '<div class="form-group">
                                                <label>Adresse Email</label>
                                                <input class="form-control form-control-lg" name="email" type="email" , value="' . $user->email . '">
                                            </div>';
                                            }

                                            ?>

                                            <div class="form-group">
                                                <label>Date of created</label>
                                                <input class="form-control form-control-lg date-picker" name="created_at" type="text" , value="<?php echo $user->created_at; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Role</label>
                                                <div class="d-flex">
                                                    <div class="custom-control custom-radio mb-5 mr-20">
                                                        <input type="radio" id="customRadio4" name="roles" value="ROLE_ADMIN" class="custom-control-input">
                                                        <label class="custom-control-label weight-400" for="customRadio4">Admin</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-5">
                                                        <input type="radio" id="customRadio5" name="roles" value="ROLE_USER" class="custom-control-input" checked>
                                                        <label class="custom-control-label weight-400" for="customRadio5">User</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select class="selectpicker form-control form-control-lg" name="country" data-style="btn-outline-secondary btn-lg" title="Not Chosen">
                                                    <option>Tunisia</option>
                                                    <option>United States</option>
                                                    <option>India</option>
                                                    <option>United Kingdom</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input class="form-control form-control-lg" name="phones" type="text" , value="<?php echo $user->phones; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control" name="address"><?php echo $user->address; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Paypal ID</label>
                                                <input class="form-control form-control-lg" name="paypalid" type="text" , value="<?php echo $user->paypalid; ?>">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox mb-5">
                                                    <input type="checkbox" name="licence" class="custom-control-input" id="customCheck1-1">
                                                    <label class="custom-control-label weight-400" for="customCheck1-1">I agree to receive notification emails</label>
                                                </div>
                                            </div>

                                        </li>
                                        <li class="weight-500 col-md-6">
                                            <h4 class="text-blue h5 mb-20">Edit Social Media links</h4>
                                            <div class="form-group">
                                                <label>Facebook URL:</label>
                                                <input class="form-control form-control-lg" name="faceboock" type="text" placeholder="Paste your link here">
                                            </div>

                                            <div class="form-group">
                                                <label>Instagram URL:</label>
                                                <input class="form-control form-control-lg" name="instagram" type="text" placeholder="Paste your link here">
                                            </div>

                                            <div class="form-group">
                                                <label>Google-plus URL:</label>
                                                <input class="form-control form-control-lg" name="google" type="text" placeholder="Paste your link here">
                                            </div>
                                            <div class="form-group">
                                                <label>Last sign ip</label>
                                                <input class="form-control form-control-lg" name="last_sign_ip" type="text" , value="<?php echo $user->last_sign_ip; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Date of last sign</label>
                                                <input class="form-control form-control-lg date-picker" name="last_sign_at" type="text" , value="<?php echo $user->last_sign_at; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Date of last update</label>
                                                <input class="form-control form-control-lg date-picker" name="updated_at" type="text" , value="<?php echo $user->updated_at; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Brief description</label>
                                                <textarea class="form-control" name="description"><?php echo $user->description; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Date of banned</label>
                                                <input class="form-control form-control-lg date-picker" name="banned_at" type="text" , value="<?php echo $user->banned_at; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" value="Update Information">
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <!-- Setting Tab End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>