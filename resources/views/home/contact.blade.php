
<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>KRISHNA - Fashion</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   
    </head>
   <body>
      
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')

        <div class="my-5"></div>

<!-- Contact -->
<section class="container">

    <!--Contact heading-->
    <h2 class="h1 m-0">Contact us</h2>
    <!--Contact description-->
    <h1>Want to discuss your idea?</h1>
    <h3>We're Always Ready To Help</h3>
    <br><br>

    @if(session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{session()->get('message')}}
    </div>
    @endif

    <div class="row">

        
        
        <!--Grid column-->
        <div class="col-lg-5 mb-4">

            <!--Form with header-->
            <div class="card border-primary rounded-0">

                <div class="card-header p-0">
                    <div class="bg-primary text-white text-center py-2">
                        <h3><i class="fa fa-envelope"></i> Write to us:</h3>
                        <p class="m-0">We'll write rarely, but only the best content.</p>
                    </div>
                </div>

                <form action="{{url('contact_post')}}" method="post">
                    @csrf
                
                    <div class="card-body p-3">


                    <div class="form-group">
                        <label>Your name</label>
                        <div class="input-group">
                            <div class="input-group-addon bg-light"><i class="fa fa-user text-primary"></i></div>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Your email</label>
                        <div class="input-group mb-2 mb-sm-0">
                            <div class="input-group-addon bg-light"><i class="fa fa-envelope text-primary"></i></div>
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Service</label>
                        <div class="input-group mb-2 mb-sm-0">
                            <div class="input-group-addon bg-light"><i class="fa fa-tag prefix text-primary"></i></div>
                            <input type="text" class="form-control" name="service" placeholder="Services">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <div class="input-group mb-2 mb-sm-0">
                            <div class="input-group-addon bg-light"><i class="fa fa-pencil text-primary"></i></div>
                            <textarea class="form-control" name="message"></textarea>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary btn-block rounded-0 py-2" type="submit">Submit</button>
                    </div>

                </div>

            </form>

            </div>
            <!--Form with header-->

        </div>

    
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-7">

            <!--Google map-->
            <div class="mb-4">
               
            </div>

            <!--Buttons-->
            <div class="row text-center">
                <div class="col-md-4">
                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-map-marker"></i></a>
                    <p>E-2/59, Arera Colony, Bhopal,
Madhya Pradesh, India, 462016
B-207, Prakrati Corporate,Y N Road,
Indore, Madhya Pradesh , 452001 </p>
                    
                </div>

                <div class="col-md-4">
                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-phone"></i></a>
                    <p> +91-7554927642, <br> Mon - Fri, 11:00-07:30</p>
                </div>

                <div class="col-md-4">
                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-envelope"></i></a>
                    <p>contact@agnitotechnologies.com </p>
                </div>
            </div>

        </div>
       <!--Grid column-->

    </div>

</section>



        

      
     
      <!-- footer start -->
   
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://html.design/">KRISHNA TOMAR</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>

     



      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>