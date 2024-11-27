<?php
 include("conn.php");

 $newsEmail = isset($_POST['newsEmail'])  ? $_POST['newsEmail'] : "";

 $query = "Insert into newsLetter (email ) values(?)";
 $stmt = $connect->prepare($query);
 $stmt ->bind_param("s",$newsEmail);
 if ($stmt->execute()) {
    echo "<p class='news-note'>Thank you for your message. We will get in touch with you shortly</p>";
 }
?>
