Pré requisito
------------

* PHP >= 7.3
* [Composer](https://getcomposer.org/download/ "Composer")
* MySQL ou algum banco de dados relacional
* Instalar o laravel:
> composer global require "laravel/installer"

Instruções para subir a aplicação:
------------

* Baixar a aplicação do repositório.
> git clone https://github.com/MateusTorquato/consolide-yii2.git

* Instalar dependências
> composer install

* Criar um novo database com o nome *consolide* e configurar no arquivo .env a variável CLEARDB_DATABASE_URL da seguinte forma:

> CLEARDB_DATABASE_URL => mysql://[username]:[password]@[host]/[database name]?reconnect=true

* Caso deseje utilizar outro banco de dados sem ser MySQL, configurar diretamente no arquivo config\db.php

```
$host = 'localhost';
$dbname = 'consolide';
$username = 'root';
$password = '';

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
if (isset($url["host"]) && isset($url["user"]) && isset($url["pass"]) && isset($url["path"])) {
    $host = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $dbname = substr($url["path"], 1);
}


return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=' . $host . ';dbname=' . $dbname,
    'username' => $username,
    'password' => $password,
    'charset' => 'utf8',
];
```
* Rodar os comandos de migração
> ./yii migrate

* Rodar o comando para subir a aplicação
> ./yii serve
