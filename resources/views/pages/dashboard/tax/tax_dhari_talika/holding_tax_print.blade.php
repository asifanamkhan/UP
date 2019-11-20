<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>  ইউনিয়ন পরিষদ বাংলাদেশ</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
</head>
<body onload="window.print();">
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <div class="logo " style="text-align: center">
                    <a href=" "><img src="{{asset('images/front_end/logo.png')}}" alt="logo" height="68px" width="70px" /></a>
                </div>
                <h2 class="page-header" style="text-align: center;">
                    ইউনিয়ন পরিষদ বাংলাদেশ
                </h2>
                <p style="text-align: center;">{{$word_no}}  নং ওয়ার্ড এর হোল্ডিং টাক্সধারীদের তালিকা</p>
                <small class="float-right">তারিখ: {{ $date }}</small>
            </div>
            <!-- /.col -->
        </div>
        <br>
        <!-- info row -->
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped table-hover" style="text-align: center;font-size: 11px;" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ক্র.নং</th>
                        <th>মালিকের নাম</th>
                        <th>হোল্ডিং নম্বর</th>
                        <th>বসতভিটার ধরন</th>
                        <th>রুম সংখ্যা</th>
                        <th>পেশা</th>
                        <th>করের শ্রেনী</th>
                        <th>কর নির্ধারণের শুরুর সন</th>
                        <th>ধার্যকৃত কর</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($taxs as $tax)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tax->bname }}</td>
                            <td>{{ $tax->holding_no }}</td>
                            <td>{{ $tax->bosot_vitar_dhorons->bosot_vitar_dhoron }}</td>
                            <td>{{ $tax->room_no }}</td>
                            <td>{{ $tax->occupations->occupation }}</td>
                            <td>{{ $tax->tax_classs->tax_class }}</td>
                            <td>{{ $tax->tax_start_date }}</td>
                            <td>{{ $tax->tax_amount }}</td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>


                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
