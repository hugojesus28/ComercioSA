console.log('conectado a api')




function verificarInput() {
    const cepSemMascara = document.getElementById('cepCliente').value.replace(/\D/g, ''); 

    let cep = document.getElementById('cepCliente').value;
    console.log(cepSemMascara);

    if (cepSemMascara.length === 8) { 
        console.log(cepSemMascara);
        consultaCep(cepSemMascara)
    }
}

function consultaCep(cep) {
    document.getElementById('carregamento').style.display = 'flex'

    const urlApi = `/api/consulta-cep/${cep}`;

    fetch(urlApi)
        .then(respostaApi => {
            if (!respostaApi.ok) {
                throw new Error('erro ao consultar cep');
            }

            return respostaApi.json();
        })
        .then(dados => {


            console.log(dados);

            if(dados.erro){
                document.getElementById('logradouroApi').value = '';
            document.getElementById('cidadeApi').value = '';
            document.getElementById('ufApi').value = '';
            document.getElementById('bairroApi').value = '';

            document.getElementById('cepCliente').value = '';
            }else{

            document.getElementById('logradouroApi').value = dados.logradouro;
            document.getElementById('cidadeApi').value = dados.localidade;
            document.getElementById('ufApi').value = dados.uf;
            document.getElementById('bairroApi').value = dados.bairro;

            }
            document.getElementById('carregamento').style.display = 'none'


        })
        .catch(error => {
            

            console.log(error);
        });
}