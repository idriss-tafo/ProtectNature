<div class="setpbystep">
    <div class="container-f">
        <header>Register Form</header>
        <div class="progresse-bar">
            <div class="step">
                <p>
                    Name</p>
                <div class="bullet">
                    <span>1</span>
                </div>
                <div class="check fa fa-check">
                </div>
            </div>
            <div class="step">
                <p>
                    Contact</p>
                <div class="bullet">
                    <span>2</span>
                </div>
                <div class="check fa fa-check">
                </div>
            </div>
            <div class="step">
                <p>
                    Birth</p>
                <div class="bullet">
                    <span>3</span>
                </div>
                <div class="check fa fa-check">
                </div>
            </div>
            <div class="step">
                <p>
                    Submit</p>
                <div class="bullet">
                    <span>4</span>
                </div>
                <div class="check fa fa-check">
                </div>
            </div>
        </div>
        <div class="form-outer">
            <form action="<?php echo Router::affiche_url('users/register'); ?>" method="post">
                <input type="hidden" name="token" value="">
                <input type="hidden" name="roles" value="ROLE_USER">
                <input type="hidden" name="created_at" value="">
                <input type="hidden" name="last_sign_at" value="">
                <input type="hidden" name="updated_at" value="">
                <input type="hidden" name="banned_at" value="">
                <input type="hidden" name="last_sign_ip" value="127.0.0.1">

                <div class="page slide-page">
                    <div class="title">
                        Basic Info:</div>
                    <div class="field">
                        <div class="label">
                            First Name</div>
                        <input type="text" id="name" name="name">
                        <i class="fa fa-check-circle "></i>
                        <i class="fa fa-exclamation-circle "></i>
                        <small>Error message</small>
                    </div>
                    <div class="field">
                        <div class="label">
                            Last Name</div>
                        <input type="text" id="subname" name="subname">
                        <i class="fa fa-check-circle "></i>
                        <i class="fa fa-exclamation-circle "></i>
                        <small>Error message</small>
                    </div>
                    <div class="field">
                        <div class="label">
                            User Name</div>
                        <input type="text" id="username" name="username">
                        <i class="fa fa-check-circle "></i>
                        <i class="fa fa-exclamation-circle "></i>
                        <small>Error message</small>
                    </div>
                    <div class="field">
                        <button class="firstNext next">Next</button>
                    </div>
                </div>
                <div class="page">
                    <div class="title">
                        Login Info:</div>
                    <div class="field">
                        <div class="label">
                            Email Address</div>
                        <input type="email" name="email" id="email">
                        <i class="fa fa-check-circle "></i>
                        <i class="fa fa-exclamation-circle "></i>
                        <small>Error message</small>
                    </div>
                    <div class="field">
                        <div class="label">
                            Password</div>
                        <input type="password" name="password" id="password">
                        <i class="fa fa-check-circle "></i>
                        <i class="fa fa-exclamation-circle "></i>
                        <small>Error message</small>
                    </div>
                    <div class="field">
                        <div class="label">
                            Confirm Password</div>
                        <input type="password" id="password2">
                        <i class="fa fa-check-circle "></i>
                        <i class="fa fa-exclamation-circle "></i>
                        <small>Error message</small>
                    </div>

                    <div class="field btns">
                        <button class="prev-1 prev">Previous</button>
                        <button class="next-1 next">Next</button>
                    </div>
                </div>
                <div class="page">
                    <div class="title">
                        Contact Infos:</div>

                    <div class="field">
                        <div class="label">
                            Description</div>
                        <input type="text" id="description" name="description">
                        <i class="fa fa-check-circle "></i>
                        <i class="fa fa-exclamation-circle "></i>
                        <small>Error message</small>
                    </div>
                    <div class="field">
                        <div class="label">
                            Addresse</div>
                        <input type="text" id="address" name="address">
                        <i class="fa fa-check-circle "></i>
                        <i class="fa fa-exclamation-circle "></i>
                        <small>Error message</small>
                    </div>
                    <div class="field">
                        <div class="label">
                            Paypal identification</div>
                        <input type="text" id="paypalid" name="paypalid">
                        <i class="fa fa-check-circle "></i>
                        <i class="fa fa-exclamation-circle "></i>
                        <small>Error message</small>
                    </div>


                    <div class="field">
                        <div class="label">
                            Facebook</div>
                        <input type="text" id="faceboock" name="faceboock">
                        <i class="fa fa-check-circle "></i>
                        <i class="fa fa-exclamation-circle "></i>
                        <small>Error message</small>
                    </div>
                    <div class="field">
                        <div class="label">
                            Instagram</div>
                        <input type="text" id="instagram" name="instagram">
                        <i class="fa fa-check-circle "></i>
                        <i class="fa fa-exclamation-circle "></i>
                        <small>Error message</small>
                    </div>
                    <div class="field">
                        <div class="label">
                            Google</div>
                        <input type="text" id="google" name="google">
                        <i class="fa fa-check-circle "></i>
                        <i class="fa fa-exclamation-circle "></i>
                        <small>Error message</small>
                    </div>

                    <div class="field btns">
                        <button class="prev-2 prev">Previous</button>
                        <button class="next-2 next">Next</button>
                    </div>
                </div>
                <div class="page">
                    <div class="title">
                        Details:</div>
                    <div class="field">
                        <div class="label">
                            Country</div>
                        <select name="country">
                            <option>Tunisia</option>
                            <option>Cameroon</option>
                            <option>Cote divoire</option>
                        </select>
                        <i class="fa fa-check-circle "></i>
                        <i class="fa fa-exclamation-circle "></i>
                        <small>Error message</small>
                    </div>
                    <div class="field">
                        <div class="label">
                            Phone Number</div>
                        <input type="Number" name="phones" id="phones">
                        <i class="fa fa-check-circle "></i>
                        <i class="fa fa-exclamation-circle "></i>
                        <small>Error message</small>
                    </div>
                    <div class="field btns">
                        <button class="prev-3 prev">Previous</button>
                        <button class="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Somehow I got an error, so I comment the script tag, just uncomment to use -->
<!-- <script src="script.js"></script> -->