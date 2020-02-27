


<?php include('header.php');?>
<h1>Sneaker Palace</h1>
<div class="container">
        
        <h2>Sign Up</h2>
        
        <form method="post">
            <p>Enter Your Details Below</p>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Your Username">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Your Password">
            </div>
            <input class="btn btn-dark" type="submit" value="Sign Up">
            <p>Don't Have An Account? Please <a href="signup.php">Sign Up</a></p>
        </form>
    </div>
<?php include('footer.php');?>