@section('navbar')
  <!-- <div class="container min-h-full"> -->
  <div class="container">
    <nav class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
      <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="#" class="flex items-center">
        <!-- <img src="https://cdn-icons-png.flaticon.com/512/2857/2857593.png" class="mr-3 w-10 h-10 sm:h-9" alt="Flowbite Logo"> -->
        <img src="{{asset('images/gincaneiros_logo.png')}}" class="mr-3 w-10 h-10 sm:h-9" alt="Flowbite Logo"> 
          <!-- <img src="" class="mr-3 w-10 h-10 sm:h-9" alt="Flowbite Logo"> -->
          <!-- inserir imagem de logo da pasta public -->
          <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Gincaneiros</span>
        </a>
        <div class="flex md:order-2">
          @if (Route::has('login'))
            <!--   Login-->
            @auth
            <!--  <a href="{{ url('/dashboard') }}">Dashboard</a>-->
            <!-- <div class="pt-1">Olá {{strtok(Auth::user()->name," ") }}</div> -->
            <div class="pt-1">
              <!-- get avatar google -->
              <img src="{{Auth::user()->picture}}" class="rounded-full w-10 h-10 sm:h-9" alt="Flowbite Logo">
            </div>
            <!-- get avatar picture google --> 
            <!--   <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbar-sticky">-->
            <!-- </div> -->
          @else
            <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              <a href="{{ route('gincana.index') }}">Criar Gincanas</a>
            </button>
            @endauth
          @endif
          <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
          </button> 
        </div>
          @if (Route::has('login'))
            @auth
            <!-- menu deslogar -->
            <x-slot name="content">
              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
              @csrf
                <x-dropdown-link :href="route('logout')"
                  onclick="event.preventDefault();
                  this.closest('form').submit();">
                {{ __('Log Out') }}
                </x-dropdown-link>
              </form>
            </x-slot>
            <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
              <ul class="flex flex-col p-4 mt-4 bg-blue-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                  <a href="{{ route('gincana.index') }}" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Minhas Gincanas</a>
                </li>
                <li>
                  <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pesquisar Gincana</a>
                </li>  
                <li>
                  <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Meus Rankings</a>
                </li>  
                <li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" class="block py-1 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" onclick="event.preventDefault();
                        this.closest('form').submit();">Sair</a>
                  </form>                    
                </li>
              </ul>
            </div>
          @else 
            <!--menu logado -->
            <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
              <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                  <a href="#" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Pesquisar Gincana</a>
                </li>
                <li>
                  <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contato</a>
                </li>
              </ul>
            </div>
          @endauth
          @endif
        </div>
      </nav>
    </div>
@endsection
