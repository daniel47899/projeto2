<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Contatos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if(count($contacts) > 0)
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
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $contact->name }}</td>
                                        <td class="px-6 py-4">{{ $contact->phone }}</td>
                                        <td class="px-6 py-4">{{ $contact->email }}</td>
                                        <td class="px-6 py-4 flex items-center space-x-2">
                                            <a href="{{ route('contacts.edit', $contact) }}" class="text-indigo-600 hover:text-indigo-900">
                                                Editar
                                            </a>

                                            <form method="POST" action="{{ route('contacts.destroy', $contact) }}" class="flex items-center">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    Excluir
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center">Nenhum contato encontrado.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>