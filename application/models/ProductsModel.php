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

        /**
         * Insere Produto
         */
        public function insert_product(){
            
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description')
            );

            return $this->db->insert('products', $data);

        }

        /**
         * Altera Produto
         */
        public function update_product($id){
            
            $data = array(           
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description')
            );

            if(is_null($id) || $id == 0){
                return $this->db->insert('products', $data);
            }else{
                $this->db->where('id', $id);
                return $this->db->update('products', $data);
            }

        }        

    }

?>