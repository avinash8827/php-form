<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <?php 
            if( isset($_GET['submitreg']) ){
                //echo 'yes';
             
                $conn = mysqli_connect('localhost',"root",'',"rge_db");
               

                $email =  mysqli_real_escape_string($conn,$_GET['email']);
                $username =  mysqli_real_escape_string($conn,$_GET['username']);
                $password =  mysqli_real_escape_string($conn,$_GET['password']);  
                $cpass =  mysqli_real_escape_string($conn,$_GET['cpass']);

                
                if( $password == $cpass ){
                    
                    $password = md5($password); 
                    //echo 'ok we can procced';
                   
                  $query = "INSERT INTO registration_tbl(`email_address`,`username`,`password`)VALUES('$email','$username','$password')";


                    
                    mysqli_query($conn,$query);


                    
                  echo  '<div class="alert alert-success" role="alert">
                  <h4 class="alert-heading">Data Insert Successfully!</h4>
                </div>';

                }else{
                }
                
                
                mysqli_close($conn);

            }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET" class="offset-3 w-50">
            <h1 class="text-center">Registration FORM</h1>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="mb-3">
                <label for="cpass" class="form-label">Confirm Password</label>
                <input type="password" name="cpass" class="form-control" id="cpass" required >
            </div>
            <input type="submit" name="submitreg" value="Register Now" class="btn btn-primary" />
        </form>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>