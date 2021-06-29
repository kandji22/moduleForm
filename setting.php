<?php




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="http://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-6 m-4 offset-3">
            <table id="example1" class="stripe">
                <thead>
                </thead>
            </table>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        //body html formulaire en string et nom formulaire
        var setting = "setting";
        //ajax method post
        $('#example1').DataTable({
            ajax: {
                type: "post",
                url: "http://localhost:8888/Controleur/ajax.php",
                data: function() {
                    return {
                        setting: setting
                    };
                }

            },
            columns: [

                {
                    data: "nom",
                    title: "name",
                    width: "400px"
                },
                {
                    data: "id",
                    width: "20px",
                    title: "Action",
                    render: function(data) {
                        var actions = '';

                        //Action Delete
                        var delet = '<a class="p-2" href="#" onclick="deleteRow(' + data + ')">&#x274C;</a>'
                        actions = actions.concat(delet);

                        //action enable
                        var enable = '<input type="radio" name="form" onclick="enableForm(' + data + ')">'
                        actions = actions.concat(enable);

                        return actions;

                    }
                },
            ],
            order: [
                [0, "asc"]
            ],
            pageLength: 25,
            select: true

        })

        //fonction de suppression formulaire
        function deleteRow(id) {
            if (id) {
                console.log(id)
            }
            return
        }
    </script>

</body>

</html>