<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/QAPage">
<head>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
     (adsbygoogle = window.adsbygoogle || []).push({
       google_ad_client: "ca-pub-3336946006544881",
       enable_page_level_ads: true
     });
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if(isset($meta_description)){ ?>
    <meta name="description" content="<?php print_r($meta_description); ?>">
    <?php } ?>
    <meta name="keywords" content="KnowAmp,knowamp.com,accelerated mobile pages,amp,amp google,google accelerated mobile pages,amp mobile,amp mobile,mobile amp,mobile page,project amp,amp html,google amp pages,amp website">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title><?php print_r($title); ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700|Source+Sans+Pro:400,600" rel="stylesheet">
    <link href="{{URL::asset('css/custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/editor.css')}}" type="text/css" rel="stylesheet"/>
    <link id="base-style" href="{{ URL::asset('css/jquery.cleditor.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/prism.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- google analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-93981457-1', 'auto');
      ga('send', 'pageview');

    </script>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-bolt" aria-hidden="true"></i> KnowAmp </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="{{ url('/') }}">home</a>
                    </li>
                    <li>
                        <a href="{{ url('/questions') }}">questions</a>
                    </li>
                    <li>
                        <a href="{{ url('/aboutus') }}">about us</a>
                    </li>
                    @if(!(\Auth::user())) 
                    <li class="log_sign">
                    	<a href="#login_modal" data-toggle="modal" data-target="#login_modal">log in</a>
                    </li>
                    <li class="log_sign sign_up">
                    	<a href="{{ url('/signup') }}">Sign Up</a>
                    </li>
                    @endif
                    @if((\Auth::user()))
                    <li class="log_sign">
                        <a>{{ \Auth::user()->name }}</a>
                    </li>
                    <li class="log_sign sign_up">
                        <a href="{{ url('/logout') }}">Log Out</a>
                    </li>
                    @endif
                    <li>
                    	<a href="" role="button" data-toggle="modal" data-target="#myModal_search"> <i class="fa fa-search" aria-hidden="true"></i> </a>
                    </li>  
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Search Modal -->
    <div class="modal search_modal fade" id="myModal_search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="search_title"> Where have you been stuck at?  </h3>
                    <form class="main-search">
                        <div class="form-group">
                            
                        </div>

                        <button type="button" class="close-modal" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
                    </form>
                    <h2 class="search_tag_line"> There is nothing called <span class="blue_clr">Problem</span>,<br>It's just an absence of an idea to find the <span class="blue_clr">Solution</span>.  </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Modal -->
    <div class="modal search_modal login_modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body ht100">
                    <button type="button" class="close-modal" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
                    <div class="view_table">
                        <div class="view_cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <!-- Form --> 
                                <div class="panel panel-default login_box">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><span class="glyphicon glyphicon-log-in"></span> KnowAmp Log In</h3>
                                    </div>
                                    <div class="panel-body">
                                        {!! Form::open(array('route' => 'handleLogin')) !!}
                                            <div class="form-group">
                                                {!! Form::text('email', null, array('class' => 'form-control', 'id' => 'uid', 'placeholder' => 'Username')) !!}
                                                <!-- <input type="text" class="form-control" id="uid" name="uid" placeholder="Username"> -->
                                            </div>
                                            <div class="form-group">
                                                {!! Form::password('password', array('class' => 'form-control', 'id' => 'pwd', 'placeholder' => 'Password')) !!}
                                                <!-- <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password"> -->
                                            </div>
                                            {!! Form::token() !!}
                                            {!! Form::submit('Log In', array('class' => 'btn btn-default')) !!}
                                            <!-- <button type="submit" class="btn btn-default">Log In</button> --> <span> or </span>
                                            <a href="{{ url('/signup') }}" class="btn btn-default register"> Register </a>
                                            <p class="space10"> <a href="#myModal_reset" data-toggle="modal" data-target="#myModal_reset"> Forgot Password ? </a> </p>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
					<img src="img/dais.jpg" class="img-responsive center-block">
				</div>
			</div>
			<div class="col-md-5">
				<div class="left_content">
					<div class="content">
						<h3 class="content_name">Dais for Accelerated Mobile Pages Skill</h3>
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
<footer>
        
        <div class="small-print">
            <div class="container">
                <p><a href="{{ url('/terms') }}">Terms &amp; Conditions</a> | <a href="{{ url('/privacy') }}">Privacy Policy</a> | <a href="{{ url('/contact') }}">Contact</a></p>
                <p>Copyright &copy; KnowAmp.com 2017 </p>
            </div>
        </div>
    </footer>

     <!-- Reset Modal -->
    <div class="modal search_modal fade" id="myModal_reset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="search_title">No worries, cookies are still in the project box !!</h3>
                    {!! Form::open(array('route' => 'forgetPassword', 'class' => 'main-search main-forget')) !!}
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Registered Email Address">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" name="forgetPassword" class="btn btn-primary" value="Reset Password">
                        </div>

                        <button type="button" class="close-modal" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>

                        <p class="note">
                            Note: After Entering your email address here, please check your inbox for your password reset link. <br><br> Thanks for being with KnowAmp.com Community.
                        </p>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    
    <!-- jQuery -->
    <script src="{{URL::asset('js/jquery-1.11.3.min.js')}}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.0.0.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-migrate-3.0.0.js"></script> -->
    <!-- <script src="{{ URL::asset('js/jquery-1.9.1.min.js') }}"></script> -->
    <script src="{{ URL::asset('js/jquery-migrate-1.0.0.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    
    <!-- IE10 viewport bug workaround -->
    <script src="{{URL::asset('js/ie10-viewport-bug-workaround.js')}}"></script>
    
    <!-- Placeholder Images -->
    <script src="{{URL::asset('js/holder.min.js')}}"></script>

    <script src="{{URL::asset('js/prism.js')}}" data-manual></script>

    <script src="{{ URL::asset('js/jquery.cleditor.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(document).click(function (event) {
                var clickover = $(event.target);
                var opened = $(".navbar-collapse").hasClass("collapse in");
                if (opened === true && !clickover.hasClass("navbar-toggle")) {
                    $(".navbar-toggle").click();
                }
            });
        });
    </script>

    <script type="text/javascript">
        $('#myModal_search').on('shown.bs.modal', function (e) {
            $('.modal-open').css('padding-right', '0');
            console.log('pass');
        });
    </script>
    <script src="{{ URL::asset('js/editor.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Display editor -->
    <script type="text/javascript">
        $(document).ready( function() {
            $('.cleditor').cleditor();                    
        });

        <?php if(isset($data[0]->question_id)){ ?>
        //Plus rate to questions
        $("#incRateQue").click(function(){
            //var server = window.location.hostname;
            $.get("http://www.knowamp.com/incQuestionRate/{{$data[0]->question_id}}", function(data){
                if(data=='Unauthorized'){
                    $('#rate_error').show();
                }
                else{
                    var rate = $("#que_rate_val_span").text();
                    var rate = parseInt(rate,10);
                    rate++;
                    $("#que_rate_val_span").text(rate);
                }
            });
        });

        //Nagative rate to questions
        $("#decRateQue").click(function(){
            $.get("http://www.knowamp.com/decQuestionRate/{{$data[0]->question_id}}", function(data){
                if(data=='Unauthorized'){
                    $('#rate_error').show();
                }
                else{
                    var rate = $("#que_rate_val_span").text();
                    var rate = parseInt(rate,10);
                    rate--;
                    $("#que_rate_val_span").text(rate);
                }
            });
        });

        //Plus rate to Answer
        function incRateAns(id){
            $.get("http://www.knowamp.com/incAnswerRate/"+id, function(data){
                if(data=='Unauthorized'){
                    $('#rate_error').show();
                }
                else{
                    var rate = $("#ans_rate_val_span_"+id).text();
                    var rate = parseInt(rate);
                    rate++;
                    $("#ans_rate_val_span_"+id).text(rate);
                }
            });
        }

        function decRateAns(id){
            $.get("http://www.knowamp.com/decAnswerRate/"+id, function(data){
                if(data=='Unauthorized'){
                    $('#rate_error').show();
                }
                else{
                    var rate = $("#ans_rate_val_span_"+id).text();
                    var rate = parseInt(rate);
                    rate--;
                    $("#ans_rate_val_span_"+id).text(rate);
                }
            });
        }
        <?php } ?>
    </script>

    <script type="text/javascript">
        $('#uid').focus();
    </script>
    
</body>

</html>