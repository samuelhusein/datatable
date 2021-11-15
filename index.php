<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datatable</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div id="filter_div" style="padding-bottom:50px;">
    <h4>Filter Usia</h4>
        <select name="filter" id="filter" class="form-select" aria-label="Default select example">
            <option value="0">All</option>
            <option value="30">30</option>
            <option value="20">20</option>
        </select>
    </div>
    <div>
        <table id="data_container" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Pekerjaan</th>
                    <th>Usia</th>
                </tr>
            </thead>
            <tbody id="data">

            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(()=>{
            var usia = 0;
            dataProcessing(usia);
        })


        function dataProcessing(obj){
            $.ajax({
                url:'middleware.php',
                dataType:'json',
                type:'post',
                data:{callFunction:'getData',param : obj},
                success: function(data){
                    var html='';

                    for (let i = 0; i < data.length; i++) {
                        html += '<tr>'
                        +'<td>'+ (i+1) + '</td>'
                        +'<td>'+ data[i]['nama'] + '</td>'
                        +'<td>'+ data[i]['jenis_kelamin']+'</td>'
                        +'<td>'+ data[i]['pekerjaan']+'</td>'
                        +'<td>'+ data[i]['usia']+'</td>'
                    }
                    
                    $('#data').html(html);
                    $('#data_container').DataTable();
                }
            })
        }

        $('#filter').on('change', function(){
            dataProcessing(this.value);
        })
    </script>
    
</body>
</html>