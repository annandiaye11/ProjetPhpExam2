<?php
namespace Anna\Controllers;
use Anna\Core\Session;
use Anna\Core\Validator;
use Anna\Core\Controller;
use Anna\Model\UserModel;


class SecuriteController extends Controller
{
    private UserModel $user_model;

    public function __construct()
    {
        parent::__construct("basesecure");
        $this->user_model = new UserModel();
        $this->load();
    }

    public function load()
    {

        if (isset($_POST["action"])) {

            if ($_POST["action"] == "log") {
            // var_dump($_POST);
                    unset($_POST["action"]);
                    $this->connect($_POST);
                }
        } else {
            Session::remove("user");
            $this->loginform();
        }
    }

    private function loginform()
    {
        $this->render('security/login', array());
    }

    private function connect($data)
    {
        Validator::isEmpty($data['login'], 'login');
        Validator::isEmpty($data['password'], 'password');
        Validator::isEmail( $data['login']);
        if (Validator::isValide()) {
            $user = $this->user_model->findByLoginPassword($data);
            if ($user) {
                Session::add('user', $user);
                echo'+++++++++++';
                
                header("location:". WEBROOT ."/?controller=article&action=liste");
            } else {
                Validator::add('login', 'login incorrect');
                Validator::add('password', 'password incorrect');
                Session::add('errors', Validator::$errors);
                header("location:". WEBROOT ."/?controller=login");
            }
        } else {
            Session::add('errors', Validator::$errors);
            header("location:". WEBROOT ."/?controller=login");
        }
    }
}