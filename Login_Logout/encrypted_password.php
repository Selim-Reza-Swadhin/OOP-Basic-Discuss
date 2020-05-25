<?php
class Pass
{
protected $salt_length = 7;

    function generate_salted_hash($string, $salt = NULL)
    {
        //generate a salt if no salt is passed
        if (NULL == $salt) {
            $salt = substr(md5((string)time()), 0, $this->salt_length);
        } else {
            //get the salt from the provided string
            $salt = substr($salt, 0, $this->salt_length);
        }
        //add the salt to the hash and return it
        return $salt . sha1($salt . $string);
    }


    function test_salted_hash($string, $salt = NULL)
    {
        return $this->generate_salted_hash($string, $salt);
    }
}

$passs = new Pass();

//$pass = $passs->test_salted_hash("admin123", $salt = NULL);
$pass = $passs->test_salted_hash("admin123");

echo 'Hash of "admin123":<br/>' . $pass . "<br/> <br/>";

