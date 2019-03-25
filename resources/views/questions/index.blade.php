@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>All Questions</h2>
                            <div class="ml-auto">
                                <a href="{{route('questions.create')}}" class="btn btn-outline-secondary">Ask a Question</a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        @include('layouts/_message')
                        @foreach($questions as $question)
                            <div class="media">
                                <div class="flex flex-column counters">
                                    <div class="vote">
                                        <strong>{{$question->votes}}</strong> {{\Illuminate\Support\Str::plural('vote',$question->votes)}}
                                    </div>
                                    <div class="status {{$question->status}}">
                                        <strong>{{$question->answer_count}}</strong> {{\Illuminate\Support\Str::plural('answer',$question->answer_count)}}
                                    </div>
                                    <div class="views">
                                        {{$question->views ."  ". \Illuminate\Support\Str::plural('view',$question->views)}}
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="d-flex align-items-counter">
                                        <h3 class="mt-0"><a href="{{$question->url}}">{{$question->title}}</a></h3>
                                        <div class="ml-auto">
                                            @can('update',$question)
                                            <a href="{{route('questions.edit',$question->id)}}" class="btn btn-sm btn-outline-success">Edit</a>
                                            @endcan
                                                @can('delete',$question)
                                                <form action="{{route('questions.destroy',$question->id)}}" style="display: inline" method="post" >
                                                {{method_field('DELETE')}}
                                               @csrf
                                                <button href="{{route('questions.edit',$question->id)}}" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                @endcan
                                                </form>
                                        </div>
                                    </div>
                                    <p class="lead">
                                        Asked By
                                        <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                        <small class="text-muted">{{$question->created_date}}</small>
                                    </p>
                                    {{ \Illuminate\Support\Str::limit($question->body,200)}}
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        <div class="justify-content-center">
                            {{$questions->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
