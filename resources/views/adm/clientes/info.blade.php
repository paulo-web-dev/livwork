@include('adm.layouts.head')
<div class="page-content">

    <!-- Start Content-->
    <div class="page-container">

        
        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold mb-0">Dashboard do Cliente</h4>
            </div>

         
        </div>
        

        

        <div class="row">
            <div class="col-xl-4 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2">
                          
                            <img src="{{ url('fotos-clientes/'.$cliente->informacoes->foto) }}" alt="" class="avatar-xl rounded-circle border border-light border-2">
                            <div>
                                <h4 class="text-dark fw-medium">{{$cliente->nome}}</h4>
                                <p class="mb-0 text-muted">ID: {{$cliente->id}}</p>
                            </div>
                            <div class="ms-auto">
                                <span class="badge bg-success px-2 py-1 fs-12">Ativo</span>
                            </div>

                        </div>
                        <div class="mt-3">
                            <h4 class="fs-15">Detalhes de Contato :</h4>
                            <div class="mt-3">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <div class="bg-opacity-75 d-flex align-items-center justify-content-center rounded">
                                        <iconify-icon icon="solar:point-on-map-bold-duotone" class="fs-20 text-primary"></iconify-icon>
                                    </div>
                                    <p class="mb-0 text-dark">{{$cliente->endereco}}, {{$cliente->cidade}} - {{$cliente->uf}}</p>
                                </div>
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <div class="bg-opacity-75 d-flex align-items-center justify-content-center rounded">
                                        <iconify-icon icon="solar:smartphone-2-bold-duotone" class="fs-20 text-primary"></iconify-icon>
                                    </div>
                                    <p class="mb-0 text-dark">{{$cliente->celular}}</p>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="bg-opacity-75 d-flex align-items-center justify-content-center rounded">
                                        <iconify-icon icon="solar:letter-bold-duotone" class="fs-20 text-primary"></iconify-icon>
                                    </div>
                                    <p class="mb-0 text-dark">{{$cliente->email}}</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="card-footer border-top border-dashed gap-1 hstack">
                        <a href="#!" class="btn btn-primary w-100">Editar Cliente</a>
                        <a href="#!" class="btn btn-dark d-inline-flex align-items-center justify-content-center rounded avatar-md"><i class="ti ti-edit fs-20"></i></a>
                    </div>
                </div>

              
            </div>
            <div class="col-xl-8 col-lg-12">
                <div class="col-xl-10 col-lg-12" style="width: 95%;">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex gap-2">
                            <button class="btn btn-primary w-100" onclick="showContent('info')">Informações Gerais</button>
                            <button class="btn btn-primary w-100" onclick="showContent('enderecos')">Endereços</button>
                            <button class="btn btn-primary w-100" onclick="showContent('extra')">Campos Extra</button>
                        </div>
                        <div class="card-body">
                            <div id="info" class="content">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-lg-3 col-6 border-end border-dashed">
                                        <p class="text-muted mb-1">Unidade </p>
                                        <p class="fs-15 fw-medium mb-3">Matriz LivWork</p>
                                        <p class="text-muted mb-1">Razão Social/Nome</p>
                                        <p class="fs-15 fw-medium mb-0">{{$cliente->nome}}</p>
                                    </div>
                                    <div class="col-lg-3 col-6 border-end border-dashed">
                                        <p class="text-muted mb-1">Celular</p>
                                        <p class="fs-15 fw-medium mb-3">{{$cliente->celular}}</p>
                                        <p class="text-muted mb-1">Documento (CPF/CNPJ)</p>
                                        <p class="fs-15 fw-medium mb-0">{{$cliente->cpf}}</p>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-1">Email</p>
                                        <p class="fs-15 fw-medium mb-3">{{$cliente->email}}</p>
                                        <p class="text-muted mb-1">Ramo de Atividade</p>
                                        <p class="fs-15 fw-medium mb-0">{{$cliente->ramo}}</p>
                                    </div>
                                </div>
                            </div>
                            <div id="enderecos" class="content" style="display: none;">
                                <h4 class="mb-0 fs-15 fw-semibold">Endereços:</h4>
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-lg-3 col-6 border-end border-dashed">
                                        <p class="text-muted mb-1">CEP </p>
                                        <p class="fs-15 fw-medium mb-3">{{$cliente->cep}}</p>
                                        <p class="text-muted mb-1">Razão Social/Nome</p>
                                        <p class="fs-15 fw-medium mb-0">{{$cliente->nome}}</p>
                                    </div>
                                    <div class="col-lg-3 col-6 border-end border-dashed">
                                        <p class="text-muted mb-1">Cidade</p>
                                        <p class="fs-15 fw-medium mb-3">{{$cliente->cidade}}</p>
                                        <p class="text-muted mb-1">Endereco</p>
                                        <p class="fs-15 fw-medium mb-0">{{$cliente->endereco}}</p>
                                    </div>
                                   
                                </div>
                            </div>
                            <div id="extra" class="content" style="display: none;">
                                <h4 class="mb-0 fs-15 fw-semibold">Campos Extras:</h4>
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-lg-3 col-6 border-end border-dashed">
                                        <p class="text-muted mb-1">Sala Virtual </p>
                                        <p class="fs-15 fw-medium mb-3"></p>
                                        <p class="text-muted mb-1">Periodicidade do plano escolhido</p>
                                        <p class="fs-15 fw-medium mb-0"></p>
                                    </div>
                                    <div class="col-lg-3 col-6 border-end border-dashed">
                                        <p class="text-muted mb-1">Contabilidade</p>
                                        <p class="fs-15 fw-medium mb-3"></p>
                                        <p class="text-muted mb-1">Parceiro</p>
                                        <p class="fs-15 fw-medium mb-0"></p>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script>
                    function showContent(section) {
                        document.querySelectorAll('.content').forEach(div => {
                            div.style.display = 'none';
                        });
                        document.getElementById(section).style.display = 'block';
                    }
                </script>
                

                    </div>
                </div>

             
        </div>

    </div> <!-- container -->

@include('adm.layouts.footer')  