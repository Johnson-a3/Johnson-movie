
<html>
    <head>
        <style>
            form{
                display:inline-block;
                border:1px solid black;
                padding:5px 7px 20px 7px;
                border-radius:20px;
                margin-top:63px;
                background:linear-gradient(to bottom right, #00ffff 20% , #ff0066 80%);   
            }
            td,th{
                font-size:25px;
                padding:5px;
            }
            input[type=text],input[type=number],input[type=tel],input[type=email],input[type="date"]{
                width:200px;
                height:30px;
            
            }
            select{
                width:200px;
                height:30px;
        
            }
            input[type=submit]{
                width:70px;
                height:30px;
                background-color:silver;
                margin-left:5px;
                border-radius:7px;
            }

            input[type=submit]:hover{
                background-color:cyan;  
                border:2px solid black;              
            }
            input[type=reset]{
                width:70px;
                height:30px;
                background-color:silver;
                margin-right:5px;
                border-radius:7px;
            }
            input[type=reset]:hover{
                background-color:red;
                color:white;
                border:2px solid black;
            }
            h1{
                font-family:georgia;
            }
            body{
                background-image:url("movie1w.jpg");
                background-size:100% 100%;
                background-attachment:fixed;
                
            }

            table.a{
                background-color:lightblue;
                
            }
            h2{
                display:inline-block;
                background-color:silver;
            }
        </style>
        </head>
        <body>
            <?php
include_once('user.php');


User::getmovie();
$options='<option value="" disabled selected value></option>';
foreach(User::$rows as $data ){
    $options .= '<option value="' . $data["movie_name"] . '">' . $data["movie_name"] . '</option>';
   
}


$signup = false;
if(isset($_POST["submit"])){
    $uname= $_POST['name'];
    $phone = $_POST['number'];
    $email= $_POST['email'];
    $movie = $_POST['movie'];
    // print_r(__DIR__);
    // var_dump(file_exists("__DIR__.'/user.class.php'"));
    // echo "check";
    if(User::check_email($email)){
        
        $error= User::insert_user($uname,$phone,$email,$movie);
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
   
</head>
<body>
            <center>
    <div>
    <form action="" method="POST" onSubmit="return confirm('Confirm to Submit!')";>
        <h1> &#127903;Movie Ticket Booking &#127909;</h1>
        <table class='t'>
        <tr><td>Name:</td>
        <td><input type="text" name="name" required=required></td></tr><br>
        <tr><td>Phone:</td>
        <td><input type="tel" name="number" required="required" minlength=10 maxlength=10></td></tr><br>
        <tr><td>Email:</td>
        <td><input type="email" name="email" required="required" ></td></tr><br>
        <tr><td>Movie:</td>
        <td><select name="movie">
        <?php echo $options; ?>
 <td></select></td></tr></br>
</td></tr></br>
</table>
        <input type="submit" value="Submit" name="submit">
        <input type="reset" name="reset">
</form>
</div>
</center>
<center>
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
   
</head>
<body>
    <center>
    <div>
    <form action="" method="POST" onSubmit="return confirm('Confirm to Submit!')";>
        <h1> &#127903;Movie Ticket Booking &#127909;</h1>
        <table class='t'>
        <tr><td>Name:</td>
        <td><input type="text" name="name" required=required></td></tr><br>
        <tr><td>Phone:</td>
        <td><input type="tel" name="number" required="required" minlength=10 maxlength=10></td></tr><br>
        <tr><td>Email:</td>
        <td><input type="email" name="email" required="required" ></td></tr><br>
        <tr><td>Movie:</td>
        <td><select name="movie">
        <?php echo $options; ?>
 <td></select></td></tr></br>
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