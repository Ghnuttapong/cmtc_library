<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href=".//" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <?php include dirname(__FILE__) . '/layouts/css.php'; ?>
    <title><?= $site_name ?> | Register</title>
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

        <form id="form-register">
            <div class="card">
                <div class="p-2 card-header text-center">
                    <h5>Registration.</h5>
                </div>
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
                    <div class="mb-3">
                        <input type="text" name="fullname" class="form-control" placeholder="Fullname" require id="fullname">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="phone" class="form-control" placeholder="Phone" require id="phone">
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <button type="submit" value="Sign In" class="btn btn-primary w-50 btn-block">Sign Up</button>
                        <div class="ml-2 text-center w-full">
                            <a href="login.html">Have an account?</a>
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
        /* function login */
        $('#form-register').submit(function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                data: $(this).serialize(),
                url: '../api/auth/register.php',
                dataType: 'JSON',
                success: function(res) {
                    console.log(res)
                    Toast.fire({
                        icon: 'success',
                        title: res.msg
                    })
                    setInterval(function() {
                        window.location.href = 'login.html'
                    }, 1000)
                },
                error: function(err) {
                    Toast.fire({
                        icon: 'error',
                        title:  'Username already exists.'
                    })
                }
            })
        })
        /* function login */
    </script>
</body>

</html>