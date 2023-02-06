<?php if (! defined ('BASEPATH')) exit ('No direct script access allowed');
{
    class Administrateurs_model extends CI_Model
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
            $sql = "Select nom, mdp from Administrateurs where nom = '".$nomsaisi."'";
            // $query = $this->db->query($sql);
            echo $sql;

            // foreach($query->result_array() as $row)
            // {
            //     if (strcmp($row['mdp'], md5($mdpsaisi)) == 0)
            //     {
            //         return 0;
            //     }
            //     elseif (strcmp($row['mdp'], md5($mdpsaisi)) != 0)
            //     {
            //         return 1;
            //     }
            // }

            // Si la requete retourne seulement une ligne 
                
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

        public function creationcategoriedepense($nomsaisi, $budgetsaisi)
        {
            $sql = "Insert into categorie_depense (nom, budget) values ('%s', '%s')";
            $sql = sprintf($sql, $nomsaisi, $budgetsaisi);
            $this->db->query($sql);
        }

        public function creationsalaireuser($nomuserselectionne, $salairesaisi)
        {
            $sql = "Update Utilisateurs set salaire = '%s' where nom = '%s'";
            $sql = sprintf($sql, $salairesaisi, $nomuserselectionne);
            $this->db->query($sql);
        }

        public function getlisteutilisateur()
        {
            $sql = "Select * from Utilisateurs where statut != 'vire'";

            $query = $this->db->query($sql);

            $result = array();
            $result = $query->result_array();
            
            return $result;
        }

        public function ajoututilisateur($nomsaisi, $mdpsaisi, $salairesaisi)
        {
            $sql = "Insert into Utilisateurs (nom, mdp, salaire) values ('%s', (select md5('%s')), '%s')";
            $sql = sprintf($sql, $nomsaisi, $mdpsaisi, $salairesaisi);
            $this->db->query($sql);
        }

        public function suppressionutilisateur($nomsaisi)
        {
            $sql = "Update Utilisateurs set statut = 'vire' where nom = '%s'";
            $sql = sprintf($sql, $nomsaisi);
            $this->db->query($sql);
        }

        public function checkexistenceuser($user)
        {
            $sql = "Select nom from Utilisateurs where nom = '".$user."'";
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
                return 0;
            }
        }

        public function selectionutilisateurdebenef($idsaisi)
        {
            $sql = "Select * from Beneficiaires where id_utilisateur ='%s' and statut = 'valide'";
            $sql = sprintf($sql, $idsaisi);
            $query = $this->db->query($sql);

            $result = array();
            $result = $query->result_array();
            
            return $result;
        }

        public function suppressionbeneficiaire($id)
        {
            $sql = "Update Beneficiaires set statut = 'non_valide' where id_beneficiaire = '%s'";
            $sql = sprintf($sql, $id);
            $this->db->query($sql);
        }

        public function getlisteuserjoinbenef()
        {
            $sql = "Select * from Beneficiaires b join Utilisateurs u on u.id_utilisateur = b.id_utilisateur where b.statut = 'valide'";
            $sql = sprintf($sql);
            $query = $this->db->query($sql);

            $result = array();
            $result = $query->result_array();
            
            return $result;
        }
        
        public function ajoutbeneficaire($nomsaisi, $iduser, $relation)
        {
            $sql = "Insert into Beneficiaires (nom, id_utilisateur, relation) values ('%s', '%s', '%s')";
            $sql = sprintf($sql, $nomsaisi, $iduser, $relation);
            $this->db->query($sql);
        }

    }
}
    
?>