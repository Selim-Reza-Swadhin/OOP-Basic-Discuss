<?php
//some variable
$user = "Raida";

//closure function
$message = function () use ($user)
            {
                echo "Hi, $user !";
            };

//call the closure function
$message();

