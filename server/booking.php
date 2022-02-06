<?php include 'DB.php'; ?>
<?php include 'function.php'; ?>
<?php
    //Desclare variables
    $firstname; $lastname; $address; $phone; $booking; $date_booked;
    //set variable
    
    if(isset($_POST["firstname"]) && isset($_POST['lastname']) 
    && isset($_POST['contact_address']) && isset($_POST['phone']) 
    && isset($_POST['booking']) && isset($_POST['date_booked']))
    {
        if(!empty($_POST['firstname']) && !empty($_POST['lastname']) 
        && !empty($_POST['contact_address']) && !empty($_POST['phone']) 
        && !empty($_POST['booking']) && !empty($_POST['date_booked']))
        {
            //cleaning data
            $firstname = clean_data($_POST['firstname']);
            $lastname = clean_data($_POST['lastname']);
            $address = clean_data($_POST['contact_address']);
            $phone = clean_data($_POST['phone']);
            $booking = clean_data($_POST['booking']);
            $date_booked = clean_data($_POST['date_booked']);
            
            //inserting data
            $stmt = $conn->prepare("INSERT INTO booking (firstname, lastname, contact_address, phone, booking, date_booked) 
            VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $firstname, $lastname, $address, $phone, $booking, $date_booked);

            if($stmt->execute()){
             header("Location: result.php?result=sucess");
            }else{
                header("Location: result.php?result=failure");
            }
            $stmt->close();
            $conn->close();
            
        }
    }else{
        header("Location: ../booking.html");
    }
?>