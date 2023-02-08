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

            $this->load->view('pages-template-client', $dataliste);
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

		        $this->load->view('pages-template-admin');
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

        $this->load->view('pages-template-admin', $dataliste);
    }

    public function traitement_insertion_categorie()
    {
        $this->load->model('model_user');

		$nom = $this->input->post('nom');

        if ($nom != null)
		{
            $categorieefamisy = $this->model_user->getCategoriebyNom($nom);
			if(sizeof($categorieefamisy)==0)
			{   
                echo "Ajout categorie effectué";
                $this->model_user->insertionCategorie($nom);
                $dataliste['listecategories'] = $this->model_user->get_listCategories();
                $dataliste['title'] = "Gestion categorie";
                $dataliste['pages'] = "accueil-admin";

		        $this->load->view('pages-template-admin', $dataliste);
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
        if (!isset($iduseractuel)) 
        {
            redirect('controlleur_user/index');
        }
        else
        {
            $dataliste['listeobjets'] = $this->model_user->getlistemesobjet($iduseractuel);
            $dataliste['title'] = "Liste des objets du client";
            // $dataliste['title'] = $iduseractuel;
    
            $dataliste['pages'] = "accueil-client";
    
            $this->load->view('pages-template-client', $dataliste);
        }
        
    }

    public function vers_fiche_unique_objet()
    {
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('controlleur_user/index');
        }
        else
        {
            $this->load->model('model_user');
            $idobjet = $this->input->get('idobjet');
    
            $dataobjet['objetspecifie'] = $this->model_user->getobjetbyid($idobjet);
            //ty atao anaty input hidden rehefa tonga anatinle vue dia passena rehefa anao modification objet
            $dataobjet['title'] = "Modification d'un objet";
            // $dataliste['title'] = $iduseractuel;
            $dataobjet['imagesobjet'] = $this->model_user->getobjetimage($idobjet);
            $dataobjet['pages'] = "modification-objet";
    
            $this->load->view('pages-template-client', $dataobjet);
        }
        
    }

    public function traitement_suppression_image()
    {
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('controlleur_user/index');
        }
        else
        {
            $this->load->model('model_user');
            $idobjet = $this->input->get('idobjet');
            $idobjetimage = $this->input->get('idobjetimage');
            
            $dataobjet['title'] = "Modification d'un objet";
            // $dataliste['title'] = $iduseractuel;
            $dataobjet['imagesobjet'] = $this->model_user->getobjetimage($idobjet);
            $this->model_user->suppression_objet_image($idobjetimage);
            $dataobjet['pages'] = "modification-objet";

            $this->load->view('pages-template-client', $dataobjet);
        }
        
    }

    public function traitement_ajout_image()
    {
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('controlleur_user/index');
        }
        else
        {
            $this->load->model('model_user');
            $idobjet = $this->input->get('idobjet');
            $idobjetimage = $this->input->get('idobjetimage');
            
            $dataobjet['title'] = "Modification d'un objet";
            // $dataliste['title'] = $iduseractuel;
            $dataobjet['imagesobjet'] = $this->model_user->getobjetimage($idobjet);
            $this->model_user->suppression_objet_image($idobjetimage);
            $dataobjet['pages'] = "modification-objet";

            $this->load->view('pages-template-client', $dataobjet);
        }
        
    }

    public function traitement_modification_objet()
    {
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('controlleur_user/index');
        }
        else
        {
            $this->load->model('model_user');
            $idobjet = $this->input->get('idobjet');
            $titre = $this->input->post('titre');
            $description = $this->input->post('description');
            $prix = $this->input->post('prix');
    
            $this->model_user->modifierObjetSimple($idobjet, $titre, $description, $prix);
    
            $dataobjet['objetspecifie'] = $this->model_user->getobjetbyid($idobjet);
            //ty atao anaty input hidden rehefa tonga anatinle vue dia passena rehefa anao modification objet
            $dataobjet['title'] = "Modification d'un objet";
            // $dataliste['title'] = $iduseractuel;
            $dataobjet['imagesobjet'] = $this->model_user->getobjetimage($idobjet);
            $dataobjet['pages'] = "modification-objet";
    
            $this->load->view('pages-template-client', $dataobjet);
        }
        
    }

    public function vers_liste_objet_autres()
    {
        $this->load->model('model_user');
        
        $iduseractuel = $this->session->idutilisateur;
        
        if (!isset($iduseractuel)) 
        {
            redirect('controlleur_user/index');
        }
        else
        {
            $dataobjet['title'] = "Liste des objets des autres clients";
            // $dataliste['title'] = $iduseractuel;
            $dataobjet['objetdesautres'] = $this->model_user->get_liste_objet_autres($iduseractuel);
            $dataobjet['pages'] = "liste-objet-autres";
    
            $this->load->view('pages-template-client', $dataobjet);
        }
        
    }

    public function vers_proposition_echange()
    {
        $this->load->model('model_user');
        
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('controlleur_user/index');
        }
        else
        {
            $idobjetcible = $this->input->get('idobjetcible');

            $dataobjet['title'] = "Interface proposition echange";
            // $dataliste['title'] = $iduseractuel;
            $dataobjet['mesobjets'] = $this->model_user->getlistemesobjet($iduseractuel); //ho recuperena ao anaty drop down liste
            $dataobjet['objetcible'] = $this->model_user->getobjetimagebyid($idobjetcible);
            $dataobjet['pages'] = "proposition-echange";
    
            $this->load->view('pages-template-client', $dataobjet);
        }
       
    }

    public function traitement_proposition_echange()
    {
        $this->load->model('model_user');
        
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('controlleur_user/index');
        }
        else
        {
            $idobjetcible = $this->input->post('idobjetcible');
            $idobjetorigine = $this->input->post('idobjetorigine');
            $idpropriocible = $this->model_user->get_idProprietaireByidObjet('idobjetcible');
            $dataobjet['mesobjets'] = $this->model_user->getlistemesobjets($iduseractuel);
            $this->model_user->proposer_echange($idobjetorigine, $idobjetcible, $iduseractuel, $idpropriocible);
            $dataobjet['title'] = "Interface proposition echange";
            $dataobjet['pages'] = "proposition-echange";
            $this->load->view('pages-template-client', $dataobjet);
        }
        
    }

    public function vers_gestion_echange()
    {
        $this->load->model('model_user');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('controlleur_user/index');
        }
        else
        {
            $dataliste['mespropositions'] = $this->model_user->get_liste_mes_propositions($iduseractuel);
            $dataliste['mespropositionsavecnom'] = $this->model_user->get_liste_mes_propositions_avec_nom($iduseractuel);
            $dataliste['autrespropositions'] = $this->model_user->get_liste_propositions_autres($iduseractuel);
            $dataliste['autrespropositionsavecnom'] = $this->model_user->get_liste_propositions_autres_avec_nom($iduseractuel);
            $dataliste['pages'] = "gestion-echange";
            $dataliste['title'] = "Interface gestion echange";
            $this->load->view('pages-template-client', $dataliste);
        }
        
    }

    public function annuler_proposition()
    {
        $this->load->model('model_user');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('controlleur_user/index');
        }
        else
        {
            $idechangeselectionne = $this->input->get('idechange');
            $this->model_user->annuler_proposition($idechangeselectionne);
            $dataliste['mespropositions'] = $this->model_user->get_liste_mes_propositions($iduseractuel);
            $dataliste['mespropositionsavecnom'] = $this->model_user->get_liste_mes_propositions_avec_nom($iduseractuel);
            $dataliste['autrespropositions'] = $this->model_user->get_liste_propositions_autres($iduseractuel);
            $dataliste['autrespropositionsavecnom'] = $this->model_user->get_liste_propositions_autres_avec_nom($iduseractuel);
            $dataliste['title'] = "Interface gestion echange";
            $dataliste['pages'] = "gestion-echange";
            $this->load->view('pages-template-client', $dataliste);
        }
        
    }

    public function refuser_proposition()
    {
        $this->load->model('model_user');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('controlleur_user/index');
        }
        else
        {
            $idechangeselectionne = $this->input->get('idechange');
            $this->model_user->refuser_proposition($idechangeselectionne);
            $dataliste['mespropositions'] = $this->model_user->get_liste_mes_propositions($iduseractuel);
            $dataliste['mespropositionsavecnom'] = $this->model_user->get_liste_mes_propositions_avec_nom($iduseractuel);
            $dataliste['autrespropositions'] = $this->model_user->get_liste_propositions_autres($iduseractuel);
            $dataliste['autrespropositionsavecnom'] = $this->model_user->get_liste_propositions_autres_avec_nom($iduseractuel);
            $dataliste['title'] = "Interface gestion echange";
            $dataliste['pages'] = "gestion-echange";
            $this->load->view('pages-template-client', $dataliste);
        }
        
    }

    public function accepter_proposition()
    {
        $this->load->model('model_user');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('controlleur_user/index');
        }
        else
        {
            $idechangeselectionne = $this->input->get('idechange');
            $this->model_user->accepter_proposition($idechangeselectionne);
            $dataliste['mespropositions'] = $this->model_user->get_liste_mes_propositions($iduseractuel);
            $dataliste['mespropositionsavecnom'] = $this->model_user->get_liste_mes_propositions_avec_nom($iduseractuel);
            $dataliste['autrespropositions'] = $this->model_user->get_liste_propositions_autres($iduseractuel);
            $dataliste['autrespropositionsavecnom'] = $this->model_user->get_liste_propositions_autres_avec_nom($iduseractuel);
            $dataliste['title'] = "Interface gestion echange";
            $dataliste['pages'] = "gestion-echange";
            $this->load->view('pages-template-client', $dataliste);
        }
        
    }

    public function vers_recherche()
    {
        $this->load->model('model_user');
        
        $dataliste['categories'] = $this->model_user->get_listCategories();
        $dataliste['title'] = "Interface recherche objet";
        $dataliste['pages'] = "recherche-objet";
        $this->load->view('pages-template-client', $dataliste);
        
    }

    public function vers_stat_nb_utilisateur()
    {
        $this->load->model('model_user');
        $annee = $this->input->post('annee');
        $moisdebut = $this->input->post('moisdebut');
        $moisfin = $this->input->post('moisfin');
        $dataliste['donneesstat'] = $this->model_user->getInscriptionBetween($annee, $moisdebut, $moisfin);
        $dataliste['title'] = "Interface suivi inscription";
        $dataliste['pages'] = "suivi-inscription";
        $this->load->view('pages-template-admin', $dataliste);
    }

    public function vers_stat_nb_echange()
    {
        $this->load->model('model_user');
        $annee = $this->input->post('annee');
        $moisdebut = $this->input->post('moisdebut');
        $moisfin = $this->input->post('moisfin');
        $dataliste['donneesstat'] = $this->model_user->getEchangeBetween($annee, $moisdebut, $moisfin);
        $dataliste['title'] = "Interface suivi inscription";
        $dataliste['pages'] = "suivi-inscription";
        $this->load->view('pages-template-admin', $dataliste);
    }

    public function traitement_recherche()
    {
        $this->load->model('model_user');

        $titrerecherche = $this->input->post('titrerecherche');
        $categorierecherche = $this->input->post('categorierecherche');
        
        $dataliste['objetdesautres'] = "recherche not good";
        if (isset($titrerecherche) && isset($categorierecherche))
        {
            $this->model_user->rechercheObjet($titrerecherche, $categorierecherche);
            $dataliste['objetdesautres'] = $this->model_user->rechercheObjet($titrerecherche, $categorierecherche);
        }

        $dataliste['title'] = "Liste des objets des autre clients";
        $dataliste['pages'] = "liste-objet-autres";
        $this->load->view('pages-template-admin', $dataliste);
    }

    public function vers_historique_echange()
    {

    }

    public function deconnexion()
    {
        $this->session>session_destroy();
        redirect('controlleur/index');
    }

	public function redirectindex()
    {
        redirect('/welcome/index');
    }
}
?>
