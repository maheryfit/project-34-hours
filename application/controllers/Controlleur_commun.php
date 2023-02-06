<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlleur_commun extends CI_Controller {

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
    
    public function versdepensemensuel()
    {
        $this->load->model('commune_model', 'com_model');
        $dataliste['data'] = $this->com_model->getdepensemensuel();

		$this->load->view('tableaudepense', $dataliste);
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
