<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function accueil()
    {
        // Chargement du modèle de gestion des news
        $this->load->model('news_model', 'newsManager');    //renommage du modele en 'NewsManager' 
        
        $data = array();

        //On lance une requete
        $data['user_info'] = $this->newsManager->get_info();
        $data['donneesdepuisbase'] = $this->newsManager->getdatatable();

        //On inclut une vue
        $this->load->view('login');
    }
}

?>