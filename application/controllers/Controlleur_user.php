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
			if(($this->model_user->verifierlogin($nom, $mail, $mdp))==0)
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

    public function traitementloginclient()
	{	
		$this->load->model('model_user');

		$nom = $this->input->post('nom');
		$mdp = $this->input->post('pswd');


		if (($nom != null) && ($mdp != null))
		{
			if(($this->model_user->verify_Login($nom, $mdp))!='not found')
			{   
                $this->session->set_userdata('idutilisateur', ''.$this->model_user->verify_Login($nom, $mdp));
                $dataliste['listeobjets'] = $this->model_user->getlistemesobjet();
                $dataliste['title'] = "Liste des objets du client";
                $dataliste['pages'] = "accueil-client";

		        $this->load->view('form-template', $dataliste);
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

    public function traitementloginadmin()
	{	
		$this->load->model('model_user');

		$nom = $this->input->post('nom');
		$mdp = $this->input->post('pswd');


		if (($nom != null) && ($mdp != null))
		{
			if(($this->model_user->verify_Login($nom, $mdp))!='not found')
			{   
                $this->session->set_userdata('idutilisateur', ''.$this->model_user->verify_Login($nom, $mdp));
                $dataliste['listeobjets'] = $this->model_user->getlistemesobjet();
                $dataliste['title'] = "Liste des objets du client";
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
    


	

    public function testajoutdepense()
    {
        $this->load->model('utilisateurs_model', 'user_model');

		$daty = $this->input->get('daty');
		$idcat = $this->input->get('type');
        $montant = $this->input->get('montant');
        $idbenef = $this->input->get('idbenef');

        if (($daty != null) && ($idcat != null) && ($montant != null) && ($idbenef != null))
		{
			if(($this->user_model->getbudgetseloncategorie($idcat)) < $montant)
			{   
                echo "Ajout effectué";
                $this->user_model->ajoutdepense($daty, $idcat, $montant, $idbenef);
		        $this->load->view('ajoutdepense');
			}
			else
			{
				echo "Erreur, le montant est superieur au budget mensuel pour cette categorie";
			}
		}
		elseif ((!isset($daty))||(!isset($idcat))||(!isset($daty))||(!isset($idcat))) 
		{
			echo "Misy valeur null";
		}

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
