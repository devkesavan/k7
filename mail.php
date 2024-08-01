<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $message = trim($_POST['message']);

    $errors = [];

   
    if (empty($name) || empty($email) || empty($mobile) ||  empty($message)) {
        $errors[] = "All fields are required.";
    }

   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }


    if (!preg_match('/^[0-9]{10}$/', $mobile)) {
        $errors[] = "Invalid mobile number. Please enter a 10-digit number.";
    }

   
    if (empty($errors)) {
        

$msg ="Hello Aldous physio rehab,""<br>"
"<table style=width:60%S>
<tr>
<th>Name</th>
<td>{$name}</td>
</tr>
<tr>
<th>Email</th>
<td>{$email}</td>
</tr>
<tr>
<th>Mobile</th>
<td>{$mobile}</td>
</tr>
<tr>
<th>Message</th>
<td>{$message}</td>
</tr>
</table>
<br>
Regards,<br>
{$name}";


$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$headers .= 'Cc:yamee.mari@gmail.com' . "\r\n";

mail("info@aldousphysiorehab.co.in ","Enquiry from".$name ,$msg ,$headers);
 echo "<script>alert(message sent successfully) window.location.href = contact.php</script>";

exit;
 } else {
            $errors[] = "Failed to send email. Please try again later.";
 }
    

  
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    }
}
?>
