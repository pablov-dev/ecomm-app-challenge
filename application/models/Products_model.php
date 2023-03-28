<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        // código para obtener los productos del json
        return json_decode(file_get_contents(BASEPATH."/../Products.json"));
    }

    public function find($id) {
        // código para obtener un producto por su id de json
        $products = json_decode(file_get_contents(BASEPATH."/../Products.json"));
        $indexProducts = array_search($id,array_column($products,'id'));
        return $products[$indexProducts];
    }

    public function create($data) {
        // código para crear un nuevo producto en json
        $products = json_decode(file_get_contents(BASEPATH."/../Products.json"));
        $now = new DateTime();
        $products[] = [
            "id" => $data['id'],
            "title" => $data['title'],
            "price" => $data['price'],
            "created_at" => $now->format('Y-m-d H:i')
        ];
        $productsUpdate = json_encode($products);
        file_put_contents(BASEPATH."/../Products.json",$productsUpdate);
    }

    public function update($id, $data) {
        // código para actualizar un producto existente en json
        $products = json_decode(file_get_contents(BASEPATH."/../Products.json"));
        $indexProducts = array_search($id,array_column($products,'id'));
        $product = &$products[$indexProducts];
        $product['title'] = isset($data['title']) ? $data['title'] : $product['title'];
        $product['price'] = isset($data['price']) ? $data['price'] : $product['price'];
        $productsUpdate = json_encode($products);
        file_put_contents(BASEPATH."/../Products.json",$productsUpdate);

    }

    public function delete($id) {
        // código para eliminar un producto de json
        $products = json_decode(file_get_contents(BASEPATH."/../Products.json"));
        $indexProducts = array_search($id,array_column($products,'id'));
        unset($products[$indexProducts]);
        $productsUpdate = json_encode($products);
        file_put_contents(BASEPATH."/../Products.json",$productsUpdate);
    }
}
