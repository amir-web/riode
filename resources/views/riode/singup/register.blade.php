@extends('layouts.riode')
@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-simple alert-primary alert-icon mb-4">
                <i class="fas fa-check"></i>
                {{session('success')}}
                <button type="button" class="btn btn-link btn-close">
                    <i class="d-icon-times"></i>
                </button>
            </div>
        @endif
    </div>

    <div style="padding: 50px" class="container">
        <div class="login-popup">
            <div class="form-box">
                <div class="tab tab-nav-simple tab-nav-boxed form-tab">
                    <ul class="form_ul_sing">
                        <li>
                            <a href="{{route('store.login_form')}}">Login</a>
                        </li>
                        <li class="delimiter">or</li>
                        <li>
                            <a class="active" href="{{route('store.register_create')}}">Register</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div>
                            <form action="{{route('store.register_store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Your Name *">
                                    @if($errors->has('name'))
                                        <span class="text-danger error-text">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email address *">
                                    @if($errors->has('email'))
                                        <span class="text-danger error-text">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password *">
                                    @if($errors->has('password'))
                                        <span class="text-danger error-text">{{$errors->first('password')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="confirmation" placeholder="Confirm password *">
                                    @if($errors->has('confirmation'))
                                        <span class="text-danger error-text">{{$errors->first('confirmation')}}</span>
                                    @endif
                                </div>
                                <div class="form-footer">
                                    <div class="form-checkbox">
                                        <input type="checkbox" class="custom-checkbox" id="register-agree" name="register-agree" required="">
                                        <label class="form-control-label" for="register-agree">I agree to the
                                            privacy policy</label>
                                    </div>
                                </div>
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
    </div>
    <style>
        .form_ul_sing{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form_ul_sing li{
            list-style: none;
        }

        .form_ul_sing li a.active{
            color: #1e1e1e!important;
            font-size: 3rem;
        }

        .form_ul_sing li a{
            font-weight: 700;
            color: #999;
            font-size: 1.8rem;
            letter-spacing: -.025em;
            line-height: 2.43;
            transition: font-size .3s, color .3s;
        }
    </style>
@endsection
