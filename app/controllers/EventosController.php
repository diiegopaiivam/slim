<?php

namespace app\controllers;

use app\models\Eventos;
use app\src\Validate;

class EventosController extends Controller {

    protected $evento;

    public function __construct(){
        $this->evento = new Eventos;
    }

    public function index(){

        $eventos = $this->evento->all();

        $this->view('eventos',[
            'title' => 'Lista de Eventos',
            'eventos' => $eventos
        ]);
    }

    public function create(){

        $this->view('cadastro',[
            'title' => 'Cadastrar Evento'
        ]);
    }

    public function store(){
        $validate = new Validate;

        $validate->validate([
            'title' => 'required',
            'body'  => 'required',
        ]);

        if($validate->hasError()){
            return back();
        }

        dd($data);
    }
    
}