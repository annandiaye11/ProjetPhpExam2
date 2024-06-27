<?php
namespace Anna\Controllers;

use Anna\Core\Session;
use Anna\Core\Validator;
use Anna\Core\Controller;
use Anna\Model\TypeModel;
use Anna\Core\Autorisation;

class TypeController extends Controller
{
    private TypeModel $typeModel;
    public function __construct()
    {
        parent::__construct("base");
        if (!Autorisation::isConnect()) {
            header("location:" . WEBROOT . "/?controller=login");
        }
        $this->typeModel = new TypeModel();
        $this->load();
    }

    public function load()
    {
        if (isset($_POST["action"])) {
            if ($_POST["action"] == 'create') {
                unset($_POST["action"]);
                Validator::isEmpty($_POST['nomType'], 'nomType');
                if (Validator::isValide()) {
                    $type = $this->typeModel->findByName($_POST['nomType']);
                    if ($type) {
                        Validator::add('nomType', 'Valeur existante');
                        Session::add('errors', Validator::$errors);
                        header("location:" . WEBROOT . "/?controller=type");
                    } else {
                        $this->create($_POST);
                    }
                } else {
                    Session::add("errors", Validator::$errors);
                    header("location:" . WEBROOT . "/?controller=type");
                }
            }
        } else {
            $this->list();
        }
    }
    public function list()
    {
        $types = $this->typeModel->findAll();
        $this->render(
            "types/type",
            array(
                "types" => $types
            )
        );
    }

    public function create(array $data)
    {
        $this->typeModel->save($data);
        header("location:" . WEBROOT . "/?controller=type");
    }
}