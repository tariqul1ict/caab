@extends('layouts.app')

@section('template_title')
    Caab
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mx-auto" style="max-width: 800px;">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Caab') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('caabs.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Lat</th>
                                        <th>Long</th>
                                        <th>Height</th>
                                        <th>Airport</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($caabs as $caab)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $caab->lat }}</td>
                                            <td>{{ $caab->long }}</td>
                                            <td>{{ $caab->height }}</td>
                                            <td>{{ $caab->airport }}</td>

                                            <td class="text-end">
                                                <form action="{{ route('caabs.destroy', $caab->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('caabs.show', $caab->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('caabs.edit', $caab->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $caabs->links() !!}
            </div>
        </div>
    </div>
@endsection
