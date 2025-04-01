const alert = document.getElementById('alertaCadastro')
console.log('cheguei no alert')
alert.style.display = 'flex';

setTimeout(()=>{
    alert.style.display= 'none'
}, 2000)