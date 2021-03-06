@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
					<div class="d-flex align-items-center justify-content-between">
						<h2>All Questions</h2>
						<div class="ml-auto">
							<a href="{{ route('question.create') }}" class="btn btn-outline-secundary">Ask Question</a>
						</div>
					</div>
				</div>

                <div class="panel-body">
					@include('layouts._messages')
					@foreach ($questions as $question)
						<div class="media">
							<div class="d- flex-column counter">
									<div class="vote bagde badge-primary" style="">
										<strong>{{$question->votes}}</strong> {{str_plural('vote',$question->votes)}}
									</div>
									<div class="badge status {{$question->status}}">
										<strong>{{$question->answers_count}}</strong> {{str_plural('answer',$question->answers_count)}}
									</div>
									<div class="view badge badge-light">
										{{$question->views .' '. str_plural('view',$question->views)}}
									</div>									
							</div>
							<div class="media-body">
								<div class="d-flex align-items-center">
									<h3 class="mt-0"><a href="{{$question->url}}">{{$question->name}}</a></h3>
									<div class="ml-auto">
										
										<a href="{{ route('question.edit', $question->id) }}" class="btn btn-sm btn-info">Edit</a>
										<form method="post" style="display: inline" action="{{ route('question.destroy',$question->id) }}">
											{{ method_field('DELETE') }}
											{{ csrf_field() }}
											<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">DELETE</button>
										</form>
									</div>
								</div>
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