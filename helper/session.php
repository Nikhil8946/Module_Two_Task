<?php
session_start();
include '../frontened/login.php.php';
/**
 * setSession
 *sets session values
 * @param  mixed $data
 * @return void
 */
function setSession()
{
    include '../frontened/login.php.php';
    $_SESSION["username"] = $POST["username"];
    $_SESSION["password"] = $POST["password"];
}
/**
 * isLoggedIn
 *checks if user is logged in or not
 * @return boolean
 */
function isLoggedIn()
{
    if (isset($_SESSION["username"])) {
        return true;
    }
    return false;
}
/**
 * logout
 *destroys and unset session
 * @return void
 */
function logout()
{
    session_unset();
    session_destroy();
}
