@extends('main')

@section('title', 'Edit Comments')

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Edit Comments</h2><hr>

			{{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT'])}}

				<div class="form-group">
					{{ Form::label('name', 'Name:')}}
					{{ Form::text('name', null, ['class' => 'form-control'])}}
				</div>

				<div class="form-group">
					{{ Form::label('email', 'Email:')}}
					{{ Form::text('email', null, ['class' => 'form-control'])}}
				</div>

				<div class="form-group">
					{{ Form::label('comment', 'Comments:')}}
					{{ Form::textarea('comment', null, ['class' => 'form-control'])}}
				</div>

				<div class="form-group">
					{{ Form::submit('Edit Comment', ['class' => 'btn btn-success'])}}
				</div>
			{{ Form::close()}}
		</div>
	</div>
@stop