@extends('layouts.aplicativo')
@extends('layouts.navflow')


@if ((Route::has('login')))
      @auth              
      @else

@endauth
    @endif

    @section('jogo_geral')
<!--<div class="app-container px-16">-->

  <!-- Modal toggle -->
<button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
  Toggle modal
</button>

<!-- Main modal -->
<div id="defaultModal" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600 text-center">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white text-center">
                    GINCANEIROS: olhando o presente, <br>lembrado o passado 
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    1. Procure um local onde você morou, estudava ou 
                     onde você gosta(ava) de ir com seus amigos/família.<br>
                    2. Faça uma pergunta a respeito do local, compartilhe e divirta-se relembrando bons momentos<br>
                    3. Ou então invente sua gincana / brincadeira personalizada . Combine um prêmio,<spam class="font-bold text-red-600"> quem sabe uma pizza?!</spam> <br>
                </p>
               
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button data-modal-toggle="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Fechar</button>
            </div>
        </div>
    </div>
</div>
        <div id="map" class="pt-8"></div>
        <div id="map_container"></div>
        <div id="streetview"></div>
        <!-- <div class="border-2 border-red-600 pt-24 -z-50">Gincana IFSUL</div>-->
       
    <div class="mb-4">
        <!--   <label for="dica" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dica</label>-->
       <!-- <label for="temas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400 bg-red-200">
            Qual ano do mundial do princial título gaúcho? 
        </label>-->
        <label class="block p-2 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 bg-red-200 ">
        Qual ano do mundial do principal título gaúcho? 
        <!--<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>-->
        </label>
            <form>
                <div class="flex items-center ">
                    <tr>
                        <div class="flex items-center mr-8">
                            <input type="radio" name="temas" id="tema1" value="1" class="mr-2">
                            <label for="tema1" class="text-sm font-medium text-gray-900 dark:text-gray-400">1983</label>
                        </div>
                        <div class="flex items-center mr-8">
                            <input type="radio" name="temas" id="tema2" value="2" class="mr-2">
                            <label for="tema2" class="text-sm font-medium text-gray-900 dark:text-gray-400">2006</label>
                        </div>
                        <div class="flex items-center mr-8">
                            <input type="radio" name="temas" id="tema3" value="3" class="mr-2">
                            <label for="tema3" class="text-sm font-medium text-gray-900 dark:text-gray-400">ambos</label>
                        </div>
                    </tr>
                        
                </div>
            </form>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
    <script>
     
      function initialize() {
        var fenway = { lat:-30.067256, lng: -51.236247};
        var map = new google.maps.Map(document.getElementById('map_container'), {
          center: fenway,
          zoom: 15
        });
        var panorama = new google.maps.StreetViewPanorama(
            document.getElementById('streetview'), {
              position: fenway,
              pov: {
                heading: 10,
                pitch: 5
              }
            });
        map.setStreetView(panorama);
      }


    </script>
         <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3VgDsnZQDKV1w4TM-D19msn3TgOOMuzk&callback=initialize">
        </script>    

@endsection