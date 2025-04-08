<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<?php 
$status=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
 if($_POST["email"]){
  $conn=new mysqli("localhost","root","root");
  $conn->select_db("lodgereservation");
  $stmt=$conn->prepare('SELECT password FROM user WHERE email=?');
  $stmt -> bind_param("s",$_POST["email"]);
  $stmt -> execute();
  $res = $stmt->get_result();
  if($res->num_rows==0){
   $status=1;
  }
  else if($res->num_rows>1){
   http_response_code(500);
   $status=-1;
  }else{
   $ha=($res->fetch_array())[0];
   if(password_verify($_POST["password"],$ha)){
    $_SESSION["user_id"]=$_POST["email"];
    $status=99;
   }else{
    $status=3;
   }
  }
  $conn->close();
 }
}?>
<head>
  <?php require './components/head.php' ?>
  <title>Log In</title>
  <?php if($status==99){?>
   <meta http-equiv="refresh" content="5; url=landing.php" />
  <?php }?>
</head>

<body>
  <?php require './components/fullheader.php' ?>
  <main>
  <?php if($status!=0&&$status<99){?>
   <div style="display:inline-block;background-color:rgb(245,236,235)">
    <?php
     if($status==1){echo "Email not found";}
     if($status<0){echo "An error occured.";}
     if($status==3){echo "Incorrect password.";}
    ?>
   </div><br/>
  <?php }?>
  <?php if($status < 99){?>
   <h2>Login to Moffat Bay Lodge</h2>
   <form action="login.php" method="post">
    Email: <input type="text" name="email"/><br/>
    Password: <input type="password" name="password"/></br>
    <input type="submit" value="Log In"/>
   </form>
  <?php }else{?>
    Successfully logged in.
  <?php }?>
  </main>
</body>

</html>