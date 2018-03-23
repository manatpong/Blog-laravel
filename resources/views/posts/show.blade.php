@extends ('layout.master')

@section ('content')

	<div class="col-sm-8 blog-main">

		<h1>{{ $posts->title }}</h1>

		<p>{{ $posts->body }}</p>

	
	<div class="comment">

		<ul class="list-group">
			@foreach ($posts->comments as $comment)
				<li class="list-group-item">
					<strong>
						{{ $comment->created_at->diffForHumans() }}:
					</strong>
					{{ $comment->body }}
				</li>
			@endforeach
		</ul>
	</div>
	<hr>

	
		<div class="card">
			<div class="card-block">
				<form method="post" action="/posts/{{ $posts->id }}/comment">
					{{ csrf_field() }}
					<div class="form-group">
						<textarea class="form-control" name="comment" id="comment" placeholder="Your comment here."></textarea>
						
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Add Comment</button>
					</div>
				</form>
			</div>
		</div>

		@include ('layout.errors')
	</div>
	


@endsection