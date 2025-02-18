@include('clientes.layouts.head')
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="page-content" style="margin-top:-5%">

            <div class="page-container">

                
                <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
                  

                  
                </div>
                
  <div class="row">
                    <div class="col-12">
                        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Bem Vindo, {{Auth::user()->name}} 👋</h4>
                            </div>
                            <div class="mt-3 mt-sm-0">
                                <form action="javascript:void(0);">
                                    <div class="row g-2 mb-0 align-items-center">
                                        <div class="col-auto">
                                            <a href="{{route('cliente-BuscaSala')}}" class="btn btn-success">
                                                <i class="ti ti-sort-ascending me-1"></i> Reservar Sala 
                                            </a>
                                        </div>
                                        <!--end col-->
                                        {{-- <div class="col-sm-auto">
                                            <div class="input-group">
                                                <input type="text" class="form-control border-0 shadow" data-provider="flatpickr" data-deafult-date="01 May to 31 May" data-date-format="d M" data-range-date="true">
                                                <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="ti ti-calendar fs-15"></i>
                                                </span>
                                            </div>
                                        </div> --}}
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                        </div><!-- end card header -->
                    </div>
                    <!--end col-->
                </div>

                <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 align-items-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{route('cliente-BuscaSala')}}" class="text-muted float-end mt-n1 fs-18"><i class="ti ti-external-link"></i></a>
                                <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Reservar Sala</h5>
                                <div class="d-flex align-items-center gap-2 my-3">
                                    <div class="avatar-md flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                                            <i class="ti ti-calendar-week"></i>
                                        </span>
                                    </div>
                                    <h3 class="mb-0 fw-bold">Reservar Sala <span class="badge text-bg-success fw-medium ms-2 fs-12"></span></h3>
                                </div>
                                
                            </div>
                        </div>
                    </div><!-- end col -->

                   <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{route('cliente-MinhasReservas')}}" class="text-muted float-end mt-n1 fs-18"><i class="ti ti-external-link"></i></a>
                                <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Minhas Reservas</h5>
                                <div class="d-flex align-items-center gap-2 my-3">
                                    <div class="avatar-md flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                                            <i class="ti ti-calendar-week"></i>
                                        </span>
                                    </div>
                                    <h3 class="mb-0 fw-bold">Minhas Reservas <span class="badge text-bg-success fw-medium ms-2 fs-12"></span></h3>
                                </div>
                                
                            </div>
                        </div>
                    </div><!-- end col -->

                     <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <a href="#!" class="text-muted float-end mt-n1 fs-18"><i class="ti ti-external-link"></i></a>
                                <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Meus Recados</h5>
                                <div class="d-flex align-items-center gap-2 my-3">
                                    <div class="avatar-md flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                                            <i class="ti ti-calendar-week"></i>
                                        </span>
                                    </div>
                                    <h3 class="mb-0 fw-bold">Meus Recados <span class="badge text-bg-success fw-medium ms-2 fs-12"></span></h3>
                                </div>
                                
                            </div>
                        </div>
                    </div><!-- end col -->
                     <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <a href="#!" class="text-muted float-end mt-n1 fs-18"><i class="ti ti-external-link"></i></a>
                                <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Minhas Correspondências</h5>
                                <div class="d-flex align-items-center gap-2 my-3">
                                    <div class="avatar-md flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                                            <i class="ti ti-calendar-week"></i>
                                        </span>
                                    </div>
                                    <h3 class="mb-0 fw-bold">Minhas Correspondências <span class="badge text-bg-success fw-medium ms-2 fs-12"></span></h3>
                                </div>
                                
                            </div>
                        </div>
                    </div><!-- end col -->
                     <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <a href="#!" class="text-muted float-end mt-n1 fs-18"><i class="ti ti-external-link"></i></a>
                                <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Pedido/Registro de Consumo</h5>
                                <div class="d-flex align-items-center gap-2 my-3">
                                    <div class="avatar-md flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                                            <i class="ti ti-calendar-week"></i>
                                        </span>
                                    </div>
                                    <h3 class="mb-0 fw-bold">Pedido/Registro de Consumo <span class="badge text-bg-success fw-medium ms-2 fs-12"></span></h3>
                                </div>
                                
                            </div>
                        </div>
                    </div><!-- end col -->
            </div>
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