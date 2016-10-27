<?php

class Comentario {

    private $codigo;
    private $conteudo;
    private $data;
    private $usuario;
    private $foto;
    private $codigo_post;

    public function __construct() {
        
    }

    public function construtorGravar($conteudo, $data, $usuario, $codigo_post) {

        $this->setConteudo($conteudo);
        $this->setData($data);
        $this->setUsuario($usuario);
        $this->setCodigo_post($codigo_post);
    }

    public function construtorBuscar($codigo, $conteudo, $data, $usuario, $foto) {

        $this->setCodigo($codigo);
        $this->setConteudo($conteudo);
        $this->setData($data);
        $this->setUsuario($usuario);
        $this->setFoto($foto);
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getConteudo() {
        return $this->conteudo;
    }

    public function getData() {

        return $this->data;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function getCodigo_post() {
        return $this->codigo_post;
    }

    public function setCodigo_post($codigo_post) {
        $this->codigo_post = $codigo_post;
    }

}

?>