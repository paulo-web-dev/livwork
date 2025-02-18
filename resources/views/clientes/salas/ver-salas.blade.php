@include('clientes.layouts.head')
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="page-content">

    <!-- Start Content-->
    <div class="page-container">


        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold mb-0">Reservar Sala</h4>
            </div>

            <div class="text-end">

            </div>
        </div>




        <div class="row">
            <div class="col-xl-5 col-lg-12">
                <div class="card bg-body shadow-none">
                    <div class="card-body">
                        <!-- Crossfade -->
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                @foreach($sala->fotos as $foto)
                                    @if($loop->index == 0)
                                        <div class="carousel-item text-center  active">
                                        @else
                                            <div class="carousel-item text-center  active">
                                    @endif
                                    <img src="{{ url('fotos/salas/'.$foto->path) }}" alt=""
                                        class="img-fluid bg-body shadow-none rounded">
                            </div>
                            @endforeach


                        </div>

                    </div>
                </div>


                <span class="position-absolute top-0 end-0 p-5 pt-0 z-1">
                    <div data-toggler="on">
                        <button type="button" class="btn btn-icon btn-light rounded-circle" data-toggler-on>
                            <iconify-icon icon="solar:heart-angle-bold-duotone" class="fs-22 text-danger">
                            </iconify-icon>
                        </button>
                        <button type="button" class="btn btn-icon btn-light rounded-circle d-none" data-toggler-off>
                            <iconify-icon icon="solar:heart-angle-bold-duotone" class="fs-22" data-toggler-off>
                            </iconify-icon>
                        </button>
                    </div>
                </span>
                <span class="position-absolute top-0 start-0 p-5 pt-2 z-1">
                    <span class="badge bg-danger fs-14">Sala De Reunião</span>
                </span>
            </div>
        </div>
        <div class="col-xl-7 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="badge bg-success-subtle text-success px-2 py-1 fs-13 rounded-pill">Reserva
                                Disponível</span>
                        </div>
                        <div class="flex-grow-1 d-inline-flex align-items-center justify-content-end fs-16">
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ms-1 fs-14"> </span>
                        </div>
                    </div>
                    <div class="mt-3 mb-1">
                        <a href="#!" class="text-dark fs-20 fw-medium">{{ $sala->nome }}</a>
                    </div>
                    <p class="text-muted fw-medium fs-14 mb-1"><span class="text-dark">Unidade : </span>
                        {{ $sala->unidades->nome }}</p>
                    <p class="text-muted fw-medium fs-14 mb-1"><span class="text-dark">Endereço : </span>
                        {{ $sala->unidades->rua }}, {{ $sala->unidades->numero }},
                        {{ $sala->unidades->bairro }} - {{ $sala->unidades->cidade }} -
                        {{ $sala->unidades->uf }}</p>


                    <h2 class="my-4 fw-bold text-dark">R${{ $sala->valor }} <span
                            class="text-muted fs-14 fw-medium">/Hora</span></h2>
                <form action="{{route('cliente-PreReservarSala')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_sala" value={{$sala->id}}>  
                    <div class="mt-3 mb-2">
                        <label for="data" class="mb-1 text-dark fw-semibold fs-15">Selecione a data:</label>
                        <input type="date" id="data" name="data" class="form-control" required>
                    </div>

                    <div class="mt-3 mb-2">
                        <label for="hora_inicio" class="mb-1 text-dark fw-semibold fs-15">Horário de início:</label>
                        <select id="hora_inicio" name="hora_inicio" class="form-control" required>
                            <?php
                            for ($hour = 0; $hour < 24; $hour++) {
                                for ($minute = 0; $minute < 60; $minute += 30) {
                                    $time = sprintf('%02d:%02d', $hour, $minute); // Formata o horário
                                    echo "<option value=\"$time\">$time</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="mt-3 mb-2">
                        <label for="hora_fim" class="mb-1 text-dark fw-semibold fs-15">Horário de término:</label>
                        <select id="hora_fim" name="hora_fim" class="form-control" required>
                            <?php
                            for ($hour = 0; $hour < 24; $hour++) {
                                for ($minute = 0; $minute < 60; $minute += 30) {
                                    $time = sprintf('%02d:%02d', $hour, $minute); // Formata o horário
                                    echo "<option value=\"$time\">$time</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    

                    <button type="submit" class="btn btn-primary mt-3">Reservar Sala</button>
                </form> 

                    <h4 class="text-dark fw-medium mt-3 mb-2 pb-1">Facilidades :</h4>


                    <div class="border border-dashed p-2 rounded text-center">

                        <div class="row">
                            @foreach($sala->facilidades as $facilidade)
                                <div class="col-lg-3 col-4 border-end">
                                    <p class="text-muted fw-medium fs-14 mb-0"><span
                                            class="text-dark">✅{{ $facilidade->facilidade }} </span></p>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed">

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



</div> <!-- container -->

<!-- container -->
<!-- Footer Start -->
@include('clientes.layouts.footer')
<!-- end Footer -->

</div>
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

</div>
<!-- END wrapper -->



</body>


<!-- Mirrored from coderthemes.com/osen/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Nov 2024 22:09:26 GMT -->

</html>
