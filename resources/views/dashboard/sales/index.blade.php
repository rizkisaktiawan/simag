@extends('dashboard.layouts2.main')
@section('container')
    <div id="wrapper">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Sales</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h1 class="h6">Welcome @Sistem Informasi Manajemen PT Agronesia | {{ auth()->user()->name }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
