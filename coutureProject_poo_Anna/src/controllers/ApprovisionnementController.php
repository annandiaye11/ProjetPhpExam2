<?php
namespace Anna\Controllers;

use Anna\Core\Session;
use Anna\Core\Controller;
use Anna\model\ApprovisionnementModel;
use Anna\Model\TypeModel;
use Anna\Core\Autorisation;
use Anna\Model\PanierModel;
use Anna\Model\ArticleModel;
use Anna\model\FournisseurModel;

class ApprovisionnementController extends Controller
{
    private ArticleModel $articleModel;

    private ApprovisionnementModel $approModel;
    private FournisseurModel $fournisseurModel;

    public function __construct()
    {
        parent::__construct("base");
        if (!Autorisation::isConnect()) {
            header("location:" . WEBROOT . "/?controller=login");
        }
        $this->articleModel = new ArticleModel();
        $this->fournisseurModel = new FournisseurModel();
        $this->approModel = new ApprovisionnementModel();
        $this->load();
    }

    public function load()
    {
        // print_r($_SESSION);
        if (isset($_GET['action'])) {
            if ($_GET['action'] == "liste-appro") {
                $this->listAppro();
            } else if ($_GET["action"] == "form-appro") {
                $this->formAppro();
            
            }else if ($_GET["action"] == "add-appro") {
                $this->ajouterAppro();
            }
            else if (str_contains($_GET["action"], "suppr_")) {
                $id = intval(substr($_GET["action"], strlen("suppr_"), strlen($_GET["action"]) - strlen("suppr_")));
                $this->suppr($id);
            } else if (str_contains($_GET["action"], "edit_")) {
                $id = intval(substr($_GET["action"], strlen("edit_"), strlen($_GET["action"]) - strlen("edit_")));
                $this->formAppro($id);
            }
        } elseif (isset($_POST["action"])) {
            if ($_POST["action"] == "create") {
                // unset($_POST["action"]);
                // if ($_POST["id"] == '') {
                //     $this->create($_POST);
                // } else {
                //     $id = intval($_POST['id']);
                //     unset($_POST['id']);
                //     $this->edit($id, $_POST);
                // }
            } else if ($_POST["action"] == "add-articleappro") {
                $this->ajouterArticleAppro($_POST);
               
            } 
        } else {
            $this->listAppro();
        }
    }
    public function listAppro(): void
    {
        $this->render("appros/list",[
                "appros" =>$this->approModel->findAll()
            ]
        );
    }
    public function formAppro($id = null)
    { 
        $this->render("appros/form", [
            "fournisseurs" => $this->fournisseurModel->findAll(),
            "articles" => $this->articleModel->findAll(),
        ]);
    }
    public function ajouterArticleAppro(array $data)
    {
        if ($_SESSION["panier"] == false) {
            $panier = new PanierModel();
        } else{
            $panier = $_SESSION["panier"]; 
        }
        
        $panier->addArticle($this->articleModel->findById($data["idArticle"]),$data["idFour"],$data["qte"]);
        Session::add("panier",$panier); 
        header("location:" . WEBROOT . "/?controller=appro&action=form-appro");
    }
    public function ajouterAppro()
    {
        $panier = $_SESSION["panier"];
        $this->approModel->save($panier);
        Session::remove("panier");
        // $this->articleModel->save($data);
        header("location:" . WEBROOT . "/?controller=appro&action=form-appro");
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