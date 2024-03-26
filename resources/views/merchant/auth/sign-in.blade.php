
<!DOCTYPE html>
<html>
<head>
    <title>Sign In Form</title>
    <h1 class="text-danger">{{session('message')}}</h1>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="{{asset('merchant-assets')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
</head>
<body>
<!-- main -->
<div class="main-w3layouts wrapper">
    <h1>Sign In</h1>
    <div class="main-agileinfo">
        <div class="agileits-top">
            <form action="{{route('merchant.checkSignIn')}}" method="post">
                @csrf
                <input class="text" type="text" name="username" placeholder="Username" required="">

                <input class="text" type="password" name="password" placeholder="Password" required="">

                <input type="submit" value="SIGNIN">
            </form>
            <p>Don't have an Account? <a href="{{route('merchant.signUp.view')}}">Create an Account</a></p>
        </div>
    </div>

    <ul class="colorlib-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>

</body>
</html>
