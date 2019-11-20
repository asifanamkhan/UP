@extends('layouts.dashboard_layout.master')
@section('content')
    <div class="panel panel-default mb-5">
        <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>ট্রেড লাইসেন্স ট্যাক্স ফি নির্ধারণ </b></div>
            <div class="panel-body" >
                <form action="{{route('tradeLicenseFeestore')}}" method="post">
                    @csrf
                    <div class="col-sm-9">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 control-label text-right">প্রতিষ্ঠানের শ্রেণী<span style="color: red">*</span> </label>
                            <div class="col-sm-8">
                                <input type="text" name="business_type" id="business_type" class="form-control {{ $errors->has('business_type') ? ' is-invalid' : '' }}" placeholder="Ex: ঔষধের দোকান "/>
                                @if ($errors->has('business_type'))
                                    <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('business_type') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-4 control-label text-right">মূলধন<span style="color: red">*</span> </label>
                            <div class="col-sm-8">
                                <input type="text" name="muldhon" id="muldhon" class="form-control {{ $errors->has('muldhon') ? ' is-invalid' : '' }}" placeholder="Ex: ১০০০০ "/>
                                @if ($errors->has('muldhon'))
                                    <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('muldhon') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-4 control-label text-right">টাকার পরিমাণ<span style="color: red">*</span> </label>
                            <div class="col-sm-8">
                                <input type="number" name="amount" id="amount" class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" min="0" placeholder="ইংরেজীতে টাকার পরিমান প্রদান করুন "/>
                                    @if ($errors->has('amount'))
                                        <span class="invalid-feedback" >
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success col-sm-offset-5 mt-4" id="submit_button" style="background-color: green">যোগ করুন</button>
                </form>
            </div>
        </div>

    {{--বসতভিটার ধরন এর তালিকা--}}
    <div class="card mt-5">
        <div class="card-header text-center"><b>শ্রেণীর তালিকা</b></div>
        <div class="card-body" >
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">
                <thead>
                    <tr>
                        <th width="">ক্র.নং</th>
                        <th>লাইন্সেসের ধরন</th>
                        <th>টাকার পরিমাণ</th>
                        <th>সর্বশেষ আপডেট</th>
                        <th>অবস্থা</th>
                        <th>Action</th>
                    </tr>
                </thead> <f5>                                               F5F55                    5 f</f5>
            </table>
        </div>
    </div>

@endsection
@section('script')
    <link rel="stylesheet" href="{{asset('datatables/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{asset('datatables/css/responsive.bootstrap.min.css')}}" />
    <script type="text/javascript" src="{{asset('datatables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatables/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatables/js/dataTables.responsive.min.js')}}"></script>

    <script>
        $('#example'). DataTable( {
            "lengthMenu": [[ 25, 50,100, -1], [ 25, 50,100, "All"]],

            "processing": true,
            "serverSide": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},

            "ajax":{
                "url": "{{ route('tradeLicenseFeeShow') }}",
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{ csrf_token() }}"},

            },
            "columns": [
                { "data": "id" },
                { "data": "business_type" },
                { "data": "amount" },
                { "data": "updated_at" },
                { "data": "status" },
                { "data": "action" },
            ]
        });

    </script>
@endsection