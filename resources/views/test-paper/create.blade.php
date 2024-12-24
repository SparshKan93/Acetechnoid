@extends('layouts.frontapp2')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<style type="text/css"> /*CSS FOR TOOLTIP*/
.tooltipcss {
  position: relative;
  /*display: inline-block;*/
  /*border-bottom: 1px dotted black;*/
}

 .tooltiptextcss {
  /*visibility: hidden;*/
  width: 20%;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  
  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  bottom: 100%;
  right: 0;
  margin-left: -60px;
}

.tooltipcss:hover .tooltiptextcss {
  visibility: visible;
}
</style>

<style type="text/css">
  .question_add{
    cursor: grab;
  }
  
  #que_paper p, .question_add p, #body p{
    margin: 0 0 0 0!important;
  }

  #que_paper ol {
    text-align: left;
  }

  .mm{
    text-align: right;
  }
  .mm input{
    width: 35px;
  }

  .marking {
    position: absolute;
    right: 38px;
  }

  .marking textarea{
    position: absolute;
    right: 0px;
    width: 100px;
    height: 40px;
    z-index: 1;
    border: 2px solid grey;
    border-radius: 10px;
    resize: both;
  }

  textarea.error{
    border-color: red;
    background-color: #fca4a463;
  }

  li textarea{
    resize: auto;
    width: 100%;
  }

  .show {
      display: inline-block!important;
  }

  .editable_btn{
    position: absolute;
    right: 30px;
    /*display: none;*/
  }

  .btn-group-sm>.btn, .btn-sm {
    padding: 0.25rem;
    font-size: .65rem;
    line-height: 1;
    border-radius: .2rem;
  }


@-webkit-keyframes slide-in-left {
  0% {
    -webkit-transform: translateX(-1000px);
            transform: translateX(-1000px);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateX(0);
            transform: translateX(0);
    opacity: 1;
  }
}
@keyframes slide-in-left {
  0% {
    -webkit-transform: translateX(-1000px);
            transform: translateX(-1000px);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateX(0);
            transform: translateX(0);
    opacity: 1;
  }
}

@media only screen and (max-width: 600px) {
  body {
    background-color: lightblue;
  }
}
@-webkit-keyframes slide-in-top {
  0% {
    -webkit-transform: translateY(-1000px);
            transform: translateY(-1000px);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    opacity: 1;
  }
}
@keyframes slide-in-top {
  0% {
    -webkit-transform: translateY(-1000px);
            transform: translateY(-1000px);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    opacity: 1;
  }
}

.slide-in-left {
  -webkit-animation: slide-in-left 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
          animation: slide-in-left 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
}

.slide-in-top {
  -webkit-animation: slide-in-top 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
          animation: slide-in-top 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
}

</style>

<style type="text/css">
  @media print
  {
    .header-fixed {
      display:none;
    }

    header,form,hr {display:none;}
    .leftpanel {
      display:none;
    }
    .mainwrapper:before{
      border:none;
    }
    .mainpanel{
      margin-left:0;
    }
    .mainwrapper{
      top:0px;
    }
    .no-print, .remove, .btn, footer{
      display: none;
    }
    input[type="checkbox"]{
      display: none;
    }
    .dataTables_length,.dataTables_info,.dataTables_paginate{
      display: none;
    }
    #body>ol>li{
      font-size: 15px;
    }
    img{ width:100%;}
    
    body, h3{
      font-size: 2rem!important;
    }
    
    .que_paper{
      display: block;
      border:none;
      top:0px;
      font-size: 2rem!important;
    }

    .flex{
      width: 100%;
      flex: 0 0 100%;
      max-width: 100%;
    }
    #pricing .box {
      padding: 5px;
    }
    .center-print{
      text-align: center;
    }
  }
  
  
  
</style>
<script>
  function printDiv(id) {
      document.title = "Test Paper";
      window.print();
  }
</script>

