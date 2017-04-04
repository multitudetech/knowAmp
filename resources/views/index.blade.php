@extends('header')
@section('content')
<section class="hero_banner">
	<div class="view_table">
		<div class="view_cell">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h1 class="hero_name"> New to AMP? <br> Be A Diamond with GemStones..! </h1>
						<p>
							The AMP is an open-source Project to make the web faster and much better for internet users. By having all devices in mind, Smooth, Instant, and Beautifully designed AMP is launched by Google and Twitter. Term AMP Itself signifies Accelerated Mobile Pages. It’s a Stripped-down form of HTML in open source with all kind of openness elements in one Project. And go down deep into sea

						</p>
						<a href="#" class="btn" style="text-transform: none;"> KnowAmp </a>
					</div>
				</div>
			</div><!--/container-->	
		</div>
	</div>
</section>

<section class="inner_padding offwhite_content">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="right_img">
					<img src="img/abstract-h-g-400-500-2.jpg" class="img-responsive center-block">
				</div>
			</div>
			<div class="col-md-5">
				<div class="left_content">
					<div class="content">
						<h3 class="content_name"> Dais </h3>
						<p>
							Yes, Now you are the Chief Guest on the Q-A platform of KnowAmp Network Community. KnowAmp  provides you the network to ask related questions and it will be answered by the passionate experts.
							It aims to Share, Learn and Educate every single information about AMP. So stretch your back and get ready for all new Community Network-- KnowAmp

						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="inner_padding orange_content">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-md-push-5">
				<div class="right_img">
					<img src="img/sl.jpg" class="img-responsive center-block">
				</div>
			</div>
			<div class="col-md-5 col-md-pull-7">
				<div class="left_content right_content">
					<div class="content">
						<h3 class="content_name"> Speakers & Listeners </h3>
						<p>
							All is Worthless without audience, we value our tribe..!!  Speakers can feel free to ask any question regarding AMP and have answers, Listeners open their mind by having answers world wide for better exposure and knowledge about Accelerated Mobile Pages. We are here to help on Live Chat and can get expert’s advice.	
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="counter_que">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 col-sm-3 blue_bg">
				<div class="counter_content">
					<div class="view_table">
						<div class="view_cell">
							<h4> users </h4>
							<p class="count"> {{$data['user_count']}} </p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 grey_bg">
				<div class="counter_content">
					<div class="view_table">
						<div class="view_cell">
							<h4> Questions </h4>
							<p class="count"> {{$data['question_count']}} </p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 blue_bg">
				<div class="counter_content">
					<div class="view_table">
						<div class="view_cell">
							<h4> Answers </h4>
							<p class="count"> {{$data['answer_count']}} </p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 grey_bg">
				<div class="counter_content">
					<div class="view_table">
						<div class="view_cell">
							<h4> Views </h4>
							<p class="count"> {{$data['views_count']}} </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection