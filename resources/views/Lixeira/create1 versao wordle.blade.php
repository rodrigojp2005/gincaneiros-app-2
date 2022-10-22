@extends('layouts.aplicativo')
@extends('layouts.navflow')

@section('navbar')

@section('form_create')
    <!--<div class="container">-->
     <div class="p-8 mx-4">        
        <form action="{{ route('gincana.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="palavra" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Palavra</label>
                <input type="text" id="palavra-id" name="palavra"  placeholder="Digite sua palavra" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="dica" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dica <spam class="text-red-500">(*opcional)</spam></label>
                <input type="text" id="dica-id" name="dica"  placeholder="Digite alguma dica" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
             <!--   <label for="dica" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dica</label>-->
                <label for="temas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Escolha um tema <spam class="text-red-500">(*opcional)</spam></label>
                    <select id="tema" name="tema" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Geral">Geral</option>
                        <option value="Esporte">Esporte</option>
                        <option value="Musica">Música</option>
                        <option value="Cabuloso">Cabuloso</option>
                    </select>
            </div>
           <!-- <button type="button" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Confirmar</button>-->
           <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
           <button type="submit" class="my-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <a href="{{ route('gincana.index') }}">
                    Voltar
                </a>
            </button>
        </form>
    </div>
@endsection