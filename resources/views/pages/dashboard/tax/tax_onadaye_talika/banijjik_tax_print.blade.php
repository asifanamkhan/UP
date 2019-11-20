<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>  ইউনিয়ন পরিষদ বাংলাদেশ</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                <p style="text-align: center;">{{$word_no}}  নং ওয়ার্ড এর বাণিজ্যিক ট্যাক্স অনাদায়ী তালিকা</p>
                <small class="float-right">তারিখ: {{ $date }}</small>
            </div>
            <!-- /.col -->
        </div>
        <br>
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped table-hover" style="text-align: center;font-size: 11px;" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="">ক্র.নং</th>
                        <th>মালিকের নাম</th>
                        <th>বাণিজ্যিক হোল্ডিং নং</th>
                        <th>গ্রাম </th>
                        <th>রুম সংখ্যা</th>
                        <th>মাসিক ভাড়া</th>
                        <th>কর নির্ধারণের শুরুর সন</th>
                        <th>সর্বশেষ কর পরিষদের অর্থবছর</th>
                        <th>মাসিক ভাড়ার ট্যাক্স</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($taxs as $tax)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tax->ownerBname }}</td>
                            <td>{{ $tax->holding_no }}</td>
                            <td>{{ $tax->gram }}</td>
                            <td>{{ $tax->room_no }}</td>
                            <td>{{ $tax->mashik_vara }}</td>
                            <td>{{ $tax->tax_start_date }}</td>
                            <td>{{ $tax->last_tax_pay_date }}</td>
                            <td>{{ $tax->mashik_vara_tax }}</td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>


                </table>
            </div>
        </div>

    </section>

</div>

</body>
</html>
