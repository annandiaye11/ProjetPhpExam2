<?php
namespace Anna\Controllers;

use Anna\Core\Controller;
use Anna\Model\TypeModel;
use Anna\Core\Autorisation;
use Anna\Model\ArticleModel;
use Anna\Model\CategorieModel;

class ArticleController extends Controller
{
    private ArticleModel $articleModel;
    private TypeModel $typeModel;
    private CategorieModel $categoryModel;

    public function __construct()
    {
        parent::__construct("base");
        if (!Autorisation::isConnect()) {
            header("location:" . WEBROOT . "/?controller=login");
        }
        $this->articleModel = new ArticleModel();
        $this->typeModel = new TypeModel();
        $this->categoryModel = new CategorieModel();
        $this->load();
    }

    public function load()
    {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == "liste") {
                $this->list();
            } else if ($_GET["action"] == "form") {
                $this->form();
            } else if (str_contains($_GET["action"], "suppr_")) {
                $id = intval(substr($_GET["action"], strlen("suppr_"), strlen($_GET["action"]) - strlen("suppr_")));
                $this->suppr($id);
            } else if (str_contains($_GET["action"], "edit_")) {
                $id = intval(substr($_GET["action"], strlen("edit_"), strlen($_GET["action"]) - strlen("edit_")));
                $this->form($id);
            }
        } elseif (isset($_POST["action"])) {
            if ($_POST["action"] == "create") {
                unset($_POST["action"]);
                if ($_POST["id"] == '') {
                    $this->create($_POST);
                } else {
                    $id = intval($_POST['id']);
                    unset($_POST['id']);
                    $this->edit($id, $_POST);
                }
            }
        } else {
            $this->list();
        }
    }
    public function list()
    {
        $articles = $this->articleModel->findAll();
        $this->render(
            "articles/list",
            array(
                "articles" => $articles
            )
        );
    }
    public function form($id = null)
    {
        $types = $this->typeModel->findAll();
        $categories = $this->categoryModel->findAll();
        $data = array();
        if ($id == null) {
            $data = array(
                "types" => $types,
                "categories" => $categories
            );
        } else {
            $article = $this->articleModel->findById($id);
            $data = array(
                "types" => $types,
                "categories" => $categories,
                "article" => $article
            );
        }
        $this->render("articles/form", $data);
    }
    public function create(array $data)
    {
        $this->articleModel->save($data);
        header("location:" . WEBROOT . "/?controller=article&action=liste");
    }

    public function suppr(int $id)
    {
        $this->articleModel->delete($id);
        header("location:" . WEBROOT . "/?controller=article&action=liste");
    }
    public function edit(int $id, array $data)
    {
        $this->articleModel->update($id, $data);
        header("location:" . WEBROOT . "/?controller=article&action=liste");
    }

}