@extends('header')
@section('content')
<section class="main_content">
	<div class="container">
	  
	  	<div class="row">
			<!-- Left Column -->
			<div class="col-sm-9">
			
				<!-- Alert -->
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>knowAmp</strong> Community to know the new AMP Technology, Powered by Google itself! 
				</div>		
			
				<!-- Articles -->
				<div class="row">
					<div class="col-xs-12">
						<div class="question_desc">
							<div class="main_que_asked">
								<p>{{ $data[0]->question_title }}</p>
							</div>
							<div class="row">
								<div class="col-md-11 col-md-push-1">
									<div class="sub_desc_asked">
										<p><?php echo $data[0]->question_description; ?></p>

										<!-- <p class="text-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p> -->
										<ul class="list-inline review_visit ">
			                                <li><a href="#"><i class="fa fa-calendar-o" aria-hidden="true"></i>{{$data[0]->question_created_date}}</a></li>
			                                <li><a href="#"><i class="fa fa-comments" aria-hidden="true"></i> {{$data[0]->answers}} Answers</a></li>
			                                <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$data[0]->views}} Views</a></li>
			                            </ul>
									</div>
								</div>
								<div class="col-md-1 col-md-pull-11">
									<div class="rate_box">
										<ul class="list-unstyled text-center">
											<li> <a href="#"> <i class="fa fa-plus" aria-hidden="true"></i> </a> </li>
											<li> <a href="#"> <span> 12 </span> </a> </li>
											<li> <a href="#"> <i class="fa fa-minus" aria-hidden="true"></i> </a> </li>
											<li> <a href="#"> <i class="fa fa-heart-o" aria-hidden="true"></i> <!-- <i class="fa fa-heart" aria-hidden="true"></i> --> </a> </li>
										</ul>
									</div>
								</div>
							</div>
							<?php if($data[0]->answers>0){ ?>
							<div class="row">
								<div class="col-md-12">
									<p class="ans_count"> {{ $data[0]->answers }} Answers </p>
									<?php
				                        foreach ($data as $d) {
				                    ?>
									<div class="row">
										<div class="col-md-11 col-md-push-1">									
											<div class="que_ans_box">
												<p><?php echo $d->answer; ?></p>	

												<ul class="list-inline review_visit">
													<li><a href="#"><i class="fa fa-calendar-o" aria-hidden="true"></i>{{ $d->answer_created_date }}</a></li>
													<!-- <li><a href="#"><i class="fa fa-comments" aria-hidden="true"></i> 2 Comments</a></li>
													<li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 8 Views</a></li> -->
												</ul>
											</div>
										</div>
										<div class="col-md-1 col-md-pull-11">
											<div class="rate_box">
												<ul class="list-unstyled text-center">
													<li> <a href="#"> <i class="fa fa-plus" aria-hidden="true"></i> </a> </li>
													<li> <a href="#"> <span> 12 </span> </a> </li>
													<li> <a href="#"> <i class="fa fa-minus" aria-hidden="true"></i> </a> </li>
													<li> <a href="#"> <i class="fa fa-heart-o" aria-hidden="true"></i> <!-- <i class="fa fa-heart" aria-hidden="true"></i> --> </a> </li>
												</ul>
											</div>
										</div>
									</div>
									<?php
									}
									?>

									<!-- <p class="ans_count"> Your Answer </p>
									<div class="row">
										<div class="col-md-12">
											<div class="custom_ans_box">
												<img src="img/placeholder_edit.jpg" class="img-responsive center-bolck wid100"> 
											</div>
										</div>
									</div> -->
								</div>
							</div>
							<?php } ?>
						</div>				
					</div>
				</div>
			</div><!--/Center Column-->


		  <!-- Right Column -->
			<div class="col-sm-3">

				<!-- Ask Question Button -->

				<div class="ask_question">
					<a href="{{ url('/askQuestion') }}"> Ask Question </a>
				</div>
 				@if(!(\Auth::user()))
				<!-- Form --> 
				<div class="panel panel-default login_box">
					<div class="panel-heading">
						<h3 class="panel-title">
							<span class="glyphicon glyphicon-log-in"></span> 
							Log In
						</h3>
					</div>
					<div class="panel-body">
						<form>
							<div class="form-group">
								<input type="text" class="form-control" id="uid" name="uid" placeholder="Username">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
							</div>
							<button type="submit" class="btn btn-default">Log In</button> <span> or </span>
							<a href="#" class="btn btn-default register"> Register </a>
							<p class="space10"> <a href="#"> Forget Password ? </a> </p>
						</form>
					</div>
				</div>
	 			@endif
				<!-- Progress Bars -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							<span class="glyphicon glyphicon-scale"></span> 
							Dramatically Engage
						</h3>
					</div>
					<div class="panel-body">
						<div class="progress">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100"
							aria-valuemin="0" aria-valuemax="100" style="width:100%">
								100% Proactively Envisioned
							</div>
						</div>
						<div class="progress">
							<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80"
							aria-valuemin="0" aria-valuemax="100" style="width:80%">
								80% Objectively Innovated
							</div>
						</div>
						<div class="progress">
							<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45"
							aria-valuemin="0" aria-valuemax="100" style="width:45%">
								45% Portalled
							</div>
						</div>
						<div class="progress">
							<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="35"
							aria-valuemin="0" aria-valuemax="100" style="width:35%">
								35% Done
							</div>
						</div>
					</div>
				</div>				

			</div><!--/Right Column -->
		</div>

	</div><!--/container-fluid-->
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