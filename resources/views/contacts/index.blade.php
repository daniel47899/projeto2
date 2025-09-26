<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Contatos') }}
        </h2>

        
        @if (session('status'))
            <div class="bg-green-600 dark:bg-green-800 border border-green-700 dark:border-green-900 text-white px-4 py-3 rounded-lg relative mt-4 shadow-lg" role="alert">
                <span class="block sm:inline">{{ session('status') }}</span>
            </div>
        @endif
        

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    
                    

                    
                    <form method="GET" action="{{ route('contacts.index') }}" class="mb-6 flex space-x-2 items-center">
                        <input
                            type="text"
                            name="search"
                            placeholder="Buscar por nome ou e-mail..."
                            value="{{ request('search') }}"
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full max-w-sm"
                        >
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Buscar
                        </button>
                    </form>

                    
                    @if(count($contacts) > 0)
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Nome</th>
                                        <th scope="col" class="px-6 py-3">Telefone</th>
                                        <th scope="col" class="px-6 py-3">E-mail</th>
                                        <th scope="col" class="px-6 py-3">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contacts as $contact)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $contact->name }}</td>
                                            <td class="px-6 py-4">{{ $contact->phone }}</td>
                                            <td class="px-6 py-4">{{ $contact->email }}</td>
                                            <td class="px-6 py-4 flex items-center space-x-4">
                                                <a href="{{ route('contacts.edit', $contact) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-200">
                                                    Editar
                                                </a>
                                                
                                                <form method="POST" action="{{ route('contacts.destroy', $contact) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button 
                                                        type="submit" 
                                                        onclick="return confirm('Tem certeza que deseja excluir este contato?')"
                                                        class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-200"
                                                    >
                                                        Excluir
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        {{-- Mensagem se não houver contatos --}}
                        <p class="text-center text-gray-500 dark:text-gray-400 p-4 border border-dashed border-gray-300 dark:border-gray-700 rounded-lg">
                            @if(request('search'))
                                Nenhum contato encontrado para a pesquisa "{{ request('search') }}".
                            @else
                                Não há contatos cadastrados ainda. Comece a adicionar!
                            @endif
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>