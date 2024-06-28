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

class FournisseurController extends Controller
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
        if (isset($_GET['action'])) {
            if ($_GET['action'] == "get-tel") {
                $this->getTel($_REQUEST);
            } 
        } elseif (isset($_POST["action"])) {
            
        }
    }
    public function getTel($data): array
    {
        $telFour = $data['tel'];
        $fournisseur = $this->fournisseurModel->findByTel($telFour);
        dd($fournisseur);
        return $fournisseur;
    }
    
}