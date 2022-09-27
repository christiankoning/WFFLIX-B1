<?php

class Mail
{
    //function to send a mail default it send from no-reply@wfflix.com for info mails set $domain to info
    public static function send($to, $subject, $msg, $domain = "no-reply")
    {
        //makes shure lines dont get to long
        $msg = wordwrap($msg,70);
        //set content type so mail clients know what char type is used
        $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
        //set the sender
        $headers .= "From: ".$domain."@wfflix.com";
        try {
            //send the mail with data
            mail($to,$subject,$msg,$headers);
            return true;
        }

        catch (Exception $e){
            return false;
        }



    }
}
