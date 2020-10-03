@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-between">
            <h1>Dashboard</h1>
            <hr class="col-12">
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">

            <div class="card col-sm">
                <div class="card-body">
                    <h5 class="card-title">Administradores</h5>
                    <p class="card-text">Administración y registro de administradores.</p>
                    <a href="{{ route('admin.admins.list') }}" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class="card col-sm">
                <div class="card-body">
                    <h5 class="card-title">Profesores</h5>
                    <p class="card-text">Administración y registro de profesores.</p>
                    <a href="{{ route('admin.teacher.list') }}" class="btn btn-primary">Entrar</a>
                </div>
            </div>

            <div class="card col-sm">
                <div class="card-body">
                    <h5 class="card-title">Alumnos</h5>
                    <p class="card-text">Administración y registro de alumnos.</p>
                    <a href="{{ route('admin.user.list')  }}" class="btn btn-primary">Entrar</a>
                </div>
            </div>

            <div class="card col-sm">
                <div class="card-body">
                    <h5 class="card-title">Cursos</h5>
                    <p class="card-text">Administración y registro de cursos.</p>
                    <a href="{{ route('admin.course.list') }}" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
