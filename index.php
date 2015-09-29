<html>

<head>
    <script src="js/jquery.js" charset="utf-8"></script>
    <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" charset="utf-8">

    <link rel="stylesheet" href="css/main.css" charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
    <style media="screen">
    </style>
</head>

<body>
    <script type="text/javascript">

        function reloaddata(){
            $.post("reloaddb.php", function(data) {
                var arraylength = data.header.length;
                $("#todolist").find("option").remove();
                $("#discription").find("option").remove();
                var number = 0;
                var listnumber = 1;
                while (number != arraylength) {
                    $("#todolist").append($("<option>", {
                        value: number,
                        text: data.header[number].todo
                    }));
                    $("#discription").append($("<option>", {
                        value: number,
                        text: data.header[number].discription
                    }));
                    number = number + 1;
                    listnumber = listnumber + 1;
                }
            }, "json");

        }


        $(document).ready(function() {
            //Load data in
            reloaddata();

            //Add button
            $("#add").click(function() {
                var todoadd = $("#addtext").serialize();
                var discriptionadd = $("#adddiscription").serialize();
                $.ajax({
                    url : "addtodo.php",
                    type: "POST",
                    data : {todo:todoadd, discription: discriptionadd},
                    success: function(r) {
                        console.log(r);
                        }
                });
                reloaddata();
            });

            //Delete button
            $("#delete").click(function(){
                var deleteelement = $("#todolist option:selected").text();
                $.ajax({
                    url : "deletetodo.php",
                    type: "POST",
                    data : {todo:deleteelement},
                });
                reloaddata();
            });

            //Reload button
            $("#reload").click(function() {
                reloaddata();
            });
        });
    </script>
    <div class="container-fluid topspace">
    </div>
    <div class="container">
        <form class="" action="delete.php" method="post">
            <div class="row">
                <div class="col-md-4">
                    <label for="">Todo list:</label>
                    <select id="todolist" multiple class="form-control control-big">
                    </select>
                </div>
                <div class="col-md-8">
                    <label for="">Disctiption:</label>
                    <select id="discription" multiple class="form-control control-big">
                    </select>
                </div>
            </div>
            <div class="row topspace">
                <div class="col-md-3">
                    <label for="">Add something:</label>
                    <textarea name="add" id="addtext" rows="8" class="textareaadd"></textarea>
                </div>
                <div class="col-md-3">
                    <label for="">Discription:</label>
                    <textarea name="add" id="adddiscription" rows="8" class="textareaadd"></textarea>
                </div>
                <div class="col-md-1">
                    <button type="button" id="add" class="left button-align-top btn btn-success btn-block" name="name" value="Add">
                        Add</button>
                    <button type="button" id="delete" class="left button-align btn btn-danger btn-block" name="name" value="Delete">Delete</button>
                    <button type="button" id="reload" class="left button-align-top btn btn-default btn-block" name="name" value="Reload">Reload</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
