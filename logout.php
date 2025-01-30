<?php
session_start();
session_unset(); // Hiq të gjitha variablat e sesionit
session_destroy(); // Shkatërro sesionin
header('Location: SignIn.php'); // Dërgo në faqen e kyçjes pas daljes
exit();
?>
