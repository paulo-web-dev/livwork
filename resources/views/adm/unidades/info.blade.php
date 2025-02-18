@include('adm.layouts.head')

         <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="page-content">

            <!-- Start Content-->
            <div class="page-container">

                
                <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold mb-0">Cadastrar Unidades</h4>
                    </div>

                 
                </div>
                

                

                <div class="row">
                    <div class="col-xlg-7">
                        <div class="card">
                            <div class="card-header border-bottom border-dashed">
                                <h4 class="card-title mb-0">Informações Básicas</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('adm-upd-unidades')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                       
                                       
                                    
                                <input type="hidden" value="{{$unidade->id}}" name="id">                                        
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="nome" class="form-label">Nome </label>
                                                <input type="text" class="form-control" id="nome" name="nome" value="{{$unidade->nome}}" placeholder="Digite o nome da unidade" required>
                                            </div>
                                        </div>
                                  
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">E-mail</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{$unidade->email}}" placeholder="Digite o e-mail" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="telefone" class="form-label">Telefone/Celular</label>
                                                <input type="text" class="form-control" id="telefone" name="telefone" value="{{$unidade->telefone}}" placeholder="Digite o telefone">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="cep" class="form-label">Rua</label>
                                                <input type="text" class="form-control" id="rua" name="rua" value="{{$unidade->rua}}" placeholder="Digite a Rua">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="cidade" class="form-label">Cidade</label>
                                                <input type="text" class="form-control" id="cidade" name="cidade" value="{{$unidade->nome}}" placeholder="Digite a cidade">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="bairro" class="form-label">Bairro</label>
                                                <input type="text" class="form-control" id="bairro" name="bairro"  value="{{$unidade->bairro}}" placeholder="Digite o endereço">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="uf" class="form-label">UF</label>
                                                <select class="form-control" id="uf" name="uf">
                                                    <option value="">Selecione a UF</option>
                                                    <option selected value="{{$unidade->uf}}">{{$unidade->uf}}</option>
                                                    <option value="AC">AC</option>
                                                    <option value="AL">AL</option>
                                                    <option value="AP">AP</option>
                                                    <option value="AM">AM</option>
                                                    <option value="BA">BA</option>
                                                    <option value="CE">CE</option>
                                                    <option value="DF">DF</option>
                                                    <option value="ES">ES</option>
                                                    <option value="GO">GO</option>
                                                    <option value="MA">MA</option>
                                                    <option value="MT">MT</option>
                                                    <option value="MS">MS</option>
                                                    <option value="MG">MG</option>
                                                    <option value="PA">PA</option>
                                                    <option value="PB">PB</option>
                                                    <option value="PR">PR</option>
                                                    <option value="PE">PE</option>
                                                    <option value="PI">PI</option>
                                                    <option value="RJ">RJ</option>
                                                    <option value="RN">RN</option>
                                                    <option value="RS">RS</option>
                                                    <option value="RO">RO</option>
                                                    <option value="RR">RR</option>
                                                    <option value="SC">SC</option>
                                                    <option value="SP">SP</option>
                                                    <option value="SE">SE</option>
                                                    <option value="TO">TO</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="complemento" class="form-label">Complemento</label>
                                                <input type="text" class="form-control" id="complemento" name="complemento"  value="{{$unidade->complemento}}" placeholder="Digite o complemento">
                                            </div>
                                        </div>
                                        
                                  
                                    
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary">Editar</button>
                                        </div>
                                    </div>
                               
                            </div>
                        </div>
                    </div>

                    </div>
                </div>


            </div> <!-- container -->
        
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const cpfRadio = document.getElementById("cpfRadio");
                    const cnpjRadio = document.getElementById("cnpjRadio");
                    const documentoInput = document.getElementById("documento");
                    const LabelDocumento = document.getElementById('LabelDocumento');
                    function atualizarCampo() {
                        if (cpfRadio.checked) {
                            documentoInput.placeholder = "Digite o CPF";
                            documentoLabel.placeholder = "CPF";
                            documentoInput.maxLength = 14; // Máscara de CPF (000.000.000-00)
                        } else {
                            documentoInput.placeholder = "Digite o CNPJ";
                            documentoLabel.placeholder = "CNPJ";
                            documentoInput.maxLength = 18; // Máscara de CNPJ (00.000.000/0000-00)
                        }
                        documentoInput.value = ""; // Limpa o campo ao mudar
                    }
            
                    cpfRadio.addEventListener("change", atualizarCampo);
                    cnpjRadio.addEventListener("change", atualizarCampo);
                });
            </script>
@include('adm.layouts.footer') 