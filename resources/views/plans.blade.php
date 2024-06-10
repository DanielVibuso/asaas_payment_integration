@extends('layouts.app')
@section('title', 'Selecione sua reserva')
@section('body-content')
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="check" viewBox="0 0 16 16">
    <title>Check</title>
    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path>
  </symbol>
</svg>
<div class="container py-3">
  <main>
  <div style="text-align: center;"><h2>Selecione sua reserva no Hotel Califórnia</h2>
  @if($errors->any())    
    @foreach($errors->all() as $error)       
        <div class="alert alert-danger">            
            {{ $error }}        
          </div>    
        @endforeach
        @endif</div>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Básica</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">R$ 50<small class="text-body-secondary fw-light">/valor único</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>2 Dias de hospedagem</li>
              <li>1 refeição/dia</li>
              <li>Quarto para uma pessoa</li>
              <li>Internet</li>
            </ul>
            <button type="button" class="w-100 btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#customerModal">Quero me hospedar</button>
            <!-- Incluir o modal -->
            
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Premium</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">R$ 150<small class="text-body-secondary fw-light">/valor único</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>7 dias de hospedagem</li>
              <li>2 refeições/dia</li>
              <li>quarto para até 4 pessoas</li>
              <li>Internet</li>
            </ul>
            <button type="button" class="w-100 btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#customerModal">Sou hospede premium</button>
            <!-- Incluir o modal -->
            
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-bg-primary border-primary">
            <h4 class="my-0 fw-normal">Presidencial</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">R$ 500 <small class="text-body-secondary fw-light">/valor único</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>30 dias de hospedagem</li>
              <li>8 refeições/dia</li>
              <li>quarto para até 10 pessoas</li>
              <li>Internet</li>
            </ul>
            <button type="button" class="w-100 btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#customerModal">Quero ser presidencial </button>
            <!-- Incluir o modal -->
            @component('components.modal', [
              'modalId' => 'customerModal',
              'modalLabelId' => 'customerModalLabel',
              'title' => 'Preencha os dados do hospede'
            ])
              @component('components.payment-form')
              @endcomponent
            @endcomponent
          </div>
        </div>
      </div>
    </div>

    <h2 class="display-6 text-center mb-4">Compare as vantagens</h2>

    <div class="table-responsive">
      <table class="table text-center">
        <thead>
          <tr>
            <th style="width: 34%;"></th>
            <th style="width: 22%;">Básico</th>
            <th style="width: 22%;">Premium</th>
            <th style="width: 22%;">Presidencial</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row" class="text-start">Banheiro por andar</th>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
          </tr>
          <tr>
            <th scope="row" class="text-start">Quarto com suite</th>
            <td></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
          </tr>
        </tbody>

        <tbody>
          <tr>
            <th scope="row" class="text-start">Buffet Liberado</th>
            <td></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
          </tr>
          <tr>
            <th scope="row" class="text-start">Guia turistico</th>
            <td></td>
            <td></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
          </tr>
          <tr>
            <th scope="row" class="text-start">Acesso ao cinema do hotel</th>
            <td></td>
            <td></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
          </tr>
          <tr>
            <th scope="row" class="text-start">Direito a uma entrevista com ET Bilu</th>
            <td></td>
            <td></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
          </tr>
        </tbody>
      </table>
    </div>
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
@endsection