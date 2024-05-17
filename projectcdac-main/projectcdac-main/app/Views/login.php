x<!--login-->
    <title>Login</title>
  </head>
  <body>
    <div class="container">
        <form class="w-50 mx-auto py-5 shadow p-4" method="POST" action = "http://localhost:8080/login">
            <h1>Login</h1> <hr>
             <span style='color:red;font-size:15px;'><?php echo session('msg');?></span>
             <span style='color:green;font-size:15px;'><?php echo session('msg_r');?></span>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              <div id="emailHelp" class="form-text">Forget Password?</div>
            </div>
            <!-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Sign in</label>
            </div>
 -->            <div class="mb-3 d-flex">
            <button type="submit" class="btn btn-primary">Submit</button>
             <!-- <button type="submit" class="ms-auto mt-2 btn btn-dark">Create New Account</button> -->

            </div>
            <!-- <div class="spinner-border" role="status">
            <span class="virtually-hidden"></span> 
            </div> -->
          </form>

        </div>

      </body>
</html>