<!--

Use this file to register your js,css and other dependencies

-->

<meta charset="UTF-8">
<title>Studiz | Organize your learning</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- Bootstrap -->
<link href="{{asset("packages/studiz/theme/bootstrap/dist/css/bootstrap.css")}}" rel="stylesheet" type="text/css" />
<!-- Bootstrap-Theme -->
<link href="{{asset("packages/studiz/theme/bootstrap/dist/css/bootstrap-theme.css")}}" rel="stylesheet" type="text/css" />
<!-- Font-awesome -->
<link href="{{asset("packages/studiz/theme/font-awesome/css/font-awesome.css")}}" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="{{asset("packages/studiz/theme/ionicons/css/ionicons.css")}}" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="{{asset("packages/studiz/theme/admin-lte/css/morris/morris.css")}}" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="{{asset("packages/studiz/theme/admin-lte/css/jvectormap/jquery-jvectormap-1.2.2.css")}}" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="{{asset("packages/studiz/theme/admin-lte/css/datepicker/datepicker3.css")}}" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="{{asset("packages/studiz/theme/admin-lte/css/daterangepicker/daterangepicker-bs3.css")}}" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="{{asset("packages/studiz/theme/admin-lte/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="{{asset("packages/studiz/theme/admin-lte/css/AdminLTE.css")}}" rel="stylesheet" type="text/css" />
<!-- Custom style -->
<link href="{{asset("packages/studiz/theme/studiz/css/admin-lte/app.css")}}" rel="stylesheet" type="text/css" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="{{asset("packages/studiz/theme/html5shiv/dist/html5shiv.js")}}"></script>
<script src="{{asset("packages/studiz/theme/respondJS/src/respond.js")}}"></script>

<![endif]-->

<script src="{{asset("packages/studiz/theme/jquery/dist/jquery.js")}}"></script>
<script src="{{asset("packages/studiz/theme/bootstrap/dist/js/bootstrap.js")}}" type="text/javascript"></script>
<script src="{{asset("packages/studiz/theme/jquery-ui/jquery-ui.js")}}" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="{{asset("packages/studiz/theme/raphael/raphael.js")}}"></script>
<script src="{{asset("packages/studiz/theme/admin-lte/js/plugins/morris/morris.min.js")}}" type="text/javascript"></script>
<!-- Sparkline -->
<script src="{{asset("packages/studiz/theme/admin-lte/js/plugins/sparkline/jquery.sparkline.min.js")}}" type="text/javascript"></script>
<!-- jvectormap -->
<script src="{{asset("packages/studiz/theme/admin-lte/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")}}" type="text/javascript"></script>
<script src="{{asset("packages/studiz/theme/admin-lte/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js")}}" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset("packages/studiz/theme/admin-lte/js/plugins/jqueryKnob/jquery.knob.js")}}" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="{{asset("packages/studiz/theme/admin-lte/js/plugins/daterangepicker/daterangepicker.js")}}" type="text/javascript"></script>
<!-- datepicker -->
<script src="{{asset("packages/studiz/theme/admin-lte/js/plugins/datepicker/bootstrap-datepicker.js")}}" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset("packages/studiz/theme/admin-lte/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}" type="text/javascript"></script>
<!-- iCheck -->
<script src="{{asset("packages/studiz/theme/admin-lte/js/plugins/iCheck/icheck.min.js")}}" type="text/javascript"></script>
<!-- jquery.rest -->
<script src="{{asset("packages/studiz/theme/jquery.rest/dist/1/jquery.rest.js")}}" type="text/javascript"></script>
<!-- purl -->
<script src="{{asset("packages/studiz/theme/purl/purl.js")}}" type="text/javascript"></script>
<!-- SerializeObject -->
<script src="{{asset("packages/studiz/theme/jQuery.serializeObject/jquery.serializeObject.js")}}" type="text/javascript"></script>

<!-- studiz -->
<script src="{{asset("packages/studiz/theme/studiz/js/studiz.js")}}" type="text/javascript"></script>

<!-- Initialize studiz -->
<script type="text/javascript">
    $(document).ready(function() {
        $studiz.init({
            url: '{{URL::to('/')}}'
        })
    });
</script>

<!-- Navigation: Left side -->
<script src="{{asset("packages/studiz/theme/studiz/js/admin-lte/navigation.js")}}" type="text/javascript"></script>

<!-- Navigation: Top -->
<script src="{{asset("packages/studiz/theme/studiz/js/admin-lte/topNavigation.js")}}" type="text/javascript"></script>

<!-- Breadcrumb: Top -->
<script src="{{asset("packages/studiz/theme/studiz/js/admin-lte/breadcrumb.js")}}" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="{{asset("packages/studiz/theme/studiz/js/admin-lte/app.js")}}" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset("packages/studiz/theme/studiz/js/admin-lte/demo.js")}}" type="text/javascript"></script>
