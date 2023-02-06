<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlleur_admin_user extends CI_Controller {

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

	public function testloginadminetredirect()
	{	
		$this->load->model('administrateurs_model', 'admin_model');

		$nom = $this->input->get('nomadmin');
		$pwd = $this->input->get('passwordadmin');

		if (($nom != null) && ($pwd != null))
		{
			if(($this->admin_model->verifierlogin($nom, $pwd))==0)
			{
				$this->load->view('menu_admin');

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

	public function verscreationcategorie()
	{
		$this->load->view('creationcategorie');
	}

	public function testcreactioncategorie()
	{
		$this->load->model('administrateurs_model', 'admin_model');
		$nomcat = $this->input->get('categorie');
		$budgetcat = $this->input->get('budget');

		if (($nomcat != null) && ($budgetcat != null))
		{
			if(($this->admin_model->creationcategoriedepense($nomcat, $budgetcat))==0)
			{
				$this->load->view('creationcategorie');
				echo "Ajout reussi";
			}
			else
			{
				echo "Erreur";
			}
		}
		elseif ((!isset($nomcat))||(!isset($budgetcat))) 
		{
			echo "Misy valeur null";
		}

	}

	public function verscreationsalaire()
	{
		$this->load->model('administrateurs_model', 'admin_model');
		$dataliste['data'] = $this->admin_model->getlisteutilisateur();
		$this->load->view('creationsalaire', $dataliste);
	}

	public function testcreationsalaireuser()
	{
		$this->load->model('administrateurs_model', 'admin_model');
		$nom = $this->input->get('nomuser');
		$salaireuser = $this->input->get('salaire');

		
		if (($nom != null) && ($salaireuser != null))
		{
			if(($this->admin_model->creationsalaireuser($nom, $salaireuser))==0)
			{
				echo "Salaire defini";
				$this->load->view('creationsalaire');
			}
			else
			{
				echo "Erreur";
			}
		}
		elseif ((!isset($nom))||(!isset($salaireuser))) 
		{
			echo "Misy valeur null";
		}
	}

	public function versajoututilisateur()
    {
		$this->load->view('ajoututilisateur');
    }

	public function testajoutuser()
	{
		$this->load->model('administrateurs_model', 'admin_model');

		$nomuser = $this->input->get('nom');
		$mdpuser = $this->input->get('mdp');
		$salaireuser = $this->input->get('salaire');


		if (($nomuser != null) && ($mdpuser != null) && ($salaireuser != null))
		{
			if(($this->admin_model->ajoututilisateur($nomuser, $mdpuser, $salaireuser))==0)
			{
				$this->load->view('ajoututilisateur');
				echo "Ajout reussi";
			}
			else
			{
				echo "Erreur";
			}
		}
		elseif ((!isset($nomuser))||(!isset($mdpuser))||(!isset($salaireuser))) 
		{
			echo "Misy valeur null";
		}

	}

	public function testsuppruser()
	{
		$this->load->model('administrateurs_model', 'admin_model');

		$nomuser = $this->input->get('nom');
	

		if ($nomuser != null)
		{
			if(($this->admin_model->suppressionutilisateur($nomuser)==0))
			{
				$this->load->view('ajoututilisateur');
				echo "Suppression reussi";
			}
			else
			{
				echo "Erreur";
			}
		}
		elseif (!isset($nomuser)) 
		{
			echo "Misy valeur null";
		}

	}

	public function versselectusertobenef()
	{
		$this->load->model('administrateurs_model', 'admin_model');
		$dataliste['data'] = $this->admin_model->getlisteutilisateur();
		$this->load->view('selectuserofbenef', $dataliste);
	}

	public function testusertobenef()
	{
		$this->load->model('administrateurs_model', 'admin_model');

		$id = $this->input->get('iduser');

		$dataliste['data'] = $this->admin_model->selectionutilisateurdebenef($id);
		$dataliste['datauser'] = $this->admin_model->getlisteutilisateur();

		$this->load->view('listebeneficiaire', $dataliste);

	}

	public function testsupprbenef()
	{
		$this->load->model('administrateurs_model', 'admin_model');

		$id = $this->input->get('iduser');

		$dataliste['data'] = $this->admin_model->selectionutilisateurdebenef($id);
		$dataliste['datauser'] = $this->admin_model->getlisteutilisateur();

		$idbenef = $this->input->get('id');
	

		if ($idbenef != null)
		{
			if(($this->admin_model->suppressionbeneficiaire($idbenef)==0))
			{
				$this->load->view('listebeneficiaire', $dataliste);
				echo "Suppression reussi";
			}
			else
			{
				echo "Erreur";
			}
		}
		elseif (!isset($idbenef)) 
		{
			echo "Misy valeur null";
		}

	}

	public function testajoutbenef()
	{
		$this->load->model('administrateurs_model', 'admin_model');

		$nom = $this->input->get('nom');
		$iduser = $this->input->get('nomuser');
		$relation = $this->input->get('relation');


		if (($nom != null) && ($iduser != null) && ($relation != null))
		{
			if(($this->admin_model->ajoutbeneficaire($nom, $iduser, $relation))==0)
			{	
				$this->load->view('listebeneficiaire');
				echo "Ajout reussi";
			}
			else
			{
				echo "Erreur";
			}
		}
		elseif ((!isset($nom))||(!isset($iduser))||(!isset($relation))) 
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
