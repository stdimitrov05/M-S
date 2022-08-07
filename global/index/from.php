<?php error_reporting(1) ;
$page  = $_GET['msg']
 ?>

<div class="signupSection">
    <div class="info">
        <h2>Welcome to M$S Web</h2>
        <i class="icon ion-ios-ionic-outline" aria-hidden="true"></i>
        
        <?php if($page=='login'){ ?>
            <p>You don't have a profile?</p>
        <a class="btn" href="?msg=register">Register</a>
        <?php } else { ?>
            <p>You have a profile?</p>
            <a class="btn" href="?msg=login">Login</a> <?php }?>
    </div>
  
    <?php if($page=='login'){ ?>
    <form action="#" method="POST" class="signupForm" name="signupform">
        <h2>Log In</h2>
        <ul class="noBullet">
            <li>
                <label for="username"></label>
                <input type="text" class="inputFields" id="username" name="username" placeholder="Username"  required />
            </li>
            <li>
                <label for="password"></label>
                <input type="password" class="inputFields" id="password" name="password" placeholder="Password"   required />
            </li>
            <li>
               
            <li id="center-btn">
                <input type="submit" id="join-btn" name="join" alt="Join" class="btn" value="Join">
            </li>
        </ul>
    </form>
    <?php }else{?>  <form action="#" method="POST" class="signupForm" name="signupform">
        <h2>Sign Up</h2>
        <ul class="noBullet">
            <li>
                <label for="username"></label>
                <input type="text" class="inputFields" id="username" name="username" placeholder="Username"  required />
            </li>
            <li>
                <label for="password"></label>
                <input type="password" class="inputFields" id="password" name="password" placeholder="Password"   required />
            </li>
            <li>
                <label for="email"></label>
                <input type="file" class="inputFields" id="file" name="file" placeholder="Email"  required />
            </li>
            <li id="center-btn">
                <input type="submit" id="join-btn" name="join" alt="Join" class="btn" value="Sign Up">
            </li>
        </ul>
    </form> <?php }?>
</div>