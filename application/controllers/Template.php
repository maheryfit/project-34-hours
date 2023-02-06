<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller 
{
    
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
    }

	public function about()
    {
        //definition des donnees variables du template
        $data['title'] = 'Le titre de la page';
        $data['description'] = 'La description de la page pour les moteurs de recherche';
        $data['keywords'] = 'les, mots, clés, de, la, page';

        //on charge la view qui contient le corps de la page
        $data['contents']='';
        //on charge la page dans le template
        $this->load->view('templates/template', $data);
       
    }

    public function redirectindex()
    {
        redirect('welcome/index');
    }
}
?>
