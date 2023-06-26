@extends('layouts.panel')

@section('content')

          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Nuevo pacientes</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('/pacientes') }}" class="btn btn-sm btn-success">Regresar</a>
                  <i class="fas fa-chevron-left"></i> 
                </div>
              </div>
            </div>
            
            <div class="card-body">

              @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                      <i class="fas fa-exclamation-triangle"></i>
                      <strong>Por favor!!</strong> {{ $error }}
                    </div>                  
                @endforeach
              @endif

                <form action="{{ url('/pacientes') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre del paciente</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="cedula">Cédula</label>
                        <input type="text" name="cedula" class="form-control" value="{{ old('cedula') }}">
                    </div>                    
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono / Móvil</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Crear pacinte</button>
                </form>
            </div>

          </div>
       
@endsection
