<!-- 
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gincaneiros</title>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css" />
-->
    <!--<link rel="stylesheet" href="css/styles.css" />-->
<!--
<style>
    .title-container {
    text-align: center;
    width: 310px;
    margin-top: 1rem;
   /* border: 2px solid red;*/
}

.letter-yellow {
    color: #c79c2e;
}

.letter-green {
    color: #51b36e;
}
.letter-red {
    color: #943e3c;
}

.app-container {
    max-width: 314px;
    margin-left: auto;
    margin-right: auto;
    /*border: 2px solid black;*/
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
}

.tile-row {
    margin-bottom: 1rem;
    justify-content: center;
    display:flex;
    box-sizing: border-box;
}

.tile-column {
    background-color: #f4f3f1;
    color: #252525;
    height: 40px;
    width: 48px;
    border-radius: 0.25rem;
    margin-right: 0.5rem;
    font-size: 20px;
    align-items: center;
    justify-content: center;
    display:flex;
}

.typing {
    border: 3px solid #252525;
}

.disabled {
    border: 1px solid #252525;
}

.right {
    background-color: #51b36e;
    color: #f4f3f1;
}

.wrong {
    background-color: #943e3c;
    color: #f4f3f1;
}

.displaced {
    background-color: #c79c2e;
    color: #f4f3f1;
}

.keyboard-container {
    width: 100%;
    display: flex;
    flex-direction: column;
}

.keyboard-row-container {
    flex-wrap: wrap;
    align-items: center;
    margin-bottom: 0.5rem;
    justify-content: center;
    display: flex;
}

.keyboard-row-container.notAlphabetic {
    width:100%
}

.keyboard-row-container:not(.notAlphabetic) button {
    width: 8%;
    height: 40px;
    border-radius: 0.25rem;
    margin-right: 0.25rem;
    border: 1px solid #252525;
    font-size: 16px;
    cursor: pointer;
}
</style>
</head>
<body>
-->
@extends('layouts.aplicativo')
@extends('layouts.navflow')

@section('navbar')

@section('content-logado')
<div class="container min-h-full">
            <nav class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
                <div class="container flex flex-wrap justify-between items-center mx-auto">
                    <a href="https://flowbite.com/" class="flex items-center">
                       <!-- <img src="img/logo.svg" class="mr-3 h-6 sm:h-9" alt="Gincaneiros Logo">-->
                        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Gincaneiros</span>
                    </a>
                    <div class="flex md:order-2">
                    <!--<button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    botão comentado para login        
                    -->
                            @if (Route::has('login'))
                            <!--   Login-->
                                @auth
                              <!--  <a href="{{ url('/dashboard') }}">Dashboard</a>-->
                              <div class="pt-1">Olá {{ Auth::user()->name }}</div>
                           <!--   <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbar-sticky">-->
                    </div>
                            @else
                            <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <a href="{{ route('gincana.index') }}">Criar Gincana</a>
                            </button>
                            <!--
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            -->
                                @endauth
                            @endif
                       <!-- </button>-->
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
                                <a href="#" class="block py-2 pr-4 pl-3 text-red-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pesquisar Gincana</a>
                            </li>  
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                    <a href="route('logout')" class="block py-1 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" onclick="event.preventDefault();
                                                    this.closest('form').submit();">SAIR</a>
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
                                <a href="#" class="block py-2 pr-4 pl-3 text-red-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">REGRAS DO JOGO</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Sobre</a>
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
        oi

<div class="app-container pt-16">
        <div class="title-container">
            <h1 >
                <span class="text-2xl">G</span>
                <span>I</span>
                <span class="letter-yellow text-2xl">N</span>
                <span>C</span>
                <span class="letter-red text-2xl">A</span>
                <span>N</span>
                <span class="letter-green text-2xl">E</span>
                <span>i</span>
                <span class="letter-blue text-2xl">R</span>
                <span>O</span>
                <span class="letter-pink text-2xl">S</span>
            </h1>
            <h2 class="text-red-600 ">ACERTE A PALAVRA</h2>                
        </div>
        <div class="tile-container"></div>
        <div class="keybord-container" style="width:300px;">
            <div class="keyboard-row-container notAlphabetic" id="backspaceAndEnterRow"></div>
            <div class="keyboard-row-container" id="keyboardFirstRow"></div>
            <div class="keyboard-row-container" id="keyboardSecondRow"></div>
            <div class="keyboard-row-container" id="keyboardThirdRow"></div>
        </div>
    </div>

    <script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script>

<script>
        const tiles = document.querySelector(".tile-container");
const backspaceAndEnterRow = document.querySelector("#backspaceAndEnterRow");
const keyboardFirstRow = document.querySelector("#keyboardFirstRow");
const keyboardSecondRow = document.querySelector("#keyboardSecondRow");
const keyboardThirdRow = document.querySelector("#keyboardThirdRow");

