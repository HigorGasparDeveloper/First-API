# First-API
My first API - PHP

API simples de requisição POST e GET em uma base de dados MYSQL. Ela recebe uma requisição GET com ou sem especificação de id de um usuário cadastrado no banco de dados MYSQL e retorna o resultado para a mesma, o mesmo ocorre com o POST, ela recebe os dados via POST (de acordo com o nome dos campos na base) e cadastra no banco de dados os valores especificados.

Para fazer um teste na API, extraia todo o projeto em seu localhost (seja pelo wamp, xamp, etc.), importe o banco de dados para o phpmyadmin ou mysql workbench e execute a url em um tester de API'S, seja o POSTMAN, Insomnia ou qualquer outro. Note que ao executar não trará resultados, basta ir no Authorization no tester de API que está utilizando e especificar o user como 123 e senha como 1 (utilizei apenas para estudo de authorization em API'S). Fazendo isso, ao executar a URL você terá todos os usuários cadastrados na base de dados, caso queira apenas as informações de um usuário, basta colocar ?id=id_do_usuário_que_você_deseja na frente da URL.

Já para testar o POST, você poderá enviar os dados via JSON ou Form data, basta colocar como key o nome do campo da base de dados e o valor que deseja.
