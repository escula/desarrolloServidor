<?php
include './publiser.php';
abstract class RedigingMaterial{
    private $id;
    private $title;
    private $price;
    private $pages;
    private $editor;

    function __construct()
    {   

    }

    function anadirIva()
    {
        $this->price=($this->price*0.21)+$this->price;
    }
    function mostrarCategoria()
    {
        if($this->pages>50){
            echo "large";

        }else{
            echo "mini";
        }
    }

    /**
     * Get the value of editor
     */ 
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Set the value of editor
     *
     * @return  self
     */ 
    public function setEditor($editor)
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}


?>
