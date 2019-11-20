@extends('layouts.dashboard_layout.master')
@section('content')
    <!-- left Content Start-->

    <div class="panel panel-default">
        <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>হোল্ডিং ট্যাক্স অনাদায়ী তালিকা</b></div>
        <div class="panel-body"  style="min-height:310px;">

            <div class="row mb-5">
                <label for=""class="col-sm-2 text-right">ওয়ার্ড নং <span style="color: red">*</span></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="word_no">
                </div>
                <label for=""class="col-sm-2 text-right">অর্থবছর <span style="color: red">*</span></label>
                <div class="col-sm-3">
                    <select name="last_tax_pay_date" id="last_tax_pay_date" class="form-control js-example-basic-single">
                        <option value="0">চিহ্নিত করুন</option>
                        <option value="1" > সকল </option>
                        <option value="2025-2026" > 2025-2026 </option>
                        <option value="2024-2025" > 2024-2025 </option>
                        <option value="2023-2024" > 2023-2024 </option>
                        <option value="2022-2023" > 2022-2023 </option>
                        <option value="2021-2022" > 2021-2022 </option>
                        <option value="2020-2021" > 2020-2021 </option>
                        <option value="2019-2020" > 2019-2020 </option>
                        <option value="2018-2019" > 2018-2019 </option>
                        <option value="2017-2018" > 2017-2018 </option>
                        <option value="2016-2017" > 2016-2017 </option>
                        <option value="2015-2016" > 2015-2016 </option>
                        <option value="2014-2015" > 2014-2015 </option>
                        <option value="2013-2014" > 2013-2014 </option>
                        <option value="2012-2013" > 2012-2013 </option>
                    </select>
                </div>
                <div class=" col-sm-2">
                    <button class="btn btn-info" id="search" style="background-color: #022241">Search</button>
                </div>
            </div>

            <div class="mb-5">
                <a href="#" class="btn btn-info" id="print" style="background-color: #022241"><i class="fa fa-print"> Print</i></a>
            </div>

            <div id="table ">
                <table id="example" class=" table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">
                    <thead>
                    <tr>
                        <th width="">ক্র.নং</th>
                        <th>মালিকের নাম</th>
                        <th>হোল্ডিং নম্বর</th>
                        <th>বসতভিটার ধরন</th>
                        <th>রুম সংখ্যা</th>
                        <th>পেশা</th>
                        <th>করের শ্রেনী</th>
                        <th width="12%">সর্বশেষ কর পরিশোধের অর্থবছর</th>
                        <th>ধার্যকৃত কর</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <link rel="stylesheet" href="{{asset('datatables/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{asset('datatables/css/responsive.bootstrap.min.css')}}" />
    <script type="text/javascript" src="{{asset('datatables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatables/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatables/js/dataTables.responsive.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>


    <script>


        $(document).ready(function() {
            $('#table'). hide();
        } );

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });



        $('#search').on('click',function () {
            var word_no=$('#word_no').val();
            var last_tax_pay_date=$('#last_tax_pay_date').val();
            var href='holding_Tax_onadaye_print'+'/'+word_no+'/'+last_tax_pay_date;
            $('#print').attr('href',href);
            $('#print').attr('target','_blank');
            $('#table'). show();
            $('#example').DataTable().destroy();
            $('#example'). DataTable( {
                "lengthMenu": [[ 25, 50,100,200,300], [ 25, 50,100,200,300]],
                //"bInfo": false,
                "bFilter": false,
                "processing": true,
                "serverSide": true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},

                "ajax":{
                    "url": "{{ route('taxOandayeTalikaShow') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{ csrf_token() }}",
                        word_no:$('#word_no').val(),
                        last_tax_pay_date:$('#last_tax_pay_date').val(),
                    }
                },

                "columns": [
                    { "data": "id" },
                    { "data": "bname" },
                    { "data": "holding_no" },
                    { "data": "bosot_vitar_dhoron" },
                    { "data": "room_no" },
                    { "data": "occupation" },
                    { "data": "tax_class" },
                    { "data": "tax_start_date" },
                    { "data": "tax_amount" },
                ],
            });
        });


    </script>

@endsection