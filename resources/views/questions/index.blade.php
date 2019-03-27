@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All questions</div>

                <div class="panel-body">
					@foreach ($questions as $question)
						<div class="media">
							<div class="d-flex">
									<div class="bagde badge-primary" style="display: inline-block;">
										<strong>{{$question->votes}}</strong> {{str_plural('vote',$question->votes)}}
									</div>
									<div class="badge status {{$question->status}}">
										<strong>{{$question->answers}}</strong> {{str_plural('answer',$question->answers)}}
									</div>
									<div class="badge badge-light">
										{{$question->views .' '. str_plural('view',$question->views)}}
									</div>									
							</div>
							<div class="media-body">

								<h3 class="mt-0"><a href="{{$question->url}}">{{$question->name}}</a></h3>
								<p class="lead">
									Asked by
									<a href="{{$question->user->url}}">
										{{$question->user->name}}
									</a>
									<small class="text-muted">{{$question->created_date}}</small>
								</p>
									{{str_limit($question->body,250)}}
							</div>
						</div>
					@endforeach
					
					<div class="text-center">
						{{$questions->links()}}
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection