<?php

defined("BASEPATH") OR exit("No direct script access allowed");

/**
 * Evitar advertencias de Intelliphense
 * 
 * @property Producto_Model $Producto_Model
 * @property input $input
 */

class Producto extends CI_Controller
{
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
    public function index()
    {
        $this->load->view("index");
    }
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	public function listado()
	{
        $this->load->model('Producto_Model');

        $this->Producto_Model->create_file();
        $productos = $this->Producto_Model->get_data();
        
		$this->load->view("listado", ["productos" => $productos]);
	}
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	public function create()
	{
        if($this->input->post("title") && $this->input->post("price") && is_numeric($this->input->post("price")))
        {
            $this->load->model("Producto_Model");
            
            $data = [
                "id"            => $this->Producto_Model->getLastId() + 1,
                "title"         => $this->input->post("title"),
                "price"         => $this->input->post("price"),
                "created_at"    => date("Y-m-d H:i:s"),
            ];

            $this->Producto_Model->insert_data($data);
            redirect("producto/index","refresh");
        }
        else
        {
            $this->load->view("create");
        }
	}
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	public function update()
	{
        //=========================================================================================================//
        // Método que actualiza la información de un artículo o muestra la página para realizar las modificaciones //
        //=========================================================================================================//

        if($this->input->post("id") && is_numeric($this->input->post("id")) && $this->input->post("title") && $this->input->post("price"))
        {
            $data = [
                "title" => $this->input->post("title"),
                "price" => $this->input->post("price"),
            ];
            
            $this->load->model("Producto_Model");
            $this->Producto_Model->update($this->input->post("id"), $data);

            redirect("producto/index","refresh");
        }

        if($this->input->get("id") && is_numeric($this->input->get("id")))
        {
            $id = $this->input->get("id");

            $this->load->model("Producto_Model");

            if($this->Producto_Model->getLastId()>=$id)
            {
                $data = $this->Producto_Model->find($id);
                $this->load->view("update", ["producto" => $data]);
            }
            else
            {
                redirect("producto/index","refresh");
            }
        }
        else
        {
            redirect("producto/index","refresh");
        }
	}
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	public function delete()
	{
        //================================//
        // Método que elimina un artículo //
        //================================//

        if($this->input->get("id") && is_numeric($this->input->get("id")))
        {
            $this->load->model("Producto_Model");
            $this->Producto_Model->delete($this->input->get("id"));
        }
        
        redirect("producto/index","refresh");
	}
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
}
