<img src="http://img.knowamp.com/empty.gif" width="1" height="35" style="display:block; height:14px" alt=""/>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<h1>News</h1>
		</div>
	</div>
	<?php 
	$i = 0;
	$count = count($urlToImage); 
	for ($i = 0; $i < $count; $i++) { ?>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-3 col-sm-12 col-xs-12">
					<img class="img-responsive" src="<?php echo $urlToImage[$i]; ?>">
				</div>
				<div class="col-md-9">
					<a href="http://www.knowamp.com/news"><h2><?php echo $title[$i]; ?></h2></a>
				</div>
				<div class="col-md-3"><?php echo $publishedAt[$i]; ?></div>
			</div>
		</div>
		<hr/>
	<?php 
	} ?>
</div>