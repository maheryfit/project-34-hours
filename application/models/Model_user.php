<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    
    public function verify_Login($nom,$mail,$mdp) {
        $user = array();
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
        $query = $this->db->query($request);
    }

   

   
}

?>