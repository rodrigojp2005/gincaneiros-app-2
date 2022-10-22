@extends('layouts.aplicativo')
@extends('layouts.navflow')
@if ((Route::has('login')))
    @auth              
    @else
@endauth
    @endif
    @section('jogo_geral')
<!--<div class="app-container px-16">-->

<!-- criar div flex com 2 divs, um com o pano e outro a baixo com dois botões centralizados, um botão de atualizar e outro de enviar -->
<div class="flex flex-col">
    <div id="pano"></div>
    <div class="flex flex-row justify-center py-4 ">
        <!-- criar botao com icone em svg de uma lupa, e um texto de atualizar -->
        <!-- <button class="flex flex-row items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 14a6 6 0 110-12 6 6 0 010 12zm4.293-9.707a1 1 0 00-1.414 0L10 7.586 8.121 5.707a1 1 0 00-1.414 1.414l2.121 2.121a1 1 0 001.414 0l2.121-2.121a1 1 0 000-1.414z" clip-rule="evenodd" />
            </svg>
            Atualizar
        </button> -->
        <button id="jogar" class="flex flex-row bg-orange-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full mx-2" data-drawer-target="drawer-example" data-drawer-show="drawer-example" aria-controls="drawer-example"><svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg> Jogar</button>
        <button id="dicas" class="bg-gray-500 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded w-full mx-2" data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example" data-drawer-placement="right" aria-controls="drawer-right-example">Veja Dicas</button>  
    </div>
</div>

<button id="share-button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full mx-1">Compartilhar</button>

<div id="drawer-example" class="fixed z-40 h-screen p-4 overflow-y-auto bg-white w-full" tabindex="-1" aria-labelledby="drawer-label">
    <h5 id="drawer-label" class="bg-red-500 inline-flex items-center mb-4 text-base font-semibold text-gray-100 w-full dark:text-gray-400"><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Pesquise o lugar exato no mapa</h5>
    <button type="button" data-drawer-dismiss="drawer-example" aria-controls="drawer-example" class="text-gray-100 bg-transparent hover:bg-gray-100 hover:text-gray-100 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-100 dark:hover:text-white" >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div id="map" class="my-4"></div>
    <!-- botão fechar janela-->
    <button type="button" data-drawer-dismiss="drawer-example" aria-controls="drawer-example" class="w-full font-bold text-gray-100 bg-blue-500 hover:bg-blue-700 rounded-lg px-4 py-2.5 inline-flex items-center dark:hover:bg-blue-700">
        Fechar
    <span class="sr-only">Close menu</span>
    </button>   
</div>
    <!-- drawer component -->
    <div id="drawer-right-example" class="bg-[url('https://static6.depositphotos.com/1086305/578/i/600/depositphotos_5787033-stock-photo-aged-paper-backgrounds.jpg')] fixed z-40 h-screen p-4 overflow-y-auto bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-right-label">
        <h5 id="drawer-right-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-900 dark:text-gray-400"><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Dicas</h5>
        <button type="button" data-drawer-dismiss="drawer-right-example" aria-controls="drawer-right-example" class="text-gray-900 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Close menu</span>
        </button>
        <div>
    <ul class="space-y-1 max-w-md list-disc list-inside text-gray-900 dark:text-gray-400">
        <li>
        1. Olhe para a imagem do street view, navegue e busque pistas;
        </li>
        <li>
        2. Clique em jogar e pesquise o local exato no mapa;
        </li>
        <li>
        3. Dê um clique e abrirá uma janela com uma seta informando a direção do local;
        </li>
        <li>
        4. Olhe a Kilometragem que seu clique está em relação ao local exato;    </li>
        <li>
        5. Faça sua gincana e divirta-se!
        </li>
    </ul>
</div>
</div>

        <footer class="bottom-0 left-0 z-20 p-4 w-full bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://flowbite.com/" class="hover:underline">Gincaneiros</a>: Desafie-se também.
            </span>
        </footer> 
<!-- 
    
