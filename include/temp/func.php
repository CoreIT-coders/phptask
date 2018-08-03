<?php

function check_new_patient($name,$disease,$state)
{
    $name=trim($name);
    $disease=trim($disease);
    $state=trim($state);
    if(preg_match('#(?<=<)\w+(?=[^<]*?>)#', $name) || empty($name))
        {
            $GLOBALS['nameerror']="Please insert the correct Name";
            return false;
        }
        elseif(preg_match('#(?<=<)\w+(?=[^<]*?>)#', $disease) || empty($disease))
        {
            $GLOBALS['diseaseerror']="Please insert the correct Disease";
            return false;
        }
        elseif(preg_match('#(?<=<)\w+(?=[^<]*?>)#', $state) || empty($state))
        {
            $GLOBALS['stateerror']="Please insert the correct State";
            return false;
        }
        else
        {
            return true;
        }
}

function check_for_search($name)
{
    $name=trim($name);
    
    if(preg_match('#(?<=<)\w+(?=[^<]*?>)#', $name) || empty($name))
        {
            $GLOBALS['search']="Invalid Name try Again";
            return false;
        }
    else
        {
            return true;
        }
}
function check_login($email,$pass)
{
    $email=trim($email);
    $pass =trim($pass);
    
    if(preg_match('#(?<=<)\w+(?=[^<]*?>)#', $email) || empty($email))
        {
            $GLOBALS['emailerror']="border-danger";
            return false;
        }
    elseif(preg_match('#(?<=<)\w+(?=[^<]*?>)#', $pass) || empty($pass))
        {
            $GLOBALS['passerror']="border-danger";
            return false;
        }
    else
        {
            return true;
        }
}
function check_signup($name,$email,$user,$pass,$rpass)
{
    $name=trim($name);
    $email=trim($email);
    $user=trim($user);
    $pass =trim($pass);
    $rpass=trim($rpass);
    
    if(preg_match('#(?<=<)\w+(?=[^<]*?>)#', $name) || empty($name))
        {
            $GLOBALS['nameerror']="border-danger";
            return false;
        }
    elseif(preg_match('#(?<=<)\w+(?=[^<]*?>)#', $email) || empty($email))
        {
            $GLOBALS['emailerror']="border-danger";
            return false;
        }
    elseif(preg_match('#(?<=<)\w+(?=[^<]*?>)#', $user) || empty($user))
        {
            $GLOBALS['usererror']="border-danger";
            return false;
        }
    elseif(preg_match('#(?<=<)\w+(?=[^<]*?>)#', $pass) || empty($pass))
        {
            $GLOBALS['passerror']="border-danger";
            return false;
        }
    elseif($rpass!=$pass)
        {
            $GLOBALS['rpasserror']="border-danger";
            return false;
        }
    else
        {
            return true;
        }
}
function check_forgetpass_email($email)
{
    $email=trim($email);
    
    if(preg_match('#(?<=<)\w+(?=[^<]*?>)#', $email) || empty($email))
        {
            $GLOBALS['emailerror']="border-danger";
            return false;
        }
        else
        {
            return true;
        }
}
function check_restpass_pass($pass,$rpass)
{
    $pass =trim($pass);
    $rpass=trim($rpass);
    
    if(preg_match('#(?<=<)\w+(?=[^<]*?>)#', $pass) || empty($pass))
        {
            $GLOBALS['passerror']="border-danger";
            return false;
        }
        if($rpass!=$pass)
            {
                $GLOBALS['rpasserror']="border-danger";
                return false;
            }
    else
        {
            return true;
        }
}

function change_user_date($name,$email,$user)
{
    $name=trim($name);
    $email=trim($email);
    $user=trim($user);
    
    if(preg_match('#(?<=<)\w+(?=[^<]*?>)#', $name) || empty($name))
        {
            $GLOBALS['nameerror']="border-danger";
            return false;
        }
    elseif(preg_match('#(?<=<)\w+(?=[^<]*?>)#', $email) || empty($email))
        {
            $GLOBALS['emailerror']="border-danger";
            return false;
        }
    elseif(preg_match('#(?<=<)\w+(?=[^<]*?>)#', $user) || empty($user))
        {
            $GLOBALS['usererror']="border-danger";
            return false;
        }
    else
        {
            return true;
        }
}

function change_user_password($pass,$rpass)
{
    $pass =trim($pass);
    $rpass=trim($rpass);
    
    if(preg_match('#(?<=<)\w+(?=[^<]*?>)#', $pass) || empty($pass))
        {
            return false;
        }
    elseif($rpass!=$pass)
        {
            return false;
        }
    else
        {
            return true;
        }
}