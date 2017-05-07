@extends('main')

@section('title', '| All Post')

@section ('content')
	<div class="row">
		<div class="col-md-9">
			<h2>All Posts</h2>
		</div>
		<div class="col-md-2">
			<h2><a href="{{ route('posts.create')}}" class="btn btn-primary btn-block">Creat Post</a></h2>
		</div>
	</div> <hr>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Post Body</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach($posts as $post)
					<tr>
						<td>{{ $post->id}}</td>
						<td>{{ $post->title }}</td>
						<td>{{ substr(strip_tags($post->body), 0, 50)}}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
						<td>
							<a href="{{ route('posts.show', $post->id)}}" class="btn btn-default">View</a>
							<a href="{{ route('posts.edit', $post->id )}}" class="btn btn-default">Edit</a>
						</td>
					</tr>
					@endforeach					
				</tbody>	
			</table>

			<div class="text-center">
						{{ $posts->links()}}
					</div>
		</div>
	</div>
@stop