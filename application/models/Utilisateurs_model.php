<?php if (! defined ('BASEPATH')) exit ('No direct script access allowed');
{
    class Utilisateurs_model extends CI_Model
    {
        public function get_info()
        {
            //On simule l'envoi d'une requête 
            return array
            (
                'auteur' => 'Chuck Norris',
                'date' => '24/07/05',
                'email' => 'email@ndd.fr'
            );
        }

        public function verifierlogin($nomsaisi, $mdpsaisi)
        {   
            $sql = "Select nom, mdp from Utilisateurs where nom = '".$nomsaisi."'";
            // $query = $this->db->query($sql);
            echo $sql;
   
            $query = $this->db->query($sql);
            $row = $query->row_array();
            if (is_null($row))
            {
                return 1;
            }
            else
            {
                if (strcmp($row['mdp'], md5($mdpsaisi)) == 0) 
                {
                    return 0;
                }
                else
                {
                    return 1;
                }
            }
        }

        public function getlisteutilisateur()
        {
            $sql = "Select * from Utilisateurs where statut != 'vire'";

            $query = $this->db->query($sql);

            $result = array();
            $result = $query->result_array();
            
            return $result;
        }

        public function getlistecategorie()
        {
            $sql = "Select * from Categorie_depense";

            $query = $this->db->query($sql);

            $result = array();
            $result = $query->result_array();
            
            return $result;
        }

        public function getlistebeneficiaire()
        {
            $sql = "Select * from Beneficiaires where statut = 'valide'";

            $query = $this->db->query($sql);

            $result = array();
            $result = $query->result_array();
            
            return $result;
        }

        public function ajoutdepense($daty, $idcategorie, $montant, $idbenef)
        {
            $sql = "Insert into Depense (daty, id_categorie, montant, id_beneficiaire) values ((select to_date('%s', 'YYYY-MM-DD')), '%s', '%s', '%s')";
            $sql = sprintf($sql, $daty, $idcategorie, $montant, $idbenef);
            $this->db->query($sql);
        }

        public function getbudgetseloncategorie($idcat)
        {
            $sql = "Select budget from Categorie_depense cd join Depense d on d.id_categorie = cd.id_categorie where d.id_categorie = '%s'";
            $sql = sprintf($sql, $idcat);
            $this->db->query($sql);

        }
    }
}
    
?>