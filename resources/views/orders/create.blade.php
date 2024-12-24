@extends('layouts.frontapp2')

@section('content')


<link href="{{ url('/css/select2.css') }}" rel="stylesheet">

</style>
<style type="text/css">
  #pricing .box {
    padding: 10px;
    box-shadow: 0px 0px 30px rgba(73, 78, 92, 0.15);
    background: #fff;
    text-align: left;
  }

  .header_img{
    align-self: center;
    position: absolute;
    right: 25px;
    width: 8%;
    top: 0px;
  }

  .error{
    border-color: #ff8080;
    outline: 0;
    box-shadow:0 0 0 0.2rem rgba(255, 0, 0, 0.25);
  }

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
    .no-print, .remove, footer{
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
    .que_paper{
      display: block;
      border:none;
      top:0px;
      font-size:18px;
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

        <div class="row">

          <div class="col-lg-12 col-md-12">
            <div class="box wow fadeInUp" style="text-align: ">
              <h4 href="javascript:void(0)" style="display: inline-block;text-align: left;">Order Form</h4>
            <img class="header_img wow fadeInUp" src="{{ asset('images/remove-icon.png') }}" width="100px">
            </div>
          </div>
          <div class="col-lg-2 col-md-2 pull-right">
          </div>

        </div>

        <div class="row">
          
          <div class="col-lg-3 col-md-3 pull-right">
            <div class="box wow fadeInUp">
              <h4 href="javascript:void(0)">Details</h4>
            </div>
          </div>

          <div class="col-lg-9 col-md-9">
            <div class="box wow fadeInUp">
              <!-- <div class="col-lg-5 col-md-8"> -->
                <div class="form">
                  <!-- <div id="sendmessage">Your message has been sent. Thank you!</div> -->
                  <div id="errormessage"></div>
                  <form action="" method="post" role="form" class="contactForm">
                    <div class="form-row">
                      <div class="form-group col-lg-8">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        <div class="validation"></div>
                      </div>
                      <div class="form-group col-lg-4">
                        <input type="number" class="form-control" name="email" id="email" placeholder="Your Mobile" data-rule="email" data-msg="Please enter a valid email" />
                        <div class="validation"></div>
                      </div>
                      <div class="form-group col-lg-4">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                        <div class="validation"></div>
                      </div>
                      <div class="form-group col-lg-4">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Transport" data-rule="email" data-msg="Please enter a valid email" />
                        <div class="validation"></div>
                      </div>
                      <div class="form-group col-lg-4">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Destination(book to)" data-rule="email" data-msg="Please enter a valid email" />
                        <div class="validation"></div>
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Transport-Book To" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                      <div class="validation"></div>
                    </div> -->
                    <div class="form-group">
                      <textarea class="form-control" name="message" rows="2" data-rule="required" data-msg="Please write something for us" placeholder="Address"></textarea>
                      <div class="validation"></div>
                    </div>
                    <!-- <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div> -->
                  </form>
                </div>
              </div>
            </div>
          
        </div>

         <div class="row">
          
          <div class="col-lg-9 col-md-9">
            <div class="box wow fadeInUp">
              <!-- <div class="col-lg-5 col-md-8"> -->
                <div class="form">
                  <!-- <div id="sendmessage">Your message has been sent. Thank you!</div> -->
                  <div id="errormessage"></div>
                    <div class="form-row">
                      <div class="form-group col-lg-6">
                        <select class="item_name basic-select" style="width: -webkit-fill-available;">
                          <option value="">Item/Book</option>
                          @foreach($ebooks as $key => $list)
                            <option value="{{ $list->name.'-'.$list->standard }}" data-id="{{ $list->id }}" data-cost="{{ $list->cost }}">{{ $list->ref_id.' '.$list->name.'-'.$list->standard }}</option>
                          @endforeach
                        </select>
                        <div class="validation"></div>
                      </div>
                      <div class="form-group col-lg-2">
                        <input type="number" class="form-control item_qty" name="email" id="email" placeholder="Item Qty" data-rule="email" data-msg="Please enter a valid email" />
                        <div class="validation"></div>
                      </div>
                      <div class="form-group col-lg-2">
                        <input type="email" class="form-control item_remark" name="email" id="email" placeholder="Remark if any" data-rule="email" data-msg="Please enter a valid email" />
                        <div class="validation"></div>
                      </div>
                      <div class="form-group col-lg-2">
                        <button type="button" class="btn btn-primary item_add" title="Send Message">Add</button>
                        <div class="validation"></div>
                      </div>
                    </div>
                    <!-- <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div> -->
                  
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 pull-right">
              <div class="box wow fadeInUp">
                <h4 href="javascript:void(0)">Items</h4>
              </div>
            </div>
        </div>
        
        <div class="row">

          <div class="col-lg-12 col-md-12 no-print">
            <div class="box wow fadeInUp" style="min-height: 30em">
              <!-- <h3>Questions</h3> -->
              <div style="text-align: center;">
                <table id="que_body" class="table que_body">
                  <thead>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>MRP</th>
                    <th>Total</th>
                    <th>Action</th>
                  </thead>
                  <tbody id="item_body"></tbody>
                  <!-- <tfoot>
                    <th colspan="3" style="text-align: right;">Total Cost(MRP)</th>
                    <th style="text-align: right;">00.00</th>
                  </tfoot> -->
                </table>
              </div>
            </div>
          </div>

        </div>

         <div class="row no-print">
            <div class="col-md-12 pull-right">
              
            </div>
            <div class="col-md-12 pull-right">
              <div class="box wow fadeInUp">
                  <div style="text-align: center;">
                  <table id="" class="table ">
                    <thead>
                      <th colspan="3" style="text-align: right;">Total Cost(MRP)</th>
                      <th colspan="2" style="text-align: right;">00.00</th>
                    </thead>
                    <tbody>
                      <td colspan="5" style="text-align: right;">
                        <button class="btn btn-sm btn-primary login-submit-cs" type="button" onclick="printDiv('que_paper')" value="Print" >Print</button>
                        <input type="submit" class="btn btn-sm btn-success login-submit-cs" type="button" onclick="printDiv('que_paper')" value="Send" disabled="" />
                      </td>
                    </tbody>
                  </table>
                </div>
              </div>
              </form>
            </div>
        </div>

      </div>
    </section><!-- #pricing -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="no-print">
      <div class="container">
        <div class="row wow fadeInUp">

          <div class="col-lg-4 col-md-4">
            <div class="contact-about">
              <h3>Ace Technoid</h3>
              <!-- <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p> -->
              <div class="social-links">
                <!-- <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebooks"><i class="fa fa-facebooks"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a> -->
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="info">
              <!-- <div>
                <i class="ion-ios-location-outline"></i>
                <p>656/6<br>JAGRITI VIHAR, IN 250004</p>
              </div> -->

              <div>
                <i class="ion-ios-email-outline"></i>
                <p>acetechnoid@gmail.com</p>
              </div>

              <div>
                <i class="ion-ios-telephone-outline"></i>
                <p>+91 6398 117 233</p>
              </div>

            </div>
          </div>

          <!-- <div class="col-lg-5 col-md-8">
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
          </div> -->

        </div>

      </div>
    </section><!-- #contact -->


    <script src="{{ url('/js/select2.min.js') }}"></script>

    <script type="text/javascript">
      $(function(){
        $(".basic-select").select2();
      });
    </script>

    <script type="text/javascript">
      
      $('.field_wrapper').on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).closest("tr").remove();
        x--;
        var tax_percentage = '0';
        var discount = $('#discount').val();
        
        var sub_total = 0;
        var total = 0;
        var tax = 0;
        var final_total = 0;
        
          $('.amountText').each(function () {
            sub_total = sub_total + parseFloat($(this).text());
          });
          $('.subtotalText').text(parseFloat(sub_total).toFixed(2));
          
          if(sub_total>0){
            var total = sub_total - discount;
            var tax = total*tax_percentage/100;
            var final_total = total+tax;
          }
          
          $('.taxText').text(parseFloat(tax).toFixed(2));
          $('.totalText').text(parseFloat(final_total).toFixed(2));
      });


      $(".item_add").click(function(){
        var item_name = $('.item_name option:selected').val();
        var item_cost = $('.item_name option:selected').data('cost');

        var item_qty = $('.item_qty').val();
        var item_remark= $('.item_remark').val();

        var amountVal = parseFloat(item_cost*item_qty).toFixed(2);

        if((item_name.length*item_qty.length) != 0 ){

          var fieldHTML = '<tr title="'+item_remark+'"><td class="center" ><span>'+item_name+'</span><input type="hidden" name="item_name[]" class="item_name" value="'+item_name+'"><input type="hidden" name="item_remark[]" class="item_remark" value="'+item_remark+'"></td>'+
            '<td class="center qty"><input class="form-control qtyVal" type="number" value="'+item_qty+'" name="quantity[]" min="1"></td>'+
            '<td class="center rate"><input class="form-control rateVal" type="number" name="rate[]" value="'+item_cost+'" min="0" step="0.01" readonly ></td>'+
            '<td class="center amount"><input class="form-control amountVal" type="text" name="amount[]" value="'+amountVal+'" readonly></td>'+
            '<td><a href="javascript:void(0);" class="remove_button" title="Remove Row"><img width="30px" src="{{url("images/remove-icon.png")}}"></a></td></tr>';

          $('#item_body').prepend(fieldHTML);
          $('.item_qty').val('');
          $('.item_remark').val('');
          $('.item_name').removeClass('error');
          $('.item_qty').removeClass('error');
              
        }
        else{
          $('.item_name').addClass('error');
          $('.item_qty').addClass('error');
        }

        $('.item_name option:selected').removeAttr("selected");
        $('.item_qty').val('');
        $('.item_remark').val('');

      });
    </script>

@endsection
