<div class="form-group">
    <label for="title">Question Title</label>
    <input type="text" name="title" id="title" value="{{old('title',$question->title)}}"
           class="form-control {{$errors->has('title')? 'is-invalid':''}}}">
    @if($errors->has('title'))
        <div style="color: red;">
            <strong>{{$errors->first('title')}}</strong>
        </div>
    @endif
</div>
<div class=" form-group">
    <label for="body">Question Body</label>
    <textarea rows="10" name="body" id="body"
              class="form-control {{$errors->has('body')? 'is-invalid':''}}} ">
         {{old('body',$question->body)}}
    </textarea>
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