<div>
    <form method="POST" wire:submit.prevent="store">
        <div>
            @error('tipo') <p>{{message}}</p>> @enderror
            @error('serie') <p>{{message}}</p>> @enderror
            @error('lugar') <p>{{message}}</p>> @enderror
        </div>
        <input type="hidden" name="tipo" wire:model="editId">
        <div>
            <label>Tipo:</label>
            <input type="text" name="tipo" wire:model="tipo" required />
        </div>
        <div>
            <label>Serie:</label>
            <input type="number" name="tipo" wire:model="tipo" required />
        </div>
        <div>
            <label>Lugar:</label>
            <select name="lugar" wire:model="lugar" required>
                <option></option>
                <option value="Predio Escolar">Prédio esvcolar</option>
                <option value="Predio de Laboratorio">Prédio de Laboratórios</option>
                <option value="Predio Administrativo">Prédio Administrativo</option>
                <option value="Quadra">Quadra</option>
            </select>
        </div>
        <div>
            <button type='submit'>Enviar</button>
            <button type='button' wireclick='limpar'> Limpar</button>
        </div>
    </form>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Lugar</th>
                    <th>Serie</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salas as $sala)
                <tr>
                    <td>{{$sala->tipo}}</td>
                    <td>{{$sala->lugar}}</td>
                    <td>{{$sala->serie}}</td>
                    <td>
                        <button type='button' wireclick='editar{{$sala->id}}'>Editar</button>
                    </td>
                    <td>
                        <button type='button' wireclick='remover{{$sala->id}}'>Remover</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>