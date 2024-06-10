<div class="container">
   <div class='row'>
    <div class='col-6'>
      <form id="customerCreate">
        @csrf
        Caso já possua cadastro, vá direto para o formulário de pagamento e digite seu cpf/cnpj
        <div class="mb-3 form"> 
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" id="name" name="name" value="John Doe" required>
        </div>

        <div class="mb-3">
          <label for="cpfCnpj" class="form-label">CPF/CNPJ</label>
          <input type="text" class="form-control" id="cpfCnpj" name="cpfCnpj" value="42.173.898/0001-40" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="john.doe@example.com" required>
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">Telefone</label>
          <input type="text" class="form-control" id="phone" name="phone" value="1234567890" required>
        </div>

        <div class="mb-3">
          <label for="mobilePhone" class="form-label">Celular</label>
          <input type="text" class="form-control" id="mobilePhone" name="mobilePhone" value="0987654321" required>
        </div>

        <div class="mb-3">
          <label for="address" class="form-label">Endereço</label>
          <input type="text" class="form-control" id="address" name="address" value="123 Main St" required>
        </div>

        <div class="mb-3">
          <label for="addressNumber" class="form-label">Número</label>
          <input type="text" class="form-control" id="addressNumber" name="addressNumber" value="456" required>
        </div>

        <div class="mb-3">
          <label for="complement" class="form-label">Complemento</label>
          <input type="text" class="form-control" id="complement" name="complement" value="Apt 789" required>
        </div>

        <div class="mb-3">
          <label for="province" class="form-label">Estado</label>
          <input type="text" class="form-control" id="province" name="province" value="São Paulo" required>
        </div>

        <div class="mb-3">
          <label for="postalCode" class="form-label">CEP</label>
          <input type="text" class="form-control" id="postalCode" name="postalCode" value="12345-678" required>
        </div>

        <div class="mb-3">
          <label for="notificationDisabled" class="form-label">Notificações Desativadas</label>
          <input type="checkbox" class="form-check-input" id="notificationDisabled" name="notificationDisabled" checked required>
        </div>

        <div class="mb-3">
          <label for="additionalEmails" class="form-label">Emails Adicionais</label>
          <input type="text" class="form-control" id="additionalEmails" name="additionalEmails" value="jane.doe@example.com,jack.doe@example.com" required>
        </div>

        <div class="mb-3">
          <label for="municipalInscription" class="form-label">Inscrição Municipal</label>
          <input type="text" class="form-control" id="municipalInscription" name="municipalInscription" value="123456789" required>
        </div>

        <div class="mb-3">
          <label for="stateInscription" class="form-label">Inscrição Estadual</label>
          <input type="text" class="form-control" id="stateInscription" name="stateInscription" value="987654321" required>
        </div>

        <div class="mb-3">
          <label for="observations" class="form-label">Observações</label>
          <textarea class="form-control" id="observations" name="observations" required>Nenhuma observação</textarea>
        </div>

        <div class="mb-3">
          <label for="groupName" class="form-label">Nome do Grupo</label>
          <input type="text" class="form-control" id="groupName" name="groupName" value="Clientes VIP" required>
        </div>

        <div class="mb-3">
          <label for="company" class="form-label">Empresa</label>
          <input type="text" class="form-control" id="company" name="company" value="Example Company" required>
        </div>

        <button type="submit" class="btn btn-primary">Concluir registro e ir para pagamento</button>
      </form>
    </div>
    <div div class='col-6'>
        <form>
          <h3>Escolha a forma de pagamento</h3>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="options" id="pixForm" value="pixForm">
            <label class="form-check-label" for="pixForm">
              Pix
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="options" id="boletoForm" value="boletoForm">
            <label class="form-check-label" for="boletoForm">
              Boleto
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="options" id="creditForm" value="creditForm">
            <label class="form-check-label" for="creditForm">
              Cartão de crédito
            </label>
          </div>
        </form>

      <div id="formPix" class="form-container" style="display:none;">
      <h4>Forma escolhida: pix</h4>
       <form id='pixSend'method="POST" action='payment'>
       @csrf
          <div id="formFields" class="mt-3">
            <div class="form-group">
              <label for="customer">CPF/CNPJ</label>
              <input type="text" class="form-control" id="cpfCnpjSearch" name="cpfCnpjSearch" required>
            </div>
            <div class="form-group">
              <label for="customer">Produto</label>
              <input type="text" class="form-control" id="product" name="product">
            </div>
            <div class="form-group">
              <label for="value">Valor</label>
              <input type="number" class="form-control" id="value" name="value">
            </div>
            <div class="form-group">
              <label for="dueDate">Data de Vencimento</label>
              <input type="date" class="form-control" id="dueDate" name="dueDate" required>
            </div>
              <input type="hidden" name="billingType" value="PIX">
          </div>
          <button type="submit" class="btn btn-primary mt-3">Gerar Pix para pagamento</button>
       </form>
      </div>

      <div id="formBoleto" class="form-container" style="display:none;">
        <h4>Forma escolhida: boleto</h4>
        <form id="boletoSend">
          <div id="formFields" class="mt-3">
            <div class="form-group">
              <label for="customer">CPF/CNPJ</label>
              <input type="text" class="form-control" id="cpfCnpjSearch" name="cpfCnpjSearch" required>
            </div>
            <div class="form-group">
              <label for="customer">Produto</label>
              <input type="text" class="form-control" id="product" name="product" required>
            </div>
            <div class="form-group">
              <label for="value">Valor</label>
              <input type="number" class="form-control" id="value" name="value" required>
            </div>
            <div class="form-group">
              <label for="dueDate">Data de Vencimento</label>
              <input type="date" class="form-control" id="dueDate" name="dueDate" required>
            </div>
              <input type="hidden" name="billingType" value="BOLETO">
          </div>
          <button type="submit" class="btn btn-primary mt-3">Gerar boleto para pagamento</button>
       </form>
      </div>

      <div id="formCredit" class="form-container" style="display:none;">
        <h4>Forma escolhida: Cartão de crédito</h4>
        <form id="creditSend">
            <div id="formFields" class="mt-3">
                <input type="hidden" name="billingType" value="CREDIT_CARD">
                
                <div class="form-group">
                    <label for="customer">Cpf/CNPJ do cliente:</label>
                    <input type="text" class="form-control" id="customer" name="cpfCnpjSearch" required>
                </div>

                <div class="form-group">
                    <label for="value">Produto:</label>
                    <input type="text" class="form-control" id="product" name="product" required>
                </div>

                <div class="form-group">
                    <label for="value">Valor:</label>
                    <input type="number" class="form-control" id="value" name="value" value="145" required>
                </div>
                
                <div class="form-group">
                    <label for="dueDate">Data de Vencimento:</label>
                    <input type="date" class="form-control" id="dueDate" name="dueDate" value="2025-01-01" required>
                </div>
                
                <h3>Detalhes do Cartão de Crédito:</h3>
                <div class="form-group">
                    <label for="holderName">Nome do Titular:</label>
                    <input type="text" class="form-control" id="holderName" name="creditCard[holderName]" value="marcelo h almeida" required>
                </div>
                
                <div class="form-group">
                    <label for="number">Número do Cartão:</label>
                    <input type="text" class="form-control" id="number" name="creditCard[number]" value="4444444444444444" required>
                </div>
                
                <div class="form-group">
                    <label for="expiryMonth">Mês de Expiração:</label>
                    <input type="text" class="form-control" id="expiryMonth" name="creditCard[expiryMonth]" value="05" required>
                </div>
                
                <div class="form-group">
                    <label for="expiryYear">Ano de Expiração:</label>
                    <input type="text" class="form-control" id="expiryYear" name="creditCard[expiryYear]" value="2025" required>
                </div>
                
                <div class="form-group">
                    <label for="ccv">CCV:</label>
                    <input type="text" class="form-control" id="ccv" name="creditCard[ccv]" value="318" required>
                </div>
                
                <h3>Informações do Titular do Cartão:</h3>
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" id="name" name="creditCardHolderInfo[name]" value="Marcelo Henrique Almeida" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="creditCardHolderInfo[email]" value="marcelo.almeida@gmail.com" required>
                </div>
                
                <div class="form-group">
                    <label for="cpfCnpj">CPF/CNPJ:</label>
                    <input type="text" class="form-control" id="cpfCnpj" name="creditCardHolderInfo[cpfCnpj]" value="24971563792" required>
                </div>
                
                <div class="form-group">
                    <label for="postalCode">CEP:</label>
                    <input type="text" class="form-control" id="postalCode" name="creditCardHolderInfo[postalCode]" value="89223-005" required>
                </div>
                
                <div class="form-group">
                    <label for="addressNumber">Número do Endereço:</label>
                    <input type="text" class="form-control" id="addressNumber" name="creditCardHolderInfo[addressNumber]" value="277" required>
                </div>
                
                <div class="form-group">
                    <label for="addressComplement">Complemento do Endereço:</label>
                    <input type="text" class="form-control" id="addressComplement" name="creditCardHolderInfo[addressComplement]">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Pagar com cartão</button>
        </form>
      </div>
    </div>
   </div><!--fim div row-->
