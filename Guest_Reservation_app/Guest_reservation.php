<?php
session_start(); //initiate sessions, which allows you to store data across multiple pages.
error_reporting(E_ALL); // needs to set to E_ALL for development, 0 for production. also reprts all types of errors.
ini_set('display errors',1); // needs to set to 1 for development, 0 for production. also displayes errors on the browser

$host= '127.0.0.1'; //default for myphpadmin local host(my computer)
$dbname='guest_reservation'; //database name
$username='root'; //default username for using myphpadmin on localhost
$port= ''; //left blank to use the default port/password.
$password = '';

//creating database connection.
$dbconn = mysqli_connect($host, $username, $password, $dbname); 

if (isset($_POST['submit'])){ //if submit has been pressed, pick the details below.
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $telephone = $_POST['telephone'];
    $guestnumber = $_POST['guest_number'];//collecting form data.
    $status = $_POST['status'];

    $query = mysqli_query($dbconn, "insert into guest_reservation (First_name,Last_name,Telephone,Guest_number,Status) 
    value('$fname','$lname','$telephone','$guestnumber','$status')"); //SQL insert query to insert data into the database table.

    if($query){
        echo "<script>alert('Guest Details added successfully');</script>"; //if querry was successfull, brings alert
        echo "<script>window.location.href = 'thank_you.html'</script>";
    }

    else{
         echo "<script>alert('Something went wrong. Please try registering again.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Guest Reservation Page </title>
    </head>
    <style>
        form{
            display: flex;
            flex-direction: column;
            width: 80%;
            height: 100%;
            padding: 50px 30px;
        }
        body{
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            font-family: 'Nunito',sans-serif;
            align-items: center;
            background-color: beige;
        }
        .container{
            width: 100%;
            position: relative;
            overflow: hidden;
            height: 100vh
        }
        .content {
            padding: 20px;
            padding-left: 0px;
            width: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-items: left;
            margin-bottom:-20px;
            text-align: left;
        }
        
        input {
            padding: 10px;
            border-radius: 5px;
            border-width: 1px;
            margin-right: 15px;
            width:300px;
    
        }
        label {
            margin-right: 10px; 
            width: 140px;         
        }
        @media (max-width: 768px) {

            .content{
                flex-direction: column;
            }
            label{
                padding: 20px;
            }

        }
        button{
            background-color: burlywood;
            border-radius: 5px;
            padding:10px;
            margin-top: 20px;
            max-width: 300px;
            border-width: 0px;
            justify-self: center;
        }
        .transparent-image {
            position: absolute;
            top: 0;
            left: 0;
            object-fit: cover;
            width: 100%;
            height: 100%;
            opacity: 0.4;
            z-index: 1;
        }
        .Register{
            position: relative;
            z-index: 2;
            background-color: beige;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }
        .content_2{
            padding: 20px;
            padding-left: 0px;
            width: 100%;
            height: 60px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-items: left;
            margin-bottom:-20px;
            text-align: left;
        }
    </style>
  <body>
     <div class ="container">
        <img src="Serenity meets minimal elegance.jfif" alt="Transparent" class="transparent-image">
        <div class="Register">
            <form action="" method="post" enctype="multipart/form-data"> 
              <div class="Welcome">
                 <h1> <b> WELCOME TO ASCEND HOTEL:)</b>  </h1>
                 <h3>"we are happy to host you."</h3>
                 <h2>Please fill in your details.</h2>
             </div>

             <div class="content">
                 <label for="fname">First name:</label>
                 <input type="text" id="fname" name="fname" placeholder="e.g Phoebe" required>
                 <label for="lname">Last name:</label>
                 <input type="text" id="lname" name="lname" placeholder="e.g Atugonza" required>
             </div>

             <div class="content">
                 <label for="telephone">Telephone:</label>
                 <input type="text" id="telephone" name="telephone" placeholder="" required>
                 <label for="guest_number">Number of guests:</label>
                 <input type="number" id="guest_number" name="guest_number" placeholder="0" required>
             </div>

             <div class="content_2">
                 <label for="status">Select room type:</label>
                  <select id="status" name="status">
                    <option value="Double room">Double room</option>
                    <option value="Single room">Single room</option>
                    <option value="Family suite">Family suite</option>
                    </select>
              </div>
              <button type="submit" id="submit" name="submit">Submit</button>
            </form>
      </div>
    </body>
</html>
