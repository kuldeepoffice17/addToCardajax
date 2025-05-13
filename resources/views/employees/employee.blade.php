<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>aja</title>
</head>

<body>
    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id="header">
                <h4>AKddj</h4>
            </td>
        </tr> 
        <tr>
            <td id="tableload">
            <input type="button" id="loadbutton" value="loaddata">
            </td>
        </tr>
        <tr>
            <td id="tabeldata">
                <table border="1" width="100%" cellspacing="0" cellpading="10px">

                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Emial</th>
                        <th>Address</th>
                    </tr>
                    <tr>
                        <td align="center">1</td>
                        <td>demo</td>
                        <td>demo@gmail.com</td>
                        <td>demoadress</td>
                    </tr>
                </table>

            </td>
        </tr>

    </table>
<script src="js/jquery.js"></script>
<script>
    $(document).ready(function(){
        $('#loadbutton').on("click",function(e){
            $.ajax({
                url :"ajaxemplyee.blade.php",
                type: "POST",
                success: function(data){
                    $("#tabeldata").html(data);
                }    
            })
        })
    })
</script>
</body>
</html>