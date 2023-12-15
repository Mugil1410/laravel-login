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
           <h2 class="text-center">Country List</h2>
           <a class="btn btn-success btn-sm float-start" href="{{route('country')}}">View Existinng Country</a><br><br>
           <form action="{{route('storeCountryName')}}" method="POST">
              @csrf
             <div class="form-group">
                  <label>Add Country name</label>
                  <input type="name" class="form-control"  placeholder="EX.india" name="country_name"> <br><br>
                  <button type="submit" class="btn btn-primary">ADD</button>
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