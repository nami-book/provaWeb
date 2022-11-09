<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sala;

class SalaController extends Component
{
    public $tipo = "";
    public $serie = "";
    public $lugar = "";
    public $editId = 0;

    protected $rules = [
        'tipo' => 'required|min:5|max:255',
        'serie' => 'required',
        'lugar' => 'required',
    ];

    public function render()
    {
        $salas = Sala::all();
        return view('livewire.salacontroller', compact('salas'))
            ->layout('livewire.layout');
    }

    public function store()
    {
        $this->validate();
        if($this->editId == 0){
            $sala = new Sala();
        } else {
            $sala = Sala::findOrFail($this->editId);
        }
        $sala->tipo = $this->tipo;
        $sala->serie = $this->serie;
        $sala->lugar = $this->lugar;
        $sala->save();
        $this->limpar();
    }
    public function limpar() 
    {
        $this->tipo = "";
        $this->serie = "";
        $this->lugar = "";
        $this->editId = 0;
    }
    public function editar(Sala $sala) {
        $this->tipo = $sala->tipo;
        $this->serie = $sala->serie;
        $this->lugar = $sala->lugar;
        $this->editId = $sala->id;
    }
    public function remover(Sala $sala)
    {
        $sala->delete();
    }
}
