<?php

    /**
     * Controller Products
     * Author: Diego Simas
     */

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Products extends CI_Controller{

        /**
         * Obter todos os dados 
         * Método de construção da Classe
         * @return Response 
         */
        public function __construct(){
            parent::__construct();
            // Carrega o banco de dados na construção do método
            $this->load->model('ProductsModel');
        }

        /**
         * Método responsável pela página inicial Products
         */
        public function index(){
            $products = new ProductsModel;
            $data['data'] = $products->get_products();
            $this->load->view('includes/header');
            $this->load->view('products/list', $data);
            $this->load->view('includes/footer');            
        }

        /**
         * Método responsável pela criação de um produto / View
         */
        public function create(){
             $this->load->view('includes/header');
             $this->load->view('products/create');
             $this->load->view('includes/footer');
         }

        /**
         * Método responsável pela inserção de um produto
         * @return Response
         */
        public function store(){
            $products = new ProductsModel;
            $products->insert_product();
            redirect(base_url('products'));
        }

        /**
         * Método responsável pela edição de um produto / View
         * @return Response
         */
        public function edit($id){
            $product = $this->db->get_where('products', array('id' => $id))->row();
            $this->load->view('includes/header');
            $this->load->view('products/edit', array('product' => $product));
            $this->load->view('includes/footer');
        }

        /**
         * Método responsável por alterar um produto
         * @return Response
         */
        public function update($id){
            $products = new ProductsModel;
            $products->update_product($id);
            redirect(base_url('products'));
        }

        /**
         * Método responsável por deletar um produto
         */
        public function delete($id){
            $this->db->where('id', $id);
            $this->db->delete('products');
            redirect(base_url('products'));        
        }
    }

?>