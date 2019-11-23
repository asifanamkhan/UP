@extends('layouts.dashboard_layout.master')
@section('content')
    <!-- left Content Start-->

    <div class="panel panel-default">
        <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>পাবলিক স্ট্যাটাস পরিবর্তন</b></div>
        <div class="panel-body"  style="min-height:310px;">
            <div class="row mb-5">
               <table class="table table-bordered">
                   <tr>
                       <th>নাম</th>
                       <td>{{$public->bname}}</td>
                   </tr>
                   <tr>
                       <th>পিতার নাম</th>
                       <td>{{$public->bfname}}</td>
                   </tr>
                   <tr>
                       <th>মাতার নাম</th>
                       <td>{{$public->bmname}}</td>
                   </tr>
                   <tr>
                       <th>ওয়ার্ড নং</th>
                       <td>{{$public->word_no}}</td>
                   </tr>
                   <tr>
                       <th>গ্রাম</th>
                       <td>{{$public->b_gram}}</td>
                   </tr>
                   <tr>
                       <th>হোল্ডিং নম্বর</th>
                       <td>{{$public->holding_no}}</td>
                   </tr>
                   <tr>
                       <th>স্ট্যাটাস</th>
                       @if($public->status==0)
                           <td style="color:red;">ডিএকটিভ</td>
                           @else
                            <td style="color: green">একটিভ</td>
                       @endif

                   </tr>
               </table>
            </div>
                <form action="{{route('publicStatusChange',$public->id)}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="contact_no" class="col-md-3 col-form-label text-md-right font-weight-bold" style="color: black">স্ট্যাটাস পরিবর্তন</label>
                        <div class="col-md-6">
                            <select name="status" id="status" class=" form-control{{ $errors->has('status') ? ' is-invalid' : '' }}">
                                <option value="">Select</option>
                                <option value="1">একটিভ</option>
                                <option value="0">ডিএকটিভ</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="invalid-feedback" >
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-10 offset-md-5">
                            <button type="submit" id="submit" class="btn btn-info">
                                {{ __('পরিবর্তন করুন') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')

@endsection