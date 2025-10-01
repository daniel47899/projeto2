<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Adicionar Novo Contato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('contacts.store') }}" method="POST">
                        @csrf

                        {{-- Nome --}}
                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                       focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                       dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 
                                       @error('name') border-red-500 @enderror"
                                placeholder="Nome do Contato" value="{{ old('name') }}" />
                            @error('name')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Telefone --}}
                        <div class="mb-5">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone</label>
                            <input type="tel" id="phone" name="phone"
                                value="{{ old('phone') }}"
                                placeholder="Ex: 88999999999"
                                maxlength="11"
                                inputmode="numeric"
                                required
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                       focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                       dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 
                                       @error('phone') border-red-500 @enderror" />
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
                                placeholder="contato@exemplo.com" value="{{ old('email') }}" />
                            @error('email')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Endereço --}}
                        <div class="mb-5">
                            <label for="endereco" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereço (Opcional)</label>
                            <input type="text" id="endereco" name="endereco"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                       focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                       dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 
                                       @error('endereco') border-red-500 @enderror"
                                placeholder="Rua, Número, Bairro..." value="{{ old('endereco') }}">
                            @error('endereco')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Botão --}}
                        <button type="submit"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 
                                   focus:ring-4 focus:ring-green-300 font-medium rounded-lg 
                                   text-sm px-5 py-2.5 me-2 mb-2 
                                   dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Salvar Contato
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
