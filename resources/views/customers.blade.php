@extends('layouts.app')
@section('title', 'Lista de clientes')
@section('body-content')
<div class="container py-3">
  <main>
    <div style="text-align: center;"><h2>Lista de clientes e suas compras</h2>
    <table class="table" id="clientes-table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Email</th>
          <th scope="col">cnpj</th>
          <th scope="col">Identificadores ultimas compras</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
   
  </main>

  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="24" height="19">
        <small class="d-block mb-3 text-body-secondary">© 2024–2024</small>
      </div>
    </div>
  </footer>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var tableBody = document.querySelector('#clientes-table tbody');

    var request = new XMLHttpRequest();
    request.open('GET', '/api/customer', true);

    request.onload = function() {
  if (request.status >= 200 && request.status < 400) {
    var response = JSON.parse(request.response);
    var row = '';
    for (var key in response.data) {
      if (response.data.hasOwnProperty(key)) {
        var cliente = response.data[key];
        var produtos = cliente.data.cobrancas.map(function(cobranca) {
          return cobranca.idAsaas;
        }).join(', ');
        row += '<tr>' +
          '<th scope="row">' + key + '</th>' +
          '<td>' + cliente.data.nome + '</td>' +
          '<td>' + cliente.data.email + '</td>' +
          '<td>' + produtos + '</td>' +
          '</tr>';
      }
    }
    tableBody.insertAdjacentHTML('beforeend', row);
  } else {
    console.error('Erro ao obter os dados dos clientes.');
  }
    };

    request.onerror = function() {
      console.error('Erro de conexão ao tentar obter os dados dos clientes.');
    };

    request.send();
  });
</script>
@endsection