@extends('layouts.frontend')

@section('content')

        <section class="ask-question">
           <div class="container">
             <div class="row">
               <div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                 <!--ask item -->
                 <div class="ask-box active">
                    <div class="ask-circle">
                      <span class="fa fa-usd"></span>
                    </div>
                    <div class="ask-info">
                      <h3 class="text-white">BITCOIN PRICE</h3>
                    </div>
                 </div>
               </div>

                <div class="col-md-6 col-xs-12">
                    <div class="item clearfix">
                        <div class="content-box">

                            <a href="{{ url( '/register' ) }}" class="thm-btn">Register</a>
                        </div>
                    </div>
                </div>

             </div>
             <div class="row">
                <div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                 <!--ask item -->
                 <div class="ask-box active mt-30">
                    <div class="ask-circle">
                      <span class="fa fa-usd"></span>
                    </div>
                    <div class="ask-info">
                      <h3 class="text-white">ETHEREUM PRICE</h3>
                    </div>
                 </div>
               </div>
             </div>
           </div>
         </section>

        <section class="get-quote-section" style=" background-image:url(images/resources/getquote-bg-img.jpg);">
            <div class="container">
                <div class="row clearfix">
                      
                  <!--Form Column-->
                  <div class="form-column col-lg-7 col-md-8 col-sm-12 col-xs-12">
                    <!--Title-->
                      <div class="sec-title ">
                          <h2 class="left">For more info</h2>
                      </div>
              
                    <div class="form-box default-form">
                          <form method='post'><input type='hidden' name='form-name' value='form 1' />
                          
                              <div class="row clearfix">
                                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                      <div class="field-inner"><input type="text" name="form_name" value="" placeholder="Name" required=""></div>
                                  </div>
                                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                      <div class="field-inner"><input type="email" name="form_email" value="" placeholder="Email" required=""></div>
                                  </div>
                                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                      <div class="field-inner"><input type="text" name="form_phone" value="" placeholder="Phone"></div>
                                  </div>
                                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                      <div class="field-inner"><input type="text" name="form_subject" value="" placeholder="subject"></div>
                                  </div>
                                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                      <div class="field-inner"><textarea name="form_message" placeholder="Message"></textarea></div>
                                  </div>
                                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                      <div class="field-inner theme-btn"><button type="submit" class="thm-btn">Submit Now</button></div>
                                  </div>
                              </div>
                              
                          </form>
                      </div>
                  </div>
                  
              </div>
          </div>
        </section>


@endsection
