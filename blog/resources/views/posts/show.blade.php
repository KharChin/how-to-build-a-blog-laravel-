@extends('main')

@section('title', '| Show Post')

@section ('content')
	<div class="row">
		<div class="col-md-9">
			<img src="{{asset('/images/' . $post->image)}}" width="800" height="400" />
			<h3>{{ $post->title }}</h3>
			<p>{!! $post->body !!}</p><hr>

			@foreach($post->tags as $tag)
				<span class="label label-default">{{ $tag->name }}</span>
			@endforeach
			<hr>
			<div class="backend-comment">
				<h3>Comments <small>{{ $post->comments()->count() }} Total</small></h3>
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Comments</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						@foreach ($post->comments as $comment)
						<tr>
							<td>{{ $comment->name }}</td>
							<td>{{ $comment->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td>
								<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
								<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
						@endforeach
						</tbody>
					</table>
			</div> 
		</div>

		<div class="col-md-3">
			<div class="well">
				<p><strong>URL:</strong><a href="{{ route('blog.single', $post->slug)}}">{{ route('blog.single', $post->slug)}}</a></p>

				<p><strong>Category:</strong>{{ $post->category->name }}</p>

				<p><strong>Created At:</strong>
				{{ date('M j, Y', strtotime($post->created_at))}}</p>

				<p><strong>Updated At:</strong>
				{{ date('M j, Y', strtotime($post->updated_at))}}</p>

				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('posts.edit', $post->id)}}" class="btn btn-primary btn-block">Edit</a>
					</div>
					<div class="col-sm-6">
						{{-- <a href="" class="btn btn-danger btn-block">Delete</a> --}}
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

							{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}

						{!! Form::close() !!}
					</div><br>
					<div class="col-sm-12" style="margin-top:10px;">
						<a href="{{ route('posts.index')}}" class="btn btn-default btn-block">See All Posts</a>
					</div>									
				</div>				
			</div>
		</div>
	</div>
	
@stop

