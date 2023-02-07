<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    
    public function verify_Login($nom,$mail,$mdp) {
        $tab = array();
        $request = "SELECT * from utilisateur where nom = '%s' or mail = '%s'";
        $request = sprintf($request,$this->db->escape($nom), $this->db->escape($mail));
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
        if(count($tab) == 0)  {
            return false;
        }  
        else {
            if($tab[0]['mdp'] == $mdp) {
                return true;
            }
        }
    return false;
    }

    public function inscription($nom, $mail, $mdp, $isAdmin) {
        $request = "INSERT INTO utilisateur VALUES (NULL,'%s','%s','%s',%d)";
        $request = sprintf($request, $this->db->escape($nom), $this->db->escape($mail), $this->db->escape($mdp), $this->db->escape($isAdmin) );
        $this->db->query($request);
    }

    public function get_ListePropositionPerso($idproprioorigine){
        $tab = array();
        $request = "SELECT * from echange where idproprioorigine = %d";
        $request = sprintf($request,$this->db->escape($idproprioorigine));
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    public function get_ListePropositionAutres($idproprionouveau){
        $tab = array();
        $request = "SELECT * from echange where idproprionouveau = %d";
        $request = sprintf($request,$this->db->escape($idproprionouveau));
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    public function get_NomObjById($idobjet) {
        $tab = array();
        $request = "SELECT * from objet where idobjet = %d";
        $request = sprintf($request,$this->db->escape($idobjet));
        $query = $this->db->query($request);
        $row = $query->row();
    return $row->nom;
    }

    public function get_UtilisateurById($id) {
        $request = "SELECT * from utilisateur where idutilisateur = %d";
        $request = sprintf($request,$this->db->escape($id));
        $query = $this->db->query($request);
        $row = $query->row();
    return $row->nom;
    }

    public function get_listCategories() {
        $tab = array();
        $request = "SELECT * from categorie";
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    public function insertionCategorie($categorie){
        $request = "INSERT INTO categorie VALUES (NULL,'%s')";
        $request = sprintf($request, $this->db->escape($categorie));
        $this->db->query($request);
    }

    public function getlistemesobjet($idProprietaire){
        $tab = array();
        $request = "SELECT * from v_categorie_objet where idproprietaire = %d";
        $request = sprintf($request,$this->db->escape($idProprietaire));
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    public function getobjetbyid($idobjet){
        $tab = array();
        $request = "SELECT * from objet where idobjet = %d";
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }







   

   
}

?>