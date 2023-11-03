<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax search php | Mysql</title>
</head>
<body>
    <h1>PHP, Ajax Search</h1>
    <div class="header">
        <div class="search-col">
            <div class="searchbydate">
                <input type="text" id="start_date" placeholder="select date"/>
                <input type="text" id="end_date" placeholder="select date"/>
            </div>
            <div class="action-btn">
                <button id="filter">Filter</button>
                <button id="reset">Reset</button>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Standard</th>
                <th>Percentage</th>
                <th>Result</th>
                <th>Date</th>
            </tr>
        </thead>
    </table>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js



"></script>

    <script>
        /** datepicker */
        $(function() {
            $('#start_date').datepicker({
                "dateFormat" : "yy-mm-dd"
            });
            $('#end_date').datepicker({
                "dateFormat" : "yy-mm-dd"
            });
        });

        /** Ajax functionality */
        function fetch(start_date, end_date) {
            $.ajax({
                url: "records.php",
                type: "POST",
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                }
            })
        }
        fetch();

    </script>
</body>
</html>