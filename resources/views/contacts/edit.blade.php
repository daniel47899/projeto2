<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Contato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('contacts.update', $contact) }}">
                        @csrf
                        @method('PUT')

                        {{-- Nome --}}
                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                       focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                       dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 
                                       @error('name') border-red-500 @enderror"
                                value="{{ old('name', $contact->name) }}">
                            @error('name')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Telefone --}}
                        <div class="mb-5">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone</label>
                            <input type="tel" id="phone" name="phone"
                                value="{{ old('phone', $contact->phone) }}"
                                maxlength="11"
                                inputmode="numeric"
                                required
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                       focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                       dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 
                                       @error('phone') border-red-500 @enderror">
                            @error('phone')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Digite apenas números (máx. 11 dígitos).
                            </p>
                        </div>

                        {{-- Email --}}
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                            <input type="email" id="email" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                       focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                       dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 
                                       @error('email') border-red-500 @enderror"
                                value="{{ old('email', $contact->email) }}">
                            @error('email')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Endereço (opcional) --}}
                        <div class="mb-5">
                            <label for="endereco" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereço (Opcional)</label>
                            <input type="text" id="endereco" name="endereco"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                       focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                       dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 
                                       @error('endereco') border-red-500 @enderror"
                                value="{{ old('endereco', $contact->endereco) }}">
                            @error('endereco')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Botão --}}
                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent 
                                       rounded-md font-semibold text-white uppercase tracking-widest 
                                       hover:bg-indigo-700 focus:outline-none focus:ring-2 
                                       focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Salvar Alterações
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
