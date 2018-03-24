

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
                        <h3 class="text-themecolor">Provide help</h3>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-themecolor"><i class="mdi mdi-credit-card"></i> Wallet </h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">S/N</th>
                                                <th class="text-primary">PH Date</th>
                                                <th class="text-primary">PH Value</th>
                                                 <th class="text-primary">Growth</th>
                                                  <th class="text-primary">Total Value</th>
                                                  <th class="text-primary">GH Time</th>
                                                  <th class="text-primary">Unmatched GH Value</th>
                                                <th class="text-primary">Status</th>
                                                <th class="text-primary">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $count=1;?>

                                            @foreach($phs as $ph)
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$ph->created_at}}</td>
                                                <td>{{($ph->amount)}}</td>
                                                <td>{{($ph->growth)}}</td>
                                                <td>{{($ph->growth+$ph->amount)}}</td>

                                                <?php
                                                    $phTime=strtotime($ph->created_at);
                                                    $roiPeriod=(($config->roi_period)*24*60*60);
                                                     $projectedRsDateInSec=$roiPeriod+$phTime;
                                                        $projectedRsDateInTimeStamp=Date('F d Y | h:i', $projectedRsDateInSec);
                                                ?>

                                                <td>{{$projectedRsDateInTimeStamp}}</td>
                                                <td>--</td>
                                                <td>
                                                   <!-- <span class="label label-table label-success">Matched</span>
                                                    <span class="label label-table label-info">Paid</span>-->
                                                    <span class="label label-table label-danger">Pending</span>
                                                </td>
                                                <td>
                                                   <a  href="" class="disabled btn btn-sm btn-success">Get Help</a>
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
                <!-- End PAge Content -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

    

     @endsection


