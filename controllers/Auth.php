<?php

class Auth
{
    //Fuction to check if current user is logged in (returns true / false)
    public static function isLoggedIn()
    {
        if (empty($_SESSION['loggedIn'])) {
            return false;
        } else {
            return true;
        }
    }

    //Fuction to check if current user is admin (returns true / false)
    public static function isTeacher()
    {
        if (empty($_SESSION['role'])) {
            return false;
        } else {
            if ($_SESSION['role'] == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    //Fuction to check if current user is admin (returns true / false)
    public static function isAdmin()
    {
        if (empty($_SESSION['role'])) {
            return false;
        } else {
            if ($_SESSION['role'] == 2) {
                return true;
            } else {
                return false;
            }
        }
    }


}