<?php
      session_start();
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "registration";
      
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) 
	    {
          die("Connection failed: " . $conn->connect_error);
        } 
		else
		{
		 echo "Succesfull";
		}
	   // echo $_session['uname'];
	    $uname=$_POST['uname'];
	    $pass=$_POST['password'];
		  if($uname=="")
          {
	       echo "User Name is not valid<br>";
	     
          }
       if($pass=="")
         {
	     echo "Password is not valid<br>";
	    
         }
		
		$sql = "SELECT * FROM user_details WHERE user_name='$uname' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
		 {
    // output data of each row
        while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
        echo "Email: " . $row["email"]. " - User name: " . $row["user_name"]. "<br>";
        echo "Password: " . $row["password"]. " - Create at: " . $row["created_at"]. "<br>";
        }
        } 
		else 
		{
        echo "0 results";
		}
?>