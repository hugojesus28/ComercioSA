INTRODUÇÃO 

O sistema foi desenvolvido com o intuito de solucionar o seguinte problema:

"A empresa Comércio S.A. deseja modernizar sua gestão de contatos, substituindo a 
agenda física por um sistema digital"

No sistema foi integrado funcionalidades como:

 cadastro de clientes;

 visualização de todos clientes;

alteração de cada cliente;

 exclusão de cada cliente;

 criação de um contato pra o cliente; 

visualização do contato do cliente;

alteração de um contato do cliente;

Exclusão de um contato do cliente;

Pesquisa de cliente pelo seu nome ou CPF;

Pesquisa de um contato pelo seu valor;

Contagem de todos os Clientes cadastrados no sistema;

Contagem de todos contatos cadastrados no sistema;

Contagem de Todos contatos de um Cliente em específico;

Funcionalidade de preenchimento de campos com API de Cep.

Ferramentas Utilizadas para o desenvolvimento do sistema:

HTML 5;

CSS 3;

Javascript;

Bootstrap 5;

Laravel 9.3.10;

MySql;

Xampp;

VS Studio Code.

Além de bibliotecas como:

- [Bootstrap CSS](https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css)
- [Bootstrap Icons](https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css)
- [Inputmask](https://cdn.jsdelivr.net/npm/inputmask@5.0.6/dist/inputmask.min.js)
- [jQuery](https://code.jquery.com/jquery-3.6.0.min.js)
- [jQuery Mask](https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js)
- [Bootstrap JS Bundle](https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js)


Estrutura do Projeto:

/comercioSA
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Controller.php
│   │   │   ├── ControllerCliente.php
│   │   │   └── ControllerContato.php
│   ├── Models/
│   │   ├── Cliente.php
│   │   └── Contato.php
├── database/
│   ├── migrations/
│   │   ├── migration_cliente.php
│   │   └── migration_contato.php
├── public/
│   ├── js/
│   │   └── script.js
│   ├── css/
│   │   └── style.css
├── resources/
├── views/
│   ├── master.blade.php
│   ├── clientesViews/
│   │   ├── index.blade.php
│   │   ├── alterarCliente.blade.php
│   │   └── cadastroCliente.blade.php
│   ├── contatosViews/
│   │   ├── index.blade.php
│   │   ├── alterarContatos.blade.php
│   │   └── cadastroContatos.blade.php






### Dependências do Projeto:

- [Bootstrap 5](https://getbootstrap.com/)
- [JQuery Mask](https://github.com/igorescobar/jQuery-Mask-Plugin)
- API Cep (Exemplo de uso: [ViaCEP](https://viacep.com.br/))
- Dependências padrão do Laravel 9.3.10 (gerenciadas automaticamente via Composer)


### Configurações:

APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:aRd83MIhGDzJnY92PKQxaUYn2i4bbjH6ZqlzGt/8m9U=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=comercio_sa
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"


### Instruções de Uso:

Para o uso correto da aplicação é necessário:

- PHP >= 8
- Composer
- Banco de dados (MySQL)

### Inicialização do Projeto:

1. Acesse a pasta do projeto **"comercio_sa"** no terminal.
2. Execute o comando:
   ```bash
   php artisan serve


### Erros Comuns:

- Em caso de erros com o XAMPP, é necessário verificar a porta em que o servidor está utilizando. Por padrão, vem a **3006**.
  
- Em caso de problemas na inicialização do projeto, deve-se verificar se o PHP realmente está instalado e atualizado. É boa prática também verificar se o comando está sendo executado na pasta do projeto Laravel.

- A API de CEP funciona de maneira que o usuário deve digitar um CEP existente. Caso ele não digite, todos os campos ficarão em branco, incluindo o campo do CEP.
