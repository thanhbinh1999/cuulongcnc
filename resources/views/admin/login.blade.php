<!DOCTYPE html>
<html>
<head>
  <title>Trang dang nhap quan tri </title>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="resources/css/bootstrap-progressbar-3.3.4.min.css">
 <!-- Font Awesome -->
    <link href="resources/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="resources/css/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="resources/css/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="resources/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="resources/css/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="resources/css/daterangepicker.css" rel="stylesheet">

    <!-- Custom Thdỏeme Style -->
    <link href="resources/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
  .error{
    color: red;
  }
</style>
</head>
<body class="login">
  <div class="container body">
    <div class="main_container">
        <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="{{url(Route('postLogin'))}}" >
              <h1>Đăng nhập</h1>
              <div>
                <p class="error">{!!$errors->first('userName')!!}</p>
                <input name="userName" type="text" class="form-control userName" placeholder="Tên tài khoản" />
              </div>
              <div>
              <p class="error"> {{$errors->first('password')}}</p>
                <input name="password" type="password" class="form-control" placeholder="Mật khẩu"  />
              </div>
              <div>
              @if(Session::has('messages'))
              <p class="error">{{Session::get('messages')}}</p>
              @endif
                <input type="submit" name="login" class="btn btn-danger" value="Đăng nhập"></input>
              <!-- <a class="reset_pass btn btn-primary" href="#"></a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i>Cửu Long</h1>
                </div>
              </div>
              {{csrf_field()}}
            </form>
          </section>
        </div>
      </div>
    </div>    

    </div>
  </div>
</body>
</html>