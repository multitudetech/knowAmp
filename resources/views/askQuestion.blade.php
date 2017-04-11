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
										<!-- {!! Form::textarea('question_description', null, array('class' => 'form-control cleditor', 'id' => 'textarea2', 'rows' => '3')) !!} -->
										<!-- <div id="txtEditor"></div> -->
										<!-- <textarea id="txtEditor" name="txtEditor"></textarea>
										<textarea id="txtEditorContent" name="txtEditorContent" hidden=""></textarea> -->
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
							Some Tips before you ask a question.
						</h3>
					</div>
					<div class="panel-body">
						<p> This is the specific wesite for AMP community only. Please ask questions regarding Amp only. <br><br> Your Question may have an answer? History is Alive..<br><br> Is it relavent to Users? </p>
						<h4 class="space20 text-right">- KnowAmp</h4>
					</div>
				</div>				
	 
				<!--/Right Column -->
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
				      		<h3 class="search_title text-left"> Welcome to KnowAmp  </h3>
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
@endsection