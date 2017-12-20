@extends('header')
@section('content')

	<section class="signup_box">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title">
						Register with KnowAmp to Join the community
					</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					{!! Form::open(array('route' => 'users.store', 'class' => 'middle_form')) !!}
						{!! Form::hidden('user_id', null) !!}
						{!! Form::hidden('verification_code', null) !!}
						{!! Form::token() !!}
						@if($errors->any())
							<div class="alert alert-danger row" role="alert">
								<h4>{{$errors->first()}}</h4>
							</div>
						@endif
						<div class="row">
							<div class="col-md-6 form-group">
								<label> Name *</label>
								{!! Form::text('name', null, array('class' => 'form-control',  'placeholder' => 'Tell Your Name', 'required' => 'required')) !!}
							</div>
							<div class="col-md-6 form-group">
								<label> Nickname (If Any) </label>
								{!! Form::text('nickname', null, array('class' => 'form-control',  'placeholder' => 'Tell Your Nickname')) !!}
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-group">
								<label> Email Address *</label>
								{!! Form::email('email', null, array('class' => 'form-control',  'placeholder' => 'Tell Your Email Address', 'required' => 'required')) !!}
							</div>
							<div class="col-md-6 form-group">
								<label> Contact Number *</label>
								{!! Form::tel('contact_number', null, array('class' => 'form-control',  'placeholder' => 'How to Reach You', 'required' => 'required')) !!}
								<!-- <input type="tel" name="contact_number" class="form-control" required="" placeholder="How to Reach You"> -->
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-group">
								<label>Password *</label>
								{!! Form::password('password', null, array('class' => 'form-control',  'placeholder' => 'Password', 'required' => 'required')) !!}
							</div>
							<div class="col-md-6 form-group">
								<label>Confirm Password *</label>
								{!! Form::password('confirm_password', null, array('class' => 'form-control',  'placeholder' => 'Confirm Password', 'required' => 'required')) !!}
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<p> <i class="fa fa-bolt" aria-hidden="true"></i> &nbsp; By registering, you agree to the <a href="{{ url('/privacy') }}">Privacy Policy</a> and <a href="{{ url('/terms') }}">Terms of Service</a> of KnowAmp.  &nbsp; <i class="fa fa-bolt" aria-hidden="true"></i></p>
								<button type="submit" class="btn btn-primary fsize16 space10">Register Now</button>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</section>
@endsection