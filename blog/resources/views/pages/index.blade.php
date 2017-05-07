@extends('main')

@section('title', '| Home')

@section('content')
			<div class="row">
				<div class="col-md-9">
					<div class="well">
						<h2>This is my first blog using Laravel</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit quam, a ab voluptates beatae? Cumque vitae numquam aliquam in odit pariatur omnis iste, minus aspernatur, libero itaque odio quidem iusto.</p>
						<a href="" class="btn btn-primary">Read More</a>
					</div>
					
					@foreach($posts as $post)
						<div class="post_body">
							<h3>{{ $post->title }}</h3>
							<p>{{ substr(strip_tags($post->body), 0, 200) }}{{ strlen(strip_tags($post->body)) > 200? "..." : ""}}</p>
							<a href="{{url('blog/' . $post->slug)}}" class="btn btn-primary">Read More</a>
						</div>		
					@endforeach		

					<div class="text-center">
						{!! $posts->links() !!}
					</div>	
				</div>

				
				<div class="col-md-3">
					<h2>Sidebar</h2>
				</div>
			</div>
@stop
		