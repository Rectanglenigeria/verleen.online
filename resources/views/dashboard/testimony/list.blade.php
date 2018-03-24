

@extends('layouts.dashboard')

@section('content')


   <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-12 col-12 align-self-center">
                        <h3 class="text-themecolor">Testimonies</h3>
                        <!--<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">User Dashboard</li>
                        </ol>-->
                    </div>
                </div>



                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->

             
                @foreach($testimonies as $testimony)
              <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">{{$testimony->name}}</h3>
                                <small>{{$testimony->created_at}}</small>
                                <div class="d-flex flex-row comment-row">
                                    <p class="m-b-5">{{$testimony->body}}</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="col-md-2">
                </div>
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                
            </div>

            @endforeach
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

    

     @endsection


