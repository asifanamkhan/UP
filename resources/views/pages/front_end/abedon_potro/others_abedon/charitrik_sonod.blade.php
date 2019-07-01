@extends('layouts.front_end_layout.master')
@section('content')
@section('head_content')
    চারিত্রিক সনদ এর জন্য আবেদন ফরম
@endsection

    <form action="{{route('others_sonod_abedon.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="upform" id="upform">
        @csrf
        @section('form')
            <label for="Service List" class="col-sm-3 control-label"> সেবা সমহু  <span>*</span></label>
            <div class="col-sm-3">
                <select name="" id="" class="form-control" required disabled >
                    <option value="1" >চারিত্রিক সনদ</option>
                </select>
                <input type="hidden" value="2" name="serviceList">
            </div>
        @endsection
        @include('pages.front_end.abedon_potro.others_abedon.form')
    </form>

@endsection

<script src="{{asset('js/front_end/otherService_form.js')}}" type="text/javascript"></script>
