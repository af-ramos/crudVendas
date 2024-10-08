# PROJETO DE VENDAS | HCOSTA

## DESCRIÇÃO

Foram desenvolvidas uma tela de login e dois CRUDs, responsável pelo gerenciamento de dados de usuários e de pedidos.

Os usuários são divididos em dois grupos:
- **CLIENTE:** usuário normal, com acesso limitado.
- **VENDEDOR:** usuário com acesso ilimitado e administrativo.

Os seguintes requisitos solicitados foram desenvolvidos:
- Na tela de pedidos, os clientes poderão ver apenas os seus pedidos.
- Na tela de pedidos, quando em cargo administrativo, o usuário poderá ver todos os pedidos e alterar seus status.
- Na tela de pedidos, os usuários só poderão alterar e cancelar os pedidos quando estiverem pendentes, porém usuários administrativos tem acesso ilimitado a alterações.
- Os administradores tem acesso a todos os usuários, podendo editá-los e removê-los.
- A lista de usuários é filtrável e ordenável por qualquer campo, com uma paginação dividida em vários valores possíveis.
- Os produtos estão sendo consumidos via API externa, sendo sua rota definida na variável de ambiente ```API_VENDAS```, para fins de testes no Docker, foi utilizada a rota ```host.docker.internal``` para acessar a ```localhost```, sendo necessário ajustar no ```.env```.
- Após executar as _migrations_, dois usuários padrões são criados, com usuário e senha 'a' e 'b', respectivamente.
  
## CONFIGURAÇÃO

O projeto foi criado com base no Docker para facilitar o uso e configuração, dessa forma, para executar, rodar os seguintes comandos:

1) **```docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php81-composer:latest composer install --ignore-platform-reqs```** para instalar as dependências do projeto.
2) Configurar o ```.env``` de forma adequada para rodar no ambiente desejado, com foco nos campos de aplicação (```APP_```), banco de dados (```DB_```) e de conexão com a API (```API_```).
3) **```alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'```** para sintetizar o comando ```./vendor/bin/sail``` para apenas ```sail```.
4) **```sail up -d```** para subir o container do projeto.
5) **```sail artisan key:generate```** para gerar a chave de aplicação.
6) **```sail artisan migrate```** para configurar a estrutura das tabelas.
7) **```sail artisan db:seed```** para iniciar as tabelas com dados básicos/teste.
