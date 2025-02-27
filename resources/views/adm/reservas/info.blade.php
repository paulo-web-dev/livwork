@include('adm.layouts.head')
 <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="page-content">

            <!-- Start Content-->
            <div class="page-container">

                
                <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold mb-0">Ver Reserva - {{$reserva->id}}</h4>
                    </div>

                   
                </div>
                
<form action="{{route('adm-reservar-atualizar')}}" method="post">
    @csrf
    <input type="hidden" name="id_pre" value="{{$preReserva->id}}">
    <input type="hidden" name="idr" value="{{$reserva->id}}">
    <input type="hidden" name="user" value="{{$preReserva->id_user}}">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header border-bottom border-dashed">
                                <h4 class="card-title mb-0">Informações de Reserva</h4>
                            </div> 
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="unidade" class="form-label">Unidade</label>
                                            <select class="form-select my-1 my-md-0 me-sm-3" id="unidade">
                                              
                                                <option value="{{$preReserva->sala->unidades->id}}">{{$preReserva->sala->unidades->id}} - {{$preReserva->sala->unidades->nome}}</option>
                                        
                                                @foreach ($unidades as $unidade)
                                                    <option value="{{$unidade->id}}">{{$unidade->id}} - {{$unidade->nome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                
                                        <div class="mb-3">
                                            <label for="sala" class="form-label">Sala</label>
                                            <select class="form-select my-1 my-md-0 me-sm-3" id="sala" name="sala"> 
                                                <option value="{{$preReserva->sala->id}}">{{$preReserva->sala->id}} - {{$preReserva->sala->nome}}</option>
                                            </select>
                                        </div>
                                    </div>
                
                                    <div class="col-lg-6">
                                        <label for="data" class="mb-1 text-dark fw-semibold fs-15">Selecione a data:</label>
                                        <input type="date" id="data" name="data" class="form-control" value="{{$preReserva->data}}" required>
                                    </div>
                
                                    <div id="horarios-container" >
                                        <div class="col-lg-6">
                                            <label for="hora_inicio" class="mb-1 text-dark fw-semibold fs-15">Horário de início:</label>
                                            <select id="hora_inicio" name="hora_inicio" class="form-control"     required>
                                                    <option value="{{ $preReserva->hora_inicio }}" selected>{{ $preReserva->hora_inicio }}</option>
                                            </select>
                                        </div>
                
                                        <div class="col-lg-6">
                                            <label for="hora_fim" class="mb-1 text-dark fw-semibold fs-15">Horário de término:</label>
                                            <select id="hora_fim" name="hora_fim" class="form-control" required>
                                                <option value="{{ $preReserva->hora_fim }}" selected>{{ $preReserva->hora_fim }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <!-- Extrato da Reserva -->
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header border-bottom border-dashed">
                                <h4 class="card-title mb-0">Extrato da Reserva</h4>
                            </div>
                            <div class="card-body">
                                <p><strong>Sala:</strong> <span id="extrato-sala">-</span></p>
                                <p><strong>Data:</strong> <span id="extrato-data">-</span></p>
                                <p><strong>Tempo Total:</strong> <span id="extrato-tempo">-</span></p>
                                <p><strong>Valor Total:</strong> R$ <span id="extrato-valor">0,00</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    let unidadeSelect = document.getElementById("unidade");
                    let salaSelect = document.getElementById("sala");
                    let dataInput = document.getElementById("data");
                    let horaInicioSelect = document.getElementById("hora_inicio");
                    let horaFimSelect = document.getElementById("hora_fim");
                    
                    let salasData = {}; // Armazena os dados das salas
                
                    unidadeSelect.addEventListener("change", function() {
                        let unidadeId = unidadeSelect.value;
                        salaSelect.innerHTML = '<option value="">Selecione a sala</option>';
                
                        if (!unidadeId) return;
                
                        fetch(`/api/busca/salas/${unidadeId}`)
                            .then(response => response.json())
                            .then(data => {
                                salasData = {}; // Limpa os dados anteriores
                
                                if (data.salas && data.salas.length > 0) {
                                    data.salas.forEach(sala => {
                                        salasData[sala.id] = sala; // Armazena a sala no objeto
                                        let option = document.createElement("option");
                                        option.value = sala.id;
                                        option.textContent = `${sala.id} - ${sala.nome}`;
                                        salaSelect.appendChild(option);
                                    });
                                }
                            })
                            .catch(error => console.error("Erro ao buscar salas:", error));
                    });
                
                    $("#data").on("change", function() {
                        let dataSelecionada = $(this).val();
                        let idSala = salaSelect.value;
                
                        if (dataSelecionada && idSala) {
                            $.ajax({
                                url: "{{ route('api-buscaHorarios') }}",
                                type: "POST",
                                data: {
                                    data: dataSelecionada,
                                    id_sala: idSala,
                                    _token: "{{ csrf_token() }}"
                                },
                                success: function(response) {
                                    if (response.horarios_inicio.length > 0) {
                                        $("#hora_inicio").empty();
                                        $("#hora_fim").empty();
                
                                        $.each(response.horarios_inicio, function(index, hora) {
                                            $("#hora_inicio").append(`<option value="${hora}">${hora}</option>`);
                                        });
                
                                        $.each(response.horarios_fim, function(index, hora) {
                                            $("#hora_fim").append(`<option value="${hora}">${hora}</option>`);
                                        });
                
                                        $("#horarios-container").fadeIn();
                                    } else {
                                        alert("Nenhum horário disponível para esta data.");
                                        $("#horarios-container").hide();
                                    }
                                },
                                error: function(xhr) {
                                    console.error(xhr.responseText);
                                    alert("Erro ao buscar os horários. Tente novamente.");
                                }
                            });
                        } else {
                            $("#horarios-container").hide();
                        }
                    });
                
                    function calcularExtrato() {
                        let idSala = salaSelect.value;
                        let sala = salasData[idSala];
                        let dataSelecionada = dataInput.value;
                        let horaInicio = horaInicioSelect.value;
                        let horaFim = horaFimSelect.value;
                
                        if (!sala || !dataSelecionada || !horaInicio || !horaFim) return;

let valorPorHora = parseFloat(sala.valor);
let inicioHoras = parseInt(horaInicio.split(":")[0]); 
let inicioMinutos = parseInt(horaInicio.split(":")[1]); 
let fimHoras = parseInt(horaFim.split(":")[0]); 
let fimMinutos = parseInt(horaFim.split(":")[1]); 

if (fimHoras < inicioHoras || (fimHoras === inicioHoras && fimMinutos <= inicioMinutos)) {
    alert("O horário de término deve ser depois do horário de início.");
    return;
}

// Calcula a diferença total em minutos
let totalMinutos = (fimHoras * 60 + fimMinutos) - (inicioHoras * 60 + inicioMinutos);

// Converte minutos para horas e minutos separados
let horas = Math.floor(totalMinutos / 60);
let minutos = totalMinutos % 60;

// Converte minutos extras em fração de horas
let totalHoras = horas + (minutos / 60); 
let valorTotal = valorPorHora * totalHoras;

$("#extrato-sala").text(sala.nome);
$("#extrato-data").text(dataSelecionada);
$("#extrato-tempo").text(`${horas}h ${minutos}min`);
$("#extrato-valor").text(`R$ ${valorTotal.toFixed(2)}`);

                    }
                
                    $("#sala, #hora_inicio, #hora_fim").on("change", calcularExtrato);
                });
                </script>
                
                       

                        <div class="text-end mb-3">
                            <button  type="submit" class="btn btn-primary">Atualizar Reserva</button>
                        
                        </div>
                    </div>
                </div>

            </div> <!-- container -->
        </form>
@include('clientes.layouts.footer')
<!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Theme Settings -->

</body>
<script>
function updatePaymentDetails(method) {
const details = document.getElementById('payment-details');
if (method === 'pix') {
details.innerHTML = '<p>Ao clicar em "Reservar", o QRCode para pagamento será exibido.</p>';
} else if (method === 'cartao') {
details.innerHTML = `
<p>Insira os dados do cartão de crédito:</p>
<input type="text" class="form-control mb-2" placeholder="Número do Cartão">
<div class="d-flex gap-2">
    <input type="text" class="form-control" placeholder="MM/AA">
    <input type="text" class="form-control" placeholder="CVV">
</div>
`;
} else if (method === 'proxima') {
details.innerHTML = '<p>O valor será incluído na próxima fatura.</p>';
}
}
</script>

<!-- Mirrored from coderthemes.com/osen/layouts/apps-ecommerce-order-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Nov 2024 22:09:23 GMT -->
</html>