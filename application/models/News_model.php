<?php if (! defined ('BASEPATH')) exit ('No direct script access allowed');
{
    class News_model extends CI_Model
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

        public function getdatatable()
        {
            $query = $this->db->query('Select nomproduit, prix from Produits');

            foreach($query->result_array() as $row)
            {
                // echo $row['nomproduit'];
                // echo $row['prix'];
            }

            // Si la requete retourne seulement une ligne 
            // $query = $this->db->query('Select nomProduit, prix from Produits');
            // $row = $query->row_array();
            // echo $row['nomProduit'];
        }
    }
}
    
?>