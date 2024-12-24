@extends('layouts.frontapp2')

@section('content')

<style type="text/css">
  .question{
    cursor: grab;
  }

  .que_paper ol {
    text-align: left;
  }

  .remove img{
    cursor: grabbing;
    width: 15px;
  }
  .mm{
    text-align: right;
  }
  .mm input{
    width: 35px;
  }
</style>

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

        <div class="row">

          <div class="col-lg-4 col-md-4">
            <div class="box wow fadeInUp">
              <!-- <h5 style="display: inline;">Book  </h5> -->
              <a href="javascript:void(0)" class="get-started-btn">{{$ebook->name.'-'.$ebook->standard}}</a>
              <input type="hidden" id="ebook" value="{{$ebook->id}}">
            </div>
          </div>  

          <div class="col-lg-4 col-md-4">
            <div class="box wow fadeInUp">
              <select id="chapter" class="get-started-btn" style="width: -webkit-fill-available;">
                @foreach($chapters as $key => $list)
                  <option value="{{ $list->chapter_num }}">{{ $list->chapter_num.'. '.$list->chapter }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="box wow fadeInUp">
              <input type="text" name="school" id="school_name_text" class="get-started-btn" placeholder="School Name" onkeyup="change_value(this.value, 'school_name')">
            </div>
          </div>

          <div class="col-lg-6 col-md-6">
            <div class="box wow fadeInUp" style="min-height: 30em">
              <h3>Questions</h3>
              
              <div style="text-align: left;">
                <ol id="que_body">
                @foreach($data as $key => $list)
                    <li class="question" id="{{ $list->id }}">{{ $list->question }}</li>
                @endforeach
                </ol>
              </div>
            </div>
          </div>
          
          <div class="col-lg-6 col-md-6">
            <div id="que_paper" class="box que_paper wow fadeInUp" style="min-height: 30em">
              <h3 id="school_name">School Name</h3>
              <p class="mm">MM:<input type="text" name="marks" value="100"></p>
              <ol class="body"></ol>
              <div id="que_paper_body" style="text-align: left;"></div>
              <div></div>
              <div></div>
              <div></div>
            </div>
          </div>
        

        </div>
        <div class="row box">
            <div class="col-md-1">
                <input class="btn btn-sm btn-primary login-submit-cs" type="button" onclick="printDiv('que_paper')" value="PRINT" disabled="" />
            </div>
            <div class="col-md-1">
                <input class="btn btn-sm btn-primary login-submit-cs" type="button" onclick="printDiv('que_paper')" value="PRINT" disabled="" />
            </div>
        </div>
      </div>
    </section><!-- #pricing -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container">
        <div class="row wow fadeInUp">

          <div class="col-lg-4 col-md-4">
            <div class="contact-about">
              <h3>Ace Technoid</h3>
              <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
                <i class="ion-ios-location-outline"></i>
                <p>656/6<br>JAGRITI VIHAR, IN 250004</p>
              </div>

              <div>
                <i class="ion-ios-email-outline"></i>
                <p>acetechnoid@gmail.com.com</p>
              </div>

              <div>
                <i class="ion-ios-telephone-outline"></i>
                <p>+91 6398 117 233</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

<div class="container">
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Message</h4>
        </div>
        <div class="modal-body">
          <p>We are working on this.</p>
          <p>This is a demo test paper.</p>
          <p>We will be ready soon.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  // Show the Modal on load
  $("#myModal").modal("show");
});
</script>

<script type="text/javascript">
  function change_value(text, idvalue){
    if (text == '') {
      text="School Name";
    }
    $("#"+idvalue).text(text);
  };
  $("#chapter").change(function(){
    var ebook = $("#ebook").val();
    var chapter = $(this).val();
    console.log(ebook+chapter);
    $.ajax({
          type: "GET",
          url: "{{url('/demo-test-paper/chap_que')}}",
          data:'ebook='+ebook+'&chapter='+chapter,
          success: function(data){
            
            var data = JSON.parse(data);

            var selOpts = "";
            if(data.length >0){         
              console.log(data);
              $('#que_body li').remove();
                    for (i=0;i<data.length;i++)
                    {
                        var id = data[i].id; 
                        var que = data[i].question;
                        var addtopaper = 'addToPaper("'+que+'")'
                        selOpts += "<li class='question' id='"+id+"' class='question'>"+que+"</li>";
                    }
                    $('#que_body').append(selOpts);
                    // $('#que_body').selectpicker('refresh');
            }
            else{
              alert('Sorry! No data found...');
              $('#que_body li').remove();
            }
          }
        });
    
  });

  $(document).ready(function(){

    $('.body').on('click', '.remove', function(e){
    e.preventDefault();
      $(this).closest("li").remove();
    });

    $('#que_body').on('click', '.question', function(e){
    e.preventDefault();
      var text = $(this).closest('li').text();
      console.log(text);
      var remove = "{{url('images/remove-icon.png')}}";
      $(".body").append("<li>"+text+"<span class='remove'><img src="+remove+" alt='Remove'></span></li>");
    });

  });

  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
  }

</script>

@endsection
