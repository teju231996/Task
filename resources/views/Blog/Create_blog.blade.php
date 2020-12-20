@extends('Header.header')
@section('page_title','Add blog')

@section('content')
<div class="container">
  @if($errors->any())
             <div class="alert alert-danger">
              <ul class="mb-0">
               @foreach($errors->all() as $error)
              <li>{!! $error !!}</li>
               @endforeach
              </ul>
               </div>
             @endif
</div>

 <div class="container">
 <!-- this is not  work propely -->
<!-- @isset($message_success)
   <div class="alert alert-success">
    {!! $message_success !!}
 </div>

@endisset -->
        @if(session('message'))
           <div class="alert alert-success">
          {{ Session::get('message') }}</div>
             @endif



  <h2>Add Blog </h2>
<form method="POST" action="{{route('Blog.store')}}" id="formid" enctype="multipart/form-data">   
@csrf
    <div class="form-group">
      <label for="user">Blog Title:</label>
      <input type="text" class="form-control {{ $errors->has('title')? 'border-danger':'' }} " placeholder="Enter Title" name="title" value="{{old('title')}}" autofocus autocomplete="on"  >
      <small class="form-text text-danger">{!! $errors->first('name') !!}</small>
    </div>

    <div class="form-group">
      <label for="user">Category:</label>
      <input type="text" class="form-control {{ $errors->has('category')? 'border-danger':'' }}"  placeholder="Enter Category" autofocus name="category" value=" "  >
          <small class="form-text text-danger">{!! $errors->first('category') !!}</small>
    </div>

   <div class="form-group">
      <label for="user">Description:</label>
      <textarea id="w3review" name="description" rows="4" cols="50" class="form-control {{ $errors->has('description')? 'border-danger':'' }}" value="" >
  </textarea>
      <small class="form-text text-danger">{!! $errors->first('description') !!}</small>
    </div>


     <div class="form-group">
      <label for="user">file:</label>
    <input type="file" class="form-control {{ $errors->has('file')? 'border-danger':'' }}"  name="img" value="" >
          <small class="form-text text-danger">{!! $errors->first('file') !!}</small>
    </div>
    
    <button type="submit" id="submit" class="btn btn-primary"> <i class="fa fa-lock" aria-hidden="true"></i> Submit</button>
  </form>
</div>
@endsection
