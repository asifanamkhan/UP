@extends('layouts.dashboard_layout.master')
@section('content')
    <!-- left Content Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading" style=" color:white; font-size: 14px;text-align:center;"><b>কর আদায়</b></div>
                <div class="panel-body"  style="min-height:310px;">
                    <div class="row">

                        <div class="col-md-12">
                            <div style="padding:4px;width:100%;">
                                <div id="">
                                    <div class="row" style="padding-bottom:20px;margin-top:10px;">
                                        <ul class="nav nav-tabs" id="myTab">
                                            <li class="active"><a data-toggle="tab" href="#boshot_reg"  >বসতভিটার রেজিস্ট্রেশন ফরম</a></li>
                                            <li class=""><a data-toggle="tab"  href="#bosot_kor_aday"  >বসতভিটার কর আদায়</a></li>
                                            <li id="notice_talika" class=""><a data-toggle="tab" href="#menu1"  >ট্রেড লাইসেন্সধারির পেশাজীবি কর</a></li>
                                            <li id="notice_talika" class=""><a data-toggle="tab" href="#menu1"  >ট্রেড লাইসেন্সধারির বসত ভিটা কর</a></li>
                                            <li id="notice_talika" class=""><a data-toggle="tab" href="#menu1"  >বাণিজ্যিক রেজিস্ট্রেশন ফরম</a></li>
                                            <li id="notice_talika" class=""><a data-toggle="tab" href="#menu1"  >ব্যবসায়ী রেজিস্ট্রেশন ফরম</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                {{--বসতভিটার রেজিস্ট্রেশন ফরম--}}

                                <div id="boshot_reg"  class="tab-pane active text-right mt-5">
                                    <div class="row">
                                        <div class="row col-sm-6">
                                            <label for="" class="col-sm-4">নাম (ইংরেজিতে) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="ename" id="ename">
                                        </div>
                                        <div class="row col-sm-6">
                                            <label for="" class="col-sm-4">নাম (বাংলায় ) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="ename" id="ename">
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পিতার নাম (ইংরেজিতে) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="ename" id="ename">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পিতার নাম (বাংলায় ) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="ename" id="ename">
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">মাতার  নাম (ইংরেজিতে) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="ename" id="ename">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">মাতার  নাম (বাংলায় ) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="ename" id="ename">
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">গ্রাম (ইংরেজিতে) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="ename" id="ename">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">গ্রাম (বাংলায় ) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="ename" id="ename">
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পোষ্ট অফিস (ইংরেজিতে) </label>
                                            <input type="text" class="form-control col-sm-8" name="ename" id="ename">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পোষ্ট অফিস (বাংলায় ) </label>
                                            <input type="text" class="form-control col-sm-8" name="ename" id="ename">
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">হোল্ডিং নং<span style="color: red">*</span></label>
                                            <input type="number" class="form-control col-sm-8" name="ename"  id="ename" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">ওয়ার্ড নং <span style="color: red">*</span></label>
                                            <select name="word_no" id="word_no" class="form-control col-sm-8">
                                                <option value="0">চিহ্নিত করুন</option>
                                                <option value="1">1 ওয়ার্ড</option>
                                                <option value="2">2 ওয়ার্ড</option>
                                                <option value="3">3 ওয়ার্ড</option>
                                                <option value="4">4 ওয়ার্ড</option>
                                                <option value="5">5 ওয়ার্ড</option>
                                                <option value="6">6 ওয়ার্ড</option>
                                                <option value="7">7 ওয়ার্ড</option>
                                                <option value="8">8 ওয়ার্ড</option>
                                                <option value="9">9 ওয়ার্ড</option>
                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">জাতীয় পরিচয় পত্র নং </label>
                                            <input type="text" class="form-control col-sm-8" name="ename" id="ename" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">জন্ম নিবন্ধন নং </label>
                                            <input type="text" class="form-control col-sm-8" name="ename" id="ename" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>


                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">বসতভিটার ধরন <span style="color: red">*</span></label>
                                            <select name="word_no" id="word_no" class="form-control col-sm-8">
                                                <option value="0">চিহ্নিত করুন</option>

                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পেশা<span style="color: red">*</span></label>
                                            <select name="word_no" id="word_no" class="form-control col-sm-8">
                                                <option value="0">চিহ্নিত করুন</option>

                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">করের শ্রেনী<span style="color: red">*</span></label>
                                            <select name="word_no" id="word_no" class="form-control col-sm-8">
                                                <option value="0">চিহ্নিত করুন</option>

                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">মোবাইল নং </label>
                                            <input type="text" class="form-control col-sm-8" name="ename" id="ename" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>

                                        <div class="row col-sm-10 mt-4 ">
                                            <label for=""  class="col-sm-4">সরকারী সহযোগিতা পায় কি না<span> <input id="ref" class="" type="checkbox"></span></label>
                                            <input type="text" class="col-sm-8 form-control" name="ref_name" id="ref_name" placeholder="রেফারেন্সের নাম" readonly>
                                        </div>

                                        <div class="col-sm-6 col-sm-offset-1 mt-4">
                                            <a href="" style="background-color: #022241" class="btn btn-success">Submit</a>
                                        </div>
                                    </div>

                                </div>

                                {{--বসতভিটার কর আদায়:--}}

                                <div id="bosot_kor_aday" class="tab-pane">
                                    <div class="row">
                                       <div class="col-md-10 text-right">
                                           <form action="" method="post">
                                               @csrf
                                               <label for="" class="col-sm-3">হোল্ডিং নং :</label>
                                               <input type="text" class="col-sm-7 form-control" placeholder="হোল্ডিং নাম্বার প্রদান করুন">
                                               <button class="btn btn-info col-sm-2" style="background-color: #022241">খোঁজ করুন</button>
                                           </form>
                                       </div>
                                    </div>

                                    {{--data show--}}

                                    <div class="card mt-5">
                                        <div class="card-header font-14 font-weight-bold">dsadds </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                        <tr>
                                                            <th>aa</th>
                                                            <td>aaa</td>
                                                        </tr>
                                                        <tr>
                                                            <th>bb</th>
                                                            <td>bbb</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-sm-6">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                        <tr>
                                                            <th>aa</th>
                                                            <td>aaa</td>
                                                        </tr>
                                                        <tr>
                                                            <th>bb</th>
                                                            <td>bbb</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                            <button style="background-color: #022241;"class="w-100 btn btn-info mt-4">
                                                Holding TAX Payment History
                                            </button>

                                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">

                                                <thead>
                                                <tr>
                                                    <th width="">মামলা নং</th>
                                                    <th>সনদ নং</th>
                                                    <th>বিষয়</th>
                                                    <th>আবেদনের তারিখ</th>
                                                    <th>শুনানীর তারিখ</th>
                                                    <th>অবস্থা</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                            </table>
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

    <link rel="stylesheet" href="{{asset('datatables/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{asset('datatables/css/responsive.bootstrap.min.css')}}" />
    <!--<script type="text/javascript" src="datatables/js/jquery-1.11.3.min.js"></script>--->
    <script type="text/javascript" src="{{asset('datatables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatables/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatables/js/dataTables.responsive.min.js')}}"></script>


    <script>

        $('#ref').on('click',function () {

            if($('#ref').prop('checked')){
                $('#ref_name').prop('readonly',false);

            }
            else{
                $('#ref_name').prop('readonly',true);

            }

        });

        $('#example'). DataTable( {
            "lengthMenu": [[ 25, 50,100, -1], [ 25, 50,100, "All"]],



        });




    </script>



@endsection