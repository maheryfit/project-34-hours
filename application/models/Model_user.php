<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    
    public function verify_Login($nom, $mdp) {
        $val = 'not_found';
        $request = "SELECT * from utilisateur where (nom = %s or mail = %s) and motdepasse = (select sha1(%s))";
        $request = sprintf($request,$this->db->escape($nom), $this->db->escape($nom), $this->db->escape($mdp));
        $query = $this->db->query($request);
        $row = $query->row();
        if(isset($row)) {
            $val = $row->idutilisateur;
        }
    return $val;
    }

    public function inscription($nom, $mail, $mdp) {
        $request = "INSERT INTO utilisateur VALUES (NULL, %s, %s, %s, 0, now())";
        $request = sprintf($request, $this->db->escape($nom), $this->db->escape($mail), $this->db->escape($mdp));
        $this->db->query($request);
    }

    public function get_liste_mes_propositions($idproprioorigine){
        $tab = array();
        $request = "SELECT * from echange where idproprioorigine = %s and etat ='attente'";
        $request = sprintf($request,$this->db->escape($idproprioorigine));
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    public function get_liste_mes_propositions_avec_nom($idproprioorigine){
        $val = array();
        $tab = $this->get_liste_mes_propositions($idproprioorigine);
        for($i = 0; $i < count($tab); $i++) {
            $val[$i]['idechange'] = $tab[$i]['idechange'];
            $val[$i]['objetorigine'] = $this->get_NomObjById($tab[$i]['idobjetorigine']);
            $val[$i]['objetcible'] = $this->get_NomObjById($tab[$i]['idobjetcible']);
            $val[$i]['proprioorigine'] = $this->get_UtilisateurById($tab[$i]['idproprioorigine']);
            $val[$i]['proprinouveau'] = $this->get_UtilisateurById($tab[$i]['idproprionouveau']);
            $val[$i]['dateechange'] = $tab[$i]['dateechange'];
            $val[$i]['etat'] = $tab[$i]['etat'];
        }
    return $val;
    }

    public function get_liste_propositions_autres($idsession){
        $tab = array();
        $request = "SELECT * from echange where idproprionouveau = %s and etat ='attente'";
        $request = sprintf($request,$this->db->escape($idsession));
        //echo $request;
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    

    public function get_liste_propositions_autres_avec_nom($idsession){
        $val = array();
        $tab = $this->get_liste_propositions_autres($idsession);
        for($i = 0; $i < count($tab); $i++) {
            $val[$i]['idechange'] = $tab[$i]['idechange'];
            $val[$i]['objetorigine'] = $this->get_NomObjById($tab[$i]['idobjetorigine']);
            $val[$i]['objetcible'] = $this->get_NomObjById($tab[$i]['idobjetcible']);
            $val[$i]['proprioorigine'] = $this->get_UtilisateurById($tab[$i]['idproprioorigine']);
            $val[$i]['proprinouveau'] = $this->get_UtilisateurById($tab[$i]['idproprionouveau']);
            $val[$i]['dateechange'] = $tab[$i]['dateechange'];
            $val[$i]['etat'] = $tab[$i]['etat'];
        }
    return $val;
    }

    public function get_NomObjById($idobjet) {
        $tab = array();
        $request = "SELECT * from objet where idobjet = %s";
        $request = sprintf($request,$this->db->escape($idobjet));
        $query = $this->db->query($request);
        $row = $query->row();
    return $row->titre;
    }

    public function get_IdProprietaireObjById($idobjet) {
        $tab = array();
        $request = "SELECT * from objet where idobjet = %s";
        $request = sprintf($request,$this->db->escape($idobjet));
        //echo $request;
        $query = $this->db->query($request);
        $row = $query->row();
    return $row->idproprietaire;
    }

    public function get_UtilisateurById($id) {
        $request = "SELECT * from utilisateur where idutilisateur = %s";
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

    public function getCategoriebyNom($nom)
    {
        $request = "SELECT * from categorie where nom = %s";
        $request = sprintf($request,$this->db->escape($nom));
        $query = $this->db->query($request);
        $row = $query->row();
        return $row;
    }

    public function insertionCategorie($categorie){
        $request = "INSERT INTO categorie VALUES (NULL, %s)";
        $request = sprintf($request, $this->db->escape($categorie));
        $this->db->query($request);
    }

    public function getlistemesobjet($idProprietaire){
        $tab = array();
        $request = "SELECT * from  v_objet_image_categorie where idproprietaire = %s";
        $request = sprintf($request,$this->db->escape($idProprietaire));
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    public function getlistemesobjetunique($idProprietaire){
        $tab = array();
        $request = "SELECT * from  v_objet_image_categorie where idproprietaire = %s group by idobjet";
        $request = sprintf($request,$this->db->escape($idProprietaire));
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    public function getobjetbyid($idobjet){
        $tab = array();
        $request = "SELECT * from objet where idobjet = %s";
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
            $request = "UPDATE objet set titre = %s, description = %s, prix = %s where idobjet = %s";
            $titre = $this->db->escape($titre);
            $description = $this->db->escape($description);
            $prix = $this->db->escape($prix);
            $idobjet = $this->db->escape($idobjet);
            $request = sprintf($request, $titre, $description, $prix, $idobjet );
            $this->db->query($request);
        }
        
    }

    public function suppresionImageObjet($idobjet){
        $request = "DELETE FROM imageobjet VALUES where idobjet = %s";
        $request = sprintf($request, $this->db->escape($idobjet) );
        $this->db->query($request);
    }

    public function ajouterImageObjet($idobjet,$urlimage){
        $request = "INSERT INTO imageobjet values( NULL, %s, %s)";
        $request = sprintf($request, $this->db->escape($idobjet), $this->db->escape($urlimage) );
        $this->db->query($request);
    }

    public function get_liste_objet_autres($idProprietaire) {
        $tab = array();
        $request = "SELECT * from  v_objet_image_categorie where idproprietaire != %s";
        $request = sprintf($request,$this->db->escape($idProprietaire));
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    public function get_liste_objet_autres_unique($idProprietaire) {
        $tab = array();
        $request = "SELECT * from  v_objet_image_categorie where idproprietaire != %s group by idobjet";
        $request = sprintf($request,$this->db->escape($idProprietaire));
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    public function proposer_echange($idobjetorigine, $idobjetcible, $idproprioorigine, $idproprionouveau){
        $request = "INSERT INTO echange VALUES (NULL, %s, %s, %s, %s, NOW() ,'attente')";
        $idobjetorigine = $this->db->escape($idobjetorigine);
        $idproprioorigine = $this->db->escape($idproprioorigine);
        $idobjetcible = $this->db->escape($idobjetcible);
        $idproprionouveau = $this->db->escape($idproprionouveau);
        $request = sprintf($request, $idobjetorigine, $idobjetcible, $idproprioorigine, $idproprionouveau );
        $this->db->query($request);
    } 
    
    public function get_echangeById($idechange) {
        $request = "SELECT * from echange where idechange = %s";
        $request = sprintf($request, $this->db->escape($idechange));
        $query = $this->db->query($request);
        $row = $query->row();
    return $row;
    }

    public function get_idProprietaireByidObjet($idobjet) {
        $request = "SELECT * from objet where idobjet = %s";
        $request = sprintf($request, $this->db->escape($idobjet));
        $query = $this->db->query($request);
        $row = $query->row();
    return $row->idproprietaire;
    }

    public function accepter_proposition($idechange){
        $request = "UPDATE echange set etat = 'confirme' where idechange = %s";
        $request = sprintf($request, $this->db->escape($idechange) );
        $echange = $this->get_echangeById($idechange);
        $idobj1 = $this->db->escape( $echange->idobjetorigine );
        $idobj2 = $this->db->escape( $echange->idobjetcible );
        $request1 = "UPDATE echange set etat ='annule' where (idobjetorigine = %s or idobjetcible = %s) and idechange != %s ";
        $request1 = sprintf($request1, $idobj1, $idobj2, $this->db->escape($idechange));
        //
        $request2 = "UPDATE objet SET idproprietaire = '%s' where idobjet = %d ";
        $request2 = sprintf($request2, $echange->idproprioorigine, $echange->idobjetcible);
        //
        $request3 = "UPDATE objet SET idproprietaire = '%s' where idobjet = %d ";
        $request3 = sprintf($request3, $echange->idproprionouveau, $echange->idobjetorigine);
        $this->db->query($request);
        $this->db->query($request1);
        $this->db->query($request2);
        $this->db->query($request3);
    }

    public function refuser_proposition($idechange){
        $request = "UPDATE echange set etat = 'refus' where idechange = %s";
        $request = sprintf($request, $this->db->escape($idechange) );
        $this->db->query($request);
    }

    public function annuler_proposition($idechange){
        $request = "UPDATE echange set etat = 'annule' where idechange = %s";
        $request = sprintf($request, $this->db->escape($idechange) );
        $this->db->query($request);
    }

    public function get_objetImage() {
        $tab = array();
        $request = "SELECT * from v_objet_image_objet";
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    public function getobjetimagebyid($idobjet) {
        $tab = array();
        $request = "SELECT * from  v_objet_image_categorie where idobjet = %s";
        $request = sprintf($request, $this->db->escape($idobjet));
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    public function getobjetimagebyidunique($idobjet){
        $tab = array();
        $request = "SELECT * from  v_objet_image_categorie where idobjet = %s group by idobjet";
        $request = sprintf($request, $this->db->escape($idobjet) );
        $query = $this->db->query($request);
        $row = $query->row();
    return $row;
    }

    public function rechercheObjet($motcle, $idcategorie) {
        //echo ($motcle);
        $tab = array();
        $request = "SELECT * from v_objet_image_categorie  where titre like '%".$motcle."%' and idcategorie =".$idcategorie."";
        if($idcategorie == 0) {
            $request = "SELECT * from v_objet_image_categorie  where titre like '%".$motcle."%'";
            //$request = sprintf($request, $motcle);
            //echo $request; 
        }
        // else {
        //     $request = sprintf($request,$idcategorie);
        // }
        //echo $request;    
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    public function get_historiqueObjet($idobjet) {
        $tab = array();
        $request = "SELECT * from echange where ( idobjetorigine = %s or idobjetcible = %s ) and etat = 'confirme'";
        $request = sprintf($request, $this->db->escape($idobjet), $this->db->escape($idobjet));
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    public function get_liste_historique_avec_nom($idproprioorigine){
        $val = array();
        $tab = $this->get_historiqueObjet($idproprioorigine);
        for($i = 0; $i < count($tab); $i++) {
            $val[$i]['idechange'] = $tab[$i]['idechange'];
            $val[$i]['objetorigine'] = $this->get_NomObjById($tab[$i]['idobjetorigine']);
            $val[$i]['objetcible'] = $this->get_NomObjById($tab[$i]['idobjetcible']);
            $val[$i]['proprioorigine'] = $this->get_UtilisateurById($tab[$i]['idproprioorigine']);
            $val[$i]['proprinouveau'] = $this->get_UtilisateurById($tab[$i]['idproprionouveau']);
            $val[$i]['dateechange'] = $tab[$i]['dateechange'];
            $val[$i]['etat'] = $tab[$i]['etat'];
        }
    return $val;
    }

    public function countEchange ($mois, $anne) {
        $val = 0;
        $request = "SELECT count(*) AS isa FROM echange WHERE MONTH(dateechange) = %s and YEAR(dateechange) = %s";
        $request = sprintf($request, $this->db->escape($mois) , $this->db->escape($anne));
        $query = $this->db->query($request);
        $row = $query->row();
        if(isset($row)) {
            $val = $row->isa;
        }
    return $val;
    }

    public function getEchangeBetween($anne,$moisdebut,$moisfin) {
        $val = array();
        $donne = array();
        if($moisdebut <= $moisfin) {
            for($i = (int)$moisdebut; $i<=(int)$moisfin; $i++) {
                //format fantarty ny base dd-mm--yy
                //echo($i."</br>");
                $moisTofindoccupation = $i; 
                $donne[0] = $moisTofindoccupation;
                $donne[1] = $this->countEchange($moisTofindoccupation, $anne);
                array_push($val,$donne);  
            }
        }
        else {
            echo "mois debut infeerieur a mois fin";
        }
    return $val;
    }

    public function countInsrcription($mois, $anne) {
        $val = 0;
        $request = "SELECT count(*) AS isa FROM utilisateur WHERE MONTH(dateinscription) = %s and YEAR(dateinscription) = %s";
        $request = sprintf($request, $this->db->escape($mois) , $this->db->escape($anne));
        $query = $this->db->query($request);
        $row = $query->row();
        if(isset($row)) {
            $val = $row->isa;
        }
    return $val;
    }

    public function getInscriptionBetween($anne,$moisdebut,$moisfin) {
        $val = array();
        $donne = array();
        if($moisdebut <= $moisfin) {
            for($i = (int)$moisdebut; $i<=(int)$moisfin; $i++) {
                //format fantarty ny base dd-mm--yy
                //echo($i."</br>");
                $moisTofindoccupation = $i; 
                $donne[0] = $moisTofindoccupation;
                $donne[1] = $this->countInsrcription($moisTofindoccupation, $anne);
                array_push($val,$donne);  
            }
        }
        else {
            echo "mois debut infeerieur a mois fin";
        }
    return $val;
    }

    public function get_difference_prix_en_pourcentage($idmonproduit, $idproduit) {
        $monproduit = $this->getobjetbyid($idmonproduit);
        $autreproduit = $this->getobjetbyid($idproduit);
        return  ($monproduit[0]['prix']/$autreproduit[0]['prix'])/100;
    }

    public function get_objet_autres_pourcentage($idmonproduit, $pourcentage) {
        $tab = array();
        $monproduit = $this->getobjetbyid($idmonproduit);
        $prix = $monproduit[0]['prix'];
        $request = "SELECT * from objet where %d = (SELECT prix/%d from objet)";
        $request = sprintf($request, $pourcentage, $prix);
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }






    
    
    



    











   

   
}

?>