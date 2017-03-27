<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                        <a href="{{ url('/') }}">questions</a>
                    </li>
                    <li>
                        <a href="#">about us</a>
                    </li>
                    @if(!(\Auth::user())) 
                    <li class="log_sign">
                    	<a href="{{ url('/login') }}">log in</a>
                    </li>
                    <li class="log_sign sign_up">
                    	<a href="{{ url('/signup') }}">Sign Up</a>
                    </li>
                    @endif
                    @if((\Auth::user()))
                    <li class="log_sign">
                        <a href="#">{{ \Auth::user()->name }}</a>
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
                            <input type="search" name="main-search" class="form-control" placeholder="Enter Your Query Here...">
                            <button type="submit" class="btn"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                        </div>

                        <button type="button" class="close-modal" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
                    </form>
                    <h2 class="search_title"> There is nothing called <span class="blue_clr">Problem</span>,<br>It's just an absence of an idea to find the <span class="blue_clr">Solution</span>.  </h2>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <section class="why_amp">
        <div class="footer-blurb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title"> DIRECTORS PITCH </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 footer-blurb-item">
                        <h3>Dais</h3>
                        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
                    </div>
                    <div class="col-sm-6 footer-blurb-item">
                        <h3>Speakers & Listeners</h3>
                        <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. </p>
                    </div>
                </div>
                <!-- /.row -->  
            </div>
        </div>
    </section>

    <footer>
        
        <div class="small-print">
            <div class="container">
                <p><a href="#">Terms &amp; Conditions</a> | <a href="#">Privacy Policy</a> | <a href="#">Contact</a></p>
                <p>Copyright &copy; KnowAmp.com 2017 </p>
            </div>
        </div>
    </footer>

     <!-- Reset Modal -->
    <div class="modal search_modal fade" id="myModal_reset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="search_title"> No worries, cookies are still in the box !!   </h3>
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
            $.get("http://localhost:8081/knowAmp/incQuestionRate/{{$data[0]->question_id}}", function(data){
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
            $.get("http://localhost:8081/knowAmp/decQuestionRate/{{$data[0]->question_id}}", function(data){
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
            $.get("http://localhost:8081/knowAmp/incAnswerRate/"+id, function(data){
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
            $.get("http://localhost:8081/knowAmp/decAnswerRate/"+id, function(data){
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
    
</body>

</html>