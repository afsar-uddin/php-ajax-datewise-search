<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax search php | Mysql</title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.7/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/datatables.min.css" rel="stylesheet">
 


</head>
<body>
    <h1>PHP, Datatable Package Use</h1>
    <table class="table" id="records">
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

    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.7/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/datatables.min.js"></script>

    <!-- momentjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

"></script>

    <script>
        /** datepicker */
        $(function() {
            $('#start_date').datepicker({
                "dateFormat" : "dd-mm-yy"
            });
            $('#end_date').datepicker({
                "dateFormat" : "dd-mm-yy"
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
                    // datatable
                    // console.log(data);

                    var i = "1";
                    new DataTable('#records', {
                        // $('#records').DataTable({
                        //     "data":data,
                        //     columns: [
                        //     {
                        //         "data": "id" 
                        //     },
                        //     { data: 'name' },
                        //     { data: 'standard' },
                        //     { data: 'percentage' },
                        //     { data: 'result' },
                        //     { data: 'created_at' }
                        // ],
                        // })
                        // ajax: 'records.php',
                        "data":data,
                        columns: [
                            {
                                "data": "id" ,
                                render: function(data, type, row, meta) {
                                    return i++  
                                }
                            },
                            { data: 'name' },
                            { 
                                data: 'standard',
                                render: function(data, type, row, meta) {
                                    return `${row.standard}th Standard`  
                                }
                            },
                            { 
                                data: 'percentage',
                                render: function(data, type, row, meta) {
                                    return `${row.percentage}%`  
                                }
                            },
                            { data: 'result' },
                            { 
                                data: 'created_at',
                                // render: function(data, type, row, meta) {
                                //     return moment(row.created_at).format("");  
                                // }
                            }

                            

                        ],
                        // processing: true
                    });
                }
            })
        }
        fetch();

    </script>
</body>
</html>