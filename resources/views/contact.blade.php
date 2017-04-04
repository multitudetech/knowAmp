@extends('header')
@section('content')
<section class="signup_box">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="title">
					For any query or suggestions you can contact us here !!
				</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<?php
                    if(session('msg')!=''){
                ?>
                        <div class="alert alert-danger" role="alert">
                            <h4>{{session('msg')}}</h4>
                        </div>
                <?php
                        session(['msg' => '']);
                    }
                ?>
				{!! Form::open(array('route' => 'handleContact', 'class' => 'middle_form')) !!}
					<div class="row">
						<div class="col-md-6 form-group">
							<label> Email Address * </label>
							<input type="email" name="email" class="form-control" required="required" placeholder="Tell Your Email Address">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<label> Any Query / Suggestion * </label>
							<textarea name="query_data" class="form-control" rows="4" required="required"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 text-center">
							<button type="submit" class="btn btn-primary fsize16 space10">Submit Now</button>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</section>
@endsection