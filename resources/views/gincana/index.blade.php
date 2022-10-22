@extends('layouts.aplicativo')
@extends('layouts.navflow')
@section('navbar')
@section('content')
    <div class="container py-16 lg:py-20 lg:mx-10">
        <!--<div class="row">
            <div class="col-12">
                <h3>Aplicativos JP</h3>-->
              
                @if(isset($gincana)&& count($gincana)>0)

              
                <div class="overflow-x-auto relative">
                  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                          
                              <th class="px-4 py-2">Ver</th>
                            <!--  <th class="px-4 py-2">Palavra</th>
                              <th class="px-4 py-2">Dica</th>-->
                              <th class="px-4 py-2">Local </th>
                              <th class="px-4 py-2">Editar</th>
                              <th class="px-4 py-2">Excluir</th>
                          <!--
                              <th scope="col" class="py-4 px-2"> 
                             Palavra
                              </th>
                              <th scope="col" class="py-4 px-2">
                                  Dica
                              </th>
                              <th scope="col" class="py-4 px-2">
                                Tema
                              </th>
                              <th scope="col" class="py-4 px-2">
                                  Editar
                              </th>
                              <th scope="col" class="py-4 px-2">
                                  Deletar
                              </th>-->
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($gincana as $gincana)
                        @if($gincana->user_id == Auth::user()->id)
                          <!-- console.log('usuario criador da gincana é o mesmo logado'); -->
                          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                              <td class="px-4 py-2">
                                <a href="{{ route('gincana.show', $gincana['id']) }}" class="text-blue-600 hover:text-red-900 dark:hover:text-indigo-400">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                  </svg>
                                </a>                               
                              </td>
                             <!-- <td class="px-4 py-2">                                                       
                                <a href="{{ route('gincana.show', $gincana['id']) }}" class="text-blue-600 hover:text-red-900 dark:hover:text-indigo-400">
                                  {{ $gincana['palavra'] }}
                                </a>                                
                              </td>
                              <td class="px-4 py-2 ">
                                <a href="{{ route('gincana.show', $gincana['id']) }}" class="text-blue-600 hover:text-red-900 dark:hover:text-indigo-400">
                                  {{ $gincana['dica'] }}
                                </a>
                              </td>-->
                              <td class="px-4 py-2 ">
                                  {{ $gincana['endereco'] }}
                              </td>
                              <td class="px-4 py-2 ">
                               <!-- <a href="{{ route('gincana.edit',$gincana['id']) }}" >-->
                                <!--<button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">-->
                                <button type="button" class="py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <!-- <a href="{{ route('gincana.edit', ['id'=>$gincana->id]) }}"> -->
                                <a href="{{ route('gincana.edit', $gincana['id']) }}">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                  </svg>
                                  </a>
                                </button>
                                <!--</a>-->
                              </td>
                              <td class="py-4 px-6 ">
                                <form action="{{ route('gincana.destroy', $gincana['id']) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <!--<button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Deletar</button>-->
                                 <!-- <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">-->
                                 <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                  </svg>
                            </button>
                          </form>
                        </tr>
                          @endif
                          @endforeach
                      </tbody>
                  </table>
                  <!-- criar div para alinhar os botoes no centro com espacamento iguais entre si-->

                  <div class="flex space-x-4 justify-center items-center">
                    <button type="submit" class="my-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-2/6 sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><a href="{{ route('gincana.create') }}">Criar</a></button>
                    <button type="submit" class="my-4 text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-2/6 sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <a href="{{ route('welcome') }}">
                        Voltar
                      </a>
                    </button>
                  </div>
                </div> 
      @else 
      <p class="items-center">Não há gincanas cadastradas</p>
      <button type="submit" class="my-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2 sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 items-center"><a href="{{ route('gincana.create') }}">Criar</a></button>

      @endif

            </div>     
           <!-- </div>
        </div>-->
    </div>
@endsection
