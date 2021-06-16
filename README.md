<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instalacao

Clonar o repositorio

    git clone https://github.com/newtab-academy/jwt-auth-laravel.git

Entrar na pasta do projeto

    cd first-project-laravel

Instalar todas as dependencias via Composer

    composer install

Copiar o arquivo .env.example e fazer as configuracoes necessarias no arquivo .env

    cp .env.example .env

Para que o disparo de emails aconteca, precisamos configurar algum servico de email. Optamos pelo Mailtrap:

    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=SEU_USERNAME
    MAIL_PASSWORD=SUA_SENHA
    MAIL_ENCRYPTION=tls

***Nota*** : Caso nao queira a funcionalidade de email, comente a chamada da funcao de disparo de email em ***app/Http/Controllers/TaskController.php*** no metodo ***store***.

Para que o disparo das notificacoes de log no Slack aconteca, é preciso configurar o webhook:

    LOG_SLACK_WEBHOOK_URL="LINK_DO_WEBHOOK"

***Nota*** : Caso nao queira a funcionalidade de email, comente chamadas de notificacoes de log em ***app/Http/Controllers/EmployeeController.php*** nos metodos ***store*** e ***update***.

Gerar uma chave para a aplicacao

    php artisan key:generate

Executar as migracoes no banco de dados (**defina a conexao com o banco de dados no arquivo .env antes dessa etapa**)

    php artisan migrate

Iniciar o servidor de desenvolvimento local

    php artisan serve

Acessar o servidor em http://localhost:8000

**Lista de comandos**

    git clone https://github.com/newtab-academy/jwt-auth-laravel.git
    cd first-project-laravel
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Certifique-se de definir as informacoes de conexao do banco de dados antes de executar as migracoes**

    php artisan migrate
    php artisan serve
