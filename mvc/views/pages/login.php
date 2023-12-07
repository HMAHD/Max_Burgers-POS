<?php include("./mvc/views/partials/theme.php"); ?>
<div class="container-fluid bg2" style="height: 100vh; padding: 100px;">
  <div class="row mt-1 justify-content-center">
    <div class="col-sm-12 col-md-8 pl-4">
      <div class="logo-animation-wrapper">
        <div class="animated-text text-center">
          <p class="max-burgers">Max Burgers</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3 justify-content-center">
    <div class="col-sm-12 col-md-4 rounded shadow-sm bg3">
      <form class="login-form">
        <p class="cl mt-4 ml-3" style="font-weight: bold; font-size: 1.3rem; color: white;">SIGN IN ACCOUNT</p>
        <div class="form-group">
          <label class="cl" style="color: white;">Username</label>
          <input id="username" type="text" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="form-group">
          <label class="cl" style="color: white;">Password</label>
          <input id="password" type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <button type="button" onclick="Login()" class="btn bg1 cl btn-block mt-3">Submit</button>
        <p id="check-login-status" class="text-center text-light" style="font-size: 90%; display: none;">Wrong username or password</p>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function Login() {
    username = $("#username").val();
    password = $("#password").val();
    var data = "username=" + username + "&password=" + password;
    $.post("../Account/CheckLogin/", {
      username: username,
      password: password
    }, function(data) {
      console.log(data);
      if (data == 1) {
        window.location.href = "../Home"; // Corrected the URL redirection
      } else {
        $("#check-login-status").show().addClass('vibrate'); // Display and add vibrate class
        setTimeout(function() {
          $("#check-login-status").removeClass('vibrate'); // Remove vibrate class after timeout
        }, 1000); // Adjust the duration of the vibration effect (in milliseconds)
      }
    });
  }
</script>

<style>
  .animated-text {
    animation: colorChange 5s infinite linear, moveUp 5s infinite linear;
    text-align: center;
  }

  .max-burgers {
    font-size: 48px;
    font-weight: bold;
    background: -webkit-linear-gradient(left, #ff4e50, #f9d423);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .bg3 {
    background: linear-gradient(135deg, #ff4e50, #f9d423);
  }

  .login-form {
    padding: 10px;
  }

  .login-form .form-group {
    margin-bottom: 10px;
  }

  .login-form label {
    color: white;
  }

  .login-form button {
    background: #ff4e50;
    color: #fff;
    font-weight: bold;
  }

  .login-form button:hover {
    background: #f9d423;
  }

  @keyframes moveUp {

    0%,
    100% {
      transform: translateY(0);
    }

    50% {
      transform: translateY(-10px);
    }
  }

  .vibrate {
    animation: vibrate 0.3s linear infinite;
  }

  @keyframes vibrate {

    0%,
    100% {
      transform: translateX(0);
    }

    25% {
      transform: translateX(5px);
    }

    50% {
      transform: translateX(-5px);
    }

    75% {
      transform: translateX(5px);
    }
  }
</style>