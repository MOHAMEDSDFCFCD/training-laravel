<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
    
   {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
          <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
          @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  <div class="container">
 <h2><canter>add posts</canter></h2>
 @if(Session::has('success'))
 <div class="alert alert-success" role="alert">
     {{ Session::get('success') }}
 </div>
@endif

<br>
 <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
    @csrf
 {{--   <input name="_token" value="{{csrf_token()}}">--}}
  <div class="form-group">
     <label for="exampleInputEmail1">select photo</label>
   <input type="file" class="form-control" name="photo" id="photo">
   @error('photo')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>
    <div class="form-group">
      <label for="exampleInputEmail1">post id </label>
      <input type="text" class="form-control" name="posts_id" placeholder="Enter post id">
      
     @error('posts_id')
      <small  class="form-text text-danger">{{$message}}</small>
      @enderror
    
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">title</label>
      <input type="text" class="form-control"  name="title" placeholder="title">
      @error('title')
      <small  class="form-text text-danger">{{$message}}</small>
      @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">body</label>
        <input type="text" class="form-control"  name="body" placeholder="body">
        @error('body')
        <small  class="form-text text-danger">{{$message}}</small>
        @enderror
      </div>
    <button type="submit" class="btn btn-primary">save post</button>
  </form>
  
</body>
</html>