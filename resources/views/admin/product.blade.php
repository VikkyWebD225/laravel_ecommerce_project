<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
   <style type="text/css">
    .div_center
    {
text-align: center;
padding-top: 40px;
    }

    .font_size
    {
        font-size: 40px;
        padding-bottom: 40px;
    }

    label
    {
        display: inline-block;
        width: 200px;
    }

    .div_design
    {
        padding-bottom: 15px;
    }
   </style>
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

                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif
          <div class="div_center">
           <h1 class="font_size">Add Products</h1>

           <form method="post" action="{{url('/add_product')}}" enctype="multipart/form-data">
            @csrf
            <div class="div_design">
                <label>Product Title : </label>
                <input type="text" name="title"  placeholder="Write a title" required="">   
            </div> 
    
    
            <div class="div_design">
                <label>Product Description : </label>
                <input type="text" name="description"  placeholder="Write a description"  required="">
     
            </div> 

            <div class="div_design">
                <label>Product Price : </label>
                <input type="number" name="price"  placeholder="Write a product price"  required="">
     
            </div> 
    
    
            <div class="div_design">
                <label>Discount Price : </label>
                <input type="number" name="discount"  placeholder="Write a discount price"> 
            </div> 
    
            <div class="div_design">
                <label>Product Quantity : </label>
                <input type="number" name="quantity"  placeholder="Write a quanity"  required=""> 
            </div> 
    
            <div class="div_design">
                <label>Product Category : </label>
               <select name="category" required="">
                <option value="" selected="">Add a Category Here</option>
                @foreach($category as $category)
            <option value="{{$category->category_name}}">{{$category->category_name}}</option> 
            @endforeach  
            
            </select> 
            </div> 
    
            <div class="div_design">
                <label>Product Image Here : </label>
                <input type="file" name="image"  placeholder="Insert a image"  required="">   
            </div> 
    
            <div class="div_design">
               
                <input type="submit" name="submit" value="Add Product" class="btn btn-primary"  >    
            </div> 
    
           
           </form>
           



          </div>


            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>