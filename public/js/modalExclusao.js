const containerModalExclusao = document.getElementById('containerModalExclusao');
const containerModalExclusaoContato = document.getElementById('containerModalExclusaoContato');

const boxModalExclusao = document.getElementById('boxModalExclusao');
const botaoModalExclusao = document.getElementById('botaoModalExclusao')
console.log(boxModal)

function fecharModalExclusao(event){
    

    if(event.target === containerModalExclusao){
        containerModalExclusao.classList.remove('mostrar-modal');
        boxModalExclusao.classList.add('animation-fechamento-modal')
        setTimeout(() =>{

            containerModalExclusao.classList.add('ocultar-modal');
            boxModalExclusao.classList.remove('animation-fechamento-modal');
        }, 290  )
    }
    if(event.target === botaoModalExclusao){
        containerModalExclusao.classList.remove('mostrar-modal');
    boxModalExclusao.classList.add('animation-fechamento-modal')
    setTimeout(() =>{

        containerModalExclusao.classList.add('ocultar-modal');
        boxModalExclusao.classList.remove('animation-fechamento-modal');
    }, 290  )
    }
}

function fecharModalExclusaoContato(event){
    

    if(event.target === containerModalExclusaoContato){
        containerModalExclusaoContato.classList.remove('mostrar-modal');
        boxModalExclusao.classList.add('animation-fechamento-modal')
        setTimeout(() =>{

            containerModalExclusaoContato.classList.add('ocultar-modal');
            boxModalExclusao.classList.remove('animation-fechamento-modal');
        }, 290  )
    }
    if(event.target === botaoModalExclusao){
        containerModalExclusaoContato.classList.remove('mostrar-modal');
    boxModalExclusao.classList.add('animation-fechamento-modal')
    setTimeout(() =>{

        containerModalExclusaoContato.classList.add('ocultar-modal');
        boxModalExclusao.classList.remove('animation-fechamento-modal');
    }, 290  )
    }
}

function abrirModalExclusaoCli(idCliente){

    document.getElementById('form-delete').action = `/clientes/${idCliente}}`
    
    containerModalExclusao.classList.remove('ocultar-modal');
    containerModalExclusao.classList.add('mostrar-modal');

}

function abrirModalExclusaoCont(idCliente, idContato){

    document.getElementById('form-delete').action = `/clientes/${idCliente}/contatos/${idContato}/destroy`
    
    console.log(document.getElementById('form-delete').action)
    containerModalExclusaoContato.classList.remove('ocultar-modal');
    containerModalExclusaoContato.classList.add('mostrar-modal');

}
