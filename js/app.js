window.addEventListener('load',()=>{
    console.log('script loaded');

    const parrafoFrases = document.getElementById('frases');
    let frases = ['"Evitar los accidentes depende de ti"',
                  '"Cada momento de prevención evita un accidente laboral"',
                  '"No son los individuos los que hacen las empresas exitosas, sino los equipos"',
                  '"La razón más grande de tener seguiridad en el trabajo puede ser la más pequeña"',
                  '"Mejor es prevenir que curar"'];

    setInterval(() => {
        for (let i = 0; i < frases.length; i++) {
            var azar = Math.floor(Math.random() * frases.length); //mediante esta variable creamos el azar del visionado
            parrafoFrases.innerHTML = frases[azar];
            
        }    
    },3000); //cada 3s la frase cambiará

    let priorRojo = document.querySelectorAll('.ALTA');

    for (let i = 0;i < priorRojo.length;i++) {
        priorRojo[i].innerHTML = '<button class="btn btn-danger btn-sm text-white d-none d-md-block">ALTA</button>';
    }


    let priorNaranja = document.querySelectorAll('.MEDIA');
    
    for (let i = 0;i < priorNaranja.length;i++) {
        priorNaranja[i].innerHTML = '<button class="btn btn-warning btn-sm text-white d-none d-md-block">MEDIA</button>';
    }

    let priorVerde = document.querySelectorAll('.BAJA');
    
    for (let i = 0;i < priorVerde.length;i++) {
        priorVerde[i].innerHTML = '<button class="btn btn-success btn-sm text-white d-none d-md-block">BAJA</button>';
    }
    
})