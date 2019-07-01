@extends('layouts.dashboard_layout.master')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor mb-0 mt-0">ট্রেড লাইসেন্স</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item">আবেদন পত্র</li>
                <li class="breadcrumb-item active">ট্রেড লাইসেন্স সনদ  ফি ফরম </li>
            </ol>
        </div>
    </div>

    <!-- left Content Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading" style=" color:white; font-size: 16px;background:#40A291;text-align:center;">ট্রেড লাইসেন্স সনদ  ফি ফরম </div>
                <div class="panel-body"  style="min-height:310px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="padding:4px;width:100%;">
                                <form action="{{route('tradeFee',$fee->id)}}" method="post">
                                    @csrf
                                    <div id="" style="font-weight: bold">
                                        <div class='row mt-4 text-right'>

                                            <label for="" class="col-md-2">ক্রমিক নং :</label>

                                            <div class='col-md-4'>
                                                <input type="text" class="form-control" value="{{$fee->id}}" disabled>
                                            </div>

                                            <div class='col-md-2'>
                                                <label for="">ট্র্যাকিং নং :</label>
                                            </div>
                                            <div class='col-md-3'>
                                                <input type="text" class="form-control" value="{{$fee->token}}" disabled>
                                            </div>
                                        </div>
                                        <div class='row mt-4 text-right'>

                                            <label for="" class="col-md-2">প্রতিষ্ঠানের নাম :</label>

                                            <div class='col-md-4'>
                                                <input type="text" class="form-control" value="{{$fee->bcomname}}" disabled>
                                            </div>

                                            <div class='col-md-2'>
                                                <label for="">ব্যবসার ধরন :</label>
                                            </div>
                                            <div class='col-md-3'>
                                                <input type="text" class="form-control" value="{{$fee->business_type}}" disabled>
                                            </div>
                                        </div>
                                        <div class='row mt-4 text-right'>

                                            <label for="" class="col-md-2">Payment Type:</label>

                                            <div class='col-md-4'>
                                                <select name="payment_type" id="" class="form-control">
                                                    <option value="">asd</option>
                                                </select>
                                            </div>

                                            <div class='col-md-2'>
                                                <label for="">ইস্যুকৃত তারিখ :</label>
                                            </div>
                                            <div class='col-md-3'>
                                                <input type="text" class="form-control" value="{{$fee->created_at->toDateString()}}">
                                            </div>
                                        </div>
                                        <div class='row mt-4 text-right'>

                                            <label for="" class="col-md-2">মেয়াদকাল :</label>

                                            <div class='col-md-4'>
                                                <input type="text" name="endDate" class="form-control" value="{{$dadeline}}" disabled>
                                            </div>

                                            <div class='col-md-2'>
                                                <label for="" style="color: red">ট্রেড লাইসেন্স ফি :</label>
                                            </div>
                                            <div class='col-md-3'>
                                                <input type="text" class="form-control" name="tradeFee" id="tradeFee">
                                            </div>
                                        </div>
                                        <div class='row mt-4 text-right'>

                                            <label for="" class="col-md-2">সাইনবোর্ড কর(বার্ষিক) :</label>

                                            <div class="col-md-1 text-left">
                                                <input type="checkbox" name="signBoardTax" id="signBoardTax"> হাঁ
                                            </div>

                                            <div class='col-md-3'>
                                                <input type="text" class="form-control" name="signBoardTaxField" id="signBoardTaxField" disabled>
                                            </div>

                                            <div class='col-md-2'>
                                                <label for="" >বকেয়া টাকার পরিমান :</label>
                                            </div>
                                            <div class='col-md-3'>
                                                <input type="text" class="form-control" name="dueFee"  id="dueFee">
                                            </div>
                                        </div>
                                        <div class='row mt-4 text-right'>

                                            <label for="" class="col-md-2">সুপারিশ সাপেক্ষে (ছাড়) :</label>

                                            <div class="col-md-1 text-left">
                                                <input type="checkbox" value="1" id="suparishCheck" > হাঁ
                                            </div>

                                            <div class='col-md-3'>
                                                <input type="text" class="form-control" name="suparishFee" id="suparishFee" disabled>
                                            </div>

                                            <div class='col-md-2'>
                                                <label for="" >ভ্যাট(১৫%) :</label>
                                            </div>
                                            <div class='col-md-3'>
                                                <input type="text" class="form-control" name="vat" id="vat">
                                            </div>
                                        </div>
                                        <div class='row mt-4 text-right'>

                                            <label for="" class="col-md-2"></label>

                                            <div class="col-md-1 text-left">

                                            </div>

                                            <div class='col-md-3'>
                                            </div>

                                            <div class='col-md-2'>
                                                <label for="" style="color: blue" >সাব চার্জ :</label>
                                            </div>
                                            <div class='col-md-3'>
                                                <input type="text" class="form-control" name="subCharge" id="subCharge">
                                            </div>
                                        </div>
                                        <div class='row mt-4 text-right'>

                                            <label for="" class="col-md-2"></label>

                                            <div class="col-md-1 text-left">

                                            </div>

                                            <div class='col-md-3'>
                                            </div>

                                            <div class='col-md-2'>
                                                <label for="" style="color: red" >মোট পরিমান :</label>
                                            </div>
                                            <div class='col-md-3'>
                                                <input type="text" class="form-control" name="total" id="total">
                                            </div>
                                        </div>
                                        <div class='row mt-4 text-right'>

                                            <label for="" class="col-md-2"></label>

                                            <div class="col-md-1 text-left">

                                            </div>

                                            <div class='col-md-3'>
                                            </div>

                                            <div class='col-md-2'>
                                                <label for="" >Payment Date :</label>
                                            </div>
                                            <div class='col-md-3'>
                                                <input type="date" class="form-control" value="{{$dadeline}}">
                                            </div>
                                        </div>
                                        <div class='row mt-4 text-right'>

                                            <label for="" class="col-md-2"></label>

                                            <div class="col-md-1 text-left">

                                            </div>

                                            <div class='col-md-3'>
                                            </div>

                                            <div class='col-md-2'>

                                            </div>
                                            <div class='col-md-3'>
                                                <button class="btn btn-info" id="generate">Generate</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('script')

    <script>

        $(document).on('change keyup','#tradeFee',function () {
            var value = $('#tradeFee').val();
            console.log(value);
            //$('#total').val(value);
            calculation();

        });
        $(document).on('change keyup','#dueFee',function () {
            var value = $('#tradeFee').val();
            console.log(value);
            //$('#total').val(value);
            calculation();

        });
        $(document).on('change keyup','#suparishFee',function () {

            //$('#total').val(value);
            calculation();



        });
        $(document).on('change keyup','#signBoardTaxField',function () {

            //$('#total').val(value);
            calculation();



        });
        $(document).on('change keyup','#subCharge',function () {

            //$('#total').val(value);
            calculation();



        });


        $(document).on('click','#suparishCheck',function () {

           $('#suparishFee').prop( "disabled", false );
        });
        $(document).off('click','#suparishCheck',function () {

            $('#suparishFee').prop( "disabled", true );
        });

        $(document).on('click','#signBoardTax',function () {

            $('#signBoardTaxField').prop( "disabled", false );
        });
        $(document).off('click','#signBoardTax',function () {

            $('#signBoardTaxField').prop( "disabled", true );
        });




        function calculation() {
            var sum = 0;
            var vat = 0;
            $("#tradeFee").each(function(){
                vat += +($('#tradeFee').val()-(-$('#dueFee').val())-($('#suparishFee').val()))*.15;
                $("#vat").val(vat);

                sum += +$('#tradeFee').val()-(-$('#dueFee').val())-(-vat)-(-$('#signBoardTaxField').val())-(-$('#subCharge').val())-($('#suparishFee').val());
                $("#total").val(sum);

            })

        }

        $(document).on('click','#generate',function (e) {

            if($('#tradeFee').val() == ''){
                e.preventDefault();
                alert('দয়া করে ট্রেড লাইসেন্স ফি প্রবেশ করুন.');

            }
            else {
                if($('#subCharge').val() == ''){
                    e.preventDefault();
                    alert('দয়া করে সাব চার্জ পরিমান প্রবেশ করুন.');
                }
                else{
                    alert('ধন্যবাদ !! আপনার আবেদনটি গ্রহন করা হয়েছে');
                }
            }
        });


    </script>



@endsection