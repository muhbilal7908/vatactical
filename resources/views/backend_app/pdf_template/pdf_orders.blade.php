

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <style>
   table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    border: 1px solid #ddd;
}

/* CSS for Table Header */
th {
    background-color: #f2f2f2;
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

/* CSS for Table Cells */
td {
    border: 1px solid #ddd;
    padding: 8px;
}

/* CSS for Alternate Row Colors */
tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* CSS for Hover Effect */
tr:hover {
    background-color: #ddd;
}
  </style>
  <body>
    <h1 >Vatactical</h1>
    <h2 style="text-align: center">All Orders</h2>
    <table class="table" style="font-size: 13px;">
        <thead>
            <tr>
                <th>ORDER-ID</th>
                <th>ORDER Date</th>
                <th>Customer</th>
                <th>Email</th>
                <th>Phone no</th>
                <th>Status</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key=>$item)
            <tr>
                <td>{{$item->id}}</td>
                <td><span class="d-block">{{$item->created_at->format('j M Y')}}</span>
                    <span class="d-block">{{$item->created_at->format('h:i A')}}</span>
                </td>
                <td><span class="d-block fw-bold">{{$item->first_name}}</span>

                </td>
                <td> <span class="d-block"><i data-feather="phone"></i> {{$item->email}}</span></td>
                <td> <span class="d-block"><i data-feather="phone"></i> {{$item->phone_no}}</span></td>
                <td><span>{{$item->delivery_status}}</span></td>
                <td>
                  ${{$item->total}}

                </td>





            </tr>
            @endforeach



        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
