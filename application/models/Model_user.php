<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    
    public function verify_Login($nom,$mail,$mdp) {
        $tab = array();
        $request = "SELECT * from utilisateur where nom = '%s' or mail = '%s' and motdepasse = '%s'";
        $request = sprintf($request,$this->db->escape($nom), $this->db->escape($mail), $this->db->escape($mdp));
        $query = $this->db->query($request);
        $row = $query->row();
        if(isset($row)) {
            return true;
        }
    return false;
    }

    public function inscription($nom, $mail, $mdp) {
        $request = "INSERT INTO utilisateur VALUES (NULL,'%s','%s','%s',0)";
        $request = sprintf($request, $this->db->escape($nom), $this->db->escape($mail), $this->db->escape($mdp));
        $this->db->query($request);
    }

    public function get_liste_mes_propositions($idproprioorigine){
        $tab = array();
        $request = "SELECT * from echange where idproprioorigine = %d";
        $request = sprintf($request,$this->db->escape($idproprioorigine));
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    public function get_liste_propositions_autres($idproprionouveau){
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

    public function get_IdProprietaireObjById($idobjet) {
        $tab = array();
        $request = "SELECT * from objet where idobjet = %d";
        $request = sprintf($request,$this->db->escape($idobjet));
        $query = $this->db->query($request);
        $row = $query->row();
    return $row->idproprietaire;
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
        $request = sprintf($request, $this->db->escape($idobjet) );
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    public function modifierObjetSimple($idobjet, $titre, $description, $prix){
        if($prix < 0) {
            echo "prix invalid";
        }
        else {
            $request = "UPDATE objet set titre = '%s', description = '%s', prix = %d where idobjet = %d";
            $titre = $this->db->escape($titre);
            $description = $this->db->escape($description);
            $prix = $this->db->escape($prix);
            $idobjet = $this->db->escape($idobjet);
            $request = sprintf($request, $titre, $description, $prix, $idobjet );
            $this->db->query($request);
        }
        
    }

    public function suppresionImageObjet($idobjet){
        $request = "DELETE FROM imageobjet VALUES where idobjet = %d";
        $request = sprintf($request, $this->db->escape($idobjet) );
        $this->db->query($request);
    }

    public function ajouterImageObjet($idobjet,$urlimage){
        $request = "INSERT INTO imageobjet values( NULL, %d, '%s')";
        $request = sprintf($request, $this->db->escape($idobjet), $this->db->escape($urlimage) );
        $this->db->query($request);
    }

    public function get_liste_objet_autres($idProprietaire) {
        $tab = array();
        $request = "SELECT * from v_categorie_objet where idproprietaire != %d";
        $request = sprintf($request,$this->db->escape($idProprietaire));
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    public function proposer_echange($idobjetorigine, $idobjetcible, $idproprioorigine, $idproprionouveau){
        $request = "INSERT INTO echange VALUES (NULL, %d, %d, %d, %d, NOW() ,'attente')";
        $idobjetorigine = $this->db->escape($idobjetorigine);
        $idproprioorigine = $this->db->escape($idproprioorigine);
        $idobjetcible = $this->db->escape($idobjetcible);
        $idproprionouveau = $this->db->escape($idproprionouveau);
        $request = sprintf($request, $idobjetorigine, $idobjetcible, $idproprioorigine, $idproprionouveau );
        $this->db->query($request);
    }    



    











   

   
}

?>