<!--==========================
      Pricing Section
    ============================-->
    <section id="pricing" class="section-bg" style="padding: 100px 0 60px 0;">
      <div class="container">

        <!-- <div class="section-header">
          <h3 class="section-title">Create Paper</h3>
          <span class="section-divider"></span> -->
          <!-- <p class="section-description">Please select a subject to generate test paper</p> -->
        <!-- </div> -->

        <div class="row no-print">

          <div class="col-lg-4 col-md-4">
            <div class="box wow fadeInUp">
              <!-- <h5 style="display: inline;">Book  </h5> -->
              <a href="{{route('myebook.show',$ebook->id)}}" target="_blank" class="get-started-btn">{{$ebook->name.'-'.$ebook->standard}}</a>
              <input type="hidden" id="ebook_id" value="{{$ebook->id}}">
            </div>
          </div>  

          <div class="col-lg-4 col-md-4">
            <div class="box wow fadeInUp">
              <select id="chapter" class="get-started-btn" style="width: -webkit-fill-available;">
                <option value="">Chapters</option>
                @foreach($chapters as $key => $list)
                  <option value="{{ $list->chapter_num }}">{{ $list->chapter_num.'. '.$list->chapter }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="box wow fadeInUp">
              <label class="get-started-btn" style="text-align: end;">Paper ID:
              <input type="text" name="que_paper_id" id="que_paper_id" placeholder="Test Paper Id (Auto)" style="background: #515e61;color: #ffff;border: none;width: 45%;">
              </label>
            </div>
          </div>

        </div>

        <div class="row no-print d-none">
            <div class="col-md-12">
              <div class="box wow fadeInUp">
                <input class="btn btn-success login-submit-cs save" type="button" value="Save"/>
                <button class="btn btn-info login-submit-cs" type="button" onclick="printDiv('que_paper')" value="Print" >Print & Download</button>
                <button class="btn btn-primary" type="button" value="Answer Sheet" data-toggle="modal" data-target="#myModal">Answer Sheet</button>
              </div>
            </div>
        </div>

        <div class="row">
          <div class="col-lg-6 col-md-6 no-print">
            <div class="box wow fadeInUp" style="min-height: 30em">
              <h3>Questions</h3>
              
              <div style="text-align: left;">
                <ol id="que_body" class="que_body">
                    <li class="" style="text-align: center;list-style: none;">Please select a chapter </li>
                </ol>
              </div>
            </div>
          </div>
          
          <div class=" col-lg-6 col-md-6 flex">
            <div id="que_paper" class="box wow fadeInUp tooltipcss" style="min-height: 30em">
              <!-- <span class="tooltiptextcss">Double click to edit text <button class="btn btn-info" data-toggle="collapse" data-target=".editable_btn"> Edit</button></span> -->
              <!-- <a class="tooltiptextcss btn btn-dark" href="{{route('test-paper.edit',$ebook->id)}}" > Auto Generate</a> -->

              <button class="tooltiptextcss btn btn-dark" type="button" value="Answer Sheet" data-toggle="modal" data-target="#selectChapters" style="width:30%; left: 60px">Auto Generate</button>
              <button class="tooltiptextcss btn btn-dark" data-toggle="editable_btn" data-target="li.editable"> Edit</button>
              <h3 class="editable">School Name</h3>
              <p class="editable marking">MM:100<input type="hidden" name="marks" value="100"></p><br>
               <ol id="body"></ol> 


            </div>
          </div>
        

        </div>

         <div class="row no-print">
            <div class="col-md-12">
              <div class="box wow fadeInUp">
                <!--<input class="btn btn-success login-submit-cs save" type="button" value="Save"/>-->
                <button class="btn btn-info login-submit-cs" type="button" onclick="printDiv('que_paper')" value="Print" >Print & Download</button>
                <button class="btn btn-primary" type="button" value="Answer Sheet" data-toggle="modal" data-target="#myModal">Answer Sheet</button>              
              </div>
            </div>
        </div>
      </div>

    </section><!-- #pricing -->

    <!-- Trigger the modal with a button -->
    <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <!-- <h4 class="modal-title">Modal Header</h4> -->
          </div>
          <div class="modal-body answerSheet">
            <!-- <p>Some text in the modal.</p> -->
              <ol id="body_ans">
                
              </ol>          
          </div>
          <div class="modal-footer">
            <button class="btn btn-info login-submit-cs" type="button" onclick="printDiv('que_paper')" value="Print" >Print & Download</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

    <!-- Modal Multiple Chapter Selector -->
    <div id="selectChapters" class="modal fade" role="dialog">
      <div class="modal-dialog modal-md">
        <form action="{{route('test-paper.set-format',$ebook->id)}}" method="post">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">{{$ebook->name}}</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <p>Please select chapters</p>
            @foreach($chapters as $key => $list)
              <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="box wow fadeInUp">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $list->chapter_num }}" id="{{ $list->chapter_num }}" name="chapters[]">
                        <label class="form-check-label" for="{{ $list->chapter_num }}">
                          {{ $list->chapter_num.'. '.$list->chapter }}
                        </label>
                      </div>
                    </div>
                </div>
              </div>
              @endforeach
          </div>
          <div class="modal-footer">
            <button class="btn btn-info login-submit-cs" type="submit" value="Print" >Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
      </div>
    </div>

    <!--==========================
      Contact Section
    ============================-->

