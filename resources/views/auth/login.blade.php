@extends('layouts.main')

@section('konten')

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="POST" action="{{ route('login') }}">
                        @csrf
							<input id="email" placeholder = "E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />

                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

							<input id="password" placeholder = "Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />

                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        

							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>

                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                            @endif

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                            <span>Dont have any account yet? <a href="{{ route('register') }}">
                                        {{('Sign Up') }}
                                    </a>
                            </span>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section>

@endsection