<button type="button" data-modal-toggle="crypto-modal" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
  <svg aria-hidden="true" class="mr-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
  Connect wallet
</button> -->

<!-- Main modal -->
<div id="crypto-modal" aria-hidden="false" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="crypto-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                <span class="sr-only">Close modal</span>
            </button>
            <!-- Modal header -->
            <div class="py-4 px-6 rounded-t border-b dark:border-gray-600">
                <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                    Redes Sociais
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-6">
                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Compartilhe nas suas redes.</p>
                <ul class="my-4 space-y-3">
                    <li>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            <span class="sr-only">Facebook page</span>
                        </a>
                        Facebook
                    </li>
                    <li>                   
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                            <span class="sr-only">Instagram page</span>
                        </a>
                        Instagram
                    </li>
                </ul>
                <!-- <div>
                    <a href="#" class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                        <svg aria-hidden="true" class="mr-2 w-3 h-3" focusable="false" data-prefix="far" data-icon="question-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm107.244-255.2c0 67.052-72.421 68.084-72.421 92.863V300c0 6.627-5.373 12-12 12h-45.647c-6.627 0-12-5.373-12-12v-8.659c0-35.745 27.1-50.034 47.579-61.516 17.561-9.845 28.324-16.541 28.324-29.579 0-17.246-21.999-28.693-39.784-28.693-23.189 0-33.894 10.977-48.942 29.969-4.057 5.12-11.46 6.071-16.666 2.124l-27.824-21.098c-5.107-3.872-6.251-11.066-2.644-16.363C184.846 131.491 214.94 112 261.794 112c49.071 0 101.45 38.304 101.45 88.8zM298 368c0 23.159-18.841 42-42 42s-42-18.841-42-42 18.841-42 42-42 42 18.841 42 42z"></path></svg>
                        Why do I need to connect with my wallet?</a>
                </div> -->
            </div>
        </div>
    </div>
