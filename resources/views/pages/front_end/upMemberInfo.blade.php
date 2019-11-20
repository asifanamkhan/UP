@extends('layouts.front_end_layout.master')
@section('head_content')
    ইউনিয়ন কর্মকর্তা ও কর্মচারীবৃন্দ তথ্য
@endsection
@section('content')
    <div class="panel panel-default mb-5">
        <div class="panel-body" >
            <div class="row">
                <div class="col-sm-12" style="margin-bottom:10px;margin-top:10px;">
                    <div class="form-group row ">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-4">
                            <img src="{{url('images/'.$up_member->image.'')}}" alt="" width="120px" height="100px" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>পদবী</th>
                                <td>
                                    @if($up_member->designation==1)
                                        চেয়ারম্যান
                                    @elseif($up_member->designation==2)
                                        মেম্বার
                                    @elseif($up_member->designation==3)
                                        সচিব
                                    @elseif($up_member->designation==4)
                                        গ্রাম পুলিশ
                                    @elseif($up_member->designation==5)
                                        উদ্যোক্তা
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>নাম </th>
                                <td>{{$up_member->name}} </td>
                            </tr>
                            <tr>
                                <th>পিতার নাম</th>
                                <td>{{$up_member->fname}} </td>
                            </tr>
                            <tr>
                                <th>বৈবাহিক সম্পর্ক </th>
                                <td>
                                    @if($up_member->mstatus==1)
                                        বিবাহিত
                                    @elseif($up_member->mstatus==2)
                                        অবিবাহিত
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>ভোটার নং </th>
                                <td>{{$up_member->votar_no}} </td>
                            </tr>
                            <tr>
                                <th>জাতীয় পরিচয় পত্র </th>
                                <td>{{$up_member->nid}} </td>
                            </tr>
                            <tr>
                                <th>পাসপোর্ট নং</th>
                                <td>{{$up_member->pasport}} </td>
                            </tr>

                            <tr>
                                <th>মোবাইল নং </th>
                                <td>{{$up_member->mob}} </td>
                            </tr>
                            <tr>
                                <th>ইমেইল</th>
                                <td>{{$up_member->email}} </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>পেশা </th>
                                <td>
                                    @if(!empty($up_member->occupation))
                                        {{$up_member->occupations->occupation}}
                                        @else
                                        নাই
                                        @endif
                                </td>
                            </tr>
                            <tr>
                                <th>মাসিক আয় </th>
                                <td>{{$up_member->masik_ay}} </td>
                            </tr>
                            <tr>
                                <th>সম্পদের তথ্য </th>
                                <td>{{$up_member->sompod}} </td>
                            </tr>
                            <tr>
                                <th>দায়িত্ব গ্রহনের শুরুর তারিখ </th>
                                <td>{{$up_member->join_date}} </td>
                            </tr><tr>
                                <th>শপথ গ্রহনের তারিখ </th>
                                <td>{{$up_member->sopoth_date}} </td>
                            </tr><tr>
                                <th>পরিবারের ছেলে মেয়ের সংখ্যা </th>
                                <td>{{$up_member->chele_meyer_songkha}} </td>
                            </tr><tr>
                                <th>ব্যাংক অ্যাকাউন্ট/মোবাইল ব্যাংকিং </th>
                                <td>{{$up_member->bank_acc_no}} </td>
                            </tr>
                            <tr>
                                <th>বর্তমান ঠিকানা </th>
                                <td>{{$up_member->present_address}} </td>
                            </tr>
                            <tr>
                                <th>স্থায়ী ঠিকানা </th>
                                <td>{{$up_member->post_address}} </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection
@section('script')

@endsection
