<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset("packages/studiz/login/css/main.css")}}" rel="stylesheet" type="text/css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{asset("packages/studiz/login/js/TweenLite.min.js")}}"></script>
        <script src="{{asset("packages/studiz/login/js/main.js")}}"></script>
    </head>
    <body>
        <style type="text/css">
            /* Body background directives */
            body{
                background: url({{asset("packages/studiz/login/img/back.png")}});
                background-color: #444;
                background: url({{asset("packages/studiz/login/img/pinlayer2.png")}}),
                            url({{asset("packages/studiz/login/img/pinlayer1.png")}}),
                            url({{asset("packages/studiz/login/img/back.png")}});
            }

            /* Default avatar placeholder image */
            div.avatar {
                background: url({{asset("packages/studiz/login/img/user_placeholder.jpg")}});
                background-size: 100px 110px;
                background-repeat: no-repeat;
            }
        </style>

        <div class="container">
            <a class="btn btn-block btn-social btn-facebook" href="oauth/facebook">
                <i class="fa fa-facebook"></i> Sign in with Facebook
            </a>
            <a class="btn btn-block btn-social btn-google-plus">
                <i class="fa fa-google-plus"></i> Sign in with Google
            </a>
            <div class="login-container vertical-offset-100">
                <div id="output"></div>
                <div class="avatar"></div>
                <div class="form-box">
                    <form action="" method="">
                        <input name="user" type="text" placeholder="username">
                        <input name="password" type="password" placeholder="password">
                        <button class="btn btn-info btn-block login" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>