<?php

define("JSON_FILE", "JsonFile.json");

class Producto_Model extends CI_Model
{
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
    public function __construct()
    {
        parent::__construct();
    }
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
    public function create_file(): void
    {
        //============================================//
        // Método que crea un archivo JSON de muestra //
        //============================================//

        $data = [
            [
                "id"            => 1,
                "title"         => "Producto del Challenge",
                "price"         => 2000,
                "created_at"    => "2022-12-13 10:41"
            ]
        ];
        
        $json_data = json_encode($data);
        
        if(!file_exists(JSON_FILE))
            file_put_contents(JSON_FILE, $json_data);
    }
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
    public function insert_data($data): void
    {
        //===================================================//
        // Método que inserta un producto en el archivo JSON //
        //===================================================//

        // Leer el archivo JSON y convertirlo en un objeto o matriz en PHP
        $json_data = json_decode(file_get_contents(JSON_FILE), true);

        // Agregar nuevos datos al archivo JSON
        array_push($json_data, $data);

        // Convertir el objeto o matriz en PHP de vuelta a JSON y escribirlo en el archivo
        file_put_contents(JSON_FILE, json_encode($json_data));
    }
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
    public function get_data(): array
    {
        //=================================================//
        // Método que carga los productos del archivo JSON //
        //=================================================//

        // Leer el archivo JSON y convertirlo en un objeto o matriz en PHP
        $json_data = json_decode(file_get_contents(JSON_FILE), true);

        // Devolver los datos del archivo JSON
        return $json_data;
    }
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
    public function find(int $id): array
    {
        //==================================================//
        // Método que devuelve un producto del archivo JSON //
        //==================================================//

        // Leer el archivo JSON y convertirlo en un objeto o matriz en PHP
        $json_data = json_decode(file_get_contents(JSON_FILE), true);

        // Buscar el producto con el id especificado
        foreach($json_data as $product)
        {
            if($product["id"] === $id)
            {
                return $product;
                break;
            }
        }

        // Si no se encontró el producto, devolver un arreglo vacío
        return array();
    }
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
    public function update(int $id, array $data)
    {
        //===================================================//
        // Método que actualiza un producto del archivo JSON //
        //===================================================//

        // Leer el archivo JSON y convertirlo en un objeto o matriz en PHP
        $json_data = json_decode(file_get_contents(JSON_FILE), true);

        // Buscar el índice del producto que se quiere actualizar
        $product_index = -1;
        foreach($json_data as $i => $product)
        {
            if($product["id"] === $id)
            {
                $product_index = $i;
                break;
            }
        }

        // Si se encontró el producto, actualizar sus datos y guardarlos en el archivo JSON
        if($product_index >= 0)
        {
            $json_data[$product_index] = array_merge($json_data[$product_index], $data);
            file_put_contents(JSON_FILE, json_encode($json_data));
        }
    }
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
    public function delete(int $id)
    {
        //=================================================//
        // Método que elimina un producto del archivo JSON //
        //=================================================//

        // Leer el archivo JSON y convertirlo en un objeto o matriz en PHP
        $json_data = json_decode(file_get_contents(JSON_FILE), true);
        
        // Buscar el índice del producto que se quiere eliminar
        $product_index = -1;
        foreach($json_data as $i => $product)
        {
            if($product["id"] === $id)
            {
                $product_index = $i;
                break;
            }
        }

        // Si se encontró el producto, eliminarlo del arreglo y guardar los cambios en el archivo JSON
        if($product_index >= 0)
        {
            unset($json_data[$product_index]);
            $json_data = array_values($json_data); // reindexar el arreglo
            file_put_contents(JSON_FILE, json_encode($json_data));
        }
    }
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
    public function getLastId(): int
    {
        //===============================================================//
        // Método que obtiene el id del último producto del archivo JSON //
        //===============================================================//

        // Leer el archivo JSON y convertirlo en un objeto o matriz en PHP
        $json_data = json_decode(file_get_contents(JSON_FILE), true);

        // Obtener el último elemento del arreglo
        $last_product = end($json_data);

        // Devolver el id
        if($last_product)
            return $last_product["id"];

        return(0);
    }
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
}
