@extends('header')
@section('content')
<section class="main_content">
	<div class="container">
	  
	  	<div class="row">
			<!-- Left Column -->
			<div class="col-md-9 space20">
			
				<!-- Alert -->
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>KnowAmp</strong> Community to know the new AMP Technology, Powered by Google itself! 
				</div>

				@if($errors->any()&&$errors->first()!='')
                    <div class="alert alert-danger" role="alert">
                        <h4>{{$errors->first()}}</h4>
                    </div>
                @endif

                <div class="alert alert-danger" role="alert" id="rate_error" style="display: none;">
                    <h4>Please login before rating!</h4>
                </div>		
			
				<!-- Articles -->
				<div class="row">
					<div class="col-xs-12">
						<div class="question_desc" itemscope itemtype="http://schema.org/Question">
							<div class="main_que_asked">
								<p itemprop="name">{{ $data[0]->question_title }}</p>
							</div>
							<div class="row">
								<div class="col-sm-2 col-xs-2 col-md-1">
									<div class="rate_box">
										<ul class="list-unstyled text-center">
											<li> <a> <i class="fa fa-plus" id="incRateQue" aria-hidden="true"></i>  </a> </li>
											<li> <span id="que_rate_val_span" itemprop="upvoteCount">{{$data[0]->rate}}</span> </li>
											<li> <a> <i class="fa fa-minus" id="decRateQue" aria-hidden="true"></i> </a> </li>
											<li> <a href="#"> <i class="fa fa-heart-o" aria-hidden="true"></i> <!-- <i class="fa fa-heart" aria-hidden="true"></i> --> </a> </li>
										</ul>
									</div>
								</div>
								<div class="col-md-11 col-sm-10 col-xs-10">
									<div class="sub_desc_asked">
										<p itemprop="text"><?php echo $data[0]->question_description; ?></p>

										<!-- <p class="text-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p> -->
										<ul class="list-inline review_visit ">
			                                <li itemprop="dateCreated"><a href="#"><i class="fa fa-calendar-o" aria-hidden="true"></i>{{$data[0]->question_created_date}}</a></li>
			                                <li itemprop="answerCount"><a href="#"><i class="fa fa-comments" aria-hidden="true"></i> {{$data[0]->answers}} Answers</a></li>
			                                <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$data[0]->views}} Views</a></li>
			                            </ul>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
								<?php if($data[0]->answers>0){ ?>
									<p class="ans_count"> {{ $data[0]->answers }} Answers </p>
									<?php
				                        foreach ($data as $d) {
				                    ?>
									<div class="row">
										<div class="col-md-1 col-sm-2 col-xs-2">
											<div class="rate_box">
												<ul class="list-unstyled text-center">
													<li onclick="incRateAns({{$d->id}})"> <i class="fa fa-plus" aria-hidden="true"></i> </li>
													<li> <span id="ans_rate_val_span_{{$d->id}}">{{$d->answer_rate}}</span> </li>
													<li onclick="decRateAns({{$d->id}})"> <i class="fa fa-minus" aria-hidden="true"></i> </li>
													<li> <i class="fa fa-heart-o" aria-hidden="true"></i> <!-- <i class="fa fa-heart" aria-hidden="true"></i> -->  </li>
												</ul>
											</div>
										</div>
										<div class="col-md-11 col-sm-10 col-xs-10">									
											<div class="que_ans_box">
												<p><?php echo $d->answer; ?></p>	

												<ul class="list-inline review_visit">
													<li><a href="#"><i class="fa fa-calendar-o" aria-hidden="true"></i>{{ $d->answer_created_date }}</a></li>
													<!-- <li><a href="#"><i class="fa fa-comments" aria-hidden="true"></i> 2 Comments</a></li>
													<li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 8 Views</a></li> -->
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
								<?php } ?>
								<p class="ans_count"> Your Answer </p>
								<?php 
	                                $question_id = $data[0]->question_id;
	                                for($i=0; $i<5; $i++){
	                                    $question_id = base64_encode($question_id);
	                                }
	                            ?>
								{!! Form::open(array('route' => 'handleAnswer')) !!}
								<div class="row">
									<div class="col-md-12">
										<div class="custom_ans_box">
											<input type="hidden" name="question_id" value="{{$question_id}}">
											{!! Form::textarea('answer_description', null, array('class' => 'form-control cleditor', 'id' => 'textarea2', 'rows' => '3')) !!}
										</div>
									</div>
								</div>
								<button type="submit" name="post_answer" class="btn btn-default btn-primary space20">Post Your Answer</button>
								{!! Form::close() !!}
								</div>
							</div>
						</div>				
					</div>
				</div>
			</div><!--/Center Column-->


		  <!-- Right Column -->
			<div class="col-md-3 space20">

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
							<p class="space10"> <a href="#myModal_reset" data-toggle="modal" data-target="#myModal_reset"> Forget Password ? </a> </p>
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
@endsection