@extends('header')
@section('content')
<?php
use App\content_news;
$_news = content_news::get();
?>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<h1>News</h1>
		</div>
	</div>
	<?php foreach ($_news as $d) { ?>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<a href="<?php echo $d->url; ?>"><h2><?php echo $d->title; ?></h2></a>
				<div class="col-md-3 col-sm-12 col-xs-12">
					<img class="img-responsive" src="<?php echo $d->image_link; ?>">
				</div>
				<div class="col-md-9">
					<p><?php echo $d->description; ?>
					<a href="<?php echo $d->url; ?>">Read more</a>
					</p>
				</div>
				<div class="col-md-3"><?php echo $d->audit_created_date; ?></div>
			</div>
		</div>
		<hr/>
	<?php } ?>
	{{ $_news->links() }}
</div>
@endsection