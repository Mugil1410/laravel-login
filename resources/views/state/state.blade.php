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
                  <h2 class="text-center">State List</h2>
                  <div class="">
                     <a class="btn btn-primary" href="{{route('addstate')}}">Add New State</a>
                  </div>
                  <br><br>
                 <table class="table table-bordered">
                     <thead>
                          <tr>
                             <th>Country Name</th>
                             <th>State Name</th>
                             <th>Action</th>
                           </tr>
                     </thead>
                     <tbody>
                         <tr>
                         @foreach($states as $state)
                         <tr>
                              <td>{{$state->country_name}}</td>
                              <td>{{ $state->state_name }}</td>
                              <td><a href="{{route('state.edit',$state)}}" class="btn btn-warning">Edit</a>
                              <a href="{{route('state.delete',$state)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tr>
                      </tbody>
                 </table>
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