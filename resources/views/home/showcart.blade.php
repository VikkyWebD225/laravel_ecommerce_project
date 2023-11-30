
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

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <style type="text/css">
    .center{
        margin: auto;
        width: 70%;
        text-align: center;
        padding: 30px;
        margin-left: 150px;
        display: flex;
        flex-direction: column;
    align-items: center;
    margin-top: 20px;
    }

    h1 {
    font-size: 25px;
    padding-bottom: 15px;
}

    table,th,td
    {
        border: 1px solid grey;
       
    }

    .center table{
      margin: auto;
      width: 100%;

    }

    .th_deg
    {
        font-size: 30px;
        padding: 5px;
        background: skyblue;
    }
    .img_deg
    {
      height: 200px;
      width: 200px;
    }

    /* Add this style at the end of your existing styles */

.delivery-form {
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 80%;
    max-width: 625px; /* Adjust the maximum width as needed */
    margin-top: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 5px;
}

input,
select {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    background-color: #ff5722;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
}

/* Additional styles for better alignment of form elements */
.form-group::after {
    content: "";
    display: table;
    clear: both;
}

label {
    float: left;
    width: 48%;
}

input,
select {
    float: left;
    width: 48%;
}

/* Add a clearfix class to fix the floating issue */
.clearfix::after {
    content: "";
    display: table;
    clear: both;
}





    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>
      
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
      
         <!-- end slider section -->

         @include('sweetalert::alert')
      

      <div class="center">
        <table>
            <tr>

                <th class="th_deg">Product Title</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>

            </tr>
            <?php $totalprice=0; ?>
          @foreach($cart as $item)
            <tr>
           <td>{{$item->product_title}}</td>
           <td>Rs {{$item->price}}</td>
           <td>{{$item->quantity}}</td>
           <td><img class="img_deg" src="{{ asset('product/'.$item->image)}}"></td>
           <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{url('remove_cart',$item->id)}}">Remove Product</a></td>
            </tr>

            <?php $totalprice = $totalprice + $item->price ?>

            @endforeach

      

        </table>

        <div>
        <h1>Total Price : Rs {{$totalprice}}</h1>
        </div>
        
        <div class="delivery-form">
          <h5 class="card-header">Delivery Address</h5>
          <div class="card-body">
      
              <form action="{{ url('delivery_post') }}" method="post">
                  @csrf
                  <div class="form-group">
                      <label for="name">Name:</label>
                      <input type="text" id="name" name="name" required>

                      <label for="mobile">10-digit mobile number:</label>
                      <input type="text" id="mobile" name="mobile" required>
                  </div>
      
      
                  <div class="form-group">
                      <label for="pincode">Pincode:</label>
                      <input type="number" id="pincode" name="pincode" required>

                      <label for="locality">Locality:</label>
                      <input type="text" id="locality" name="locality" required>
                  </div>
      
                 
                  <div class="form-group">
                      <label for="address">Address (Area and Street):</label>
                      <input type="text" id="address" name="address" required>

                      <label for="country">Country:</label>
                      <select id="country" name="country" required>
                          <option value="">Select Country</option>
                          @foreach($countries as $list)
                              <option value="{{ $list->id }}">{{ $list->name }}</option>
                          @endforeach
                      </select>


                  </div>
    
      
                  <div class="form-group">
                      <label for="state">State:</label>
                      <select id="state" name="state" required></select>
                  </div>
      
                  <div class="form-group">
                      <label for="city">City:</label>
                      <select id="city" name="city" required></select>
                  </div>
      
                  <div class="form-group">
                      <label for="landmark">Landmark (Optional):</label>
                      <input type="text" id="landmark" name="landmark">

                      <label for="alternate">Alternate Phone (Optional):</label>
                      <input type="text" id="alternate" name="alternate">
                  </div>
      
                 
      
                  <button type="submit">Submit</button>
              </form>
      
          </div>
      </div>

        <div>
          <h1 style="font-size: 25px; padding-bottom:15px">Proceed to Order</h1>
          <a href="{{url('delivery_address')}}" class="btn btn-danger">Cash On Delivery</a>
          <a href="{{url('razor',$totalprice)}}" class="btn btn-danger">Pay Using Card</a>
        </div>
      
      </div>
     
      <!-- footer start -->
   
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://html.design/">KRISHNA TOMAR</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>

      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
      $(document).ready(function() {
        $('#country').change(function() {
            let cid = $(this).val();
            $.ajax({
                url: 'getState', // Adjust the endpoint URL accordingly
                type: 'post',
                data: {
                    'cid': cid,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(result) {
                    var html = '';
    
                    // Clear old options in the "state" dropdown
                    $("#state").html('');
    
                    // Iterate through the result and build HTML options
                    for (var key in result) {
                        if (result.hasOwnProperty(key)) {
                            var id = key;
                            var name = result[key];
    
                            // Create an option element with ID and name
                            html += '<option value="' + id + '">' + name + '</option>';
                        }
                    }
    
                    // Populate the "state" dropdown with new options
                    $("#state").html(html);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    
        $('#state').change(function() {
            let sid = $(this).val();
            $.ajax({
                url: 'getCity', // Adjust the endpoint URL accordingly
                type: 'post',
                data: {
                    'sid': sid,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(result) {
                    var html = '';
    
                    // Clear old options in the "city" dropdown
                    $("#city").html('');
    
                    // Iterate through the result and build HTML options
                    for (var key in result) {
                        if (result.hasOwnProperty(key)) {
                            var id = key;
                            var name = result[key];
    
                            // Create an option element with ID and name
                            html += '<option value="' + id + '">' + name + '</option>';
                        }
                    }
    
                    // Populate the "city" dropdown with new options
                    $("#city").html(html);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

  </script>
    
 <!-- jQery -->
 <script src="home/js/jquery-3.4.1.min.js"></script>
 <!-- popper js -->
 <script src="home/js/popper.min.js"></script>
 <!-- bootstrap js -->
 <script src="home/js/bootstrap.js"></script>
 <!-- custom js -->
 <script src="home/js/custom.js"></script>

 
      <script type="text/javascript">
      function confirmation(ev){
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
          title: "Are you sure to cancel this product",
          text: "You will not be able to revert this!",
          icon: "warning",
          buttons: true,
          dangerMode: true,

        })
        .then((willCancel) => {
          if(willCancel){
            window.location.href = urlToRedirect;
          }
        });
      }
      </script>
     
     
      
    
    
    </body>
</html>