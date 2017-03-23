@extends('header')
@section('content')
<section class="signup_box">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="title">
					Reset your password !!
				</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				{!! Form::open(array('route' => 'handleResetPassword', 'class' => 'middle_form')) !!}
					<input type="hidden" name="verification_code" value="{{$data['verifyid']}}">
					@if($errors->any()&&$errors->first()!='')
	                    <div class="alert alert-danger" role="alert">
	                        <h4>{{$errors->first()}}</h4>
	                    </div>
	                @endif
					<div class="row">
						<div class="col-md-12 form-group">
							<label>Enter New Password</label>
							<input type="password" name="password" class="form-control" required="" placeholder="New Password">
						</div>
						<div class="col-md-12 form-group">
							<label>Re-enter Password</label>
							<input type="password" name="confirm_password" class="form-control" required="" placeholder="Confirm Password">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 text-center">
							<button type="submit" class="btn btn-primary fsize16 space10">Reset Password</button>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</section>
@endsection