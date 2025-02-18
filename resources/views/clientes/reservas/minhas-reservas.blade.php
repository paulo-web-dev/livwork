@include('clientes.layouts.head')

<div class="page-content">

    <!-- Start Content-->
    <div class="page-container">

        
        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold mb-0">Minhas Reservas</h4>
            </div>

      
        </div>
        

        

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom border-light">
                        <div class="row justify-content-between g-3">
                            <div class="col-lg-6">
                         
                            </div>

                            <div class="col-lg-6">
                              
                            </div><!-- end col-->
                        </div>
                    </div> <!-- end card-body-->

                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <thead class="bg-light-subtle">
                                <tr>
                                   
                                    <th>ID</th>
                                    <th>Sala/Estação de Trabalho</th>
                                    <th>Data</th>
                                    <th>Início</th>
                                    <th>Fim</th>
                                    <th>Utilizações</th>
                                    <th>Convidados</th>
                                    <th>Obs</th>
                                    <th class="text-center" style="width: 120px;">Ações</th>
                                </tr>
                            </thead><!-- end thead -->
                            <tbody>
                            @foreach ($reservas as $reserva )

                                <tr>
                                    
                                    <td>
                                        <a href="apps-ecommerce-order-details.html" class="text-muted fw-medium">#{{$reserva->id}}</a>
                                    </td>
                                    <td>
                                        <h5 class="mb-0 text-dark">{{$reserva->preReserva->sala->nome}}</h5>
                                    </td>
                                    <td>
                                        <p class="mb-1"><span class="text-dark fw-semibold">{{$reserva->preReserva->data}}</p>
                                    </td>
                                    <td>
                                        <p class="mb-1">2 {{$reserva->preReserva->hora_inicio}}</p>
                                      
                                    </td>

                                    <td>
                                        {{$reserva->preReserva->hora_fim}}
                                    </td>
                                    <td>
                                      
                                    </td>
                                    <td>
                                      
                                    </td>
                                    <td>
                                      
                                    </td>   
                                    
                                    <td class="pe-3">
                                        <div class="hstack gap-1 justify-content-end">
                                            <a href="javascript:void(0);" class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i class="ti ti-eye"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i class="ti ti-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div>

                    <div class="card-footer d-flex align-items-center justify-content-end">
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item disabled">
                                <a href="#" class="page-link"><i class="ti ti-chevrons-left"></i></a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">3</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link"><i class="ti ti-chevrons-right"></i></a>
                            </li>
                        </ul>
                    </div><!-- end card-footer -->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

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