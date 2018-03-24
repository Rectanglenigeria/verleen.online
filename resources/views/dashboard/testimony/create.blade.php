

@extends('layouts.dashboard')

@section('content')


        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
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
                        <h3 class="text-themecolor">Create testimony</h3>
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

                <div class="row">

                    <div class="col-md-12 col-12">
                         <label>Referral link</label>
                         <div class="alert alert-success" role="alert">
                            {{Auth::user()->referal_link}}
                         </div>
                     
                    </div>
                    <br><br>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-3 col-xlg-3 col-md-3 col-sm-12 col-xs-12">
                    </div>
                    
                    <div class="col-lg-6 col-xlg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Create Testimony</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--second tab-->
                                
                                <div class="tab-pane active" id="settings" role="tabpanel">
                                    <div class="card-body">

                                         @if(Session::has('notification'))
          <p class="alert alert-success alert-sm alert-dismissable">{{Session::get('notification')}}</p>
        @endif
        
                                        <form class="form-horizontal form-material" action="{{route('user.testimony.create.submit')}}" method="POST">


                                            {{ csrf_field() }}

                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input disabled="disabled" placeholder="" class="form-control form-control-line" type="text" name="name" id="name" value="{{Auth::user()->name}}">
                                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>



                                             <div class="form-group{{ $errors->has('testimony') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Testimony</label>
                                                <div class="col-md-12">

                                                    <textarea placeholder="Enter your testimony here" class="form-control form-control-line" name="testimony" id="testimony">
                                                        {{old('testimony')}}
                                                    </textarea>
                                                    


                                                    @if ($errors->has('testimony'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('testimony') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>


                                            


                                           
                                           
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xlg-3 col-md-3 col-sm-12 col-xs-12">
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
           
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

                        @endsection


