@extends('layouts.riode')
@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-light alert-danger alert-icon alert-inline mb-4">
                <i class="fas fa-exclamation-triangle"></i>
                <h4 class="alert-title">Oh snap!</h4>
                {{session('error')}}
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
                        <a class="active" href="{{route('store.login')}}">Login</a>
                    </li>
                    <li class="delimiter">or</li>
                    <li>
                        <a href="{{route('store.register')}}">Register</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="signin">
                        <form action="{{route('store.login')}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="email" placeholder="Username or Email Address *">
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
                            <div class="form-footer">
                                <div class="form-checkbox">
                                    <input type="checkbox" class="custom-checkbox" id="signin-remember" name="signin-remember">
                                    <label class="form-control-label" for="signin-remember">Remember
                                        me</label>
                                </div>
                                <a href="#" class="lost-link">Lost your password?</a>
                            </div>
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
