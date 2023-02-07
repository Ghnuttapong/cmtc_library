<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href=".//" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <?php include dirname(__FILE__) . '/layouts/css.php'; ?>
  <title><?= $site_name ?> | Login</title>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <p>
        <img src="../assets/brand/icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" width="80" height="80" style="opacity: .8">
        <b>Administrator</b>
      </p>
    </div>
    <!-- /.login-logo -->

    <form id="form-login"  >
      <div class="card">
        <div class="card-body login-card-body">
          <div class="input-group mb-3">
            <input type="text" name="username" require class="form-control" placeholder="Username" id="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" require id="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <label for="type" class="form-label">type</label>
          <div class="input-group mb-3">
            <select class="form-control" name="role" id="role">
              <option value="0">Member</option>
              <option value="1">Staff</option>
            </select>
          </div>
          <div class="d-flex gap-2 align-items-center">
              <button type="submit" value="Sign In" class="btn btn-primary w-50 btn-block">Sign In</button>
              <div class="ml-2 text-center w-full">
                <a href="register.html">Registeration.</a>
              </div>
          </div>
        </div>
        <!-- /.login-card-body -->
      </div>
    </form>
  </div>
  <!-- /.login-box -->


  <?php include dirname(__FILE__) . '/layouts/script.php'; ?>
  <script>

    $('#form-login').on('submit', function(e) {
      e.preventDefault()
      login();
    })

    /* function login */
    function login() {
      $.ajax({
        type: 'POST',
        data: {
          username: $('#username').val(),
          password: $('#password').val(),
          role: $('#role').val()
        },
        url: '../api/auth/login.php',
        dataType: 'JSON',
        success: function(res) {
          console.log(res)
          Toast.fire({
            icon: 'success',
            title: res.msg
          })
          setInterval(function() {
            $('#role').val() == 1 ?
            window.location.href = 'index.html' : window.location.href = '../../member/index.html'
          }, 1000)
        },
        error: function(err) {
          Toast.fire({
            icon: 'error',
            title: 'Invalid Username.'
          })
        }
      })
    }
    /* function login */
  </script>
</body>

</html>