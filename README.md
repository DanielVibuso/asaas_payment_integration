# PerfectV
*Documentação após a imagem inicial

![image](https://github.com/DanielVibuso/PaymentPerfect/assets/55055330/6dd56deb-bfbd-43e1-a760-4054337c23c7)


Este pequeno projeto simula um sistema de hotelaria com pagamento integrado.

O foco do projeto ficou voltado mais à integração com o asaas do que com qualquer outra coisa. Caso queira ir direto neste ponto, está em "app/Gateways"

Utilizei as seguintes tecnologias:<br>
PHP 8.2 <br>
Laravel 10 <br>
Mysql 5.7 <br>
docker <br>
docker-compose <br>

## Sobre o projeto
Devido a pouco recurso de tempo disponível, fiz o projeto em forma de monolito, porém separando bem as rotas da api que contem as regras de negócio das rotas web que serviram apenas para exibição do frontend.

Dessa forma é possível, mesmo utilizando arquitetura monolitica servir diferentes dispositivos, o que seria útil em caso de necessidade de acessar os dados via aplicativo mobile.

Utilizei o padrão repository-pattern pela simplicidade, alguns recursos do laravel para injeção de dependencia, jobs para não travar o cadastro do usuário aguardando resposta da api do asaas e algumas outras coisas menores.

## gateway de integração
Separei todas as entradas e saídas da api do Asaas em DTOs específicos na pasta gateways, para que os dados de request e response possam ser bem definidos e caso seja do desejo dos desenvolvedores no futuro trocar os nomes dos models essa tarefa ficará bem mais fácil.

## Input e output 
para a exibição do front do proprio projeto utilizei os resources do laravel e para introdução de dados os form requests.

## dependencias externas
utilizei as dependencias: darkaonline/l5-swagger para documentação, devido ao pouco tempo adicionei apenas um endpoint para exemplificar.
também adicionei a dependencia milon/barcode para que fosse possível gerar código de barras diretamente nos arquivos blade. <br>
para acessar a documentacao: localhost/api/documentation

# Como executar o projeto

Após clonar o projeto, torne o arquivo .env.example em .env e coloca uma chave válida na variavel de ambiente ASAAS_API_KEY .

Para executar o projeto no modo interativo, siga as instruções abaixo:

1. Certifique-se de ter o Docker e o docker compose instalado em sua máquina.
2. Navegue até a raiz do projeto no terminal.
3. Execute o seguinte comando:

 - docker-compose up -d
 - docker-compose exec app composer install

feito isso, abra o navegador e navegue para a url localhost/plans

uma tela com três planos será exibida. 
Clique em qualquer um deles e um modal se abrirá.

Pode deve cadastrar o usuário no formulário do lado esquerdo da tela. Devido a quantidade de dados, já deixei preenchido com valores ficticios.

Após criar o usuário, efetue a escolha entre pix, boleto e cartão. Um novo formulário se abrirá e solicitará os dados pertinentes ao meio de pagamento.

O campo "PRODUTO" aceita apenas os valores BASICO, PREMIUM e PRESIDENCIAL.

os campos relacionados a cartão de crédito também já estão preenchidos para adiantar o teste manual.

### debitos técnicos
Caso tivessemos mais tempo, optaria por adicionar autenticação de usuários com tokens JWT, os testes ao menos de integração com phpunit e talvez modularizar mais utilizando clean arch e separando por casos de uso. 
Espero que gostem!



