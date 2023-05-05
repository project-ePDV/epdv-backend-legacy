</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <title>Rotas</title>
</head>

<body class="bg-black d-flex justify-content-start flex-column" style="width: 100vw;">
  <div class="card container text-center mt-5 text-bg-dark" style="width: 90%;">
    <h3 class="card-title p-1">Produtos</h3>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">HTTP Method</th>
          <th scope="col">1º Segmento</th>
          <th scope="col">2º Segmento</th>
          <th scope="col">recurso</th>
          <th scope="col">Parâmetros</th>
          <th scope="col">Função</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">GET</th>
          <td>/api</td>
          <td>/db_epdv</td>
          <td>/produtos</td>
          <td></td>
          <td>
            <a href="/api/db_epdv/produtos" target="_blank"
            class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Todos produtos</a>
          </td>
        </tr>
        <tr>
          <th scope="row">GET</th>
          <td>/api</td>
          <td>/db_epdv</td>
          <td>/produtos</td>
          <td>/$id</td>
          <td>
            <a href="/api/db_epdv/produtos/4" target="_blank"
            class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Produto por Id</a>
          </td>
        </tr>
        <tr>
          <th scope="row">GET</th>
          <td>/api</td>
          <td>/db_epdv</td>
          <td>/produtos</td>
          <td>?page=1&size=6</td>
          <td>
            <a href="/api/db_epdv/produtos?page=1&size=6" target="_blank"
            class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Produtos paginados</a>
          </td>
        </tr>
        <tr>
          <th scope="row">GET</th>
          <td>/api</td>
          <td>/db_epdv</td>
          <td>/produtos</td>
          <td>?page=1&size=6&filter=amount&value=20</td>
          <td>
            <a href="/api/db_epdv/produtos?page=1&size=6&filter=amount&value=20" target="_blank"
            class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Produtos Filtrados</a>
          </td>
        </tr>
        <tr>
          <th scope="row">POST</th>
          <td>/api</td>
          <td>/db_epdv</td>
          <td>/produtos</td>
          <td>name / amount / brand / price</td>
          <td>
            <a href=""
            class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Registrar Produto</a>
          </td>
        </tr>
        <tr>
          <th scope="row">PUT</th>
          <td>/api</td>
          <td>/db_epdv</td>
          <td>/produtos</td>
          <td>name / amount / brand / price</td>
          <td>
            <a href=""
            class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Atualizar produto</a>
          </td>
        </tr>
        <tr>
          <th scope="row">DELETE</th>
          <td>/api</td>
          <td>/db_epdv/admin</td>
          <td>/produtos/deletar</td>
          <td>/$id</td>
          <td>
            <a href=""
            class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Deletar produto</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="card container text-center mt-5 text-bg-dark" style="width: 90%;">
    <h3 class="card-title p-1">Vendas</h3>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">HTTP Method</th>
          <th scope="col">1º Segmento</th>
          <th scope="col">2º Segmento</th>
          <th scope="col">recurso</th>
          <th scope="col">Parâmetros</th>
          <th scope="col">Função</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">GET</th>
          <td>/api</td>
          <td>/db_epdv</td>
          <td>/vendas</td>
          <td></td>
          <td>
            <a href="/api/db_epdv/produtos" target="_blank"
            class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Todos as vendas</a>
          </td>
        </tr>
        <tr>
          <th scope="row">GET</th>
          <td>/api</td>
          <td>/db_epdv</td>
          <td>/vendas</td>
          <td>/$id</td>
          <td>
            <a href="/api/db_epdv/produtos/4" target="_blank"
            class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Produto por Id</a>
          </td>
        </tr>
        <tr>
          <th scope="row">GET</th>
          <td>/api</td>
          <td>/db_epdv</td>
          <td>/vendas</td>
          <td>?page=1&size=6</td>
          <td>
            <a href="/api/db_epdv/produtos?page=1&size=6" target="_blank"
            class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Vendas paginados</a>
          </td>
        </tr>
        <tr>
          <th scope="row">POST</th>
          <td>/api</td>
          <td>/db_epdv</td>
          <td>/vendas</td>
          <td>products / total / quantity </td>
          <td>
            <a href=""
            class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Registrar venda</a>
          </td>
        </tr>
        <tr>
          <th scope="row">PUT</th>
          <td>/api</td>
          <td>/db_epdv</td>
          <td>/vendas</td>
          <td>products / total / quantity </td>
          <td>
            <a href=""
            class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Atualizar venda</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="card container text-center mt-5 text-bg-dark" style="width: 90%;">
    <h3 class="card-title p-1">Usuarios</h3>
    <table class="table table-dark">
      <thead>
        <tr class="table-bordered border-danger">
          <th scope="col">HTTP Method</th>
          <th scope="col">1º Segmento</th>
          <th scope="col">2º Segmento</th>
          <th scope="col">recurso</th>
          <th scope="col">Parâmetros</th>
          <th scope="col">Função</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-bordered border-danger">
          <th scope="row">GET</th>
          <td>/api</td>
          <td>/db_epdv</td>
          <td>/usuario</td>
          <td></td>
          <td>
            <a href="/api/db_epdv/usuario" target="_blank"
            class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Retorna o usuario logado</a>
          </td>
        </tr>
        <tr class="table-bordered border-danger">
          <th scope="row">GET</th>
          <td>/api</td>
          <td>/db_epdv</td>
          <td>/usuario/profile</td>
          <td></td>
          <td>
            <a href="/api/db_epdv/usuario/profile" target="_blank"
            class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Retorna o detalhes do usuario logado</a>
          </td>
        </tr>
        <tr class="table-bordered border-danger">
          <th scope="row">POST</th>
          <td>/api</td>
          <td>/db_epdv</td>
          <td>/usuario</td>
          <td></td>
          <td>
            <a href="/api/db_epdv/usuario" target="_blank"
            class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Registrar novo usuario</a>
          </td>
        </tr>
        <tr class="table-bordered border-danger">
          <th scope="row">POST</th>
          <td>/api</td>
          <td>/db_epdv</td>
          <td>/usuario</td>
          <td></td>
          <td>
            <a href="/api/db_epdv/usuario" target="_blank"
            class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Atualizar dados de um usuario</a>
          </td>
        </tr>
        <tr class="table-bordered border-danger">
          <th scope="row">POST</th>
          <td>/api</td>
          <td>/db_epdv</td>
          <td>/usuario</td>
          <td></td>
          <td>
            <a href="/api/db_epdv/usuario" target="_blank"
            class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Deletar um usuario</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="card container text-center mt-5 text-bg-dark" style="width: 90%;">
    <h3 class="card-title p-1">Sign</h3>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">HTTP Method</th>
          <th scope="col">1º Segmento</th>
          <th scope="col">2º Segmento</th>
          <th scope="col">recurso</th>
          <th scope="col">Parâmetros</th>
          <th scope="col">Função</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">POST</th>
          <td>/sign</td>
          <td></td>
          <td>/register</td>
          <td>name / email / password / confirmPassword</td>
          <td>
            <a href=""
            class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Registrar cliente</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>