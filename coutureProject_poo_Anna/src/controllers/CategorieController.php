<?php
namespace Anna\Controllers;

use Anna\Core\Session;
use Anna\Core\Validator;
use Anna\Core\Controller;
use Anna\Model\CategorieModel;

class CategorieController extends Controller
{
    private CategorieModel $categoryModel;
    public function __construct()
    {
        parent::__construct("base");
        $this->categoryModel = new CategorieModel();
        $this->load() ;
    }
    public function load() {
        if (isset($_POST["action"])) {
            if ($_POST["action"]=='create') {
                unset($_POST["action"]);
                Validator::isEmpty($_POST['nomCategorie'], 'nomCategorie');
                if (Validator::isValide()) {
                    $categorie = $this->categoryModel->findByName($_POST['nomCategorie']);
                    if ($categorie) {
                        Validator::add('nomCategorie', 'Valeur existante');
                        Session::add('errors', Validator::$errors);
                        header("location:" . WEBROOT . "/?controller=categorie");
                    } else {
                        $this->create($_POST);
                    }

                } else {
                    Session::add("errors", Validator::$errors);
                    header("location:" . WEBROOT . "/?controller=categorie");
                }
            }
        } else {
            $this->list();
        }
    }
    public function list()
    {
        $categories = $this->categoryModel->findAll();
        $this->render("categories/categorie", array(
            "categories" => $categories,
        ));
    }

    public function create(array $data)
    {
        $this->categoryModel->save($data);
        header("location:" . WEBROOT . "/?controller=categorie");
    }
}