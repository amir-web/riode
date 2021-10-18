<link rel="icon" type="image/png" href="images/icons/favicon.png">

<script>
    WebFontConfig = {
        google: { families: [ 'Poppins:400,500,600,700' ] }
    };
    ( function ( d ) {
        var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
        wf.src = 'js/webfont.js';
        wf.async = true;
        s.parentNode.insertBefore( wf, s );
    } )( document );
</script>


<link rel="stylesheet" type="text/css" href="/public/riode/vendor/fontawesome-free/css/all.min.css">
<link rel="stylesheet" type="text/css" href="/public/riode/vendor/animate/animate.min.css">

<!-- Plugins CSS File -->
<link rel="stylesheet" type="text/css" href="/public/riode/vendor/magnific-popup/magnific-popup.min.css">


<div class="login-popup">
    <button class="login_close">
        <i class="fas fa-times"></i>
    </button>
    <div class="form-box">
        <div class="tab tab-nav-simple tab-nav-boxed form-tab">
            <ul class="nav nav-tabs nav-fill align-items-center border-no justify-content-center mb-5" role="tablist">
                <li class="nav-item">
                    <a class="nav-link border-no lh-1 ls-normal active" href="#signin">Login</a>
                </li>
                <li class="delimiter">or</li>
                <li class="nav-item">
                    <a class="nav-link border-no lh-1 ls-normal" href="#register">Register</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active in" id="signin">
                    <form method="post" action="{{--{{route('store.login')}}--}}" id="login_form">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="email" class="form-control" id="log_email" name="log_email" placeholder="Email Address *">
                            <span class="text-danger error-text log_email_error"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="log_password" name="log_password" placeholder="Password *">
                            <span class="text-danger error-text log_password_error"></span>
                        </div>
                        {{--<div class="form-footer">
                            <div class="form-checkbox">
                                <input type="checkbox" class="custom-checkbox" id="signin-remember" name="signin-remember">
                                <label class="form-control-label" for="signin-remember">Remember
                                    me</label>
                            </div>
                            <a href="#" class="lost-link">Lost your password?</a>
                        </div>--}}
                        <button class="btn btn-dark btn-block btn-rounded" type="submit">Login</button>
                    </form>
                    <div class="form-choice text-center">
                        <label class="ls-m">or Login With</label>
                        <div class="social-links">
                            <a href="#" class="social-link social-google fab fa-google border-no"></a>
                            <a href="#" class="social-link social-facebook fab fa-facebook-f border-no"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter border-no"></a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="register">
                    <form action="{{--{{route('register')}}--}}" method="post" id="register_form">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" id="reg_name" name="reg_name" placeholder="Your Name *" value="{{old('register-email')}}">
                            <span class="text-danger error-text reg_name_error"></span>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="reg_email" name="reg_email" placeholder="Your Email address *" value="{{old('register-email')}}">
                            <span class="text-danger error-text reg_email_error"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="Password *">
                            <span class="text-danger error-text reg_password_error"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="reg_password_confirmation" name="reg_password_confirmation" placeholder="Password confirm *">
                            <span class="text-danger error-text reg_password_confirmation_error"></span>
                        </div>
                        {{--<div class="form-footer">
                            <div class="form-checkbox">
                                <input type="checkbox" class="custom-checkbox" id="register-agree" name="register-agree">
                                <label class="form-control-label" for="register-agree">I agree to the
                                    privacy policy</label>
                            </div>
                        </div>--}}
                        <button class="btn btn-dark btn-block btn-rounded" type="submit">Register</button>
                    </form>
                    <div class="form-choice text-center">
                        <label class="ls-m">or Register With</label>
                        <div class="social-links">
                            <a href="#" class="social-link social-google fab fa-google border-no"></a>
                            <a href="#" class="social-link social-facebook fab fa-facebook-f border-no"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter border-no"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="/public/riode/vendor/jquery/jquery.min.js"></script>
<script src="/public/riode/vendor/elevatezoom/jquery.elevatezoom.min.js"></script>
<script src="/public/riode/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="/public/riode/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Main JS File -->
<script src="/public/riode/js/main.min.js"></script>
<script src="/public/riode/js/jquery-ui.min.js"></script>
<script src="/public/riode/js/my_script.js"></script>
