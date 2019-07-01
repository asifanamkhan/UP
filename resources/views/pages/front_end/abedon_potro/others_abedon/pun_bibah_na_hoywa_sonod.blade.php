@extends('layouts.front_end_layout.master')
@section('head_content')
    পুনঃ বিবাহ না হওয়া সনদ
@endsection
@section('content')
    <form action="{{route('others_sonod_abedon.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="upform" id="upform">
        @csrf
        @section('form')
            <label for="Service List" class="col-sm-3 control-label"> সেবা সমহু  <span>*</span></label>
            <div class="col-sm-3">
                <select name="" id="" class="form-control" required disabled >
                    <option value="" >পুনঃ বিবাহ না হওয়া সনদ</option>
                </select>
                <input type="hidden" value="5" name="serviceList">
            </div>
        @endsection
        @include('pages.front_end.abedon_potro.others_abedon.form')
    </form>

@endsection

