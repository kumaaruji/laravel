<!DOCTYPE html>
<html>lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datatable example by Nitin kumar</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.css')}}"/>
    <script type="text/javascript" src={{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script type="text/javascript" src={{asset('js/jquery.dataTables.js')}}"></script>
</head>""
<body>

<div>
    <h3>Laravel Nitin Crud </h3>
    <table id="datatable" class="display">
        <thead>
            <tr align="left">
            <th>ID</th>
            <th data-sortable="true">Name</th>
            <th data-sortable="true">Email</th>
            <th data-sortable="true">Phone</th>
            <th data-sortable="False">Created at</th>
</tr>   
</thead>
<tbody></tbody>
</table>
</div>
</body>

<script>
$(document).ready(function(){
$('#datatable').datatable({
processing: true,
serverside: true,
order:[[0,"desc"]],
ajax: "{{url ("user-data")}}",
column:[
    (data: 'id'),
    (data:'name'),
    (data:'email'),
    (data:'phone'),
    (data:'created_at')
    ]
});
});
</script>
</html>
