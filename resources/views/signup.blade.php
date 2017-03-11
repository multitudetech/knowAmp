@extends('header')
@section('content')

	<section class="signup_box">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title">
						Register with knowAmp to Join the community
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
								<input type="text" name="name" class="form-control" required="" placeholder="Tell Your Name">
							</div>
							<div class="col-md-6 form-group">
								<label> Nickname (If Any) </label>
								<input type="text" name="nickname" class="form-control" placeholder="Tell Your Nickname">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-group">
								<label> Email Address *</label>
								<input type="email" name="email" class="form-control" required="" placeholder="Tell Your Email Address">
							</div>
							<div class="col-md-6 form-group">
								<label> Contact Number *</label>
								<input type="tel" name="contact_number" class="form-control" required="" placeholder="How to Reach You">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-group">
								<label>Password *</label>
								<input type="password" name="password" class="form-control" required="" placeholder="Password">
							</div>
							<div class="col-md-6 form-group">
								<label>Confirm Password *</label>
								<input type="password" name="confirm_password" class="form-control" required="" placeholder="Confirm Yours">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<p> <i class="fa fa-bolt" aria-hidden="true"></i> &nbsp; By registering, you agree to the <a href="#">Privacy Policy</a> and <a href="#">Terms of Service</a> of knowAmp.  &nbsp; <i class="fa fa-bolt" aria-hidden="true"></i></p>
								<button type="submit" class="btn btn-primary fsize16 space10">Register Now</button>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div><!-- 
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="middle_form space20">
						<p> Already registered? <a href="#"> Log In </a> </p>
					</div>
				</div>
			</div> -->
		</div>
	</section>

	<section class="why_amp">
		
		<div class="footer-blurb">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="title"> why you must use amp? </h3>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 footer-blurb-item">
						<h3><span class="glyphicon glyphicon-text-size"></span> Dynamic</h3>
						<p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
					</div>
					<div class="col-sm-4 footer-blurb-item">
						<h3><span class="glyphicon glyphicon-wrench"></span> Efficient</h3>
						<p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. </p>
					</div>
					<div class="col-sm-4 footer-blurb-item">
						<h3><span class="glyphicon glyphicon-paperclip"></span> Complete</h3>
						<p>Professionally cultivate one-to-one customer service with robust ideas. Completely synergize resource taxing relationships via premier niche markets. Dynamically innovate resource-leveling customer service for state of the art customer service.</p>
					</div>

				</div>
				<!-- /.row -->	
			</div>
        </div>
	</section>
@endsection