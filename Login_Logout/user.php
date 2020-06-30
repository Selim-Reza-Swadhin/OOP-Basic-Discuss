<?php
require_once 'pdodb.php';
session_start();

class User{
    private $db;
    private $salt_length = 7;

    public function __construct($saltLength = 7)
    {
      $this->db = new DBConnect();
      if (is_int($saltLength)){
          $this->salt_length = $saltLength;
      }
    }

    public function processLoginForm()
    {
        //fails if proper action was not submitted
        if ($_POST['getaction'] != 'user_login'){
            $_SESSION['error'] = "Invalid action !";
            header('location:./login.php');
            return false;
        }
        //escape the user input for security
        $uname = htmlentities($_POST['uname'], ENT_QUOTES);
        $pword = htmlentities($_POST['pword'], ENT_QUOTES);
        //retrieves the matching info from the DB if it exists
        $sql = "SELECT id, login_name, user_email, password FROM `users` WHERE `login_name` = :uname || `user_email` = :uname LIMIT 1";
        

        try
        {
            $stmt = $this->db->get_db()->prepare($sql);
            $stmt->bindParam(':uname', $uname, PDO::PARAM_STR);
            $stmt->execute();
            $feetch = $stmt->fetchAll();
            $user = array_shift($feetch);
            $stmt->closeCursor();

            if (empty($user)){
                throw new \Exception('User not found');
            }
            //get the hash of the user-supplied password
            $hash = $this->generate_salted_hash($pword, $user['password']);

            //check the hashed password with the stored hash
            if ($user['password'] === $hash){
                //stores user info in the session as an array
               /*$_SESSION['useer']= array(
                    'id' => $user['id'],
                    'name' => $user['login_name'],
                    'email' => $user['user_email']
                );*/
                $_SESSION['useer'] = $user['login_name'];
                $_SESSION['useerEmail'] = $user['user_email'];

                header('location:home.php');
            }else{
                throw new \Exception('<span style="color: red">Your username or password is invalid.</span>');
            }


        }catch (\Exception $e) {
            //in case of failure output the error
            $_SESSION['error'] = $e->getMessage();
            header('location:./login.php');
        }
    }



    private function generate_salted_hash($string, $salt = NULL)
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


    public function test_salted_hash($string, $salt = NULL)
    {
        return $this->generate_salted_hash($string, $salt);
    }

    public function logout()
    {
      session_destroy();
    }

}
