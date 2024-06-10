@extends('layouts.app')
@section('title', 'Obrigado por comprar')
@section('body-content')
<main>
  <div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold text-body-emphasis">Obrigado por comprar conosco!</h1>
    <div class="col-lg-6 mx-auto">
    @if ($billingType == 'PIX')
      <p class="lead mb-4">Escaneie o QRCode ou copie e cole a chave para efetuar o pagamento. Vencimento: {{ date('d-m-Y', strtotime($billingData['expirationDate'])) }}</p>
      <div class="container py-3">
        <div class="d-grid gap-2 justify-content-center">
            <div class="px-4 text-center">
                <img src="data:image/png;base64,{{ $billingData['encodedImage'] }}" alt="Imagem Base64" class="img-fluid" />
            </div>
            <div class="px-4 text-center">
                <h3>{{ $billingData['payload'] }}</h3>
            </div>
        </div>
    </div>
    @endif
    @if ($billingType == 'BOLETO')
      <p class="lead mb-4"><a href="{{ $billingData['bankSlipUrl'] }}">Clique aqui para abrir o boleto</a> Se preferir escaneie o Código de Barras abaixo ou copie a linha digitável. </p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <p>{{ $billingData['identificationField'] }}</p></div>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4"><div class="mb-3">{!! DNS1D::getBarcodeHTML($billingData['barCode'], 'CODABAR') !!}</div></button>
      </div>
    @endif
    @if ($billingType == 'CREDIT_CARD')
      <p class="lead mb-4">Seu pagamento já foi processado com sucesso. Obrigado!</p>
    @endif
    </div>
  </div>
  <div class="b-example-divider mb-0"></div>
</main>
@endsection