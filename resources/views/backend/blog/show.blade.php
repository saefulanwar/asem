@extends('includes.frontend.head')

@section('title', "$posts->title")

@section('content')
	<div class="container">
		<div class="row" style="margin-top:80px;">
			<div class="col-md-9">
				<div class="post-item">
					<div class="post-inner">
						<div class="post-head clearfix">
							<div class="col-md-12">
								<div class="detail">
									<h2 class="handle">{{$posts->title}}</h2>
									<div class="post-meta">
										<div class="asker-meta">
											<span></span>
											<span>by</span>
											<span><a href="">{{$posts->author->name}}</a></span>
										</div>
										<div class="share">
											<label>Share:</label>
											<i class="fa fa-facebook"></i>
											<i class="fa fa-twitter"></i>
										</div>
										<div class="tags">
											<span class="label label-success"># tags</span>
										</div>
										<div class="kategori">
											<span class="label label-default pull-right"></span>
										</div>
										<hr>
									</div>
								</div>
							</div>
								<div class="col-md-12">
									@if($posts->image)			
									<div class="avatar_show"><a href="#"><img src="../img/{{$posts->image}}"></a></div>
									<br>
									@endif
									<div class="post-content" style="text-align:justify;">
										<p>{!! $posts->body !!}</p>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
				
				@include('includes.frontend.sidebar')
		</div>
	</div>
@endsection	