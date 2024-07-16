<?php

use App\Models\Todo;

use function Livewire\Volt\{computed, rules, state};

state([
    'content' => '', // Le state comme dans Vue pour persister les infos a temps !
]);

rules([
    'content' => ['required', 'min:3', 'max:100'], // Les règles de validations de Laravel
]);

$addToDo = function () {
    $this->validate(); // Vérifie que les validations rules sont Ok sinon stop !

    Todo::create([
        'content' => $this->content, // On peut appeler nos variables avec $this
    ]);

    $this->content = '';
};

$count  = computed(
    function () {
        return Todo::count();
    }
);

$todos = computed(
     fn () => Todo::orderByDesc('id')->get()
);

?>

<div class="container">

    <div class="card">
        <div class="card-header">
            <h4>
                Formulaire de création
            </h4>
            <p>Ajouter une tâche</p>
        </div>
        <div class="card-body">
            <div>
                <div class="alert alert-success" role="alert">Nombre de tâches : {{ $this->count }}</div>
                <form wire:submit.prevent="addToDo">
                    <div class="mb-3">
                        <label for="content" class="form-label">Contenu</label>
                        <input type="text" name="content" class="form-control" id="content" wire:model="content" />
                        @error('content')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Enrégistrer</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Contenu</th>
                <th>Creation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->todos as $key => $item)
            <tr>
                <td>{{ $key + 1}}</td>
                <td>{{$item->content}}</td>
                <td>{{$item->created_at->format('d/m/Y à H:i:s')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
