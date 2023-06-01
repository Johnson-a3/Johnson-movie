<html>
    <head>
        <style>
            form{
                padding:5px;
                display:inline-block;
                border;1px solid black;
                background:linear-gradient(to bottom right, #00ffff 20% , #ff0066 80%);  
            }
            </style>
            </head>
            <body>
        <?php
include_once(__DIR__.'/user1.php');
$signup = false;
if(isset($_POST["submit"])){
    $name= $_POST['name'];
    $phone = $_POST['phone'];
    $email= $_POST['email'];
    $movie = $_POST['movie'];
    // print_r(__DIR__);
    // var_dump(file_exists("__DIR__.'/user.class.php'"));
    // echo "check";
    if(User::check_email($email)){
       
        $error= User::insert_user($name,$phone,$email,$movie);
        $signup = true;
    }
}
if($signup){
    if(!$error){
        echo 'something went wrong';
    }else{ ?>
<!-- this is signup = true and error = true   -->

        <html>
<head>
   
    <title>Movie ticket booking</title>
</head>
<body>
            <center>
    <div>
    <form action="" method="POST" onSubmit="return confirm('Confirm to Submit!')";>
        <h3> &#127903;Movie Ticket Booking &#127909;</h3>
        <table class='t'>
        <tr><td>Name:</td>
        <td><input type="text" name="name" required=required></td></tr><br>
        <tr><td>Phone:</td>
        <td><input type="tel" name="phone" required="required" minlength=10 maxlength=10></td></tr><br>
        <tr><td>Email:</td>
        <td><input type="email" name="email" required="required" ></td></tr><br>
        <tr><td>Movie:</td>
        <td><input type="text" name="movie" required=required></td></tr><br>
</table>
        <input type="submit" value="Submit" name="submit">
        <input type="reset" name="reset">
</form>
</div>
</center>
</body>
<?php
User::getuserdata($email);
echo "<table border='1' style='background-color:lightgreen;'>";
            echo "<tr><th>Name</th><th>Phone</th><th>Email</th><th>Movie</th>";
            foreach(User::$rows as $data ){
                echo "<tr><td>".$data['name']."</td><td>".$data['phone']."</td>
                <td>".$data['email']."</td><td>".$data['movie']."</td></tr>";
            }
            echo "</table>";
    }
}else{
    ?>
<!--  this is the else part of signup = false  -->
<html>
<head>
    <title>Movie ticket booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center>
    <div>
    <form action="" method="POST" onSubmit="return confirm('Confirm to Submit!')";>
        <h3> &#127903;Movie Ticket Booking &#127909;</h3>
        <table class='t'>
        <tr><td>Name:</td>
        <td><input type="text" name="name" required=required></td></tr><br>
        <tr><td>Phone:</td>
        <td><input type="tel" name="phone" required="required" minlength=10 maxlength=10></td></tr><br>
        <tr><td>Email:</td>
        <td><input type="email" name="email" required="required" ></td></tr><br>
        <tr><td>Movie:</td>
        <td><input type="text" name="movie" required=required></td></tr><br>
</table>
        <input type="submit" value="Submit" name="submit">
        <input type="reset" name="reset">
</form>
</div>
</center>
</body>
<?php
}
?>
</html>