</div>


    <script>  
        // share button
        const shareButton = document.getElementById('share-button');
        const modal=document.getElementById('crypto-modal');

        shareButton.addEventListener('click', () => {
            if (navigator.share) {
            console.log("dentro do if share");
          //  alert('dentro do if share');
                navigator.share({
                    title: "document.title",
                    text: 'Gincana de rua',
                    url: "gincaneiros.com/gincana/{{ $gincana->id }}",
                })
                .then(() => console.log('Successful share'))
                .catch((error) => console.log('Error sharing', error));
            } else {
            //    alert('fora do if share');
                console.log("fora do if share");
                modal.classList.remove('hidden');
                //modal.classList.add('block');          
            }
        });
        
        // function share(){
        //     if (navigator.share !== undefined) {
        //         navigator.share({
        //             title: 'O título da sua página',
        //             text: 'Um texto de resumo',
        //             url: 'https://gincaneiros.com/{{ $gincana->id }}'
        //         })
        //         .then(() => console.log('Successful share'))
        //         .catch((error) => console.log('Error sharing', error));
        //     }
        // }
        
        function initialize() 
        {
        
            // var lat_p1=[-31.7616866,-30.0674509,-29.3940727,-29.9671644,-29.7120676,-31.7583816,-29.3599566,-32.1943463,-30.0363367,-29.9108346];
            // var lng_p2=[-52.3368014,-51.2363999,-50.8782034,-51.6159861,-52.4112761,-52.228132,-50.8254075,-52.1627296,-51.2406478,-51.7669776];
        
            var ginLat={{$gincana->lat}};
            var ginLng={{$gincana->lng}};
            var pontos=0;
            var resultado=0;
            var valor=0;
         // pegar endereco da foto do usuario do banco
            var foto="{{Auth::user()->picture}}";
      
           // var avatar= document.getElementById("foto_user").appendChild(img);

           // var posicao=(Math.floor(Math.random() * 10));
            //var l1=lat_p1[posicao];
          //  var l2= lng_p2[posicao];
            var lati= ginLat;//.toFixed(7);
            var longi= ginLng;//.toFixed(7);
            var lati2= ginLat;//.toFixed(7);
            var longi2= ginLng;//.toFixed(7);
            let position={ lat:lati, lng: longi };
            let position2={ lat:lati2, lng: longi2 };
            const local = { lat: lati, lng: longi };
            const local2 = { lat: lati2, lng: longi2 };

            const map = new google.maps.Map(document.getElementById("map"), {
                center: local,
                zoom: 3,
                disableDefaultUI: true,
                zoomControl: true,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl:false,
                rotateControl: false,
                fullscreenControl: false
            });

            // const marker = new google.maps.Marker({
            //     position: new google.maps.LatLng(lati,longi),
            //     icon:"https://chart.apis.google.com/chart?chst=d_map_pin_icon&chld=bus|FFFF00",
               
            // });

            const marker2 = new google.maps.Marker({
                position: new google.maps.LatLng(lati2,longi2),


                // icon:{
                //     url: foto,
                //     scaledSize: new google.maps.Size(50, 50),
                //     origin: new google.maps.Point(0,0),
                //     anchor: new google.maps.Point(0,0)
                // },

                
            });

            const panorama = new google.maps.StreetViewPanorama(
                document.getElementById("pano"),
                {
                panControl: false,
                zoomControl: true,
                addressControl: false,
                scaleControl: false,
                overviewMapControl: false,
                position: local,
                    pov: {
                        heading: 286,
                        pitch: 7,
                    },
                    // remove the default controls
                    fullscreenControl: false,
                    // esconder nome da rua
                    showRoadLabels:false,
                },                
            );
        //     marker.setMap(map);
        //    marker2.setMap(map);

        //    marker.setMap(pano);
        //    marker2.setMap(pano);
          //  console.log("foto:"+foto);
           //  marker.setMap(panorama);
             marker2.setMap(panorama);
           
            map.setStreetView(panorama);
            
            let i=1;

           // cria evento de clique no mapa para pegar sua posição
          
            google.maps.event.addListener(map, 'click', function(event) {
                console.log("Dentro do click");
                var p1= new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
                var p2= new google.maps.LatLng(lati, longi);
                console.log("lat: "+event.latLng.lat().toFixed(6));
                console.log("lng: "+event.latLng.lng().toFixed(6));
                console.log("heading: "+panorama.getPov().heading);
                console.log("pitch: "+panorama.getPov().pitch);
                console.log("zoom: "+panorama.getPov().zoom.toFixed(2));
                console.log("i: "+i);
                //subtrair a posição longitudinal da variavel longi menos a posição longitudinal do clique
                var diferenca_longi= longi-event.latLng.lng().toFixed(2);
                //subtrair a posição latitudinal da variavel lati menos a posição latitudinal do clique
                var diferenca_lati= lati-event.latLng.lat().toFixed(2);
                console.log("diferenca_longi: "+diferenca_longi.toFixed(2));
                console.log("diferenca_lati: "+diferenca_lati.toFixed(2));
                console.log("------------------------------");
                //let tentativas=5;
                const heading= google.maps.geometry.spherical.computeDistanceBetween(p1, p2);
                // arredondar para inteiro
                // retirar numeros depois da virgula de heading
                var heading2= heading/1000;
                console.log("heading2: "+heading2.toFixed(0));
                valor=valor+parseInt(heading2.toFixed(0));
                //console.log("pontos: "+pontos);
                
                //console.log("resultado: "+resultado);

                // reduzir resultado menos pontos
                // converter pontos para inteiro

                resultado=100000-(parseFloat(valor)).toFixed(0);
                let resultado2=(resultado/1000).toFixed(2);
                

console.log("resultado: "+resultado);
                //const heading2= Math.round(heading);
                console.log("heading2: "+heading2.toFixed(0));
                if(heading>10000){
                    //converte para km
                    // console.log("Distância: "+(heading/1000).toFixed(2)+" km");
                    if(event.latLng.lng().toFixed(6)<longi && event.latLng.lat().toFixed(6)<lati){
                        Swal.fire({
                        title: 'Isso ae...O local está há <b style="color:red">'+ heading2.toFixed(0)+' km </b>nessa direção. ',
                        html:'Esta é sua ' +i+'° tentativa. Continue tentando!',
                        imageUrl:'https://media3.giphy.com/media/US7b71Q3kzf8BOfCb7/giphy.gif?cid=ecf05e47guk6nl8wxcrs8f9sjkoh49vyfguz9f4gxp3y1ws4&rid=giphy.gif&ct=g',
                        imageWidth: 300,
                        imageHeight: 200,
                        imageAlt: 'Custom image',
                        })
                    }else if (event.latLng.lng().toFixed(6)>longi && event.latLng.lat().toFixed(6)<lati){
                        Swal.fire({
                            title: 'Ei...Segue <b style="color:red">'+ heading2.toFixed(0)+' km </b>nessa direção. Esta quase lá!', 
                            imageUrl:'https://media1.giphy.com/media/52vBik9fVzeUNNxCRN/giphy.webp?cid=ecf05e47u5y88xsjrf7ofm5ewcm6b7x6j5s5zra0k4dn8i2y&rid=giphy.webp&ct=g',
                            html:'Esta é sua ' +i+'° tentativa. Continue tentando!',
                            imageWidth: 200,
                            imageHeight: 300,
                            imageAlt: 'Custom image',
                        })
                    }else if(event.latLng.lng().toFixed(6)<longi && event.latLng.lat().toFixed(6)>lati){
                        Swal.fire({
                            title: 'Psiu...O local está há <b style="color:red">'+ heading2.toFixed(0)+' km </b>nessa direção. ',
                            html:'Esta é sua ' +i+'° tentativa. Continue tentando!', 
                            imageUrl:'https://media1.giphy.com/media/KspzQl9Kx0pAJNCo8r/giphy.gif?cid=ecf05e47xv7tltu7go6w3unbo2z2b8si9xr72i1nqyps01rz&rid=giphy.gif&ct=g',
                            imageWidth: 250,
                            imageHeight: 300,
                            imageAlt: 'Custom image',
                        })
                    }else if(event.latLng.lng().toFixed(6)>longi && event.latLng.lat().toFixed(6)>lati){
                        Swal.fire({
                        title: 'Olha...O local está há <b style="color:red">'+ heading2.toFixed(0)+' km </b>nessa direção. ',
                        html:'Esta é sua ' +i+'° tentativa. Continue tentando!',
                        imageUrl:'https://media2.giphy.com/media/Ugni1R0EaK6dw7VCb4/giphy.gif?cid=ecf05e47nk6evkawp72rbgx7n4022u581e49nhlci0g2h3dv&rid=giphy.gif&ct=g', 
                        imageWidth: 200,
                        imageHeight: 300,
                        imageAlt: 'Custom image',
                        })
                    }
                }else{
                    Swal.fire({
                        title: 'Parabéns, Acertou!! Na '+i+'° tentativa.',
                        text: 'texto',
                        html:'Você fez '+resultado2+ ' pontos',
                        imageUrl:'https://media2.giphy.com/media/26DOoDwdNGKAg6UKI/giphy.gif?cid=ecf05e47t0f9y6p5ar24hfc3q1dtnpfv4q2wctzarpw5yecq&rid=giphy.gif&ct=g',
                        imageWidth: 300,
                        imageHeight: 200,
                        imageAlt: 'Custom image',
                    })
                    // axios.post('http://localhost:3000/api/usuarios', {
                    //     nome: nome,
                    //     pontos: resultado2,
                    //     })
                    //     .then(function (response) {
                    //     console.log(response);
                    //     })
                    //     .catch(function (error) {
                    //     console.log(error);
                    //     });
                    // let config = {
                    //     headers: {
                    //         'Content-Type': 'application/json',
                    //         'Access-Control-Allow-Origin': '*',
                    //         'Access-Control-Allow-Methods': 'GET,PUT,POST,DELETE,PATCH,OPTIONS',
                    //     }
                    // }
                    // setTimeout(function(){
                    //     location.reload();
                    // }, 5000);
                }
                i++;
            });

            panorama.addListener("position_changed", () => {
                // marcador 1
                let diferenca_lati_m1=lati-panorama.getPosition().lat().toFixed(4);
                let diferenca_longi_m1=longi-panorama.getPosition().lng().toFixed(4);
                div1= document.getElementById("marker");
                div2= document.getElementById("marker2");

                if(div1!=null){
                  //  if(diferenca_lati_m1.toFixed(5)>0.00015 || diferenca_lati_m1.toFixed(5)<-0.00015)
                    if((diferenca_lati_m1.toFixed(5)>0.00020 || diferenca_lati_m1.toFixed(5)<-0.00020) || (diferenca_longi_m1.toFixed(5)>0.00020 || diferenca_longi_m1.toFixed(5)<-0.00020))
                    {
                        document.getElementById("marker").style.display="none";
                    }
                    else if(diferenca_lati_m1.toFixed(5)<0.00020 || diferenca_lati_m1.toFixed(5)>-0.00020)
                    {
                        document.getElementById("marker").style.display="block";
                    }
                }
                
                // marcador 2
                let diferenca_lati_m2=lati2-panorama.getPosition().lat().toFixed(4);
                let diferenca_longi_m2=longi2-panorama.getPosition().lng().toFixed(4);

                if(div2!=null){
                    if((diferenca_lati_m2.toFixed(5)>0.00020 || diferenca_lati_m2.toFixed(5)<-0.00020) || (diferenca_longi_m2.toFixed(5)>0.00020 || diferenca_longi_m2.toFixed(5)<-0.00020))
                    {
                        document.getElementById("marker2").style.display="none";
                    }
                    else if(diferenca_lati_m2.toFixed(5)<0.00020 || diferenca_lati_m2.toFixed(5)>-0.00020)
                    {
                        document.getElementById("marker2").style.display="block";
                    }
                }

                //mostrar no console a latitude
                console.log("latitude: "+panorama.getPosition().lat().toFixed(4));
                //mostrar no console a longitude 
                console.log("longitude: "+panorama.getPosition().lng().toFixed(4));
                // mostrar no console.log o pov
            });

            panorama.addListener("visible_changed", () => {
                console.log("Dentro do visible_changed");
                console.log(panorama.getVisible());
            }); 
        }        
        window.initialize = initialize;       
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3VgDsnZQDKV1w4TM-D19msn3TgOOMuzk&callback=initialize">
    </script>    
