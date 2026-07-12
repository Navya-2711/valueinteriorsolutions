<?php
if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "info@valueinteriorsolutions.com";
    $email_subject = "Enquiry from Value Interior Solutions Website Contact Form";
     
     // Designed & Developed by Shashi G Kiran (shashigkiran@gmail.com)
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['yourname']) ||
        !isset($_POST['email']) ||
		!isset($_POST['phone']) ||
		!isset($_POST['city']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
    }
     
    $yourname = $_POST['yourname']; // required
    $email_from = $_POST['email']; // required
	$phone_from = $_POST['phone']; // required
    $city = $_POST['city']; // not required
    $comments = $_POST['comments']; // required
     // Designed & Developed by Shashi G Kiran (shashigkiran@gmail.com)
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$yourname)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style='color:#263441; font-size:20px'>Enquiry from Value Interior Solutions Website Contact Form.</strong><br /><br />";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "<table style='color:#52708C; font-size:15px' border=0 cellspace=5 cellpadding=5><tr><td><b>Client Name</b></td><td>:</td><td>".clean_string($yourname)."</td></tr>";
    $email_message .= "<tr><td><b>Email</b></td><td>:</td><td>".clean_string($email_from)."</td></tr>";
	$email_message .= "<tr><td><b>Phone</b></td><td>:</td><td>".clean_string($phone_from)."</td></tr>";
    $email_message .= "<tr><td><b>City</b></td><td>:</td><td>".clean_string($city)."</td></tr>";
    $email_message .= "<tr><td><b>Queries</b></td><td>:</td><td>".clean_string($comments)."</td></tr></table>";
     
     // Designed & Developed by Shashi G Kiran (shashigkiran@gmail.com)
// create email headers
$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 
?>
 
<!-- include your own success html here -->
<!--  Designed & Developed by Shashi G Kiran (shashigkiran@gmail.com) -->
<script type="text/javascript">
    alert("Your Queries has been sent.. We will get back to you soon.. Thank You.");
    history.back();
  </script>

<?php
    }

      else
{
?>
	
<script type="text/javascript">
    alert("Failed to send. Please give correct eMail address.");
    history.back();
  </script>
	


<?php } ?>