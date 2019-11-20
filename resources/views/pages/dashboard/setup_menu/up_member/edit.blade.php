@extends('layouts.dashboard_layout.master')
@section('content')
    <div class="panel panel-default mb-5">
        <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>ইউনিয়ন পরিষদ সদস্য যোগ করুন</b></div>
        <div class="panel-body" >
            <form action="{{route('upmember.update',$upmember->id)}}" method="post" id="form" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group row ">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-4">
                        <img src="{{url('images/'.$upmember->image.'')}}" alt="" width="120px" height="100px" >
                    </div>
                    <div class="col-sm-3"></div>
                </div>
                <div class="form-group row ">
                    <label for="Picture" class="col-sm-4 control-label text-right">ছবি <span style="color: red">*</span></label>
                    <div class="col-sm-7">
                        <input type="file" value="{{$upmember->image}}" name="image" id="image" class="form-control input-file-sm {{ $errors->has('image') ? ' is-invalid' : '' }}"/>
                        <input type="hidden" value="{{$upmember->image}}" name="oldImage">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="" class="col-sm-5 control-label text-md-right">পদবী নির্বাচন করুন<span style="color: red">*</span> </label>
                        <div class="col-md-7">
                            <select name="designation" id="" class="form-control {{ $errors->has('designation') ? ' is-invalid' : '' }}">
                                <option value="0">চিহ্নিত করুন</option>
                                <option @if($upmember->designation==1) selected @endif value="1">চেয়ারম্যান</option>
                                <option @if($upmember->designation==2) selected @endif value="2">মেম্বার</option>
                                <option @if($upmember->designation==3) selected @endif value="3">সচিব</option>
                                <option @if($upmember->designation==4) selected @endif value="4">গ্রাম পুলিশ</option>
                                <option @if($upmember->designation==5) selected @endif value="5">উদ্যোক্তা</option>
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
                            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{$upmember->name}}">
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
                            <input type="text" class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" id="fname" value="{{$upmember->fname}}">
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
                            <select name="mstatus" id="mstatus" class="form-control js-example-basic-single {{ $errors->has('mstatus') ? ' is-invalid' : '' }} ">
                                <option value="0">চিহ্নিত করুন</option>
                                <option @if($upmember->mstatus==1) selected @endif value="1">বিবাহিত</option>
                                <option @if($upmember->mstatus==2) selected @endif value="2">অবিবাহিত</option>
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
                            <input type="text" value="{{$upmember->votar_no}}" class="form-control {{ $errors->has('votar_no') ? ' is-invalid' : '' }}" name="votar_no" id="votar_no">
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
                            <input type="text" value="{{$upmember->nid}}" class="form-control {{ $errors->has('nid') ? ' is-invalid' : '' }}" name="nid" id="nid">
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
                            <input type="text" value="{{$upmember->pasport}}" class="form-control {{ $errors->has('pasport') ? ' is-invalid' : '' }}" name="pasport" id="pasport">
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
                                    <option @if($occas->id==$upmember->occupation) selected @endif value="{{$occas->id}}">{{$occas->occupation}}</option>
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
                            <input type="text" value="{{$upmember->masik_ay}}" class="form-control {{ $errors->has('masik_ay') ? ' is-invalid' : '' }}" name="masik_ay" id="masik_ay">
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
                            <input type="text" value="{{$upmember->sompod}}"  class="form-control {{ $errors->has('sompod') ? ' is-invalid' : '' }}" name="sompod" id="sompod">
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
                            <input type="date" value="{{$upmember->join_date}}" class="form-control {{ $errors->has('join_date') ? ' is-invalid' : '' }}" name="join_date" id="join_date">
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
                            <input type="date" value="{{$upmember->sopoth_date}}" class="form-control {{ $errors->has('sopoth_date') ? ' is-invalid' : '' }}" name="sopoth_date" id="sopoth_date">
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
                            <input type="text" value="{{$upmember->chele_meyer_songkha}}" class="form-control {{ $errors->has('chele_meyer_songkha') ? ' is-invalid' : '' }}" name="chele_meyer_songkha" id="chele_meyer_songkha">
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
                            <input type="text" value="{{$upmember->bank_acc_no}}" class="form-control {{ $errors->has('bank_acc_no') ? ' is-invalid' : '' }}" name="bank_acc_no" id="bank_acc_no  ">
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
                            <input type="text" value="{{$upmember->present_address}}" class="form-control {{ $errors->has('present_address') ? ' is-invalid' : '' }}" name="present_address" id="present_address">
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
                            <input type="text" value="{{$upmember->post_address}}" class="form-control {{ $errors->has('post_address') ? ' is-invalid' : '' }}" name="post_address" id="post_address  ">
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
                            <input type="text" value="{{$upmember->mob}}" class="form-control {{ $errors->has('mob') ? ' is-invalid' : '' }}" name="mob" id="name">
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
                            <input type="text" value="{{$upmember->email}}" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email  ">
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
@endsection
