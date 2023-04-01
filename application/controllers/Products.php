<?php
defined ('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller {

    /**
     * constructor de la clase
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Products_model');
    }

    /**
     * Listado de los productos
     */
    public function index() {
        $data['products'] = $this->Products_model->all();
        $this->load->view('products/index', $data);
    }

    /**
     * Almacenar un producto
     */
    public function store() {
        $product = [
            'title' => $this->input->post('title'),
            'price' => $this->input->post('price')
        ];
        $this->Products_model->create($product);
    }

    /**
     * Actualizar un producto
     */
    public function update() {
        $product = [
            'title' => $this->input->post('title'),
            'price' => $this->input->post('price'),
            'created_at' => $this->input->post('created_at')
        ];
        $this->Products_model->update($this->input->post('id'), $product);
    }

    /**
     * Eliminar un producto
     */
    public function delete($id) {
        $this->Products_model->delete($id);
    }
}