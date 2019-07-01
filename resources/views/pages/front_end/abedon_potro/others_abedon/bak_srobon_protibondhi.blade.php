@extends('layouts.front_end_layout.master')
@section('head_content')
    প্রকৃত বাকঁ ও শ্রবন প্রতিবন্ধী
@endsection
@section('content')
    <form action="{{route('others_sonod_abedon.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="upform" id="upform">
        @csrf
        @section('form')
            <label for="Service List" class="col-sm-3 control-label"> সেবা সমহু  <span>*</span></label>
            <div class="col-sm-3">
                <select name="" id="" class="form-control" required disabled >
                    <option value="" >প্রকৃত বাকঁ ও শ্রবন প্রতিবন্ধী</option>
                </select>
                <input type="hidden" value="8" name="serviceList">
            </div>
        @endsection
        @include('pages.front_end.abedon_potro.others_abedon.form')
    </form>

@endsection

