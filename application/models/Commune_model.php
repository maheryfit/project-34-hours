<?php if (! defined ('BASEPATH')) exit ('No direct script access allowed');
{
    class Commune_model extends CI_Model
    {

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

        public function getdepensemensuel()
        {
            $sql = "select extract(month from daty) as mois, sum(montant) as montant from depense group by extract(month from daty) order by extract(month from daty);";

            $query = $this->db->query($sql);

            $result = array();
            $result = $query->result_array();
            
            return $result;
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

        public function getlisteuserjoinbenef()
        {
            $sql = "Select * from Beneficiaires b join Utilisateurs u on u.id_utilisateur = b.id_utilisateur where b.statut = 'valide'";
            $sql = sprintf($sql);
            $query = $this->db->query($sql);

            $result = array();
            $result = $query->result_array();
            
            return $result;
        }

    }
}
    
?>