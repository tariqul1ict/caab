@extends('layouts.app')

@section('template_title')
    Create Caab
@endsection

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush

@section('content')
    @php
    function apiHeight($lat, $long)
    {
        $url = sprintf('http://202.84.43.10:8034/api/heightcheck/?Latitude=%s&Longitude=%s', $lat, $long);
        $response = Illuminate\Support\Facades\Http::get($url)->json();
        return $response;
    }
    $totalInvalid = 0;
    $airportInvalid = 0;
    @endphp
    <div class="mx-auto my-4" style="max-width: 800px;">
        <table @if ($page == 0) id="dtable" @endif class="table table-sm table-striped">
            <thead class="bg-primary text-light">
                <tr>
                    <th>Sl</th>
                    <th>Lat</th>
                    <th>Long</th>
                    <th class="text-end">Height</th>
                    <th class="text-end" width="200">Api Height</th>
                    <th class="text-end">Difference</th>
                    <th>Status</th>
                    <th>
                        Airport
                    </th>
                    <th>
                        Remark
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    @php
                        $lat = number_format((float) $item->lat, 2, '.', '');
                        $long = number_format((float) $item->long, 2, '.', '');
                        $height = $item->height;
                        $apiData = apiHeight($lat, $long);
                        $airport = @$apiData['airport'];
                        $apiHeight = @$apiData['land_height'];
                        $difference = $height - $apiHeight;
                        $difference2 = $difference < 0 ? $difference * -1 : $difference;
                    @endphp
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $lat }}</td>
                        <td>{{ $long }}</td>
                        <td class="text-end">{{ $height }}</td>
                        <td class="text-end">{{ $apiHeight }}</td>
                        <td class="text-end">{{ round($difference, 2) }}</td>
                        <td class="text-end">
                            @if ($difference2 > 3)
                                <span class="badge  bg-warning text-dark">Invalid</span>
                                @php
                                    $totalInvalid++;
                                @endphp
                            @endif

                        </td>
                        <td>
                            @if ($airport == '')
                                <div>
                                    <span class="badge  bg-danger text-light">Ouside of OLS</span>
                                    @php
                                        $airportInvalid++;
                                    @endphp
                                </div>
                            @endif
                        </td>
                        <td>
                            {{-- <a target="_blank" class="btn btn-sm btn-success" href="{{ route('caabs.edit', $item->id) }}"><i
                                    class="fa fa-fw fa-edit"></i> Edit</a> --}}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        @if ($page != 0)
            {!! $items->links() !!}
        @endif
        <div>
            <br>
            <table>
                <tr>
                    <th width="180">Total Invalid </th>
                    <td width="20">:</td>
                    <td> {{ $totalInvalid }}</td>
                </tr>
                <tr>
                    <th>Total Airport Invalid </th>
                    <td>:</td>
                    <td> {{ $airportInvalid }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection


@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dtable').DataTable({
                "lengthMenu": [
                    [10, 25, 50, 100, 250, 500, -1],
                    [10, 25, 50, 100, 250, 500, "All"]
                ],
            });
        });
    </script>
@endpush
