@extends('header')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<h1>News</h1>
		</div>
	</div>
	<?php foreach ($news as $data) { ?>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<a href="<?php echo $data->url; ?>"><h2><?php echo $data->title; ?></h2></a>
				<div class="col-md-3 col-sm-12 col-xs-12">
					<img class="img-responsive" src="<?php echo $data->image_link; ?>">
				</div>
				<div class="col-md-9">
					<p><?php echo $data->description; ?>
					<a href="<?php echo $data->url; ?>">Read more</a>
					</p>
				</div>
				<div class="col-md-3"><?php echo $data->audit_created_date; ?></div>
			</div>
		</div>
		<hr/>
	<?php } ?>
	
</div>
@endsection