 <?php
    switch($_POST['donor-or-not']) {
        case "Yes":
            header("Location: request-login.html");
            break;
        case "No":
            header("Location: addRequest.html");
            break;
        default:
            $value = "No radio has been selected for Radio Group 1";
    }
?>