<script type="text/javascript">
    
  $("#chapter").change(function(){
    var ebook = $("#ebook_id").val();
    var chapter = $(this).val();
    var subject = "{{$ebook->subject}}";

    $.ajax({
          type: "GET",
          url: "{{url('/test-paper/chap_que')}}",
          data:'ebook='+ebook+'&chapter='+chapter+'&subject='+subject,
          success: function(data){
            
            var data = JSON.parse(data);
            var selOpts = "";

            if(data.length >0){         
              console.log(data);
              $('#que_body li').remove();
                for (i=0;i<data.length;i++)
                {
                    var ques = data[i].ques; //array of questions
                    var que_type = data[i].que_type;
                    var que_name = data[i].name;
                    selOpts = "<li class='que_type' ><span data-id="+que_type+">"+que_name+"</span><ol type='a'>";

                    for (j=0;j<ques.length;j++)
                    { 
                      var id = ques[j].id;
                      var que = ques[j].question;
                      var addtopaper = 'addToPaper("'+id+'")';
                      selOpts += "<li class='question_add' data-id='"+id+"' data-answer='"+ques[j].answer+"'>"+que+"</li>";
                    //   selOpts += "<li class='question_add' data-id='"+id+"' >"+que.replace("./Uploads","/Uploads")+"<span class='ans' style='display:none'>"+ques[j].answer+"</span></li>";
                    }

                    selOpts += "</li></ol>";
                    $('#que_body').append(selOpts);
                }
            }
            else{
              alert('Sorry! No data found...');
              $('#que_body li').remove();
            }
          }
        });
    
  });

  $(document).ready(function(){

    $('#que_body').on('click', '.question_add', function(f){
    f.preventDefault();
      //data
      var text = $(this).text(); console.log(text);
      var text = $(this).html();
      var que_id = $(this).data('id');
      var answer = $(this).data('answer');
      
      if($("#body").find("[data-id='" + que_id + "']").length > 0)
        if(confirm("This question is already present. Do still want to continue?") == false)
          return false;
      
      //heading
      var que_name = $(this).closest('.que_type').find('span').text();
      var que_type = $(this).closest('.que_type').find('span').data('id');

      var span_que_name = "<span class='editable' data-id="+que_type+">"+que_name+"</span>";
      var span_mm = "<span class='editable marking'>1x1</span>";
      var span_remove = "<button class='btn btn-sm btn-dark' data-target='li' data-toggle='remove'>del</button>";
      var span_edit = "<button class='btn btn-sm btn-dark' data-target='.editable' data-toggle='edit'> edit</button>"; //<img src='{{url('images/remove-icon.png')}}' title='Remove'>
      // <span class='editable_btn collapse btn-group'>"+span_edit+span_remove+"</span>
      // <span class='editable_btn btn-group collapse'>"+span_edit+span_remove+"</span>
      // if($('#body span:contains("'+que_name+'")').length > 0){
      if($('#body > li > #'+que_type).length > 0){
        $('#body > li > #'+que_type ).append("<li class='editable slide-in-top' data-id="+que_id+">"+text+"</li>");
        $('#body_ans > li > #'+que_type ).append("<li class='' data-id="+que_id+">"+answer+"</li>");
      }
      else{
        body = "<li class='que_type'>"+span_que_name+span_mm+"<ol type='a' id='"+que_type+"'>"
        $("#body").append(body+"<li class='editable slide-in-top' data-id="+que_id+">"+text+"</li></ol>");        
        $("#body_ans").append(body+"<li class='' data-id="+que_id+">"+answer+"</li></ol>");        
      }
    });

    $('#body').on('click', '.remove1', function(e){
    e.preventDefault();
      $(this).closest("li").remove();
    });

    $('#que_paper').on('dblclick', '.editable', function() {
      var text = $(this).html();
      console.log(text);
      if($('#que_paper').find(".editing").html()){
          $("textarea").addClass("error");
      }
      else{
        $(this).removeClass("slide-in-top");
        $(this).toggleClass("editing");
        $('.editing').summernote({
            placeholder: 'Type your description here........',
            // tabsize: 15,
            toolbar: [
              // ['style', ['style']],
              // ['font', ['bold', 'italic', 'underline', 'clear']],
              // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
              //['fontname', ['fontname']],
             // ['fontsize', ['fontsize']],
              // ['color', ['color']],
              // ['para', ['ul', 'ol', 'paragraph']],
              // ['height', ['height']],
              // ['table', ['table']],
              // ['insert', ['link', 'picture', 'hr']],
              //['view', ['fullscreen', 'codeview']],
              // ['help', ['help']]
            ],
            focus: true 
        });
        // $('.note-editor').css({"position":"absolute"});
      }
    });


    $('#que_paper').on('focusout', function(event) {
      var text = $('.note-editable').html();
      // var text = $(this).val().replace('del', ' ').trim();
      // console.log(text);

      // $('.summernote').eq(1).summernote('destroy');
      // $('.note-editor').remove();
      // $('.editing').summernote('destroy');
      // $('.editing').html(text).show();
      // $(".editing").removeClass("editing");

      if($.trim(text).length == '0' ){      
        text = $(this).closest(".editing").find("span").text().trim();
      }

      if($(this).closest(".editing").prop("tagName") == 'LI'){
        var span_remove = "<button class='btn btn-sm btn-dark' data-target='li' data-toggle='remove'>del</button>";
        var span_edit = "<button class='btn btn-sm btn-dark' data-target='.editable' data-toggle='edit'> edit</button>";
        var span = "<span class='editable_btn btn-group'>"+span_edit+span_remove+"</span>";

        // $(this).closest(".editing").html(text+span);
        // $(this).closest(".editable").toggleClass("editing");
        $('.editing').summernote('destroy');
        $('.editing').html(text+span).show();
        $(".editing").removeClass("editing");
        
      }
      else{
        // $(this).closest(".editing").html(text);
        // $(this).closest(".editable").toggleClass("editing");
        $('.editing').summernote('destroy');
        $('.editing').html(text).show();
        $(".editing").removeClass("editing");
      }
  
    });

  });

