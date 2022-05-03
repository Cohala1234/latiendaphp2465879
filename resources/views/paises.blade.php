<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title>Paises</title>
</head>
<body>
    <center>
        <h1>Paises de la región</h1>
    </center>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th class="text-muted">Pais</th>
                <th class="text-success">Capital</th>
                <th class="text-danger">Moneda</th>
                <th class="text-primary">Población</th>
                <th class="text-light">Ciudades</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paises as $pais => $infopai)
            <tr>
                <td class="text-muted" rowspan = "{{ count($infopai['Ciudades']) }}">
                    {{ $pais }}
                </td>
                <td class="text-success" rowspan = "{{ count($infopai['Ciudades']) }}">
                    {{ $infopai["Capital"] }}
                </td>
                <td class="text-danger" rowspan = "{{ count($infopai['Ciudades']) }}" class="text-danger">
                    {{ $infopai["Moneda"] }}
                </td>
                <td class="text-primary" rowspan = "{{ count($infopai['Ciudades']) }}" class="text-white">
                    {{ $infopai["Población"] }}
                </td>
                @foreach($infopai ["Ciudades"] as $ciudad)
                <th class="table-warning" class="text-danger">
                    {{ $ciudad }}
                </th>
            </tr>
                @endforeach
            @endforeach
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</body>
</html>