@extends('layouts.dashboard_layout.master')

@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm float-right ml-2"><i class="ti-settings text-white"></i></button>
            <button class="btn float-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i> Create</button>
            <div class="dropdown float-right mr-2 hidden-sm-down">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> January 2019 </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> <a class="dropdown-item" href="#">February 2019</a> <a class="dropdown-item" href="#">March 2019</a> <a class="dropdown-item" href="#">April 2019</a> </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daily Sales</h4>
                    <div class="text-right">
                        <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i> $120</h2>
                        <span class="text-muted">Todays Income</span>
                    </div>
                    <span class="text-success">80%</span>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 80%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Weekly Sales</h4>
                    <div class="text-right">
                        <h2 class="font-light mb-0"><i class="ti-arrow-up text-info"></i> $5,000</h2>
                        <span class="text-muted">Todays Income</span>
                    </div>
                    <span class="text-info">30%</span>
                    <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 30%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Monthly Sales</h4>
                    <div class="text-right">
                        <h2 class="font-light mb-0"><i class="ti-arrow-up text-purple"></i> $8,000</h2>
                        <span class="text-muted">Todays Income</span>
                    </div>
                    <span class="text-purple">60%</span>
                    <div class="progress">
                        <div class="progress-bar bg-purple" role="progressbar" style="width: 60%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Yearly Sales</h4>
                    <div class="text-right">
                        <h2 class="font-light mb-0"><i class="ti-arrow-down text-danger"></i> $12,000</h2>
                        <span class="text-muted">Todays Income</span>
                    </div>
                    <span class="text-danger">80%</span>
                    <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 80%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
