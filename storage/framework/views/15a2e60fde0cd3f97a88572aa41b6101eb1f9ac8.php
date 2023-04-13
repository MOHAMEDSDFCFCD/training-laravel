<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit</title>
    
  
          <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
          <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
    <style>
        a{
            color: azure;
            text-decoration-line: none;

        }
        a:hover{
            color: azure;
            text-decoration-line: none;
        }
        
        
        
        
        </style>      
</head>
<body>
 <h2><canter>edit posts</canter></h2>
 <?php if(Session::has('success')): ?>
 <div class="alert alert-success" role="alert">
     <?php echo e(Session::get('success')); ?>

 </div>
<?php endif; ?>

<br>
 <form method="POST" action="<?php echo e(route('updatepost',$search->id)); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
 
   <div class="form-group">
     <label for="exampleInputEmail1">select photo</label>
    <input type="file" class="form-control" name="photo" id="photo" value="<?php echo e($search->photo); ?>" placeholder="select photo">
    <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
     <small class="form-text text-danger"><?php echo e($message); ?></small>
     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
   </div>
    <div class="form-group">
      <label for="exampleInputEmail1">post id </label>
      <input type="text" class="form-control" name="posts_id" value="<?php echo e($search->posts_id); ?>" placeholder="Enter post id">
      
     <?php $__errorArgs = ['post_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <small  class="form-text text-danger"><?php echo e($message); ?></small>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">title</label>
      <input type="text" class="form-control"  name="title" value="<?php echo e($search->title); ?>" placeholder="title">
      <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <small  class="form-text text-danger"><?php echo e($message); ?></small>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">body</label>
        <input type="text" class="form-control"  name="body"  value="<?php echo e($search->body); ?>" placeholder="body">
        <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <small  class="form-text text-danger"><?php echo e($message); ?></small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
    <button type="submit" class="btn btn-primary">save post</button>

   <button  class="btn btn-primary"><a href="<?php echo e(url('post/all')); ?>" color="white" >show update post</a></button>
  </form>
</body>
</html><?php /**PATH C:\xampp\htdocs\web\resources\views/post/edit.blade.php ENDPATH**/ ?>