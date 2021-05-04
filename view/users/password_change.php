<div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
            <a href="login.html">
                <img src="vendors/images/deskapp-logo.svg" alt="">
            </a>
        </div>
        <div class="login-menu">
            <ul>
                <li><a href="<?php echo Router::affiche_url('users/login'); ?>">Login</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="vendors/images/forgot-password.png" alt="">
            </div>
            <div class="col-md-6">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Reset Password</h2>
                    </div>
                    <h6 class="mb-20">Enter your new password, confirm and submit</h6>
                    <form action="<?php echo Router::affiche_url('users/password_change'); ?>" method="post">
                        <input type="hidden" name="token" value="<?php echo isset($this->request->params[0]) ? (htmlspecialchars($this->request->params[0])) : ''; ?>">
                        <div class="input-group custom">

                            <input type="password" name="password" class="form-control form-control-lg" placeholder="New Password">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="password" name="password2" class="form-control form-control-lg" placeholder="Confirm New Password">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-5">
                                <div class="input-group mb-0">


                                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">


                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>