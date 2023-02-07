<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlleur_user extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
    }
	
	public function index()
	{
        $data['title'] = "Index";
        $data['pages'] = "index";
		$this->load->view('form-template', $data);
	}

	public function vers_login_admin()
	{
        $data['pages'] = "sign-in-admin";
        $data['title'] = "Login admin";
		$this->load->view('form-template', $data);
    }

    public function vers_login_client()
	{
        $data['pages'] = "sign-in-client";
        $data['title'] = "Login client";
		$this->load->view('form-template', $data);
    }

    public function vers_inscription_client()
	{
        $data['pages'] = "sign-up-client";
        $data['title'] = "Inscription client";
		$this->load->view('form-template', $data);
    }

    public function traitement_inscription_client()
	{
        $this->load->model('model_user');

		$nom = $this->input->post('nom');
		$mail = $this->input->post('mail');
		$mdp = $this->input->post('pswd');

		if (($nom != null) && ($mail != null) && ($mdp != null))
		{
			if(($this->model_user->inscription($nom, $mail, $mdp)))
			{   
                //$dataliste['listeobjets'] = $this->model_user->getlistemesobjet();
                $datalien['title'] = "Login client";
                $datalien['pages'] = "sign-in-client";

		        $this->load->view('form-template', $datalien);
			}
			else
			{
				echo "Erreur";
			}
		}
		elseif ((!isset($nom))||(!isset($mail))||(!isset($mdp))) 
		{
			echo "Misy valeur null";
		}
    }

    public function traitement_connexion_client()
	{	
		$this->load->model('model_user');

		$nom = $this->input->post('nom');
		$mdp = $this->input->post('pswd');


		if (($nom != null) && ($mdp != null))
		{
            $this->session->set_userdata('idutilisateur', ''.$this->model_user->verify_Login($nom, $mdp));
            $iduseractuel = $this->session->idutilisateur;
            $dataliste['listeobjets'] = $this->model_user->getlistemesobjet($iduseractuel);
            $dataliste['title'] = "Liste des objets du client";
            // $dataliste['title'] = $iduseractuel;

            $dataliste['pages'] = "accueil-client";

            $this->load->view('form-template', $dataliste);
		}
		elseif ((!isset($nom))||(!isset($mail))||(!isset($mdp))) 
		{
			echo "Misy valeur null";
		}
			
	}

    public function traitement_connexion_admin()
	{	
		$this->load->model('model_user');

		$nom = $this->input->post('nom');
		$mdp = $this->input->post('pswd');
        
		if (($nom != null) && ($mdp != null))
		{
			if(($this->model_user->verify_Login($nom, $mdp))!='not found')
			{   
                $this->session->set_userdata('idutilisateur', ''.$this->model_user->verify_Login($nom, $mdp));
                $dataliste['listecategories'] = $this->model_user->get_listCategories();
                $dataliste['title'] = "Gestion categorie";
                $dataliste['pages'] = "accueil-admin";

		        $this->load->view('form-template');
			}
			else
			{
				echo "Erreur";
			}
		}
		elseif ((!isset($nom))||(!isset($mdp))) 
		{
			echo "Misy valeur null";
		}
	}

    public function vers_gestion_categorie()
    {
		$this->load->model('model_user');
        $dataliste['listecategories'] = $this->model_user->get_listCategories();
        $dataliste['title'] = "Gestion categorie";
        $dataliste['pages'] = "accueil-admin";

        $this->load->view('form-template', $dataliste);
    }

    public function traitement_insertion_categorie()
    {
        $this->load->model('model_user');

		$nom = $this->input->post('nom');

        if ($nom != null)
		{
            $categorieefamisy = $this->user_model->getCategoriebyNom($nom);
			if(sizeof($categorieefamisy)==0)
			{   
                echo "Ajout categorie effectué";
                $this->user_model->insertionCategorie($nom);
                $dataliste['listecategories'] = $this->model_user->get_listCategories();
                $dataliste['title'] = "Gestion categorie";
                $dataliste['pages'] = "accueil-admin";

		        $this->load->view('form-template', $dataliste);
			}
			else
			{
				echo "Erreur, cette categorie existe deja";
			}
		}
		elseif ((!isset($nom))) 
		{
			echo "Misy valeur null";
		}

    }

    public function vers_liste_mes_objet()
    {
        $this->load->model('model_user');

        $iduseractuel = $this->session->idutilisateur;

        $dataliste['listeobjets'] = $this->model_user->getlistemesobjet($iduseractuel);
        $dataliste['title'] = "Liste des objets du client";
        // $dataliste['title'] = $iduseractuel;

        $dataliste['pages'] = "accueil-client";

        $this->load->view('form-template', $dataliste);
    }

    public function vers_fiche_unique_objet()
    {
        $this->load->model('model_user');
        $idobjet = $this->input->get('idobjet');

        $dataobjet['objetspecifie'] = $this->model_user->getobjetbyid($idobjet);
        $dataobjet['title'] = "Modification d'un objet";
        // $dataliste['title'] = $iduseractuel;
        $dataobjet['imagesobjet'] = $this->model_user->getobjetimage($idobjet);
        $dataobjet['pages'] = "modification-objet";

        $this->load->view('form-template', $dataobjet);
    }

    public function traitement_suppression_image()
    {
        $this->load->model('model_user');
        $idobjet = $this->input->get('idobjet');
        $idobjetimage = $this->input->get('idobjetimage');
        
        $dataobjet['title'] = "Modification d'un objet";
        // $dataliste['title'] = $iduseractuel;
        $dataobjet['imagesobjet'] = $this->model_user->getobjetimage($idobjet);
        $this->model->suppression_objet_image($idobjetimage);
        $dataobjet['pages'] = "modification-objet";

        $this->load->view('form-template', $dataobjet);
    }

    public function traitement_ajout_image()
    {
        $this->load->model('model_user');
        $idobjet = $this->input->get('idobjet');
        $idobjetimage = $this->input->get('idobjetimage');
        
        $dataobjet['title'] = "Modification d'un objet";
        // $dataliste['title'] = $iduseractuel;
        $dataobjet['imagesobjet'] = $this->model_user->getobjetimage($idobjet);
        $this->model->suppression_objet_image($idobjetimage);
        $dataobjet['pages'] = "modification-objet";

        $this->load->view('form-template', $dataobjet);
    }

	public function about()
    {
        //definition des donnees variables du template
        $data['title'] = 'Le titre de la page';
        $data['description'] = 'La description de la page pour les moteurs de recherche';
        $data['keywords'] = 'les, mots, clés, de, la, page';

        //on charge la view qui contient le corps de la page
        $data['contents']='welcome_message';
		//on charge la page dans le template
        $this->load->view('templates/template', $data);
       
    }

	public function redirectindex()
    {
        redirect('/welcome/index');
    }
}
?>
