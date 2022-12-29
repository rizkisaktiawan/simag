<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/img/agronesia_headLogo.png">
    <title>SIMAG | Dashboard</title>

    <!-- Custom styles for this template -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard2.css') }}">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js" rel="stylesheet"
        type="text/css"> --}}

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.css" rel="stylesheet"> --}}

    {{-- Datatables --}}
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css">

    {{-- TRIX --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">

</head>
<div id="wrapper">
    @include('dashboard.layouts2.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->

        <div id="content">

            {{-- Begin of Topbar --}}
            @include('dashboard.layouts2.header')
            {{-- End of Topbar --}}

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                                <form action="/logout" method="post">
                                    @csrf
                                    {{-- <a type="submit" class="btn btn-danger" href="#">Logout</a> --}}
                                    <button type="submit" class="btn btn-danger">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('container')
            </div>
        </div>

        @include('dashboard.layouts2.footer')
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/jquery.easing.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/dashboard2.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/chart.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/chart-area.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/chart-pie.js') }}"></script>

{{-- Datatables --}}
<script type="text/javascript" src="{{ asset('js/datatables.js') }}"></script>
<script type="text/javascript" src="{{ asset('https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js') }}">
</script>

{{-- TRIX --}}
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

<script>
    function previewimage_before() {
        const image_before = document.querySelector('#image_before');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image_before.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    function previewimage_after() {
        const image_after = document.querySelector('#image_after');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image_after.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

<script>
    //Get the button
    let mybutton = document.getElementById("btn-back-to-top");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    // When the user clicks on the button, scroll to the top of the document
    mybutton.addEventListener("click", backToTop);

    function backToTop() {
        // document.body.scrollTop = 0;
        // document.documentElement.scrollTop = 0;
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    $(document).ready(function() {
        $('#datatablesPost').DataTable();
    });
    $(document).ready(function() {
        $('#datatablesCategory').DataTable();
    });
    $(document).ready(function() {
        $('#datatablesUser').DataTable();
    });
    $(document).ready(function() {
        $('#datatablesEmployee').DataTable();
    });
    $(document).ready(function() {
        $('#datatablesStatus').DataTable();
    });
    $(document).ready(function() {
        $('#datatablesDivision').DataTable();
    });
    $(document).ready(function() {
        $('#datatablesIT').DataTable();
    });
    $(document).ready(function() {
        $('#datatablesITCategory').DataTable();
    });
</script>

</html>
