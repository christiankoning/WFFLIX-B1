<?php
require 'controllers/Mail.php';
//check if there is not post data (this is when the page first loads)
if (!empty($_POST)) {
    //check if the post data has been set (this should be set by default)
    if (isset($_POST['email']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['subject'])) {
        //bind post data to variables
        $email = $_POST['email'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $subject = $_POST['subject'];

        //check if the email field is empty
        if (empty($email)) {
            $error = 'Uw email mag niet leeg zijn';
        }//check if the first name field is empty
        else if (empty($firstName)) {
            $error = 'Uw voornaam mag niet leeg zijn';

        }//check if the last name field is empty
        else if (empty($lastName)) {
            $error = 'Uw achternaam mag niet leeg zijn';
        }//check if the subject field is empty
        else if (empty($subject)) {
            $error = 'Uw bericht mag niet leeg zijn';
        } //check if email is a valid email
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Ongeldige email';
        } else {
            //send email (and check if the email is send)
            $succes = Mail::send('contact@wfflix.nl', "Een nieuw bericht", "\nBericht van: \n\nEmail: " .$email. "\nVoornaam: ". $firstName . "\nAchternaam: " . $lastName . "\n\nBericht: \n\n". $subject );

            //send succes message if the email has been send
            if ($succes) {
                $error = "uw bericht is verzonden";
            } else {
                //send error message if there goes something wrong when sending the mail
                $error = "Er ging iets fout met het verzenden van uw bericht. Probeert u het later nog een keer";
            }

        }
    }
}
require 'views/contact.view.php';