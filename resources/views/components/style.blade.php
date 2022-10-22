@extends(layouts.aplicativo)
@section('estilo')
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
@endsection