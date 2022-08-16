<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>

    <div class="mx-auto my-4" style="max-width: 800px;">
        <table class="table table-sm table-striped">
            <thead class="bg-primary text-light">
                <tr>
                    <th>SL</th>
                    <th>Lat</th>
                    <th>Long</th>
                    <th class="text-end">Height</th>
                    <th class="text-end">Api Height</th>
                    <th class="text-end">Difference</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    @php
                        $lat = $item->lat;
                        $long = $item->long;
                        $height = $item->height;
                        $apiHeight = rand(10, 500);
                        $difference = $height - $apiHeight;
                        $difference2 = $difference < 0 ? $difference * -1 : $difference;
                    @endphp
                    <tr>
                        <td>{{ $item->sl }}</td>
                        <td>{{ $lat }}</td>
                        <td>{{ $long }}</td>
                        <td class="text-end">{{ $height }}</td>
                        <td class="text-end">{{ $apiHeight }}</td>
                        <td class="text-end">{{ $difference }}</td>
                        <td class="text-end">
                            @if ($difference2 > 3)
                                <span class="badge  bg-warning text-dark">Invalid</span>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        @if ($page != 0)
            {!! $items->links() !!}
        @endif
    </div>

</body>

</html>
