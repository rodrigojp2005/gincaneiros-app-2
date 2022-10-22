@extends('layouts.aplicativo')
@extends('layouts.navflow')

<!-- @if ((Route::has('login')))
      @auth              
      @else

@endauth
    @endif -->
 
@section('jogo_geral')
<!--<div class="app-container px-16">-->
        <div id="map">map</div>
        <div id="map_container">container</div>
        <div id="streetview">sview</div>
        <!-- <div class="border-2 border-red-600 pt-24 -z-50">Gincana IFSUL</div>-->
    <!-- <div class="mb-4"> -->
        <!--   <label for="dica" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dica</label>-->
        <!-- <label for="temas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">{{$gincana->tema}}</label>
            <form action="{{route('gincana.resposta', $gincana['id'])}}" method="post">
                @csrf
    
                <input type="text" id="resp" name="resp"  placeholder="Ex.: Informe um número... " class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> -->
             <!--<div class="flex items-center border-2 border-red-600">
                    <tr>
                        <div class="flex items-center mr-8">
                            <input type="radio" name="temas" id="tema1" value="1" class="mr-2">
                            <label for="tema1" class="text-sm font-medium text-gray-900 dark:text-gray-400">Nenhum</label>
                        </div>
                        <div class="flex items-center mr-8">
                            <input type="radio" name="temas" id="tema2" value="2" class="mr-2">
                            <label for="tema2" class="text-sm font-medium text-gray-900 dark:text-gray-400">Dois</label>
                        </div>
                        <div class="flex items-center mr-8">
                            <input type="radio" name="temas" id="tema3" value="3" class="mr-2">
                            <label for="tema3" class="text-sm font-medium text-gray-900 dark:text-gray-400">Quatro</label>
                        </div>
                    </tr>
                        
                </div>-->
                <!-- <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>

            </form> -->
            <!-- botão para voltar a página anterior -->
            <a href="{{route('gincana.index')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Voltar</a> 

    </div>
  <!--  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>-->
    <script>
      function initialize() {
        var ginLat={{$gincana->palavra}};
        var ginLong={{$gincana->dica}};
        var fenway = { lat: ginLat, lng: ginLong };// , lng: -51.615589};
        console.log("lat.:"+ginLat.toFixed(6)+" long.:"+ginLong.toFixed(6));
        var map = new google.maps.Map(document.getElementById('map_container'), {
          center: fenway,
          zoom: 10
        });
        
        var panorama = new google.maps.StreetViewPanorama(
            document.getElementById('streetview'), {
              position: fenway,
              pov: {
                heading: 150,
                pitch: 10
              }
            });
        map.setStreetView(panorama);
        }

    </script>
         <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3VgDsnZQDKV1w4TM-D19msn3TgOOMuzk&callback=initialize">
        </script>    
<script>
  //  var verdade=
   // alert({{$gincana->resposta}});
   //alert({{$gincana['resposta']}});
    /*if({{$gincana['resposta']}}){
        alert("Resposta correta");
    }else{
        alert("Resposta incorreta");
    }*/

   /* if({{$gincana['resposta']}}==1){
      alert("verdadeiro");
    }else{
      alert("falso");
    }*/
/*
var resp=document.getElementById("resp");
var texto=resp.value;
console.log(resp);
*/
/*

if(resp === $valor)
{
    Swal.fire(
        'Parabéns!',
        'Você acertou a palavra! <br> Faça Sua Gincana e Compartilhe com seus Amigos!',
        'success'
        )
     window.alert("Parabéns, você acertou a palavra!")
    //return
  } else {
    Swal.fire(
        'Que pena, você errou!',
        'Faça uma palavra tão difícil quanto esta <br> e compartilhe com seus amigos!',
        'error'
        )
    }
    */
</script>


@endsection