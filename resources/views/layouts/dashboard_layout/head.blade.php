<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
<title>Monster Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
<!-- Bootstrap Core CSS -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/fontawesome-all.css')}}">
<!-- chartist CSS -->
<link href="{{asset('css/chartist.min.css')}}" rel="stylesheet">
<link href="{{asset('css/chartist-init.css')}}" rel="stylesheet">
<link href="{{asset('css/chartist-plugin-tooltip.css')}}" rel="stylesheet">
<link href="{{asset('css/css-chart.css')}}" rel="stylesheet">
<!-- toast CSS -->
<link href="{{asset('css/jquery.toast.css')}}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<!-- You can change the theme colors from here -->
<link href="{{asset('css/colors/green.css')}}" id="theme" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->
<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../../../../../www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-85622565-1', 'auto');
    ga('send', 'pageview');
</script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="{{asset('images/front_end/favicon.ico')}}" type="image/x-icon" />
<title>১নং গাজীপুর ইউন‌িয়ন পর‌িষদ</title>
<!-- all css file---->
<link href="{{asset('css/front_end/leapis_font.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/front_end/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/front_end/style.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/front_end/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<!-- all script file -->
<script src="{{asset('js/front_end/jquery.min.js')}}"></script>
<script src="{{asset('js/front_end/bootstrap.js')}}"></script>
{{--<script src="{{asset('js/front_end/jquery-1.10.2.js')}}"></script>--}}
<script src="{{asset('js/front_end/bootstrap-hover-dropdown.js')}}"></script>
<script src="{{asset('js/front_end/bootstrap.min.js')}}"></script>



<!--- form validation js and css---->
<!---<link rel="stylesheet" href="validation/css/bootstrap.css"/>-->
<link rel="stylesheet" href="{{asset('css/front_end/formValidation.css')}}"/>

<!---<script type="text/javascript" src="validation/js/jquery.min.js"></script>---->
<!---<script type="text/javascript" src="validation/js/bootstrap.min.js"></script>-->
<script type="text/javascript" src="{{asset('js/front_end/formValidation.js')}}"></script>
<script type="text/javascript" src="{{asset('js/front_end/bootstrap1.js')}}"></script>

<!--- for datepicker ----------->
<link href="{{asset('css/front_end/jquery-ui.css')}}" rel="stylesheet" media="screen,projection" type="text/css" />
<script src="{{asset('js/front_end/jquery-ui.js')}}"></script>
<!--<script src="datepicker/jquery-1.9.1.js"></script>-->

<!-- for bootstrap datepicker ------->
<link href="{{asset('css/front_end/datepicker.min.css')}}" rel="stylesheet" media="screen,projection" type="text/css" />
<link href="{{asset('css/front_end/datepicker3.min.css')}}" rel="stylesheet" media="screen,projection" type="text/css" />
<script src="{{asset('js/front_end/bootstrap-datepicker.min.js')}}"></script>

<script>
    $(function() {
        var pickerOpts = {
            dateFormat: $.datepicker.ATOM
        };
        $("#dofb").datepicker(pickerOpts);
    });
</script>
<!-- end all script -->

<!-- Owl Carousel Assets -->
<link href="{{asset('css/front_end/owl.carousel.css')}}" rel="stylesheet">
<link href="{{asset('css/front_end/owl.theme.css')}}" rel="stylesheet">

<!--- picture uplaod js ---->
<script src="{{asset('js/front_end/ajaxupload.js')}}" type="text/javascript"></script>

<!--- ajax request function for data serching----->
<script src="{{asset('js/front_end/ajax_req.js')}}" type="text/javascript"></script>


<style>
    body{color:font-family: solaimanlipi, "Times New Roman", Times, serif !important; color:black !important;}
</style>