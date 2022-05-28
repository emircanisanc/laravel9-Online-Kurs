<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="{{asset('assets')}}/adminassets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{asset('assets')}}/adminassets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="assets/img/logo-invoice.png" />
                <h1>ONLINE COURSE ADMIN LOGIN</h1>
            </div>
        </div>
        <div class="row ">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
@include('home.messages')
                <div class="panel-body">
                    <form role="form" action="{{route('loginadmincheck')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <hr />
                        <h5>Enter Details to Login</h5>
                        <br />
                        <p class="comment-form-email">
                            <label for="email">Email <span class="required">*</span></label>
                            <input type="email" required="required" aria-required="true" value="" name="email">
                        </p>
                        <p class="comment-form-email">
                            <label for="email">Password <span class="required">*</span></label>
                            <input type="password" required="required" aria-required="true" value="" name="password">
                        </p>
                        <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" /> Remember me
                            </label>
                            <span class="pull-right">
                                <a href="index.html">Forget password ? </a>
                            </span>
                        </div>
                        <input type="submit" value="Login Now" class="mu-post-btn" name="submit">
                        <hr />
                        Not register ? <a href="index.html">click here </a> or go to <a href="index.html">Home</a>
                    </form>
                </div>

            </div>


        </div>
    </div>

</body>

</html>