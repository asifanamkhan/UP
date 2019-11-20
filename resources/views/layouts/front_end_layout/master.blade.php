<!DOCTYPE html>
<html lang="en" lang="bn">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    @include('layouts.front_end_layout.head')
    <style>
        .error {
            color: #EB5E28;
        }

        .success {
            color: #7AC29A;
        }
    </style>
</head>
<body>
<div class="main">

    @include('layouts.front_end_layout.nav')

<div class="main_con"><!--Content Start-->
    <div class="row"><!--- row start--->
        <div class="col-md-9 left_con"><!-- left Content Start-->
            <div class="row">
                <div class="col-md-12"><!-- Welcome Massage Start-->
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="font-weight: bold; font-size: 15px;background:#004884;text-align:center;">
                            @yield('head_content')
                        </div>
                        <div class="panel-body" style="min-height:250px;">
                            <p style="text-align: justify;">
                                @if(session('success'))
                                    <div class="alert alert-success " role="alert">
                                        <strong>{{session('success')}}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if(session('danger'))
                                    <div class="alert alert-danger " role="alert">
                                        <strong>{{session('danger')}}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                        @endif
                                    <div style="text-align:justify;line-height:30px;color:black;" class="p-style">
                                    @yield('content')
                                </div>
                            </p>

                    </div>
                </div>
            </div><!-- Welcome Massage End-->

           @yield('2nd_content')
        </div><!-- row end--->
    </div><!-- left Content End-->

        @include('layouts.front_end_layout.sidebar')<!-- Right Content End-->
    </div><!--- row end---->
</div>
@include('layouts.front_end_layout.footer')<!-- Right Content End-->


<!--- row end---->
<!-- main Content End-->
<!---this is footer part start-->
<!--Footer End -->

<!-- Main Stop-->
</div>
{{--<script src="{{asset('js/front_end/bootstrap-datepicker.min.js')}}"></script>--}}
<script src="{{asset('js/front_end/jquery-ui.js')}}"></script>
<script src="{{asset('js/front_end/jquery.min.js')}}"></script>
<script src="{{asset('js/front_end/bootstrap-hover-dropdown.js')}}"></script>
@yield('script')

</body>

<!-- Mirrored from gazipurup.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Apr 2019 07:28:45 GMT -->
</html>