@extends('layouts.main')

@section('konten')

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form method="POST" action="{{ route('register') }}">
                        @csrf  
							<input id="username" placeholder = "Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="username" autofocus />
                            

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

							<input id="email" placeholder = "E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email"/>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

							<input id="password" placeholder = "Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password"/>
                            

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                
                            <input id="password-confirm" placeholder = "Confirm Password" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            

                            <input id="name" placeholder = "Nama Lengkap" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus/>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

							<input id="phone_number" placeholder = "Nomor Telepon" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}"  autocomplete="phone_number" autofocus/>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

							<input id="address" placeholder = "d" type="text" class="form-control @error('d') is-invalid @enderror" name="address" value="{{ old('address') }}"  autocomplete="address" autofocus/>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
							<button type="submit" class="btn btn-primary">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section>


@endsection