</div>

  <script>
     document.addEventListener('DOMContentLoaded', function() {

      function buildQueryString(params, prefix = '') {
        const queryString = Object.keys(params).map(key => {
            const value = params[key];
            const paramKey = prefix ? `${prefix}[${encodeURIComponent(key)}]` : encodeURIComponent(key);

            if (typeof value === 'object' && value !== null) {
                // Chamada recursiva para objetos aninhados
                return buildQueryString(value, paramKey);
            } else {
                // Adiciona o parâmetro codificado na string de consulta
                return `${paramKey}=${encodeURIComponent(value)}`;
            }
        }).join('&');

        return queryString;
    }

      function redirect(url, params) {
          const queryString = buildQueryString(params);
          const redirectUrl = `${url}?${queryString}`;
          window.location.href = redirectUrl;
      }
        //-------------------------------------------//

        //enviar pix payment
      document.querySelector('#pixSend').addEventListener('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        var object = {};
        formData.forEach((value, key) => {object[key] = value});
        var json = JSON.stringify(object);
          fetch('/api/payment', { 
            method: 'POST',
            headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: json
          }).then(response => {
            if (response.ok) {
              return response.json();
            } else if (response.status === 422) {
              return response.json().then(errorData => {
                throw new Error(errorData.message);
              });
            } else {
              throw new Error('Erro ao enviar o formulário. Status: ' + response.status);
            }
          })
          .then(data => {
            console.log(data);
            redirect('thanks', data);
            alert('Success');
            var modal = bootstrap.Modal.getInstance(document.getElementById('customerModal'));
            modal.hide();
          })
          .catch(error => {
            console.error('Erro ao enviar o formulário:', error);
            alert(error);
          })
        });
      });

      //------------------enviar boleto payment---------------------//

      function buildQueryString(params, prefix = '') {
        const queryString = Object.keys(params).map(key => {
            const value = params[key];
            const paramKey = prefix ? `${prefix}[${encodeURIComponent(key)}]` : encodeURIComponent(key);

            if (typeof value === 'object' && value !== null) {
                // Chamada recursiva para objetos aninhados
                return buildQueryString(value, paramKey);
            } else {
                // Adiciona o parâmetro codificado na string de consulta
                return `${paramKey}=${encodeURIComponent(value)}`;
            }
        }).join('&');

        return queryString;
    }

      function redirect(url, params) {
          const queryString = buildQueryString(params);
          const redirectUrl = `${url}?${queryString}`;
          window.location.href = redirectUrl;
      }
      //enviar boleto
      document.querySelector('#boletoSend').addEventListener('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        var object = {};
        formData.forEach((value, key) => {object[key] = value});
        var json = JSON.stringify(object);
          fetch('/api/payment', { 
            method: 'POST',
            headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: json
          }).then(response => {
            if (response.ok) {
              return response.json();
            } else if (response.status === 422) {
              return response.json().then(errorData => {
                throw new Error(errorData.message);
              });
            } else {
              throw new Error('Erro ao enviar o formulário. Status: ' + response.status);
            }
          })
          .then(data => {
            console.log(data);
            redirect('thanks', data);
            alert('Success');
            var modal = bootstrap.Modal.getInstance(document.getElementById('customerModal'));
            modal.hide();
          })
          .catch(error => {
            console.error('Erro ao enviar o formulário:', error);
            alert(error);
          })
        });

        //---------------------------------------///,
        //------------------enviar boleto payment---------------------//

      function buildQueryString(params, prefix = '') {
        const queryString = Object.keys(params).map(key => {
            const value = params[key];
            const paramKey = prefix ? `${prefix}[${encodeURIComponent(key)}]` : encodeURIComponent(key);

            if (typeof value === 'object' && value !== null) {
                // Chamada recursiva para objetos aninhados
                return buildQueryString(value, paramKey);
            } else {
                // Adiciona o parâmetro codificado na string de consulta
                return `${paramKey}=${encodeURIComponent(value)}`;
            }
        }).join('&');

        return queryString;
    }

      function redirect(url, params) {
          const queryString = buildQueryString(params);
          const redirectUrl = `${url}?${queryString}`;
          window.location.href = redirectUrl;
      }
      //enviar boleto
      document.querySelector('#creditSend').addEventListener('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        var object = {};
        formData.forEach((value, key) => {object[key] = value});
        var json = JSON.stringify(object);
          fetch('/api/payment', { 
            method: 'POST',
            headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: json
          }).then(response => {
            if (response.ok) {
              return response.json();
            } else if (response.status === 422) {
              return response.json().then(errorData => {
                throw new Error(errorData.message);
              });
            } else {
              throw new Error('Erro ao enviar o formulário. Status: ' + response.status);
            }
          })
          .then(data => {
            console.log(data);
            redirect('thanks', data);
            alert('Success');
            var modal = bootstrap.Modal.getInstance(document.getElementById('customerModal'));
            modal.hide();
          })
          .catch(error => {
            console.error('Erro ao enviar o formulário:', error);
            alert(error);
          })
        });

      //------------------------//

      document.getElementById('customerCreate').addEventListener('submit', function(e) {
        e.preventDefault(); 


        var formData = new FormData(this);
        var object = {};
        formData.forEach((value, key) => {object[key] = value});
        object.notificationDisabled = object.notificationDisabled == 'on' ? true : false;
        var json = JSON.stringify(object);

        fetch('/api/customer', { 
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: json
        }).then(response => {
          if (response.status === 201) {
            alert('cliente criado com sucesso, prossiga para compra');
          } else if (response.status === 422) {
            return response.json().then(errorData => {
              throw new Error(errorData.message);
            });
          } else {
            throw new Error('Erro ao enviar o formulário. Status: ' + response.status);
          }
        })
        .catch(error => {
          console.error('Erro ao enviar o formulário:', error);
          alert(error);
        })
      });


      const radioButtons = document.querySelectorAll('input[name="options"]');
      const forms = {
        'pixForm': document.getElementById('formPix'),
        'boletoForm': document.getElementById('formBoleto'),
        'creditForm': document.getElementById('formCredit')
      };

      radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
          // Hide all forms
          for (let key in forms) {
            forms[key].style.display = 'none';
          }
          // Show the selected form
          forms[this.value].style.display = 'block';
        });
      });
  </script>
