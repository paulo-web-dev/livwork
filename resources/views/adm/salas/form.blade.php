@include('adm.layouts.head')

         <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="page-content">

            <!-- Start Content-->
            <div class="page-container">

                
                <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold mb-0">Cadastrar Salas  </h4>
                    </div>

                 
                </div>
                

                

                <div class="row">
                    <div class="col-xlg-7">
                        <div class="card">
                            <div class="card-header border-bottom border-dashed">
                                <h4 class="card-title mb-0">Informações Básicas</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('adm-cad-unidades') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="unidade" class="form-label">Unidade</label>
                                            <select class="form-control" id="unidade" name="unidade">
                                                @foreach ($unidades as $unidade)
                                                <option value="{{$unidade->id}}">{{$unidade->id}} - {{$unidade->nome}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>

                                   
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="nome" class="form-label">Nome</label>
                                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome da unidade" required>
                                            </div>
                                        </div>
                                
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="valor" class="form-label">Valor (R$)</label>
                                                <input type="text" class="form-control" id="valor" name="valor" placeholder="Digite o valor">
                                            </div>
                                        </div>
                                
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="cor" class="form-label">Cor</label>
                                                <input type="color" class="form-control" id="cor" name="cor">
                                            </div>
                                        </div>
                                
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="quantidade_max_pessoas" class="form-label">Quantidade Máxima de Pessoas</label>
                                                <input type="number" class="form-control" id="quantidade_max_pessoas" name="quantidade_max_pessoas" min="1">
                                            </div>
                                        </div>
                                       
                                        @foreach(['agendamento_fracionado', 'agendamento_apenas_diaria', 'vizualizacao_cliente'] as $campo)
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="{{ $campo }}" class="form-label">{{ ucwords(str_replace('_', ' ', $campo)) }}</label>
                                                    <select class="form-control" id="{{ $campo }}" name="{{ $campo }}">
                                                        <option value="Habilitado">Habilitado</option>
                                                        <option value="Desabilitado">Desabilitado</option>
                                                    </select>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header border-bottom border-dashed">
                                                    <h4 class="card-title mb-0">Upload de fotos da sala</h4>
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
                               
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="form-label" style="font-size: 20px">Horários de Funcionamento</label>
                                          <br>
                                            <div class="row mt-2" id="horario_padrao">
                                                <div class="col-md-6">
                                                    <label class="form-label">Horário de Início Padrão</label>
                                                    <select class="form-control" name="horario_inicio_padrao">
                                                        @for ($h = 0; $h <= 23; $h++)
                                                            @foreach(['00', '30'] as $m)
                                                                <option value="{{ sprintf('%02d:%s', $h, $m) }}">{{ sprintf('%02d:%s', $h, $m) }}</option>
                                                            @endforeach
                                                        @endfor
                                                    </select>
                                                </div>
                                                <br>
                                                <div class="col-md-6" style="margin:10px">
                                                    <label class="form-label">Horário de Fim Padrão</label>
                                                    <select class="form-control" name="horario_fim_padrao">
                                                        @for ($h = 0; $h <= 23;$h++)
                                                            @foreach(['00', '30'] as $m)
                                                                <option value="{{ sprintf('%02d:%s', $h, $m) }}">{{ sprintf('%02d:%s', $h, $m) }}</option>
                                                            @endforeach
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            @foreach([
                                                'almoco' => 'Intervalo de Almoço?', 
                                                'sabado' => 'Funcionamos aos Sábados?', 
                                                'domingo' => 'Funcionamos aos Domingos?'
                                            ] as $key => $label)
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" id="{{ $key }}" name="{{ $key }}" value="1" onclick="toggleHorario('{{ $key }}')">
                                                    <label class="form-check-label" for="{{ $key }}">{{ $label }}</label>
                                                </div>
                                                <div class="row mt-2" id="horario_{{ $key }}" style="display: none;">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Horário de Início</label>
                                                        <select class="form-control" name="horario_inicio_{{ $key }}">
                                                            @for ($h = 0; $h <= 23; $h++)
                                                                @foreach(['00', '30'] as $m)
                                                                    <option value="{{ sprintf('%02d:%s', $h, $m) }}">{{ sprintf('%02d:%s', $h, $m) }}</option>
                                                                @endforeach
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Horário de Fim</label>
                                                        <select class="form-control" name="horario_fim_{{ $key }}">
                                                            @for ($h = 0; $h <= 23;$h++)
                                                                @foreach(['00', '30'] as $m)
                                                                    <option value="{{ sprintf('%02d:%s', $h, $m) }}">{{ sprintf('%02d:%s', $h, $m) }}</option>
                                                                @endforeach
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        
                                        <script>
                                            function toggleHorario(id) {
                                                let horarioDiv = document.getElementById('horario_' + id);
                                                horarioDiv.style.display = document.getElementById(id).checked ? 'flex' : 'none';
                                            }
                                        </script>
                                        
                                
                                        <div class="col-lg-12">
                                            <label class="form-label" style="font-size: 20px">Comodidades da Sala</label>
                                            <div class="d-flex flex-wrap">
                                                @foreach(['Projetor', 'Wi-Fi', 'Quadro Branco', 'Acessibilidade', 'Ar-condicionado', 'Flipchart', 'Televisão', 'Higienização', 'Frigobar', 'Cabo HDMI'] as $comodidade)
                                                    <div class="form-check me-3">
                                                        <input class="form-check-input" type="checkbox" id="comodidade_{{ $loop->index }}" name="comodidades[]" value="{{ $comodidade }}">
                                                        <label class="form-check-label" for="comodidade_{{ $loop->index }}">{{ $comodidade }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
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