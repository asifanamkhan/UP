@extends('layouts.dashboard_layout.master')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor mb-0 mt-0">মামলার নোটিশ</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item">মামলার নোটিশ</li>
                <li class="breadcrumb-item active">মামলার নোটিশ</li>
            </ol>
        </div>
    </div>

    <!-- left Content Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading" style=" color:white; font-size: 20px;background:#40A291;text-align:center;">মামলার নোটিশ</div>
                <div class="panel-body"  style="min-height:310px;">
                    <div class="row">

                        <div class="col-md-12">
                            <div style="padding:4px;width:100%;">
                                <div id="">
                                    <div class="row box" style="padding-bottom:20px;margin-top:10px;">
                                        <div class="container">
                                            <ul class="nav nav-tabs" id="myTab">
                                                <li class="active"><a data-toggle="tab" href="#menu" id="mamla_notice" style="font-size:16px;">মামলার নোটিশ ফরম</a></li>
                                                <li class=""><a data-toggle="tab" href="#menu1" id="notice_talika" style="font-size:16px;">নোটিশের তালিকা</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" id="mamla_notice_form">
                                    <form action="" method="post">
                                        <div class="container">
                                            <div class="card-header " > মামলার নোটিশের আবেদন ফরম:</div>
                                            <div class="card-body text-right">
                                                <div class="row mt-4">
                                                    <label for="" class="col-sm-2">মামলা নং</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" name="mamla_no" readonly>
                                                    </div>
                                                </div>

                                                <div class="row mt-4 text-right">
                                                    <label for="" class="col-sm-2">বিষয়</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="subject" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row mt-4 text-right">
                                                    <label for="" class="col-sm-2">মামলার তারিখ</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" name="mamlar_date" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row mt-4 text-right">
                                                    <label for="" class="col-sm-2">শুনানীর তারিখ</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" name="sunanir_date" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="container">
                                            `<div class="card">
                                                <div class="card-header ">বাদীর তথ্য:</div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div id="bibadir_info">
                                                            <div class="col-sm-3 col-sm-offset-1">
                                                                <label for="" class="col-sm-offset-5">নাম</label>
                                                                <div>
                                                                    <input type="text" name="badi_name[]" class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3 ">
                                                                <label for="" class="col-sm-offset-5">পিতার নাম</label>
                                                                <div>
                                                                    <input type="text" name="badi_fname[]" class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3 ">
                                                                <label for="" class="col-sm-offset-5">গ্রাম</label>
                                                                <div>
                                                                    <input type="text" name="badi_gram[]" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2 mt-5">

                                                            <a href="" class="btn-sm btn-primary ">যোগ করুন</a>
                                                        </div>

                                                    </div>
                                                    <div class="row mt-4">
                                                        <label for="" class="col-sm-1" >গ্রাম</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="bibadi_name" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-md-3 text-left">
                                                            <input type="checkbox" id="badi_Check" > হাঁ (সবাই একই গ্রামের)
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            `<div class="card">
                                                <div class="card-header ">বিবাদীর তথ্য:</div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-3 col-sm-offset-1">
                                                            <label for="" class="col-sm-offset-5">নাম</label>
                                                            <div>
                                                                <input type="text" name="bibadi_name[]" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3 ">
                                                            <label for="" class="col-sm-offset-5">পিতার নাম</label>
                                                            <div>
                                                                <input type="text" name="bibadi_fname[]" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3 ">
                                                            <label for="" class="col-sm-offset-5">গ্রাম</label>
                                                            <div>
                                                                <input type="text" name="bibadi_gram[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2 mt-5">

                                                            <a href="" class="btn-sm btn-primary ">যোগ করুন</a>
                                                        </div>

                                                    </div>
                                                    <div class="row mt-4">
                                                        <label for="" class="col-sm-1" >গ্রাম</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="bibadi_gram" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-md-3 text-left">
                                                            <input type="checkbox" id="bibadi_Check" > হাঁ (সবাই একই গ্রামের)
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <a href="" class="col-sm-offset-5 btn btn-info">Generate</a>
                                </form>

                            </div>

                            <div class="card" id="all_mamla">
                                <div class="card-header">সকল মামলার তালিকা</div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div style="padding:4px;width:100%;">
                                            <div id="">
                                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">

                                                    <thead>
                                                    <tr>
                                                        <th width="">মামলা নং</th>
                                                        <th>সনদ নং</th>
                                                        <th>বিষয়</th>
                                                        <th>আবেদনের তারিখ</th>
                                                        <th>শুনানীর তারিখ</th>
                                                        <th>অবস্থা</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <link rel="stylesheet" href="{{asset('datatables/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{asset('datatables/css/responsive.bootstrap.min.css')}}" />
    <!--<script type="text/javascript" src="datatables/js/jquery-1.11.3.min.js"></script>--->
    <script type="text/javascript" src="{{asset('datatables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatables/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatables/js/dataTables.responsive.min.js')}}"></script>


    <script>

        $('#all_mamla').hide();
        $('#notice_talika').on('click',function () {
            $('#all_mamla').show();
            $('#mamla_notice_form').hide();
        });
        $('#mamla_notice').on('click',function () {
            $('#all_mamla').hide();
            $('#mamla_notice_form').show();
        });
        $('#example'). DataTable( {
            "lengthMenu": [[ 25, 50,100, -1], [ 25, 50,100, "All"]],

        });



    </script>



@endsection