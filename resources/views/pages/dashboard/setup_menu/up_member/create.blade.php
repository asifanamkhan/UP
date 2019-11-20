@extends('layouts.dashboard_layout.master')
@section('content')
    <div class="panel panel-default mb-5">
        <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>ইউনিয়ন পরিষদ সদস্য যোগ করুন</b></div>
        <div class="panel-body" >
            <form action="{{route('upmember.store')}}" method="post" id="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group row ">
                    <label for="Picture" class="col-sm-4 control-label text-right">ছবি <span style="color: red">*</span></label>
                    <div class="col-sm-7">
                         <input type="file" name="image" id="image" class="form-control input-file-sm {{ $errors->has('image') ? ' is-invalid' : '' }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="" class="col-sm-5 control-label text-md-right">পদবী নির্বাচন করুন<span style="color: red">*</span> </label>
                        <div class="col-md-7">
                            <select name="designation" id="" class="form-control {{ $errors->has('designation') ? ' is-invalid' : '' }}">
                                <option value="0">চিহ্নিত করুন</option>
                                <option value="1">চেয়ারম্যান</option>
                                <option value="2">মেম্বার</option>
                                <option value="3">সচিব</option>
                                <option value="4">গ্রাম পুলিশ</option>
                                <option value="5">উদ্যোক্তা</option>
                            </select>
                            @if ($errors->has('designation'))
                                <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('designation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="col-sm-4  control-label text-md-right">নাম (বাংলায়)<span style="color: red">*</span> </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="" class="col-sm-5 control-label text-md-right">পিতার নাম (বাংলায়)<span style="color: red">*</span> </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" id="fname">
                            @if ($errors->has('fname'))
                            <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('fname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="col-sm-4  control-label text-md-right">বৈবাহিক সম্পর্ক </label>
                        <div class="col-md-7">
                            <select name="mstatus" id="mstatus" class="form-control js-example-basic-single {{ $errors->has('mstatus') ? ' is-invalid' : '' }}">
                                <option value="0">চিহ্নিত করুন</option>
                                <option value="1">বিবাহিত</option>
                                <option value="2">অবিবাহিত</option>
                            </select>
                            @if ($errors->has('mstatus'))
                                <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('mstatus') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="" class="col-sm-5 control-label text-md-right">ভোটার নং </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control {{ $errors->has('votar_no') ? ' is-invalid' : '' }}" name="votar_no" id="votar_no">
                            @if ($errors->has('votar_no'))
                                <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('votar_no') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="col-sm-4  control-label text-md-right">জাতীয় পরিচয় পত্র নং </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control {{ $errors->has('votar_no') ? ' is-invalid' : '' }}" name="nid" id="nid">
                            @if ($errors->has('nid'))
                                <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('nid') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="" class="col-sm-5 control-label text-md-right">পাসপোর্ট নং(যদি থাকে) </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control {{ $errors->has('pasport') ? ' is-invalid' : '' }}" name="pasport" id="pasport">
                            @if ($errors->has('pasport'))
                                <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('pasport') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="col-sm-4  control-label text-md-right">পেশা </label>
                        <div class="col-md-7">
                            <select name="occupation" id="occupation" class="form-control js-example-basic-single {{ $errors->has('mstatus') ? ' is-invalid' : '' }} ">
                                <option value="0">চিহ্নিত করুন</option>
                                @foreach($occa as $occas)
                                    <option value="{{$occas->id}}">{{$occas->occupation}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('occupation'))
                                <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('occupation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="" class="col-sm-5 control-label text-md-right">মাসিক আয় </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control {{ $errors->has('masik_ay') ? ' is-invalid' : '' }}" name="masik_ay" id="masik_ay">
                            @if ($errors->has('masik_ay'))
                                <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('masik_ay') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="col-sm-4  control-label text-md-right">সম্পদের তথ্য </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control {{ $errors->has('post_address') ? ' is-invalid' : '' }}" name="sompod" id="sompod">
                            @if ($errors->has('sompod'))
                                <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('sompod') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="" class="col-sm-5 control-label text-md-right">দায়িত্ব গ্রহনের শুরুর তারিখ<span style="color: red">*</span> </label>
                        <div class="col-md-7">
                            <input type="date" class="form-control {{ $errors->has('join_date') ? ' is-invalid' : '' }}" name="join_date" id="join_date">
                            @if ($errors->has('join_date'))
                                <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('join_date') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="col-sm-4  control-label text-md-right">শপথ গ্রহনের তারিখ </label>
                        <div class="col-md-7">
                            <input type="date" class="form-control {{ $errors->has('sopoth_date') ? ' is-invalid' : '' }}" name="sopoth_date" id="sopoth_date">
                            @if ($errors->has('sopoth_date'))
                                <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('sopoth_date') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="" class="col-sm-5 control-label text-md-right">পরিবারের ছেলে মেয়ের সংখ্যা </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control {{ $errors->has('chele_meyer_songkha') ? ' is-invalid' : '' }}" name="chele_meyer_songkha" id="chele_meyer_songkha">
                            @if ($errors->has('chele_meyer_songkha'))
                                <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('chele_meyer_songkha') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="col-sm-4  control-label text-md-right">ব্যাংক অ্যাকাউন্ট/মোবাইল ব্যাংকিং </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control {{ $errors->has('bank_acc_no') ? ' is-invalid' : '' }}" name="bank_acc_no" id="bank_acc_no  ">
                            @if ($errors->has('bank_acc_no'))
                                <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('bank_acc_no') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="" class="col-sm-5 control-label text-md-right">বর্তমান ঠিকানা<span style="color: red">*</span> </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control {{ $errors->has('present_address') ? ' is-invalid' : '' }}" name="present_address" id="present_address">
                            @if ($errors->has('present_address'))
                                <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('present_address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="col-sm-4  control-label text-md-right">স্থায়ী ঠিকানা </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control {{ $errors->has('post_address') ? ' is-invalid' : '' }}" name="post_address" id="post_address  ">
                            @if ($errors->has('post_address'))
                                <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('post_address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="" class="col-sm-5 control-label text-md-right">মোবাইল নং<span style="color: red">*</span> </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control {{ $errors->has('mob') ? ' is-invalid' : '' }}" name="mob" id="name">
                            @if ($errors->has('mob'))
                                <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('mob') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="col-sm-4  control-label text-md-right">ইমেইল</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email  ">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" >
                                    <strong>{{ $errors->first('email') }}</strong>
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
        <div class="card-header text-center"><b>ইউনিয়ন পরিষদ সদস্য তালিকা</b></div>
        <div class="card-body" >
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">
                <thead>
                <tr>
                    <th width="">ক্র.নং</th>
                    <th>ছবি</th>
                    <th>পদবী</th>
                    <th>নাম</th>
                    <th>জাতীয় পরিচয় পত্র নং</th>
                    <th>দায়িত্ব গ্রহনের শুরুর তারিখ</th>
                    <th>মোবাইল নং</th>
                    <th >অবস্থা</th>
                    <th>Action</th>
                </tr>
                </thead>
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
`
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

    <script>



        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        $('#example'). DataTable( {
            "lengthMenu": [[ 25, 50,100, -1], [ 25, 50,100, "All"]],

            "processing": true,
            "serverSide": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},

            "ajax":{
                "url": "{{ route('upmemberShow') }}",
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{ csrf_token() }}"},

            },
            "columns": [
                { "data": "id" },
                { "data": "image" },
                { "data": "designation" },
                { "data": "name" },
                { "data": "nid" },
                { "data": "join_date" },
                { "data": "mob" },
                { "data": "status" },
                { "data": "action" },

            ]
        });

    </script>
@endsection