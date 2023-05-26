<?= $this->extend('home') ?>
<?= $this->section('conteudo') ?>

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
        <a href="/api/db_epdv/produtos" target="_blank" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Todos produtos</a>
      </td>
    </tr>
    <tr>
      <th scope="row">GET</th>
      <td>/api</td>
      <td>/db_epdv</td>
      <td>/produtos</td>
      <td>/$id</td>
      <td>
        <a href="/api/db_epdv/produtos/4" target="_blank" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Produto por Id</a>
      </td>
    </tr>
    <tr>
      <th scope="row">GET</th>
      <td>/api</td>
      <td>/db_epdv</td>
      <td>/produtos</td>
      <td>?page=1&size=6</td>
      <td>
        <a href="/api/db_epdv/produtos?page=1&size=6" target="_blank" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Produtos paginados</a>
      </td>
    </tr>
    <tr>
      <th scope="row">GET</th>
      <td>/api</td>
      <td>/db_epdv</td>
      <td>/produtos</td>
      <td>?page=1&size=6&filter=amount&value=20</td>
      <td>
        <a href="/api/db_epdv/produtos?page=1&size=6&filter=amount&value=20" target="_blank" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Produtos Filtrados</a>
      </td>
    </tr>
    <tr>
      <th scope="row">POST</th>
      <td>/api</td>
      <td>/db_epdv</td>
      <td>/produtos</td>
      <td>name / amount / brand / price</td>
      <td>
        <a href="" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Registrar Produto</a>
      </td>
    </tr>
    <tr>
      <th scope="row">PUT</th>
      <td>/api</td>
      <td>/db_epdv</td>
      <td>/produtos</td>
      <td>name / amount / brand / price</td>
      <td>
        <a href="" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Atualizar produto</a>
      </td>
    </tr>
    <tr>
      <th scope="row">DELETE</th>
      <td>/api</td>
      <td>/db_epdv/admin</td>
      <td>/produtos/deletar</td>
      <td>/$id</td>
      <td>
        <a href="" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Deletar produto</a>
      </td>
    </tr>
  </tbody>
</table>

<?= $this->endSection() ?>