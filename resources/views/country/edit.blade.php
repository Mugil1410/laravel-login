<!DOCTYPE html>
<html dir="ltr" lang="en">

@include('layouts.header')

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        @include('layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
        <div class="container">
               <h2 class="text-center">Update Country</h2>
               <form action="{{route('country.update',$countries)}}" method="POST">
                 @csrf
                 @method('PUT')
                  <div class="form-group">
                     <label for="exampleFormControlInput1">Edit Country name</label>
                     <input type="name" class="form-control"  placeholder="{{$countries->country_name}}" name="country_name"> <br><br>
                     <input class="btn btn-primary" type="submit" value="update">
                  </div>
                </form>
         </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include('layouts.footer')
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <div class="chat-windows"></div>
    @include('layouts.scripts')
</body>

</html>