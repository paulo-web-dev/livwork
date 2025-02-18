@include('adm.layouts.head')

         <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="page-content">

            <!-- Start Content-->
            <div class="page-container">

                
                <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold mb-0">Cadastrar Clientes</h4>
                    </div>

                 
                </div>
                

                

                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header border-bottom border-dashed">
                                <h4 class="card-title mb-0">Informações Básicas</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('adm-cad-clientes')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="meio_faturamento" class="form-label">Meio de Faturamento Padrão*</label>
                                                <select class="form-control" id="meio_faturamento" name="meio_faturamento" required>
                                                    <option value="" disabled selected>Selecione uma opção</option>
                                                    @foreach ($meiosdefaturamento as $meiodefaturamento )
                                                    <option value="{{$meiodefaturamento->id}}">{{$meiodefaturamento->meio}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Tipo de Documento</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipo_documento" id="cpfRadio" value="cpf" checked>
                                                    <label class="form-check-label" for="cpfRadio">CPF</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipo_documento" id="cnpjRadio" value="cnpj">
                                                    <label class="form-check-label" for="cnpjRadio">CNPJ</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    
                                
                                        
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="nome" class="form-label">Razão Social / Nome Completo </label>
                                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" required>
                                            </div>
                                        </div>
                                  
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                 <label for="documento" class="form-label" id="LabelDocumento">Documento</label>
                                                <input type="text" class="form-control" id="documento" name="documento" placeholder="Digite o CPF" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="rg" class="form-label">RG</label>
                                                <input type="text" class="form-control" id="rg" name="rg" placeholder="RG">
                                            </div>
                                        </div>
                                       
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="profissao" class="form-label">Profissão</label>
                                                <input type="text" class="form-control" id="profissao" name="profissao" placeholder="Digite a profissão">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="ramo" class="form-label">Ramo</label>
                                                <input type="text" class="form-control" id="ramo" name="ramo" placeholder="Digite o ramo">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="data_nascimento" class="form-label">Data de Nascimento/Fundação</label>
                                                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="celular" class="form-label">Celular</label>
                                                <input type="text" class="form-control" id="celular" name="celular" placeholder="Digite o celular" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="telefone" class="form-label">Telefone</label>
                                                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="cep" class="form-label">CEP</label>
                                                <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite o CEP">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="uf" class="form-label">UF</label>
                                                <select class="form-control" id="uf" name="uf">
                                                    <option value="">Selecione a UF</option>
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
                                                <label for="cidade" class="form-label">Cidade</label>
                                                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite a cidade">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="endereco" class="form-label">Endereço</label>
                                                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o endereço">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">E-mail</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="inscricao_municipal" class="form-label">Inscrição Municipal</label>
                                                <input type="text" class="form-control" id="inscricao_municipal" name="inscricao_municipal" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="inscricao_estadual" class="form-label">Inscrição Estadual</label>
                                                <input type="text" class="form-control" id="inscricao_estadual" name="inscricao_estadual" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                                        </div>
                                    </div>
                               
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header border-bottom border-dashed">
                                <h4 class="card-title mb-0">Upload de Logo</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                   
                                        <div class="fallback">
                                            <input name="file" type="file" />
                                        </div>

                                        <div class="dz-message needsclick">
                                            <i class="h1 ti ti-cloud-upload mb-4"></i>
                                            <h4>Arraste o arquivo ou clique em "Escolher Arquivo".</h4>
                                            <span class="text-muted fs-13">(Escolha apenas uma imagem)</span>
                                        </div>
                                    </form>

                                    <!-- Preview -->
                                    <div class="dropzone-previews mt-3" id="file-previews"></div>

                                    <!-- file preview template -->
                                    <div class="d-none" id="uploadPreviewTemplate">
                                        <div class="card mt-1 mb-0 shadow-none border">
                                            <div class="p-2">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                                    </div>
                                                    <div class="col ps-0">
                                                        <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                                        <p class="mb-0" data-dz-size></p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <!-- Button -->
                                                        <a href="#" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                            <i class="ti ti-x"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end file preview template -->
                                </div>
                            </div>
                        </div>
           
                    </form>
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