</script>

<script type="text/javascript">

  $(document).ready(function(){
  
    $('#que_paper1').on('click', 'button', function() {
      var class_btn = $(this).data('toggle');
      var class_target = $(this).data('target');
      
      console.log(class_btn+class_target);

      switch(class_btn) {
        //Append edit and del button
        case "editable_btn":
          if($(this).hasClass('active') == true){
            $(class_target+" .editable_btn").remove();
          }
          else{
            var span_remove = "<button class='btn btn-sm btn-dark' data-target='li' data-toggle='remove'>del</button>";
            var span_edit = "<button class='btn btn-sm btn-dark' data-target='.editable' data-toggle='edit'> edit</button>";
            var span= "<span class='editable_btn btn-group'>"+span_edit+span_remove+"</span>";
            $(class_target).append(span);
          }
          $(this).toggleClass('active');

          break;

        case "remove":
          $(this).closest(class_target).remove();
          break;
        //edit test on click
        case "edit":
          var text = $(this).closest('.editable').text().replace('editdel', ' ').trim();
          console.log(text.replace(' editdel', ' '));

          if($('#que_paper').find("textarea").val()){
            $("textarea").addClass("error");
          }
          else{
            $(this).closest(class_target).toggleClass("editing");
            $(this).closest(class_target).html("<textarea row='1'>"+text+"</textarea><span style='display: none;'>"+text+"</span>");
          }
          break;

        // default:
        //   text = "I have never heard of that fruit...";
      }
      
    });

  });

    $('.save').click(function() {
      var texts = [];
      var uid = Math.random().toString(36).substring(7);
      var targetURL = "{{ route('test-paper.store') }}";

      $('#que_paper ol>li>ol>li.editable').each(function(){
          temp =  {
                    que_type:$(this).closest('ol').attr('id'), 
                    question:$(this).text(),
                    ebook_id:$('#ebook_id').val(),
                    subject:uid
                  };
          texts.push(temp);
      });
      // console.log(texts);

      $.ajax({
         type: "POST",
         url: targetURL,
         async: false,
         data: {_token:"{{ csrf_token() }}", data:JSON.stringify(texts)},
         success: function(data){
            console.log(data);
            return true;
         },
         complete: function() {},
         error: function(xhr, textStatus, errorThrown) {
            document.cookie = temp;
            // console.log(xhr);
            console.log(textStatus);
            console.log(errorThrown);
            var names = [];
            localStorage.setItem("data", JSON.stringify(texts));
            
            if(confirm('Please Login To Save...') == true){
              // cookie_local();
              window.open('{{route('login').'?task=testpapercreate'}}');
            }

            else
              alert('Sorry!We cannot proceed without authorization...');
            // console.log('ajax loading error...');
            return false;
         }
      });
    });

