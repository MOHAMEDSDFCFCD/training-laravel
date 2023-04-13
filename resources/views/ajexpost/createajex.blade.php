@extends('layouts.app')
@section('content')
<div class="container">
  
  <div class="alert alert-success" id="success_msg" style="display: none;">
    successfully store
</div>

 <p><canter>add posts</canter></p>
 @if(Session::has('success'))
 <div class="alert alert-success" role="alert">
     {{ Session::get('success') }}
 </div>
@endif

<br>
 <form method="POST" id="postForm" action="" enctype="multipart/form-data">
    @csrf
 {{--   <input name="_token" value="{{csrf_token()}}">--}}
  <div class="form-group">
     <label for="exampleInputEmail1">select photo</label>
   <input type="file" class="form-control" name="photo" id="photo">
  
    <small id="photo_error" class="form-text text-danger"></small>
  
  </div>
    <div class="form-group">
      <label for="exampleInputEmail1">post id </label>
      <input type="text" class="form-control" name="posts_id" placeholder="Enter post id">
      
     
      <small id="post_id_error" class="form-text text-danger"></small>
      
    
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">title</label>
      <input type="text" class="form-control"  name="title" placeholder="title">
     
      <small id="title_error"  class="form-text text-danger"></small>
  
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">body</label>
        <input type="text" class="form-control"  name="body" placeholder="body">
      
        <small id="body_error"  class="form-text text-danger"></small>
        
      </div>
    <button id="save_post" class="btn btn-primary">save post</button>
  </form>
@endsection

@section('scripts')
    <script>
        $(document).on('click', '#save_post', function (e) {
            e.preventDefault();
            $('#photo_error').text('');
            $('#post_id_error').text('');
            $('#title_error').text('');
            $('#body_error').text('');
         
            var formData = new FormData($('#postForm')[0]);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('storeajex')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status == true) {
                        $('#success_msg').show();
                    }
                }, error: function () {
                    
                }
            });
        });
    </script>
@stop
