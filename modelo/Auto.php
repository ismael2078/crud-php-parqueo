<?php
class Auto
{
    private $id;
    private $placa;
    private $color;
    private $modelo;
    private $tipoauto;
    private $fotografia;

    // CONSTRUCTOR
    public function __construct(
        $id = null,
        $placa = "",
        $color = "",
        $modelo = "",
        $tipoauto = "",
        $fotografia = ""
    ) {
        $this->id = $id;
        $this->placa = $placa;
        $this->color = $color;
        $this->modelo = $modelo;
        $this->tipoauto = $tipoauto;
        $this->fotografia = $fotografia;
    }

    // GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getPlaca()
    {
        return $this->placa;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getTipoauto()
    {
        return $this->tipoauto;
    }

    public function getFotografia()
    {
        return $this->fotografia;
    }

    // SETTERS
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function setTipoauto($tipoauto)
    {
        $this->tipoauto = $tipoauto;
    }

    public function setFotografia($fotografia)
    {
        $this->fotografia = $fotografia;
    }
}
