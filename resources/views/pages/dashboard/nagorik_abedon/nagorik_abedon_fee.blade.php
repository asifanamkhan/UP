@extends('layouts.dashboard_layout.master')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor mb-0 mt-0">নাগরিক আবেদন</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item">আবেদন পত্র</li>
                <li class="breadcrumb-item active">নাগরিক আবেদন</li>
            </ol>
        </div>
    </div>

    <!-- left Content Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading" style=" color:white; font-size: 16px;background:#40A291;text-align:center;">নাগরিক সনদ ফি ফরম</div>
                <div class="panel-body"  style="min-height:310px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="padding:4px;width:100%;">
                                <div id="">
                                    <div class='row'>
                                        <div class='col-md-12'>
                                            <form action="{{route('nagorikSonodFee',$nagorikFee->id)}}" method='post'>
                                            @csrf

                                            <div class="row mt-3">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-4">
                                                    <img src="{{url('images/'.$nagorikFee->image.'')}}" width="170" height="170"/>
                                                    <input type="hidden" name="profile" value=""/>
                                                </div>


                                            </div>
                                            <div class="row mt-4">

                                            <div class="col-md-2">
                                                <label class="" for="traking no">ট্র্যাকিং নং :</label>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control highlisht_font w-100" name="trackid" id="trackid" value="{{$nagorikFee->token}}" readonly />
                                            </div>


                                        </div>
                                        <div class="row mt-3">

                                        <div class="col-md-2">
                                            <label class="" for="traking no">নাম   :</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control highlisht_font w-100" name="name" id="name" value="{{$nagorikFee->bname}}" readonly />
                                        </div>
                                    </div>
                                    <div class="row mt-3">

                                    <div class="col-md-2">
                                        <label class="" for="traking no">পিতার নাম :</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control highlisht_font w-100" name="bfname" id="bfname" value="{{$nagorikFee->bfname}}" readonly />
                                    </div>
                                </div>
                                <div class="row mt-3">

                                <div class="col-md-2">
                                    <label class="" for="traking no">মোবাইল নং :</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control highlisht_font w-100" name="mob" id="mob" value="{{$nagorikFee->mob}}" readonly />
                                </div>
                            </div>
                            <div class="row mt-3">

                            <div class="col-md-2">
                                <label class="" for="traking no">সংযুক্তি  :</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control highlisht_font w-100" name="attachment" id="attachment" value="{{$nagorikFee->attachment}}" readonly />
                            </div>

                            </div>
                            <div class="row mt-3">
                            <div class="col-md-2">
                                <label class="" for="traking no">Payment Type :</label>
                            </div>
                            <div class="col-md-10">
                                <select name='acno' class="form-control highlisht_font w-100">
                                <option value="">adadasdsasdasd</option>
                                </select>
                            </div>
                            </div>
                            <div class="row mt-3" style="color: red">
                            <div class="col-md-2">
                                <label class="" for="traking no">ফি :</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control highlisht_font w-100"  name="fee" id="fee" value="0.00"  style="color: red;"/>
                            </div>
                            </div>
                            <div class="row mt-3" >
                            <div class="col-md-2">
                                <label class="" for="traking no">ইস্যুকৃত তারিখ :</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control highlisht_font w-100" value="{{$nagorikFee->created_at}}"/>
                            </div>
                            </div>
                            <div class="row mt-3" style="color: red">
                            <div class='col-md-4'></div>

                            <div class='col-md-4'><input type="submit" class="btn btn-info w-100" value='Generate'>
                             <input type="hidden" name="status" value="1"></div>

                             </div>
                                </form>
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





@endsection