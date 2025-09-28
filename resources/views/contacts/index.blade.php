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
                            placeholder="Buscar por nome, e-mail ou endereço..."
                            value="{{ request('search') }}"
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full max-w-sm"
                        >
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Buscar
                        </button>
                    </form>

                    @if($contacts->isNotEmpty())
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Nome</th>
                                        <th scope="col" class="px-6 py-3">Telefone</th>
                                        <th scope="col" class="px-6 py-3">E-mail</th>
                                        <th scope="col" class="px-6 py-3">Endereço</th> {{-- <-- COLUNA ADICIONADA --}}
                                        <th scope="col" class="px-6 py-3">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contacts as $contact)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $contact->name }}</td>
                                            <td class="px-6 py-4">{{ $contact->phone }}</td>
                                            <td class="px-6 py-4">{{ $contact->email }}</td>
                                            <td class="px-6 py-4">{{ $contact->endereco ?? 'N/A' }}</td> {{-- <-- COLUNA ADICIONADA COM SEGURANÇA --}}
                                            <td class="px-6 py-4 flex items-center space-x-4">
                                                <a href="{{ route('contacts.edit', $contact) }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-2.5 py-2.5 me-1 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"> <path stroke-linecap="round"stroke-linejoin="round"d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652l-1.688 1.687M16.862 4.487L7.5 13.85V17h3.15l9.363-9.363m-3.151-3.15L19.5 7.5" />
                                                    </svg>
                                                </a>

                                                <form method="POST" action="{{ route('contacts.destroy', $contact) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        type="submit"
                                                        onclick="return confirm('Tem certeza que deseja excluir este contato?')"
                                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2.5 py-2.5 me-1 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                    <svg xmlns="http://www.w.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5"stroke="currentColor" class="w-5 h-5"> <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
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