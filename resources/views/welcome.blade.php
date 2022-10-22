@extends('layouts.aplicativo')
@extends('layouts.navflow')
@if ((Route::has('login')))
    @auth              
    @else
@endauth
    @endif
    @section('jogo_geral')
<!--<div class="app-container px-16">-->
<!-- Main modal -->
<div id="defaultModal" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b text-center">
                <h1 class="text-xl font-semibold text-red-500 text-center">
                    Gincaneiros: Encontre o local
                </h1>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button> 
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <img src="https://thumbs.dreamstime.com/b/mapa-velho-da-lupa-e-do-tesouro-dos-piratas-49775148.jpg" alt="Mapa Gincaneiros" class="w-full h-full">
                <p class="text-base leading-relaxed text-gray-900 ">
                    1. Você é bom em desvendar mistérios?<br>
                    2. Então tente descobrir que lugar aparece ao fechar esta janela.<br>
                    3. Olhe BEM as características da imagem, clique em pesquisar e procure no mapa onde é esta cidade.<!-- <spam class="font-bold text-red-600"> Leia as dicas.</spam>--><br>
                    <spam class="font-bold text-red-600">4. Ao abrir o mapa, vc deverá dar zoom e clicar. Veja sua distância!</spam> <br>
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center px-4 pb-4 pt-2 space-x-2 rounded-b border-t border-gray-200">
                <button data-modal-toggle="defaultModal" type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Fechar</button>
            </div>
        </div>
    </div>
</div>
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
<div id="drawer-example" class="fixed z-40 h-screen p-4 overflow-y-auto bg-white w-full" tabindex="-1" aria-labelledby="drawer-label">
    <h5 id="drawer-label" class="bg-red-500 inline-flex items-center mb-4 text-base font-semibold text-gray-50 w-full"><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Pesquise o lugar exato no mapa</h5>
    <button type="button" data-drawer-dismiss="drawer-example" aria-controls="drawer-example" class="text-gray-100 bg-transparent hover:bg-gray-100 hover:text-gray-100 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center" >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div id="map" class="my-4"></div>
    <!-- botão fechar janela-->
    <button type="button" data-drawer-dismiss="drawer-example" aria-controls="drawer-example" class="w-full font-bold text-gray-100 bg-blue-500 hover:bg-blue-700 rounded-lg px-4 py-2.5 inline-flex items-center">
        Fechar
    <span class="sr-only">Close menu</span>
    </button>   
</div>
    <!-- drawer component -->
    <div id="drawer-right-example" class="bg-[url('https://static6.depositphotos.com/1086305/578/i/600/depositphotos_5787033-stock-photo-aged-paper-backgrounds.jpg')] fixed z-40 h-screen p-4 overflow-y-auto bg-white w-80" tabindex="-1" aria-labelledby="drawer-right-label">
        <h5 id="drawer-right-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-900"><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Dicas</h5>
        <button type="button" data-drawer-dismiss="drawer-right-example" aria-controls="drawer-right-example" class="text-gray-900 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center" >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Close menu</span>
        </button>
        <div>
    <ul class="space-y-1 max-w-md list-disc list-inside text-gray-900">
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

        <footer class="bottom-0 left-0 z-20 p-4 w-full bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 ">
            <span class="text-sm text-gray-500 sm:text-center ">© 2022 <a href="https://flowbite.com/" class="hover:underline">Gincaneiros</a>:Participe dessa onda. Desafie-se.
            </span>
        </footer> 
        <script>            
        function initialize() 
        {
        
            var lat_p1=[-30.0674509,-29.3940727,-29.9671644,-29.7120676,-31.7583816,-29.3599566,-32.1943463,-30.0363367,-29.9108346];
            var lng_p2=[-51.2363999,-50.8782034,-51.6159861,-52.4112761,-52.228132,-50.8254075,-52.1627296,-51.2406478,-51.7669776];
            var posicao=(Math.floor(Math.random() * 10));
            var l1=lat_p1[posicao];
            var l2= lng_p2[posicao];
            var lati= l1;//.toFixed(7);
            var longi= l2;//.toFixed(7);
            var lati2= l1;//.toFixed(7);
            var longi2= l2;//.toFixed(7);
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

            const marker = new google.maps.Marker({
                position: new google.maps.LatLng(lati, longi),
            });

            const marker2 = new google.maps.Marker({
                position: new google.maps.LatLng(lati2, longi2),
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

            marker.setMap(panorama);
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
                        html:'Agora crie sua prórpia gincana e compartilhe com seus amigos!<br><br> '+'<a href="http://gincaneiros.com/">Clique Aqui Para uma Nova Rodada</a> ',
                        imageUrl:'https://media2.giphy.com/media/26DOoDwdNGKAg6UKI/giphy.gif?cid=ecf05e47t0f9y6p5ar24hfc3q1dtnpfv4q2wctzarpw5yecq&rid=giphy.gif&ct=g',
                        imageWidth: 300,
                        imageHeight: 200,
                        imageAlt: 'Custom image',
                    })
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
