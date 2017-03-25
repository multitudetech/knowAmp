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
                    New to AMP? Be A Diamond with GemStones..! 
                </div>
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
                @if($errors->any()&&$errors->first()!='')
                    <div class="alert alert-danger" role="alert">
                        <h4>{{$errors->first()}}</h4>
                    </div>
                @endif      
            
                <!-- Articles -->
                <div class="row">
                    <div class="col-xs-12">
                    <?php
                        foreach ($data as $d) {
                    ?>
                        <div class="question_box">
                            <h2>{{$d->question_title}}</h2>
                            <!-- <p>{{$d->question_description}}</p> -->
                            <div style="max-height: 100px; overflow: hidden;"><?php echo $d->question_description; ?></div>
                            <?php 
                                $question_id = $d->id;
                                for($i=0; $i<5; $i++){
                                    $question_id = base64_encode($question_id);
                                }
                            ?>
                            <?php $view_path = url('/question/'.$question_id); ?>
                            <p><a href="{{ $view_path }}"><button class="btn btn-default">Read More</button></a></p>
                            <!-- <p class="pull-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p> -->
                            <ul class="list-inline review_visit ">
                                <li><a href="#"><i class="fa fa-calendar-o" aria-hidden="true"></i>{{$d->audit_created}}</a></li>
                                <li><a href="#"><i class="fa fa-comments" aria-hidden="true"></i> {{$d->answers}} Answers</a></li>
                                <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$d->views}} Views</a></li>
                            </ul>
                        </div>
                    <?php
                        }
                    ?>                     
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
                            <p class="space10"> <a href="#myModal_reset" data-toggle="modal" data-target="#myModal_reset"> Forget Password ? </a> </p>
                        {!! Form::close() !!}
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