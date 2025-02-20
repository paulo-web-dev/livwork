@include('clientes.layouts.head')
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
     
        <div class="page-content">

            <!-- Start Content-->
            <div class="container-fluid">

                
                <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold mb-0">Reservar Sala</h4>
                    </div>

                 
                </div>
                

                


                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                @foreach ($unidades as $unidade )
                    @foreach ($unidade->salas as $sala )
                           <div class="col-xl-4 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap gap-2 align-items-center">
                                    <div class="avatar-xl bg-light d-flex align-items-center justify-content-center rounded-circle flex-shrink-0">
                                        <img src="{{ url('fotos/salas/'.$sala->fotos[0]->path) }}" alt="" class="avatar-lg flex-shrink-0">
                                    </div>
                                    <div>
                                        <h4 class="text-dark fw-semibold">{{$unidade->nome}} - {{$sala->nome}}</h4>
                                        <div class="flex-grow-1 d-inline-flex align-items-center fs-18">
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-half-filled text-warning"></span>
                                            <span class="ms-1 fs-14 fw-medium">5</span>
                                        </div>
                                    </div>
                                    <div class="ms-lg-auto">
                                        <a href="{{route('cliente-VerSala', ['id' => $sala->id])}}" class="btn btn-primary btn-sm">Reservar</a>
                                    </div>
                                </div>
                                <p class="my-3 fw-medium">{{$unidade->nome}}</p>
                                <p class="mb-1 fw-medium  d-flex align-items-center gap-2"><iconify-icon icon="solar:map-point-search-bold" class="fs-20 text-danger"></iconify-icon> : <span class="fw-medium">{{$unidade->rua}}, {{$unidade->numero}}, {{$unidade->bairro}} - {{$unidade->cidade}} - {{$unidade->uf}}  </span></p>
                                
                                <div class="border border-end-0 border-start-0 border-dashed p-2 mx-n3">
                                    <div class="row text-center g-2">
                                    @foreach ($sala->facilidades as $facilidade )
                                        <div class="col-lg-4 col-4 border-end">
                                            <h4 class="mb-1">✅</h4>
                                            <p class="text-muted mb-0">{{$facilidade->facilidade}}</p>
                                        </div>
                                    @endforeach
                                        
                                       
                                    
                                    </div>
                                </div>
                                <div class="row align-items-center justify-content my-4 text-center">
                                    
                                        <h3 class="mb-1 fw-semibold">R${{$sala->valor}}</h3>
                                        <p class="text-muted mb-0 fs-14">Por Hora</p>
                                   
                                </div>
                                <div class="gap-1 hstack">
                                    <a href="{{route('cliente-VerSala', ['id' => $sala->id])}}"  class="btn btn-primary w-100">Reservar</a>
                                    <a href="{{route('cliente-VerSala', ['id' => $sala->id])}}"  class="btn btn-light w-100">Saiba Mais!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    @endforeach
                @endforeach
                 
                
                                </div>


                <div class="d-flex justify-content-end">
                    <ul class="pagination justify-content-center">
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
                </div>

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