const modalContainerContato = document.querySelector('.container-modal-contato');
const boxModalModal = document.getElementById('boxModalContato');
const botaoModalContato = document.getElementById('botao-fechar-modal-contato')

function fecharModalContato(event){
    

    if(event.target === modalContainerContato){
        modalContainerContato.classList.remove('mostrar-modal');
        boxModalContato.classList.add('animation-fechamento-modal')
        setTimeout(() =>{

            modalContainerContato.classList.add('ocultar-modal');
            boxModalContato.classList.remove('animation-fechamento-modal');
        }, 290  )
    }
    if(event.target === botaoModalContato){
        modalContainerContato.classList.remove('mostrar-modal');
    boxModalContato.classList.add('animation-fechamento-modal')
    setTimeout(() =>{

        modalContainerContato.classList.add('ocultar-modal');
        boxModalContato.classList.remove('animation-fechamento-modal');
    }, 290  )
    }
}

function abrirModalContato  (idContato){


    document.getElementById('carregamento').style.display = 'flex'
    fetch(`/clientes/contatos/show/${idContato}`)
    .then(resposta  =>  resposta.json())
    .then(dados => {

        let dataCriacao = dados.created_at
        let dataAlteracao = dados.updated_at

        dataCriacaoObj = new Date(dataCriacao)
        dataAlteracaoObj = new Date(dataAlteracao)

        opcoesData = {year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit'}

        dataCriacaoFormatada = dataCriacaoObj.toLocaleString('pt-BR', opcoesData)
        dataAlteracaoFormatada = dataAlteracaoObj.toLocaleString('pt-BR', opcoesData)


        console.log(dados)
        document.getElementById('id-contato').textContent = dados.id
        document.getElementById('tipo-contato').textContent = dados.tipoContato
        document.getElementById('valor-contato').textContent = dados.valorContato
        document.getElementById('descricao-contato').textContent = dados.observacaoContato
        document.getElementById('data-criacao-contato').textContent = dataAlteracaoFormatada
        document.getElementById('data-atualizacao-contato').textContent = dataCriacaoFormatada

        


        document.getElementById('carregamento').style.display = 'none'

        
    })

    modalContainerContato.classList.remove('ocultar-modal');
    modalContainerContato.classList.add('mostrar-modal')
}
