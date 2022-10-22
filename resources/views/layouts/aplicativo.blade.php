<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width , initial-scale=1.0">
  <title>Gincaneiros</title>
  <!-- <link rel="shortcut icon" href="https://img.icons8.com/color/344/cards.png" type="image/x-icon"> -->
  <link rel="shortcut icon" href="{asset('images/gincaneiros_logo.png')}}" type="image/x-icon">

  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css" />
  <script src="https://cdn.tailwindcss.com"></script> 
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
    #map_container{
      z-index: 1;
      position: absolute;
      height: 50%;
      width: 50%;
    }

    #streetview {
      margin:auto;
      float: left;
      height: 100%;
      width: 100%;
      z-index: 0;
    } 

    #map,
    #pano {
      float: left;
      height: 500px;
      width: 100%;
    }

    /* #marker{
    height: 100%;
    width: 100%;
    font-family: 'Wilkey', sans-serif;
    font-size: 20px;
    color: red;
    text-align: center;
    }

    #marker2{
    height: 100%;
    width: 100%;
    font-family: 'Wilkey', sans-serif;
    font-size: 20px;
    color: green;
    text-align: center;
    } */
  </style>
</head>
<body>
  @yield('navbar')
  @yield('content')
  @yield('criar')
  @yield('form_create')
  @yield('content-logado')
  @yield('jogo_geral')
  <script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script>
</body>
</html>
