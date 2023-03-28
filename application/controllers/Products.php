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
     * Detalles de un producto
     */
    public function show($id) {
        $data['product'] = $this->Products_model->find($id);
        $this->load->view('products/show', $data);
        return $data;
    }

    /**
     * Vista para crear un producto
     */
    public function create() {
        $this->load->view('products/create');
    }

    /**
     * Almacenar un producto
     */
    public function store() {
        $product = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price')
        );
        $this->Products_model->create($product);
        redirect('products');
    }

    /**
     * vista para editar un producto
     */
    public function edit($id) {
        $data['product'] = $this->Products_model->find($id);
        $this->load->view('products/edit', $data);
    }

    /**
     * Actualizar un producto
     */
    public function update() {
        $product = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price')
        );
        $this->Products_model->update($this->input->post('id'), $product);
        redirect('products');
    }

    /**
     * Eliminar un producto
     */
    public function delete($id) {
        $this->Products_model->delete($id);
        redirect('products');
    }
}