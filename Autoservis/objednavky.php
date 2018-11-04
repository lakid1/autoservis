<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Objednávky</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="dashboard.html"><span><i class="fa fa-home"></i></span> DashBoard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Historie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="auta.php">Auta</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="provozovatele.php">Provozovatelé</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="display-4">Probíhající servis</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Datum</th>
                            <th>Provozovatel</th>
                            <th>Auto</th>
                            <th>Stav</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <button id="add" class="btn btn-danger"><span><i class="fas fa-plus-circle"></i></span> Přidat záznamy
                    k zásahu</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModal">Přídání zásahů</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="datum">Datum: </label>
                                        <input type="date" class="form-control" id="datum" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="selectType">Typ zásahu</label>
                                        <select class="form-control" id="selectType">
                                         <?php
                                             include 'db_connect.php';
                                             $query = "SELECT * FROM typ_zasahu;";
                                             $result = $conn->query($query);
                                             while($row = $result->fetch_array(MYSQLI_ASSOC))
                                             {
                                                 echo "<option value=" . $row['cena'] . ">" . $row['nazev'] . "</option>";
                                                 
                                             }
                                             
                                         ?>
                                        </select>
                                    </div>
                                    <div id="cenaB" class="form-group">
                                        <label for="cena">Cena: </label>
                                        <input type="text" class="form-control" name="cena" id="cena">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Popis: </label>
                                        <textarea class="form-control" name="popis" id="popis" cols="30" rows="5"></textarea>
                                    </div>
                                    <button style="display:none;" type="submit" class="btn btn-primary">Přidat</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavřít</button>
                    <button id="ok" type="button" class="btn btn-primary">Přidat</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal -->



    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function () {

            $('#selectType').click(function () {
                var cena = $('#selectType option:selected').val()
               $('#cena').val(cena);
            });

            $('#myTable tbody').on('click', 'tr', function () {

                if ($(this).hasClass('selected')) {

                    $(this).removeClass('selected');

                }
                else {
                    var tr = table.$('tr').closest('tr');
                    var row = table.row(tr);
                    if (row.data().datum != "Empty Table") {
                        table.$('tr.selected').removeClass('selected');
                        $(this).addClass('selected');
                    }



                }

            });

            $('#add').click(function () {
                 if ( $('#myTable tbody tr').hasClass('selected')) {
                $('#myModal').modal('show');
                var tr = table.$('tr.selected').closest('tr');
                var row = table.row(tr);
                //alert(row.data().provozovatel);
                
                }
            });

            var table = $('#myTable').DataTable({
                "ajax": "db_select_objednavky.php",
                "columns": [

                    { "data": "datum" },
                    { "data": "provozovatel" },
                    { "data": "auto" },
                    { "data": "stav" },

                ],
                "language": {
                    "decimal": "",
                    "emptyTable": "Žádná data",
                    "info": "Zobrazeno _START_ z _END_ z _TOTAL_ záznamů",
                    "infoEmpty": "Zobrazeno 0 z 0 z 0 záznamů",
                    "infoFiltered": "(filtered from _MAX_ total entries)",
                    "infoPostFix": "",
                    "thousands": ".",
                    "lengthMenu": "Zobrazit _MENU_ záznamů",
                    "loadingRecords": "Načítání...",
                    "search": "Vyhledat:",
                    "zeroRecords": "Žádná shoda",
                    "paginate": {
                        "first": "První",
                        "last": "Poslední",
                        "next": "Následující",
                        "previous": "Předchozí"
                    },
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                }
            });

        });
    </script>
</body>

</html>