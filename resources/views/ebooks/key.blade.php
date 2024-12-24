<!DOCTYPE html>
<html lang="en">
<head>
    
  <title>Key Download</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  
</head>
<body>

<div class="container">
  <h2>{{strtoupper($data->name).'-'.$data->standard}}</h2>
  <!-- Button to Open the Modal -->
  @if(!empty($data->key_link))
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open Key
  </button>
  @else
    <h4>No Key found!</h4>
  @endif

  <h4 style="display: none;" id="alert">Sorry!Provided Code dose't match.</h4>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Please Provide Us The Key</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- <form> -->
        <!-- Modal body -->
        <div class="modal-body">
          <div class="input-group mb-3 input-group-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">Key</span>
              </div>
              <input type="text" class="form-control" id="code">
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        <!-- </form> -->
        
      </div>
    </div>
  </div>
  
</div>
<div style="display: hidden">
  <input type="hidden" name="key_link" id="key_link" value="{{$data->key_link}}">
  <input type="hidden" name="key_code" id="key_code" value="{{$data->key_code}}">
</div>

<script type="text/javascript">
  $(document).ready(function(){

    $('.modal').on('click', '.btn-success', function(e){
    e.preventDefault();
      var link = $('#key_link').val();
      var code = $('#key_code').val();
      var code_download = $('#code').val();
      if (code == code_download) {
        window.location.replace(link);
      }
      else{
        $('#alert').show();
      }
    });

  });
</script>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3896012864370360"
     crossorigin="anonymous"></script>
     
     <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3896012864370360"
     crossorigin="anonymous"></script>
<!-- key paage -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-3896012864370360"
     data-ad-slot="7879951919"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

</body>
</html>
