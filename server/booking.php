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
            //send email
                $to = "imoleayomoses0@gmail.com";
                $subject = "GLAMBYDEBBIE BOOKING";

                $message = "
                ?>
                <html>
                <head>
                <title>Booking</title>
                </head>
                <body>
                <p>Hurray!!!, you can successfully make your booking with glambydebbie. we will contact you shortly</p>
                <table>
                <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Description</th>
                <th>Date booked</th>
                </tr>
                <tr>
                <td><?php echo $firstname; ?></td>
                <td><?php echo $lastname; ?></td>
                <td><?php echo $address; ?></td>
                <td><?php echo $phone; ?></td>
                <td><?php echo $booking; ?></td>
                <td><?php echo $date_booked; ?></td>
                </tr>
                </table>
                </body>
                </html>
                ";
<?php
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: imoleayothestembelle@gmail.com' . "\r\n";
                $headers .= 'Cc: amojisola06@gmail.com' . "\r\n";

                mail($to,$subject,$message,$headers);
            

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