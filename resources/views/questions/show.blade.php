@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center row">
                            <div class="col-lg-10">
                                <h1>{{$question->title}}</h1>
                            </div>
                            <div class="ml-auto">
                                <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back to All Questions</a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        {!! $question->body_html !!}
                        <div class="float-right">
                                        <span class="text-muted">
                                            Answered {{ $question->created_date }}
                                        </span>
                            <div class="media mt-2">
                                <a href="{{$question->user->url}}" class="pr-2">
                                    <img src="{{$question->user->avatar}}">
                                </a>
                                <div class="media-body mt-1">
                                    <a href="{{$question->user->url}}" class="href">
                                        {{$question->user->name}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>{{$question->answer_count . " " .\Illuminate\Support\Str::plural('Answer',$question->answer_count)}}</h2>
                        </div>
                        <hr>
                        @foreach($question->answers as $answer)
                            <div class="media">
                                <div class="media-body">
                                    {!! $answer->body_html !!}
                                    <div class="float-right">
                                        <span class="text-muted">
                                            Answered {{ $answer->created_date }}
                                        </span>
                                        <div class="media mt-2">
                                            <a href="{{$answer->user->url}}" class="pr-2">
                                                <img src="{{$answer->user->avatar}}">
                                            </a>
                                            <div class="media-body mt-1">
                                                <a href="{{$answer->user->url}}" class="href">
                                                    {{$answer->user->name}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <br>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
