@extends('main')

@section('title', 'Delete Comment')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Delete Comment</h2><hr>

			<p>
				<strong>Name</strong> {{ $comment->name }} <br>
				<strong>Email</strong> {{ $comment->email }} <br>
				<strong>Comment</strong> {{ $comment->comment}}
			</p>

			{{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE'])}}
				{{ Form::submit('Yes Delete This Message', ['class' => 'btn btn-danger'])}}
			{{ Form::close()}}
		</div>
	</div>
@stop