<script>
    function verifica_resp(){
        fleg=0;
        var resp = document.getElementById("resp").value.toUpperCase().trim();
        if(resp=="13"){
            Swal.fire({
            title: 'Parabéns!',
            text: 'A??????????????????????!',
            html:'Agora crie sua prórpia gincana e compartilhe com seus amigos!<br><br> '+'<a href="//sweetalert2.github.io" style="color:blue;">Clique Aqui</a> ',
            imageUrl: 'https://img.r7.com/images/2018/02/02/4b8vk5pd2g_55aoabdv7p_file',
            imageWidth: 300,
            imageHeight: 200,
            imageAlt: 'Custom image',
            })
         }else{
            Swal.fire({
            title: 'Que pena, errou!',
            text: 'Agora crie sua prórpia gincana e compartilhe com seus amigos!',
            html:'Agora crie sua prórpia gincana e compartilhe com seus amigos!<br> <br>'+'<a href="//sweetalert2.github.io" style="color:blue;">Clique Aqui</a> ',
            imageUrl: 'https://st2.depositphotos.com/1074442/7027/i/450/depositphotos_70278557-stock-photo-fallen-chess-king-as-a.jpg',
            imageWidth: 300,
            imageHeight: 200,
            imageAlt: 'Custom image',
            })
        }
    }
</script>
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
@endsection
