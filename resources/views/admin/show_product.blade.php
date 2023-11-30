<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')

   {{-- <Style type="text/css">
  .img_size
  {
    width: 150px;
    height: 150px;
  }
  .font_size
  {
    text-align: center;
    font-size: 25px;
    font-weight: bold;
    padding-bottom: 40px;
  }
  
  </Style> --}}

  



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
<link href='https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
     @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('deleted'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('deleted')}}
                </div>
                @endif
          <div class="div_center">
           <h1 class="font_size">Show Products</h1>
          </div>

        <div class="table-responsive">
          <table class="table table-bordered yajra-datatables" id="myTable">
          <thead>
            <tr>
              <th>Id</th>
              <th>Title</th>
              
              <th>Image</th>
              <th>Category</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Discount Price</th>
              <th>Action</th>
            </tr>
          </thead>
          @foreach($data as $data)
          <tr>
             <td style="text-align: center;">{{$data->id}}</td>
             <td style="text-align: center;">{{$data->title}}</td>
            
             <td>
               <img class="img_size" src="{{ asset('product/'.$data->image)}}" style="height: 120px; width:120px;">
             </td>
             <td style="text-align: center;">{{$data->category}}</td>
             <td style="text-align: center;">{{$data->quantity}}</td>
             <td style="text-align: center;">{{$data->price}}</td>
             <td style="text-align: center;">{{$data->discount_price}}</td>
             <td>
               <a class="btn btn-success" href="{{url('update_product',$data->id)}}"> Edit </a>
               <br><br>  
               <a onclick="return confirm('Are You Sure To Delete This')" class="btn btn-danger" href="{{url('delete_product',$data->id)}}">Delete</a>
                   
               </td>              
          </tr>
 
          @endforeach

         </table>

        </div>


            </div>
        </div>
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>