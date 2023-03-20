<?php

defined("BASEPATH") OR exit("No direct script access allowed");

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
        $this->load->model("Producto_Model");
        
        $producto = new Producto_Model();
        $producto->create_file();
        
        $productos = $producto->get_data();
        
		$this->load->view("listado", ["productos" => $productos]);
	}
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	public function create()
	{
        if($this->input->post("title") && $this->input->post("price") && is_numeric($this->input->post("price")))
        {
            $this->load->model("Producto_Model");
            $producto = new Producto_Model();
            
            $data = [
                "id"            => $producto->getLastId() + 1,
                "title"         => $this->input->post("title"),
                "price"         => $this->input->post("price"),
                "created_at"    => date("Y-m-d H:i:s"),
            ];

            $producto->insert_data($data);
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
        if($this->input->post("id") && $this->input->post("title") && $this->input->post("price"))
        {
            $this->load->model("Producto_Model");
            $producto = new Producto_Model();
            
            $data = [
                "title"         => $this->input->post("title"),
                "price"         => $this->input->post("price"),
            ];

            $producto->update($this->input->post("id"), $data);
            redirect("producto/index","refresh");
        }

        if($this->input->get("id"))
        {
            $id = $this->input->get("id");

            $this->load->model("Producto_Model");
            $producto = new Producto_Model();
            if($producto->getLastId()>=$id)
            {
                $data = $producto->find($id);
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
        if($this->input->get("id"))
        {
            $this->load->model("Producto_Model");
            $producto = new Producto_Model();
            
            $producto->delete($this->input->get("id"));
        }
        
        redirect("producto/index","refresh");
	}
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
}
