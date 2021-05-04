<div class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="vendors/images/deskapp-logo.svg" alt="">
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="<?php echo Router::affiche_url('users/register'); ?>">Register</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="vendors/images/login-page-img.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login To DeskApp</h2>
                        </div>
                        <form action="<?php echo Router::affiche_url('users/login'); ?>" method="post">
                            <div class="select-role">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn active">
                                        <input type="radio" name="options" id="admin" value="admin">
                                        <div class="icon"><img src="vendors/images/briefcase.svg" class="svg" alt=""></div>
                                        <span>I'm</span>
                                        Manager
                                    </label>
                                    <label class="btn">
                                        <input type="radio" name="options" id="user" value="user">
                                        <div class="icon"><img src="vendors/images/person.svg" class="svg" alt=""></div>
                                        <span>I'm</span>
                                        Employee
                                    </label>
                                </div>
                            </div>


                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" name="login" placeholder="votre nom utilisateur">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" name="password" placeholder="**********">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>

                            <div class="row pb-30">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="forgot-password"><a href="<?php echo Router::affiche_url('users/forgot'); ?>">Forgot Password</a></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">


                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">

                                        <!--a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a>-->
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block" href="https://accounts.google.com/o/oauth2/v2/auth?scope=email&access_type=online&response_type=code&redirect_uri=<?= urlencode('http://127.0.0.1/ProtectNature/users/oauthConnect'); ?>&client_id=<?= Conf::$google_id; ?>">Login With Google</a>
                                        <a class="btn btn-outline-primary btn-lg btn-block" href="">Login With Facebook</a>
                                        <a class="btn btn-outline-primary btn-lg btn-block" href="">Login With instagram</a>
                                        <a class="btn btn-outline-primary btn-lg btn-block" href="<?php echo Router::affiche_url('users/register'); ?>">Register To Create Account</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>