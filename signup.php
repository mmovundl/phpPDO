
<?php 
    require('dbconnection.php');
$error = "";
$email = "";
$password = "";
$username = "";
if($_POST)
{
    if(!empty($_POST['email']))
    {
        $email = trim($_POST['email']);
    }else{
         $error .= "Email Is Required.<br>";
    }

    if(!empty($_POST['username']))
    {
        $username = trim($_POST['username']);

    }else{
        $error .= "Please Enter Username.<br>";
    }

    if(!empty($_POST['password']))
    {
        $password  = password_hash(trim($_POST['password']),PASSWORD_DEFAULT);
        if(!empty($_POST['pass_comfirm'])){
            if(password_verify(trim($_POST['pass_comfirm']),$password))
            {

            }else
            {
                $error .= "Passwords Must Match.<br>";
            }
        }else{
            $error .= "Please Confirm Password.<br>";
        }
    }else{
        $error .= "Password Required.<br>";
    }

    if(!empty($error))
    {
        $error = '
        <div class="alert alert-danger" role="alert"><strong>
        The Following Error(S):</strong><br>'.$error.'</div>';
    }
    else{
        
        $query = "SELECT * FROM users WHERE username = :username";

        if($stmt = $pdo->prepare($query))
        {
            $stmt->bindParam(":username",$username);

            if($stmt->execute())
            {
                if($stmt->rowCount()> 0)
                {
                    $error = '
                            <div class="alert alert-danger" role="alert"><strong>
                            The Following Error(S):</strong><br>Sorry User Already Exist</div>';
                }else{
                        
                }
            }
        }
    }

}else{
    
}
?>

<?php include('header.php');?>
<h1>Sneaker Palace</h1>
<div class="container">
        
        <h2>Sign Up</h2>
        
        <form method="post">
            <p>Enter Your Details Below</p>
            <?php echo $error;?>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Your Email">
            </div> 
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Your Username">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Your Password">
            </div>
           
            <div class="form-group">
                <input type="password" name="pass_comfirm" class="form-control" placeholder="Comfirm Password">
            </div>
            <input class="btn btn-dark" type="submit" value="Sign Up">
            <p>Already Have An Account? Please <a href="login.php">Login</a></p>
        </form>
    </div>
<?php include('footer.php');?>