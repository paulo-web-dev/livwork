@include('clientes.layouts.head')

<style>
    .payment-method-container {
        font-family: Arial, sans-serif;
    }
    
    .payment-options {
        display: flex;
        gap: 15px;
    }
    
    .payment-option {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        padding: 15px;
        border: 2px solid #ccc;
        border-radius: 10px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .payment-option:hover {
        border-color: #007bff;
    }
    
    .payment-option input[type="radio"] {
        display: none;
    }
    
    .payment-option .icon {
        font-size: 24px;
        color: #007bff;
    }
    
    .payment-option span {
        font-size: 14px;
        font-weight: 600;
    }
    
    .payment-option input[type="radio"]:checked + .icon {
        color: #fff;
        background-color: #007bff;
        padding: 10px;
        border-radius: 50%;
    }
    
    .payment-option input[type="radio"]:checked + span {
        color: #007bff;
        font-weight: bold;
    }
    </style>   <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <!-- Start Content-->
            <div class="container-fluid">

                
                <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold mb-0">Detalhes da Reserva</h4>
                    </div>

                   
                </div>
                

                

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-start justify-content-between">
                                    <div class="col-lg-5">
                                        <p class="text-dark fw-medium fs-15 d-flex align-items-center gap-1 mb-2">
                                            <iconify-icon icon="solar:box-bold-duotone" class="text-danger"></iconify-icon>
                                            Reserva 
                                            <i class="ti ti-arrow-right"></i>
                                            <span class="badge bg-light-subtle rounded-pill text-dark border fs-12 py-1 px-2">
                                                #{{$reserva->id}}
                                            </span>
                                        </p>

                                        <h3 class="mb-1 text-dark fw-semibold">Reserva ID : #{{$reserva->id}} <span class="badge bg-warning-subtle rounded-pill text-warning border border-warning fs-11 py-1 px-2 my-2">{{$reserva->status}}</span> </h3>

                                        <div class="d-flex flex-wrap align-items-center gap-2">
                                            <p class="mb-0 fs-15">Data da Reserva : {{$preReserva->data}}</p>
                                            <div>| {{$preReserva->hora_inicio}} - {{$preReserva->hora_fim}}</div>
                                            <div>
                                                <p class="mb-0 fs-15 text-success fw-medium  d-flex align-items-center gap-1"><i class="ti ti-plane-tilt"></i>RESERVA CONFIRMADA </p>
                                                {{$preReserva->sala->unidades->nome}} | {{$preReserva->sala->nome}}
                                                <p class="text-muted fw-medium fs-14 mb-1"><span class="text-dark">Endereço : </span>
                                                   Rua {{ $preReserva->sala->unidades->rua }}, {{ $preReserva->sala->unidades->numero }},
                                                    {{ $preReserva->sala->unidades->bairro }} - {{ $preReserva->sala->unidades->cidade }} -
                                                    {{ $preReserva->sala->unidades->uf }}</p>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>

                                    <div class="col-lg-4 text-end">
                                        <div class="d-flex gap-2 flex-wrap justify-content-end my-2">
                                        

                                        <!-- Botão para Voltar -->
                                        <a href="{{route('cliente-MinhasReservas')}}" class="btn btn-primary">Ver Minhas Reservas</a>

                                        </div>

                                    </form>
                                     
                                        
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h5 class="card-title mb-0">Resumo de Reserva</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="px-0">
                                                    <p class="mb-0 fs-15 fw-medium">Valor /Hora da Sala: </p>
                                                </td>
                                                <td class="text-end text-dark fs-14 fw-medium px-0">R${{$preReserva->sala->valor}}</td>
                                            </tr>
                                            <tr>
                                                <td class="px-0">
                                                    <p class="mb-0 fs-15 fw-medium">Tempo da Reserva : </p>
                                                </td>
                                                <td class="text-end text-dark fs-14 fw-medium px-0">{{$tempo}}H</td>
                                            </tr>
                                            {{-- <tr>
                                                <td class="px-0">
                                                    <p class="mb-0 fs-15 fw-medium">Delivery Charge : </p>
                                                </td>
                                                <td class="text-end text-success fs-14 fw-medium px-0">Free</td>
                                            </tr> --}}
                                            {{-- <tr>
                                                <td class="px-0">
                                                    <p class="mb-0 fs-15 fw-medium">Valor Total: </p>
                                                </td>
                                                <td class="text-end text-dark fs-14 fw-medium px-0"></td>
                                            </tr> --}}

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between border-top">
                                <div>
                                    <p class="fw-medium text-dark mb-0 fs-15">Valor Total</p>
                                </div>
                                <div>
                                    <p class="fw-medium fs-14 text-dark mb-0">R${{$valor}}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                   
                </div>

             
            </div> <!-- container -->

            <!-- Footer Start -->
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