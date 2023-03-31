<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * llamamos a todos los productos que existen en el json
     */
    public function all() {
        // código para obtener los productos del json
        return json_decode(file_get_contents(BASEPATH."/../Products.json"));
    }

    /**
     * Al obtener el id en el parametro, solo buscamos en el archivo el producto
     */
    public function find($id) {
        $products = json_decode(file_get_contents(BASEPATH."/../Products.json"));
        $indexProducts = array_search($id,array_column($products,'id'));
        return $products[$indexProducts];
    }

    /**
     * Obtenemos los datos simples que es titulo y precio
     * los demas datos se generan por si mismo
     */
    public function create($data) {
        // código para crear un nuevo producto en json
        $products = json_decode(file_get_contents(BASEPATH."/../Products.json"));
        $now = new DateTime();
        $products[] = [
            "id" => count($products)+1,
            "title" => $data['title'],
            "price" => $data['price'],
            "created_at" => $now->format('Y-m-d H:i')
        ];
        $productsUpdate = json_encode($products,JSON_PRETTY_PRINT);
        file_put_contents(BASEPATH."/../Products.json",$productsUpdate);
    }

    /**
     * obteniendo el id junto a los nuevos datos, buscamos el producto y actualizamos
     */
    public function update($id, $data) {
        // código para actualizar un producto existente en json
        $products = json_decode(file_get_contents(BASEPATH."/../Products.json"),true);
        $indexProducts = array_search($id,array_column($products,'id'));
        $product= &$products[$indexProducts];
        $product['title'] = isset($data['title']) ? $data['title'] : $product['title'];
        $product['price'] = isset($data['price']) ? $data['price'] : $product['price'];
        $product['created_at'] = isset($data['created_at']) ? $data['created_at'] : $product['created_at'];
        $productsUpdate = json_encode($products,JSON_PRETTY_PRINT);
        file_put_contents(BASEPATH."/../Products.json",$productsUpdate);

    }

    /**
     * Solo recibe el id para generar el borrado del producto
     */
    public function delete($id) {
        // código para eliminar un producto de json
        $products = json_decode(file_get_contents(BASEPATH."/../Products.json"),true);
        $indexProducts = array_search($id,array_column($products,'id'));
        unset($products[$indexProducts]);
        $products = array_values($products);
        $productsUpdate = json_encode($products,JSON_PRETTY_PRINT);
        file_put_contents(BASEPATH."/../Products.json",$productsUpdate);
    }
}
