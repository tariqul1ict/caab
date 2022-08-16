@extends('layouts.app')

@section('template_title')
    {{ $caab->name ?? 'Show Caab' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Caab</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('caabs.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Sl:</strong>
                            {{ $caab->sl }}
                        </div>
                        <div class="form-group">
                            <strong>Lat:</strong>
                            {{ $caab->lat }}
                        </div>
                        <div class="form-group">
                            <strong>Long:</strong>
                            {{ $caab->long }}
                        </div>
                        <div class="form-group">
                            <strong>Height:</strong>
                            {{ $caab->height }}
                        </div>
                        <div class="form-group">
                            <strong>Airport:</strong>
                            {{ $caab->airport }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
