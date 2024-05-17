<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

      $(':input[type="submit"]').prop('disabled', true);
  $('#password, #confirmpassword').on('keyup', function(){

        $('.confirm-message').removeClass('success-message').removeClass('error-message');

        let password=$('#password').val();
        let confirm_password=$('#confirmpassword').val();

       if(confirm_password===password)
        {
            $('.confirm-message').text('Password Match!').addClass('success-message');
              $(':input[type="submit"]').prop('disabled', false);
        }
        else{
            $('.confirm-message').text("Password Doesn't Match!").addClass('error-message');
              $(':input[type="submit"]').prop('disabled', true);
        }

    });
});</script>
 <style>
body {
 background-image: url('image/Reg_train.jpg');
  background-repeat: no-repeat;
background-size: 100% 100%;
}
.success-message{
    color:green
    }
.error-message{
    color:red;
    }
</style>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <title>Register</title>
  </head>
  <body>

    <section class="main">
        <div class="container">
<div class="row">
   
    <div class="col-lg-7 col-mt-15"></div>
    <div class="col-lg-5 col-mt-12 col-sm-12">
        <div class="form-box px-5 py-4">
         <br><br><br><br>
      <h2 class="text-center mb-4" style="font-size:25px;color: whitesmoke;background-color: darkred;padding: 2px; border-radius: 25px;">SIGN UP</h2>
        <form action = "http://localhost:8080/registration" method = "POST"  accept-charset="utf-8">
                
                <input type="text" name="name" placeholder="Name" required="true" class="form-control mb-3">
                <input type="email" name="email" placeholder="Email" required="true" class="form-control mb-3">
                <!-- <input type="text" name="" placeholder="Address" class="form-control mb-3"> -->
                <input type="number" name="phone" placeholder="Contact No" required="true" class="form-control mb-3">
                <div class="input-group mb-3">
                    <input type="password" name="password" placeholder="Password" required="true" class="form-control border-end-0" id="password">
                    <span class="input-group-text bg-white border-start-0"><i class="fa-solid fa-eye"></i></span>
                </div>
                <input type="password" name="cfpass" required="true" placeholder="Confirm Password" class="form-control mb-3" id="confirmpassword">
                 <div class="form-text confirm-message">A</div>
           <input type="submit" class="register-btn form-control mb-3" value="Register" id="sub">
           </form>
            <p class="text-center">Already Registered? <a href="login" class="link"><b>Login</b></a></p>

        </div>
    </div>
</div>

        </div>
        
    </section>
</body>      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 <script>
        $(document).ready(function() {
            $("#nameInput").on("input", function() {
                validateInput();
            });
        });

        function validateInput() {
            var nameInput = $("#nameInput").val();

            // Use a regular expression to check if the input contains only alphabetic characters
            var alphabeticRegex = /^[A-Za-z]+$/;

            if (!alphabeticRegex.test(nameInput)) {
                alert("Please enter only alphabetic characters in the name field.");
                return false;
            }

            // Continue with form submission or other actions if validation passes
            // $("#myForm").submit();
            alert("Form submitted successfully!");
        }
    </script></html>
    

    <!-- Option 1: Bootstrap Bundle with Popper >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>