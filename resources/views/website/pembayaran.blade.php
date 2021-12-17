@extends('layout.main')

@section('konten')
<section id="cart_items">
		<div class="container">
			<div class="step-one">
				<h2 class="heading">Bank 1</h2>
			</div>
			<div class="checkout-options">
				<h3>Nomor rekening : 0000000</h3>
				<p>Atas nama : </p>
			</div>

			<div class="step-one">
				<h2 class="heading">Bank 2</h2>
			</div>
			<div class="checkout-options">
				<h3>Nomor rekening : 0000000</h3>
				<p>Atas nama : </p>
			</div>

			<div class="signup-form" style="width: 500px"><!--sign up form-->
				<h2>Form Data Pembayaran</h2>
				<form method="POST" action="/addpayment">
				@csrf  
				<input type="hidden" name="bill_id" value="{{ $id }}">
					<input id="name" placeholder = "Nama bank akun " type="text" class="form-control" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus />
					

						@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror

					<input id="no_rek" placeholder = "Nomor rekening" type="text" class="form-control" name="no_rek" value="{{ old('no_rek') }}"  autocomplete="no_rek"/>

						@error('no_rek')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					
					<button type="submit" class="btn btn-primary">Kirim</button>
				</form>
			</div><!--/sign up form-->
		</div>
	</section>
@endsection