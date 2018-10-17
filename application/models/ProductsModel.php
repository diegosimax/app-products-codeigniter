<?php
     
     /**
     * Model Products - Interação com o Banco de Dados
     * Author: Diego Simas
     */

    class ProductsModel extends CI_Model{

        /**
         * Lista Produtos
         * @return array - Produtos cadastrados na base
         */
        public function get_products(){
            
            if(!empty($this->input->get("search"))){
                $this->db->like('title', $this->input->get("search"));
                $this->db->like('description', $this->input->get("search"));
            }

            $query = $this->db->get("products");
            return $query->result();

        }

    }

?>