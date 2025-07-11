<?php

/**
 * Class login
 * handles the user's login and logout process
 */
class Login
{
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct()
    {
        // create/read session, absolutely necessary
        session_start();

            $this->dologinWithPostData();
        
    }

    /**
     * log in with post data
     */
    private function dologinWithPostData()
    {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);



            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
               // $user_name = $this->db_connection->real_escape_string($_POST['user_name']);

                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)

                $user_name = $_SESSION['user_name'];


                $sql = "UPDATE users3 SET prem = 1 WHERE user_name = '" . $user_name . "'";
                $this->db_connection->query($sql);

              
                $sql1 = "SELECT user_name, user_email, user_password_hash, prem
                FROM users3
                WHERE user_name = '" . $user_name . "'";
                $result_of_login_check = $this->db_connection->query($sql1);


                // if this user exists


                


                        // get result row (as an object)
                        $result_row = $result_of_login_check->fetch_object();




                            
         
                            if ($result_row->prem)
                            {
                                $_SESSION['premium_status'] = 1; 
                            }


                            
     

                } 
             else {
                $this->errors[] = "Database connection problem.";
            }
        
    }

    /**
     * perform the logout
     */


    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
    {
        if ($_SESSION['premium_status']) {
        //if ( $_SESSION['user_prem'] == 1) {
                return true;
        //  }
        }
        // default return
        return false;
    }
}