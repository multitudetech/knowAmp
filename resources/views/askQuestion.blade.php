@extends('header')
@section('content')
<section class="main_content">
	<div class="container">
	  
	  	<div class="row">
			<!-- Left Column -->
			<div class="col-md-8">
				<h3 class="ans_count"> Ask Your question here: </h3>

				<div class="row">
					<div class="col-md-12">
						{!! Form::open(array('route' => 'handleaskQuestion')) !!}
							<div class="form-group row">
								<label class="control-label col-md-1 space5">Title:</label>
								<div class="col-md-11">
									<input type="text" name="question_title" class="form-control" placeholder="What's question for amp pages?">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<div class="custom_ans_box space20">
										<!-- <img src="img/placeholder_edit.jpg" class="img-responsive center-bolck wid100"> -->
										{!! Form::textarea('question_description', null, array('class' => 'form-control cleditor', 'id' => 'textarea2', 'rows' => '3')) !!}
									</div>
								</div>
							</div>
							<!-- <div class="form-group row">
								<label class="control-label col-md-1 space5">Tags:</label>
								<div class="col-md-11">
									<input type="text" name="ask_question" class="form-control" placeholder="What's question for amp pages?">
								</div>
							</div> -->
							<!-- <div class="form-group row">
							    <div class="col-md-12">
							      <div class="checkbox">
							        <label class="f700">
							          <input type="checkbox"> Send responses to my registered Email Address.
							        </label>
							      </div>
							    </div>
							</div> -->
							<button type="submit" name="ask_question" class="btn btn-default btn-primary">Post Your Question</button>
						{!! Form::close() !!}
					</div>
				</div>

			</div><!--/Center Column-->


		  	<!-- Right Column -->
			<div class="col-md-4">

				<!-- Ask Question Button -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title fa-fa-title">
							<i class="fa fa-lightbulb-o" aria-hidden="true"></i>
							Some Tips to ask your question.
						</h3>
					</div>
					<div class="panel-body">
						<p> This is the specific wesite for AMP community only. Please ask questions regarding Amp only. <br><br> You can ask questions regarding any defficulty you had in converting your existing pages in amp pages or find any difficulties in making/validating/etc. Amp pages. </p>
						<h4 class="space20 text-right">- knowAmp</h4>
					</div>
				</div>				
	 
				<!-- Progress Bars -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title fa-fa-title">
							<i class="fa fa-tasks" aria-hidden="true"></i>
							Related Qurstions
						</h3>
					</div>
					<div class="panel-body">
						<!-- <div class="space100"></div> -->
						<ul class="list-unstyled fa-angle-list">
							<li>
								<a href="#"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </a>
							</li>
							<li>
								<a href="#"> Etiam accumsan mi ac bibendum ornare. </a>
							</li>
							<li>
								<a href="#"> In et felis a quam mattis malesuada nec ac risus. </a>
							</li>
							<li>
								<a href="#"> Vivamus tincidunt elit et metus imperdiet accumsan. </a>
							</li>
							<li>
								<a href="#"> Aenean feugiat mi vel lectus pharetra, eget tincidunt turpis rhoncus. </a>
							</li>
							<li>
								<a href="#"> Vestibulum id sem lacinia tortor dictum iaculis et non augue. </a>
							</li>
							<li>
								<a href="#"> In condimentum eros sed aliquet ultricies. </a>
							</li>
							<li>
								<a href="#"> Phasellus porta magna at nulla bibendum, aliquet ultrices nibh efficitur. </a>
							</li>
							<li>
								<a href="#"> Cras sit amet leo vel ex placerat fermentum. </a>
							</li>
						</ul>
					</div>
				</div>				

			</div><!--/Right Column -->
		</div>

	</div><!--/container-fluid-->
</section>

<div class="modal search_modal fade" id="myModal_ask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
		    <div class="container">
		    	<div class="row">
		    		<div class="col-md-10 col-md-offset-1">
				      	<div class="modal-body ques_ask_box">
				      		<h3 class="search_title text-left"> Welcome to knowAmp  </h3>
				      		<p class="space20">
				      			We’d love to help you, but the reality is that not every question gets answered. To improve your chances, here are some tips:<br>
								Search, and research
							<br><br>
								Have you thoroughly searched for an answer before asking your question? Sharing your research helps everyone. Tell us what you found (on this site or elsewhere) and why it didn’t meet your needs. This demonstrates that you’ve taken the time to try to help yourself, it saves us from reiterating obvious answers, and above all, it helps you get a more specific and relevant answer!
				      		</p>
				        	<form class="main-search">
				        		<div class="form-group">
				        			<input type="search" name="main-search" class="form-control" placeholder="Enter Your Query Here...">
				        			<button type="submit" class="btn"> <i class="fa fa-search" aria-hidden="true"></i> </button>
				        		</div>

				        		<button type="button" class="close-modal" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
				        	</form>

				        	<p> Still upset about your question and stucked then ask the questtion and wait till someone get back to you.   <a href="#" class="ask_btn btn btn-default btn-info"> Ask Now </a> </p>
				      	</div> 		    			
		    		</div>
		    	</div>
		    </div>
	    </div>
  	</div>
</div>

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