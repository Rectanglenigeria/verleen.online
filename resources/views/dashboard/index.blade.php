

@extends('layouts.dashboard')

@section('content')


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
                        <h3 class="text-themecolor">Dashboard</h3>
                        <!--<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">User Dashboard</li>
                        </ol>-->
                    </div>
                </div>


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

                    <div class="col-md-12 col-12">
                            <a href="{{route('user.help.provide')}}" class="btn btn-sm btn-primary">Provide Help</a>
                            <a href="{{route('user.wallet')}}" class="btn btn-sm btn-success">Receive Help</a>
                     
                    </div>
                    <br><br>
                    
                </div>


                <div>

 
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">...</div>
    <div role="tabpanel" class="tab-pane" id="profile">...</div>
    <div role="tabpanel" class="tab-pane" id="messages">...</div>
    <div role="tabpanel" class="tab-pane" id="settings">...</div>
  </div>

</div>
               
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Insurance Merges </h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">S/N</th>
                                                <th class="text-primary">Pher</th>
                                                <th class="text-primary">Gher</th>
                                                <th class="text-primary">Amount</th>
                                                <th class="text-primary">Time Left</th>
                                                <th class="text-primary">Status</th>
                                                <th class="text-primary">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        	<?php $count=1;?>
                                        	@foreach($insurance_merges as $merge)
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$merge->ph_user->name}}</td>
                                                <td>J{{$merge->gh_user->name}}</td>
                                                <td>{{$merge->amount}}</td>
                                                <td><span class="text-muted"><i class="fa fa-clock-o"></i> 1d : 23h : 39m </span> </td>
                                                <td>
                                                      <!-- <label class="label label-table label-primary">Matched</label>-->
                                                   <!--<label class="label label-table label-info">Paid</label>-->
                                                   <label class="label label-table label-danger">Pending</label>

                                                    <!-- <label class="label label-table label-success">Confirmed</label>-->
                                                </td>
                                                <td>
                                                	@if(Auth::user()->id==$merge->ph_user->id)
                                                    <a class="btn btn-xs btn-primary" href="{{route('user.merges.phdetails',['id'=>$merge->ph_id])}}">View</a>
                                                    @endif

                                                    @if(Auth::user()->id==$merge->gh_user->id)

                                                    <a class="btn btn-xs btn-info" href="{{route('user.merges.ghdetails',['id'=>$merge->gh_id])}}">View</a>

                                                    @endif
                                                </td>
                                            </tr>

                                            <?php $count++; ?>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">90% Merges </h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">S/N</th>
                                                <th class="text-primary">Pher</th>
                                                <th class="text-primary">Gher</th>
                                                <th class="text-primary">Amount</th>
                                                <th class="text-primary">Time Left</th>
                                                <th class="text-primary">Status</th>
                                                <th class="text-primary">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $count=1;?>
                                        	@foreach($main_merges as $merge)
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$merge->ph_user->name}}</td>
                                                <td>J{{$merge->gh_user->name}}</td>
                                                <td>{{$merge->amount}}</td>
                                                <td><span class="text-muted"><i class="fa fa-clock-o"></i> 1d : 23h : 39m </span> </td>
                                                <td>
                                                      <!-- <label class="label label-table label-primary">Matched</label>-->
                                                   <!--<label class="label label-table label-info">Paid</label>-->
                                                   <label class="label label-table label-danger">Pending</label>

                                                    <!-- <label class="label label-table label-success">Confirmed</label>-->
                                                </td>
                                                <td>
                                                	@if(Auth::user()->id==$merge->ph_user->id)
                                                    <a class="btn btn-xs btn-primary" href="{{route('user.merges.phdetails',['id'=>$merge->ph_id])}}">View</a>
                                                    @endif

                                                    @if(Auth::user()->id==$merge->gh_user->id)

                                                    <a class="btn btn-xs btn-info" href="{{route('user.merges.ghdetails',['id'=>$merge->gh_id])}}">View</a>

                                                    @endif
                                                </td>
                                            </tr>

                                            <?php $count++; ?>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>







                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Transaction History </h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">S/N</th>
                                                <th class="text-primary"><i class="mdi mdi-basket-fill"></i> Pher</th>
                                                <th class="text-primary"><i class="mdi mdi-basket-unfill"></i> Gher</th>
                                                <th class="text-primary">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        	<?php $count=1;?>
                                        	@foreach($local_trans as $trans)

                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$trans->ph_user->name}}</td>
                                                <td>{{$trans->gh_user->name}}</td>
                                                <td>{{$trans->amount}}</td>
                                            </tr>
                                            <?php $count++;?>
                                            @endforeach


                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Pher</th>
                                                <th>Gher</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Global Transaction History </h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">S/N</th>
                                                <th class="text-primary">Pher</th>
                                                <th class="text-primary">Gher</th>
                                                 
                                                <th class="text-primary">Amount</th>
                                                <th class="text-primary">Currency</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $count=1;?>
                                        	@foreach($global_trans as $trans)

                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$trans->ph_user->name}}</td>
                                                <td>{{$trans->gh_user->name}}</td>
                                                <td>{{$trans->amount}}</td>
                                                 <td style="text-transform: uppercase;">{{$trans->ph_user->currency}}</td>
                                            </tr>
                                            <?php $count++;?>
                                            @endforeach
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Pher</th>
                                                <th>Gher</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>









                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Testimonies</h4>
                                <h6 class="card-subtitle">Latest Testmonies from participant</h6> </div>
                            <!-- ============================================================== -->
                            <!-- Comment widgets -->
                            <!-- ============================================================== -->
                            <div class="comment-widgets">
                                <!-- Comment Row -->

                                 @foreach($testimonies as $testimony)
                                <div class="d-flex flex-row comment-row">
                                
                                    <div class="comment-text w-100">
                                        <h5>{{$testimony->name}}</h5>
                                        <p class="m-b-5">
                                        	{{$testimony->body}}
                                        </p>
                                        <div class="comment-footer"> <span>{{$testimony->created_at}}</span> </div>
                                    </div>
                                </div>

                                @endforeach

                                 

                                

                                
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="row">
                            <h4 class="card-title">News Timeline</h4>


                            @foreach($NewsFeeds as $news)


                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <div class="card card-inverse card-info">
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white">{{$news->created_at}}</h4></div>
                                    <div class="card-body">
                                    	<h3>{{$news->title}}</h3>
                                        <p class="card-text">{{substr($news->body,0,65)}}</p>
                                        <a href="{{route('user.news.view',['id'=>$news->id])}}" class="btn btn-inverse">Read More</a>
                                    </div>
                                </div>
                            </div>

                            @endforeach



                          



                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
        
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

                        @endsection


