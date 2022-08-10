@extends('layouts.mine')

  @section('content') 
  <!--<div class="container">--> 
	   <div class="card-header no-border pb-0">
        <div class="card-title text-xs-center">
       <div class=""><img style="    width: 100%;margin-bottom: -20px;" src="{{asset('Final_logo.png')}}" alt="branding logo"></div>
        </div>
        <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>We will send you a link to reset your password.</span></h6>
    </div>
	     <div class="card-body collapse in">
        <div class="card-block">
            <form class="form-horizontal" action="{{ route('password.update') }}" method="POST" novalidate>
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <fieldset class="form-group position-relative has-icon-left">
                    {{--<input type="email" class="form-control form-control-lg input-lg" id="user-email" placeholder="Your Email Address" required>--}}
                    <input id="email" type="email" class="form-control form-control-lg input-lg @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    <div class="form-control-position">
                        <i class="icon-mail6"></i>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </fieldset>
				<fieldset class="form-group position-relative">
   
					 <input id="password" type="password" class="form-control form-control-lg input-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="new password"> 

                                  @error('password') 
                                      <span class="invalid-feedback" role="alert"> 
                                          <strong>{{ $message }}</strong> 
                                      </span> 
                                  @enderror 

                </fieldset>
				<fieldset class="form-group position-relative ">
                    {{--<input type="email" class="form-control form-control-lg input-lg" id="user-email" placeholder="Your Email Address" required>--}}
					   <input id="password-confirm" type="password" class="form-control form-control-lg input-lg" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password"> 
                   
                </fieldset>

              {{--  <button type="submit" class="btn btn-primary btn-lg btn-block">
                    <i class="icon-lock4"></i>   {{ __('Reset Password') }}
                </button>--}}
                <button type="submit" class="btn btn-danger btn-lg btn-block"><i class="icon-lock4"></i> Recover Password</button>
            </form>
        </div>
    </div>
    <div class="card-footer no-border">
        <p class="float-sm-left text-xs-center"><a href="{{url('login')}}" class="card-link">Login</a></p>
       <!-- <p class="float-sm-right text-xs-center">New to Robust ? <a href="{{url('login')}}" class="card-link">Create Account</a></p>-->
    </div>
   
 <!-- </div> --> 
  @endsection 