const keysFirstRow = ["Q", "W", "E", "R", "T", "Y", "U", "I", "O", "P"];
const keysSecondRow = ["A", "S", "D", "F", "G", "H", "J", "K", "L"];
const keysThirdRow = ["Z", "X", "C", "V", "B", "N", "M"];

let word='{{$gincana->palavra}}';
let id_chegado={{$gincana->id}};
const rows = 6;
const columns = 5;
let currentRow = 0;
let currentColumn = 0;

let letreco = word.toUpperCase();
let letrecoMap = {};
for (let index = 0; index < letreco.length; index++) {
  letrecoMap[letreco[index]] = index;
}
const guesses = [];

for (let rowIndex = 0; rowIndex < rows; rowIndex++) {
  guesses[rowIndex] = new Array(columns);
  const tileRow = document.createElement("div");
  tileRow.setAttribute("id", "row" + rowIndex);
  tileRow.setAttribute("class", "tile-row");
  for (let columnIndex = 0; columnIndex < columns; columnIndex++) {
    const tileColumn = document.createElement("div");
    tileColumn.setAttribute("id", "row" + rowIndex + "column" + columnIndex);
    tileColumn.setAttribute(
      "class",
      rowIndex === 0 ? "tile-column typing" : "tile-column disabled"
    );
    tileRow.append(tileColumn);
    guesses[rowIndex][columnIndex] = "";
  }
  tiles.append(tileRow);
}

const checkGuess = () => {
  const guess = guesses[currentRow].join("");
  if (guess.length !== columns) {
    return;
  }

  var currentColumns = document.querySelectorAll(".typing");
  for (let index = 0; index < columns; index++) {
    const letter = guess[index];
    if (letrecoMap[letter] === undefined) {
        currentColumns[index].classList.add("wrong")
    } else {
        if(letrecoMap[letter] === index) {
            currentColumns[index].classList.add("right")
        } else {
            currentColumns[index].classList.add("displaced")
        }
    }
  }

  if(guess === letreco) {
      //window.alert("Parabéns!")
      //return
      Swal.fire(
            'Parabéns!',
            'Você acertou a palavra! <br> Faça Sua Gincana e Compartilhe com seus Amigos!',
            'success'
            )
       // window.alert("Parabéns, você acertou a palavra!")
        return
  } {
      if(currentRow === rows -1) {
         // window.alert("Errrrrrou!")
         Swal.fire(
            'Que pena, você errou!',
            'Faça uma palavra tão difícil quanto esta <br> e compartilhe com seus amigos!',
            'error'
            )
      } else {
          moveToNextRow()
      }
  }
};

const moveToNextRow = () => {
    var typingColumns = document.querySelectorAll(".typing")
    for (let index = 0; index < typingColumns.length; index++) {
        typingColumns[index].classList.remove("typing")
        typingColumns[index].classList.add("disabled")
    }
    currentRow++
    currentColumn=0

    const currentRowEl = document.querySelector("#row"+currentRow)
    var currentColumns = currentRowEl.querySelectorAll(".tile-column")
    for (let index = 0; index < currentColumns.length; index++) {
        currentColumns[index].classList.remove("disabled")
        currentColumns[index].classList.add("typing")
    }
}

const handleKeyboardOnClick = (key) => {
  if (currentColumn === columns) {
    return;
  }
  const currentTile = document.querySelector(
    "#row" + currentRow + "column" + currentColumn
  );
  currentTile.textContent = key;
  guesses[currentRow][currentColumn] = key;
  currentColumn++;
};

const createKeyboardRow = (keys, keyboardRow) => {
  keys.forEach((key) => {
    var buttonElement = document.createElement("button");
    buttonElement.textContent = key;
    buttonElement.setAttribute("id", key);
    buttonElement.addEventListener("click", () => handleKeyboardOnClick(key));
    keyboardRow.append(buttonElement);
  });
};

createKeyboardRow(keysFirstRow, keyboardFirstRow);
createKeyboardRow(keysSecondRow, keyboardSecondRow);
createKeyboardRow(keysThirdRow, keyboardThirdRow);

const handleBackspace = () => {
  if(currentColumn === 0){
      return
  }

  currentColumn--
  guesses[currentRow][currentColumn] = ""
  const tile = document.querySelector("#row"+currentRow+"column"+currentColumn)
  tile.textContent = ""
};

const backspaceButton = document.createElement("button");
backspaceButton.addEventListener("click", handleBackspace);
backspaceButton.textContent = "< Apagar |";
backspaceAndEnterRow.append(backspaceButton);

const enterButton = document.createElement("button");
enterButton.addEventListener("click", checkGuess);
enterButton.textContent = "| ENTER";
backspaceAndEnterRow.append(enterButton);

document.onkeydown = function (evt) {
    evt = evt || window.evt
    if(evt.key === "Enter"){
        checkGuess();
    } else if (evt.key === "Backspace") {
        handleBackspace()
    } else {
        handleKeyboardOnClick(evt.key.toUpperCase())
    }
}

    </script>
</body>
</html>
