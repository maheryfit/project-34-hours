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
		$this->load->view('accueil');
	}

	public function verslogin()
	{
		$this->load->view('accueil');	
    }
    
    public function versajout()
    {
        $this->load->model('utilisateurs_model', 'user_model');
        $dataliste['data'] = $this->user_model->getlistecategorie();
        $dataliste['databenef'] = $this->user_model->getlistebeneficiaire();

		$this->load->view('ajoutdepense', $dataliste);
    }

	public function testloginuseretredirect()
	{	
		$this->load->model('utilisateurs_model', 'user_model');

		$nom = $this->input->get('nameuser');
		$pwd = $this->input->get('passworduser');

		if (($nom != null) && ($pwd != null))
		{
			if(($this->user_model->verifierlogin($nom, $pwd))==0)
			{   
                $dataliste['data'] = $this->user_model->getlistecategorie();
                $dataliste['databenef'] = $this->user_model->getlistebeneficiaire();

		        $this->load->view('accueiluser');
			}
			else
			{
				echo "Erreur";
			}
		}
		elseif ((!isset($nom))||(!isset($pwd))) 
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