</script>
<script type="text/javascript">
  
 function cookie_local(){
  let data = localStorage.getItem("data"); 
  console.log(JSON.parse(data));
  do {
      $.ajax({
         type: "POST",
         url: targetURL,
         async: false,
         data: {_token:"{{ csrf_token() }}", data:JSON.stringify(texts)},
         success: function(data){
            console.log(data);
            return true;
         },
         complete: function() {},
         error: function(xhr, textStatus, errorThrown) {
            document.cookie = temp;
            // console.log(xhr);
            console.log(textStatus);
            console.log(errorThrown);
            // localStorage.setItem("data", JSON.stringify(texts));
            
            // if(confirm('Please Login To Save...') == true)
            // window.open('{{route('login').'?task=testpapercreate'}}')

            // else
            //   alert('Sorry!We cannot proceed without authorization...')
            console.log('ajax loading error...');
            return false;
         }
      });
      i = i + 1;
      result = result + i;
    } while (i < 5);
 }
  
  // ReadCookie();
</script>
<script type="text/javascript">
  
  $( document ).ready(function() {
    var a = Math.floor(100000 + Math.random() * 900000);   
    a = String(a);
    a = a.substring(0,6);
    $('#que_paper_id').val(a);
  });

</script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script type="text/javascript">
        $('textarea13').summernote({
            placeholder: 'Type your description here........',
            tabsize: 15,
            height: 300,
      toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            //['fontname', ['fontname']],
           // ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'hr']],
            //['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
          ],
        });
    </script>


@endsection
