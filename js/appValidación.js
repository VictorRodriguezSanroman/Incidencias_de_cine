window.addEventListener('load', function() {


     document.getElementById("botonDeArchivar").addEventListener("click",bordesValidacion);

     function bordesValidacion (){
        inputTitulo = document.getElementById('titulo');
        inputAutor = document.getElementById('autor');
        let valor = inputTitulo.value;
        const valorAutor = inputAutor.value;
        if(valor == '' && valorAutor == ''){
            inputTitulo.style.border = '1px solid red';
            inputAutor.style.border = '1px solid red';
        }
        if(valor == ''){
            inputTitulo.style.border = '1px solid red';

            return false;
        }
        if(valorAutor == ''){

            inputAutor.style.border = '1px solid red';
            return false;
        }
        
        return true;
     }
    
})