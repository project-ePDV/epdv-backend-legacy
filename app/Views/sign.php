<?= $this->extend('home') ?>

<?= $this->section('signDoc') ?>

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
        <a href="" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Registrar cliente</a>
      </td>
    </tr>
  </tbody>
</table>

<?= $this->endSection() ?>