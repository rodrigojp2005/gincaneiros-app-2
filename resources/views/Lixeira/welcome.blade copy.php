@extends('layouts.aplicativo')
@extends('layouts.navflow')


@if ((Route::has('login')))
      @auth              
      @else

      <!-- Main modal -->
<div id="defaultModal" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    DESCUBRA A PALAVRA  
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    1. Descubra a palavra secreta, digitando as letras que a compõem. <br>
                    2. Cada letra que você digitar, será comparada com a palavra secreta. <br>
                    3. Se a letra estiver na palavra secreta e no seu respectivo local, ela será exibida na cor <spam class="font-bold text-green-700"> VERDE.</spam> <br>
                    4. Se a letra estiver na palavra secreta mas no local errado, ela será exibida na cor  <spam class="font-bold text-yellow-400"> AMARELO.</spam> <br>
                    5. Se a letra não estiver na palavra secreta, ela será exibida na cor  <spam class="font-bold text-red-600"> VERMELHO.</spam> <br>
                </p>
               
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button data-modal-toggle="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Fechar</button>
            </div>
        </div>
    </div>
</div>
@endauth
    @endif
 
@section('jogo_geral')
<div class="app-container px-16">
        <div class="title-container ">
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

    const rows = 6;
    const columns = 5;
    let currentRow = 0;
    let currentColumn = 0;
    let letreco = "FEITO"
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
        
        Swal.fire(
            'Parabéns!',
            'Você acertou a palavra! <br> Faça Sua Gincana e Compartilhe com seus Amigos!',
            'success'
            )
       // window.alert("Parabéns, você acertou a palavra!")
        return
    } 
    {
        if(currentRow === rows -1) {

        Swal.fire(
            'Que pena, você errou!',
            'Faça uma palavra tão difícil quanto esta <br> e compartilhe com seus amigos!',
            'error'
            )
            //window.alert("Errrrrrou!")
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

@endsection