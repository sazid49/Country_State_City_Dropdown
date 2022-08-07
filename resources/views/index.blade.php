<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>
  .select{
    /* margin-top: 10px; */
    width: 400px;
    margin:10px auto;
    border: 1px solid black;
    padding: 10px;
    
  }
</style>

</head>
<body>
  
<div class="select"> 
<select  id="country" class="form-control">
    <option value="">Select Country</option>
     @foreach ($country as $item)
    <option value="{{ $item->id }}">{{ $item->country }}</option> 
     @endforeach
</select>
<br>
<select  id="state" class="form-control">
    <option value="">Select state</option>
</select>
<br>
<select  id="city" class="form-control">
    <option value="">Select city</option>
</select>
</div>





<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $('#country').change(function(){
        let cid = $(this).val();
             $('#city').html('<option value="">Select</option>')

        $.ajax({
          url:'/getState',
          type:'post',
          data:'cid='+ cid +'&_token= {{ csrf_token() }}',
          success:function(result){
             $('#state').html(result)
          },
        });
    });


    $('#state').change(function(){
        let sid = $(this).val();  
        $.ajax({
          url:'/getCity',
          type:'post',
          data:'sid='+ sid +'&_token= {{ csrf_token() }}',
          success:function(result){
             $('#city').html(result)
          },
        });
    });


  });
</script>
</body>
</html>