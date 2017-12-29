@extends('header')
@section('content')

<form method="post" action="<?= url('/admin/handleseo') ?>">
	<div class="container">
		<div class="col-md-12">
		<div class="row">
			{{ $data->links() }}
		</div>
		@foreach($data as $_data)
		<div class="panel panel-primary">
			<div class="row">
				<div class="panel-heading"><b>Question ID #{!! $_data->id !!}</b></div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<input type="text" class="form-control" name="question_title[]" value="{!! $_data->question_title !!}" >
				</div>
				<div class="col-md-12">
					<input type="hidden" name="id[]" value="{!! $_data->id !!}">
					<input type="text" class="form-control" name="keywords[]" value="{!! $_data->keywords !!}" >
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<textarea class="form-control" name="meta[]" ></textarea>
				</div>
			</div>
		</div>
		@endforeach
		<div class="row">
			{{ $data->links() }}
		</div>
		<div class="row">
			<button type="submit" class="btn btn-primary">SUBMIT</button>
		</div>
		</div>
	</div>
</form>

@endsection