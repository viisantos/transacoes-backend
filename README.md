# Mini sitema de transações
Este é um sistema para um processo seletivo. 

link para o repositório com o frontend: https://github.com/viisantos/transacoes-frontend

Neste sistema o usuário pode se cadastrar, visualiar usuários cadastrados e cadastrar, editar, visualizar um registro de transação na tela de edição, e realizar a atualização desse registro.
O usuário também pode acessar uma tela com o resumo das transações. 

<h2>Instruções de uso: </h2>

 <ul> Aplicação backend Laravel:
   <li> Ao rodar o sisema pela primeira vez: rodar "php artisan key:generate" </li>
   <li> Rodar "composer update" ou "composer install" para atualizar as dependências. </li>
   <li>
      Configuração do banco de dados:
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=transacoes
      DB_USERNAME=root
      DB_PASSWORD=<senha_utilizada_localmente>
   </li>
   <li> Rodar "php artisan migrate --seed | Criei um arquivo de seed para inserção em massa de dados de teste. --seed é opcional. </li>
   <li> Rodar "php artisan serve" para rodar o servidor. </li>
  </ul>

  <ul> Aplicação front end Angular
  <li>Rodar "npm install" para atualizar as dependências </li>
  <li>Rodar "npm start"</li>   
  </ul>

  <ul> Rotas para as telas:
  <li> <b>Login:</b> http://localhost:4200/login</li>
  <li> <b>Cadastro:</b> http://localhost:4200/cadastrar</li>
  <li> <b>Lista de usuários:</b> http://localhost:4200/usuarios </li> (apenas visualização)
  <li> <b>Lista de transações:</b> http://localhost:4200/transacoes </li>
  <li> <b> Criar transação:</b> http://localhost:4200/criartransacao </li>
  <li> <b> Editar transação:</b> http://localhost:4200/transacoes/edit/{id} </li>
  <li> <b> Resumo das transações:</b> http://localhost:4200/resumo </li>
  </ul>




