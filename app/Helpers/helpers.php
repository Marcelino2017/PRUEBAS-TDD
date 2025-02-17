<?php


function mail_validation($mail)
{
    return  (bool) filter_var($mail, FILTER_VALIDATE_EMAIL);
}
