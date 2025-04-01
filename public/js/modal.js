const modalContainer = document.querySelector('.container-modal');
const boxModal = document.getElementById('boxModal');
const botaoModal = document.getElementById('botao-fechar-modal')
console.log(boxModal)

function fecharModal(event){
    

    if(event.target === modalContainer){
        modalContainer.classList.remove('mostrar-modal');
        boxModal.classList.add('animation-fechamento-modal')
        setTimeout(() =>{

            modalContainer.classList.add('ocultar-modal');
            boxModal.classList.remove('animation-fechamento-modal');
        }, 290  )
    }
    if(event.target === botaoModal){
        modalContainer.classList.remove('mostrar-modal');
    boxModal.classList.add('animation-fechamento-modal')
    setTimeout(() =>{

        modalContainer.classList.add('ocultar-modal');
        boxModal.classList.remove('animation-fechamento-modal');
    }, 290  )
    }
}

function abrirModal(idCliente){


    document.getElementById('carregamentoModalCli').style.display = 'flex'
    fetch(`/clientes/show/${idCliente}`)
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
        document.getElementById('id-cliente').textContent = dados.id
        document.getElementById('nome-cliente').textContent = dados.nomeCliente
        document.getElementById('cpf').textContent = dados.cpfCliente
        document.getElementById('data-cliente').textContent = dados.dataNascimentoCliente
        document.getElementById('rua-cliente').textContent = dados.logradouroCliente
        document.getElementById('numero-cliente').textContent = dados.numLogradouroCliente
        document.getElementById('cep').textContent = dados.cepCliente
        document.getElementById('uf-cliente').textContent = dados.ufCliente
        document.getElementById('cidade-cliente').textContent = dados.cidadeCliente
        document.getElementById('bairro-cliente').textContent = dados.bairroCliente
        document.getElementById('complemento-cliente').textContent = dados.complementoCliente
        document.getElementById('criacao-cliente').textContent = dataCriacaoFormatada
        document.getElementById('atualizacao-cliente').textContent = dataAlteracaoFormatada


        document.getElementById('carregamentoModalCli').style.display = 'none'

        
    })

    modalContainer.classList.remove('ocultar-modal');
    modalContainer.classList.add('abrir-modal')
}
