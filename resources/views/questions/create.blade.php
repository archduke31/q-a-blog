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
                                <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back to All Questions</a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <form action="{{route('questions.store')}}" method="post">
                            <div class="form-group">
                                <label for="title">Question Title</label>
                                <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control {{$errors->has('title')? 'is-invalid':''}}}">
                                @if($errors->has('title'))
                                    <div style="color: red;>
                                        <strong>{{$errors->first('title')}}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="body">Question Body</label>
                                <textarea rows="10" name="body" id="body" value="{{old('body')}}" class="form-control {{$errors->has('body')? 'is-invalid':''}}} "></textarea>
                                @if($errors->has('body'))
                                    <div style="color: red;">
                                        <strong>{{$errors->first('body')}}</strong>
                                    </div>
                                @endif
                            </div>
                           {{csrf_field()}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg">Submit Question</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
