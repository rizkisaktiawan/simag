@extends('dashboard.layouts2.main')
@section('container')
    <div id="wrapper">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h3 class="h3 mb-0 text-gray-800">Dashboard's</h3>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- START CARD --}}
                    <div class="row row-cols-1 row-cols-md-4 g-4">

                        <div class="col">
                            <div class="card">
                                <img src="/img/01.agnes.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Karyawan Agronesia</h5>
                                    <p class="card-text">Total Report Karyawan Agronesia</p>

                                    {{-- Trigger --}}
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#reportKaryawanAgronesia">
                                        Lihat Report
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="reportKaryawanAgronesia" tabindex="-1"
                                        aria-labelledby="reportKaryawanAgronesia" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title fs-5" id="reportKaryawanAgronesia">Report
                                                        Karyawan
                                                        Agronesia
                                                        Pusat</h3>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">X</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <canvas id="chartKaryawanAgronesia"></canvas>
                                                    <table class="table">
                                                        <thead>
                                                            <div class="alert alert-info" role="alert">
                                                                <h5>Detail Report Karyawan Agronesia </h5>
                                                            </div>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Red</th>
                                                                <th scope="col">Blue</th>
                                                                <th scope="col">Yellow</th>
                                                                <th scope="col">Green</th>
                                                                <th scope="col">Purple</th>
                                                                <th scope="col">Orange</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>12</td>
                                                                <td>19</td>
                                                                <td>3</td>
                                                                <td>5</td>
                                                                <td>19</td>
                                                                <td>3</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p>
                                                        Ipsum "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                                                        amet,
                                                        consectetur,
                                                        adipisci velit..." "There is no one who loves pain itself, who seeks
                                                        after
                                                        it and
                                                        wants to have it, simply because it is pain..." Lorem ipsum dolor
                                                        sit
                                                        amet,
                                                        consectetur adipiscing elit. Vestibulum elementum, lorem eu
                                                        vulputate
                                                        ullamcorper,
                                                        mauris mauris facilisis neque, in eleifend lorem nisi sit amet
                                                        tortor.
                                                        Nulla
                                                        sed
                                                        justo et ante bibendum aliquet quis sit amet quam. In rhoncus
                                                        malesuada
                                                        quam
                                                        faucibus congue. Etiam eget tempus velit, ac tempor leo. Aliquam
                                                        justo
                                                        mauris,
                                                        luctus a ex at, porttitor cursus ipsum. Quisque malesuada erat
                                                        sollicitudin
                                                        lobortis
                                                        maximus. Quisque dictum, nisl et dictum sodales, nisl libero
                                                        pulvinar
                                                        purus,
                                                        non
                                                        semper nunc enim eget ex.

                                                        Sed vitae vulputate turpis. Aliquam semper velit odio, id
                                                        scelerisque
                                                        eros
                                                        placerat
                                                        vel. Vivamus mollis laoreet orci, eu hendrerit nibh pretium eu.
                                                        Aenean a
                                                        sagittis
                                                        diam. Cras sapien odio, semper in velit sed, tempor luctus lorem.
                                                        Pellentesque
                                                        porttitor justo ac luctus facilisis. Praesent augue magna, pharetra
                                                        quis
                                                        velit id,
                                                        gravida hendrerit nunc. Vivamus condimentum eu eros sit amet
                                                        sodales.
                                                        Praesent
                                                        sodales tortor quis neque fermentum, a feugiat arcu laoreet. Nullam
                                                        vestibulum
                                                        dapibus suscipit. Suspendisse potenti. Etiam et velit consectetur,
                                                        commodo
                                                        erat ac,
                                                        ultrices nibh. Aenean et arcu sapien. Aenean at ligula vitae odio
                                                        tincidunt
                                                        luctus.
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Close</button>
                                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <img src="/img/02.ikb.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Karyawan Inkaba</h5>
                                    <p class="card-text">Total Report Karyawan Inkaba</p>

                                    {{-- Trigger --}}
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#reportKaryawanInkaba">
                                        Lihat Report
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="reportKaryawanInkaba" tabindex="-1"
                                        aria-labelledby="reportKaryawanInkabaLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title fs-5" id="reportKaryawanInkabaLabel">Report
                                                        Karyawan
                                                        Inkaba
                                                    </h3>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">X</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <canvas id="chartKaryawanInkaba"></canvas>
                                                    <table class="table">
                                                        <thead>
                                                            <div class="alert alert-info" role="alert">
                                                                <h5>Detail Report Karyawan Inkaba</h5>
                                                            </div>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Red</th>
                                                                <th scope="col">Blue</th>
                                                                <th scope="col">Yellow</th>
                                                                <th scope="col">Green</th>
                                                                <th scope="col">Purple</th>
                                                                <th scope="col">Orange</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>12</td>
                                                                <td>19</td>
                                                                <td>3</td>
                                                                <td>5</td>
                                                                <td>19</td>
                                                                <td>3</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p>
                                                        Ipsum "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                                                        amet,
                                                        consectetur,
                                                        adipisci velit..." "There is no one who loves pain itself, who seeks
                                                        after
                                                        it and
                                                        wants to have it, simply because it is pain..." Lorem ipsum dolor
                                                        sit
                                                        amet,
                                                        consectetur adipiscing elit. Vestibulum elementum, lorem eu
                                                        vulputate
                                                        ullamcorper,
                                                        mauris mauris facilisis neque, in eleifend lorem nisi sit amet
                                                        tortor.
                                                        Nulla
                                                        sed
                                                        justo et ante bibendum aliquet quis sit amet quam. In rhoncus
                                                        malesuada
                                                        quam
                                                        faucibus congue. Etiam eget tempus velit, ac tempor leo. Aliquam
                                                        justo
                                                        mauris,
                                                        luctus a ex at, porttitor cursus ipsum. Quisque malesuada erat
                                                        sollicitudin
                                                        lobortis
                                                        maximus. Quisque dictum, nisl et dictum sodales, nisl libero
                                                        pulvinar
                                                        purus,
                                                        non
                                                        semper nunc enim eget ex.

                                                        Sed vitae vulputate turpis. Aliquam semper velit odio, id
                                                        scelerisque
                                                        eros
                                                        placerat
                                                        vel. Vivamus mollis laoreet orci, eu hendrerit nibh pretium eu.
                                                        Aenean a
                                                        sagittis
                                                        diam. Cras sapien odio, semper in velit sed, tempor luctus lorem.
                                                        Pellentesque
                                                        porttitor justo ac luctus facilisis. Praesent augue magna, pharetra
                                                        quis
                                                        velit id,
                                                        gravida hendrerit nunc. Vivamus condimentum eu eros sit amet
                                                        sodales.
                                                        Praesent
                                                        sodales tortor quis neque fermentum, a feugiat arcu laoreet. Nullam
                                                        vestibulum
                                                        dapibus suscipit. Suspendisse potenti. Etiam et velit consectetur,
                                                        commodo
                                                        erat ac,
                                                        ultrices nibh. Aenean et arcu sapien. Aenean at ligula vitae odio
                                                        tincidunt
                                                        luctus.
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Close</button>
                                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <img src="/img/03.bmc.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Karyawan BMC</h5>
                                    <p class="card-text">Total Report Karyawan BMC</p>
                                    {{-- Trigger --}}
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#reportKaryawanBMC">
                                        Lihat Report
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="reportKaryawanBMC" tabindex="-1"
                                        aria-labelledby="reportKaryawanBMC" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title fs-5" id="ReportKaryawanBMC">Report Karyawan
                                                        BMC
                                                    </h3>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">X</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <canvas id="chartKaryawanBMC"></canvas>
                                                    <table class="table">
                                                        <thead>
                                                            <div class="alert alert-info" role="alert">
                                                                <h5>Detail Report Karyawan BMC</h5>
                                                            </div>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Red</th>
                                                                <th scope="col">Blue</th>
                                                                <th scope="col">Yellow</th>
                                                                <th scope="col">Green</th>
                                                                <th scope="col">Purple</th>
                                                                <th scope="col">Orange</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>12</td>
                                                                <td>19</td>
                                                                <td>3</td>
                                                                <td>5</td>
                                                                <td>19</td>
                                                                <td>3</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p>
                                                        Ipsum "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                                                        amet,
                                                        consectetur,
                                                        adipisci velit..." "There is no one who loves pain itself, who seeks
                                                        after
                                                        it and
                                                        wants to have it, simply because it is pain..." Lorem ipsum dolor
                                                        sit
                                                        amet,
                                                        consectetur adipiscing elit. Vestibulum elementum, lorem eu
                                                        vulputate
                                                        ullamcorper,
                                                        mauris mauris facilisis neque, in eleifend lorem nisi sit amet
                                                        tortor.
                                                        Nulla
                                                        sed
                                                        justo et ante bibendum aliquet quis sit amet quam. In rhoncus
                                                        malesuada
                                                        quam
                                                        faucibus congue. Etiam eget tempus velit, ac tempor leo. Aliquam
                                                        justo
                                                        mauris,
                                                        luctus a ex at, porttitor cursus ipsum. Quisque malesuada erat
                                                        sollicitudin
                                                        lobortis
                                                        maximus. Quisque dictum, nisl et dictum sodales, nisl libero
                                                        pulvinar
                                                        purus,
                                                        non
                                                        semper nunc enim eget ex.

                                                        Sed vitae vulputate turpis. Aliquam semper velit odio, id
                                                        scelerisque
                                                        eros
                                                        placerat
                                                        vel. Vivamus mollis laoreet orci, eu hendrerit nibh pretium eu.
                                                        Aenean a
                                                        sagittis
                                                        diam. Cras sapien odio, semper in velit sed, tempor luctus lorem.
                                                        Pellentesque
                                                        porttitor justo ac luctus facilisis. Praesent augue magna, pharetra
                                                        quis
                                                        velit id,
                                                        gravida hendrerit nunc. Vivamus condimentum eu eros sit amet
                                                        sodales.
                                                        Praesent
                                                        sodales tortor quis neque fermentum, a feugiat arcu laoreet. Nullam
                                                        vestibulum
                                                        dapibus suscipit. Suspendisse potenti. Etiam et velit consectetur,
                                                        commodo
                                                        erat ac,
                                                        ultrices nibh. Aenean et arcu sapien. Aenean at ligula vitae odio
                                                        tincidunt
                                                        luctus.
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Close</button>
                                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <img src="/img/04.spbdg.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Karyawan Saripetojo</h5>
                                    <p class="card-text">Total Report Karyawan Saripetojo</p>
                                    {{-- Trigger --}}
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#reportKaryawanSaripetojo">
                                        Lihat Report
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="reportKaryawanSaripetojo" tabindex="-1"
                                        aria-labelledby="reportKaryawanSaripetojo" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title fs-5" id="reportKaryawanSaripetojo">Report
                                                        Karyawan
                                                        Saripetojo
                                                    </h3>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">X</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <canvas id="chartKaryawanSaripetojo"></canvas>
                                                    <table class="table">
                                                        <thead>
                                                            <div class="alert alert-info" role="alert">
                                                                <h5>Detail Report Karyawan Saripetojo</h5>
                                                            </div>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Red</th>
                                                                <th scope="col">Blue</th>
                                                                <th scope="col">Yellow</th>
                                                                <th scope="col">Green</th>
                                                                <th scope="col">Purple</th>
                                                                <th scope="col">Orange</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>12</td>
                                                                <td>19</td>
                                                                <td>3</td>
                                                                <td>5</td>
                                                                <td>19</td>
                                                                <td>3</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p>
                                                        Ipsum "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                                                        amet,
                                                        consectetur,
                                                        adipisci velit..." "There is no one who loves pain itself, who seeks
                                                        after
                                                        it and
                                                        wants to have it, simply because it is pain..." Lorem ipsum dolor
                                                        sit
                                                        amet,
                                                        consectetur adipiscing elit. Vestibulum elementum, lorem eu
                                                        vulputate
                                                        ullamcorper,
                                                        mauris mauris facilisis neque, in eleifend lorem nisi sit amet
                                                        tortor.
                                                        Nulla
                                                        sed
                                                        justo et ante bibendum aliquet quis sit amet quam. In rhoncus
                                                        malesuada
                                                        quam
                                                        faucibus congue. Etiam eget tempus velit, ac tempor leo. Aliquam
                                                        justo
                                                        mauris,
                                                        luctus a ex at, porttitor cursus ipsum. Quisque malesuada erat
                                                        sollicitudin
                                                        lobortis
                                                        maximus. Quisque dictum, nisl et dictum sodales, nisl libero
                                                        pulvinar
                                                        purus,
                                                        non
                                                        semper nunc enim eget ex.

                                                        Sed vitae vulputate turpis. Aliquam semper velit odio, id
                                                        scelerisque
                                                        eros
                                                        placerat
                                                        vel. Vivamus mollis laoreet orci, eu hendrerit nibh pretium eu.
                                                        Aenean a
                                                        sagittis
                                                        diam. Cras sapien odio, semper in velit sed, tempor luctus lorem.
                                                        Pellentesque
                                                        porttitor justo ac luctus facilisis. Praesent augue magna, pharetra
                                                        quis
                                                        velit id,
                                                        gravida hendrerit nunc. Vivamus condimentum eu eros sit amet
                                                        sodales.
                                                        Praesent
                                                        sodales tortor quis neque fermentum, a feugiat arcu laoreet. Nullam
                                                        vestibulum
                                                        dapibus suscipit. Suspendisse potenti. Etiam et velit consectetur,
                                                        commodo
                                                        erat ac,
                                                        ultrices nibh. Aenean et arcu sapien. Aenean at ligula vitae odio
                                                        tincidunt
                                                        luctus.
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Close</button>
                                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- END CARD --}}
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-floating btn-lg" id="btn-back-to-top">
                <i class="fas fa-arrow-up"></i>
            </button>
        </div>
    </div>
@endsection
