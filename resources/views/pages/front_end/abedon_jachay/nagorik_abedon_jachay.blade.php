@extends('layouts.front_end_layout.master')
@section('head_content')
    নাগরিক আবেদন যাচাই
@endsection
@section('content')
<div class="panel-body all-input-form"  style="min-height:330px;">
    <form action="javascript:void(0)" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="col-sm-7 col-sm-offset-2 color-style" style="margin-top:5px;">
                        <input type="text" name="tid" id="tid" class="form-control" placeholder="আপনার নাগরিক আবেদনের ট্র্যাকিং নম্বরটি  ইংরেজিতে প্রবেশ করুন"   onkeypress="return numtest();" />
                    </div>
                    <div class="col-sm-3" style="margin-top:5px;">
                        <input type="Submit" value="খোঁজ করুন"  class="btn btn-primary" name='perinfo' onclick="htmlData('index.php/show/searchNagorickInformation','tid='+tid.value)"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--- search result show div start ---------->
    <span id='txtResult' class="hidden-xs visiable-sm visiable-md visiable-lg"></span>
    <span class="visiable-xs hidden-sm hidden-md hidden-lg">
            <p class="text-warning"> দুখিঃত!! এই ডিভাইসে আপনার আবেদনপত্র  দেখা যাবে না ।</p>
         </span>
    <!------ search result show end --------->
</div>

    @endsection
