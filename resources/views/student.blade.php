<!DOCTYPE html>
<html>
<head>
    <title>Laravel AJAX CRUD</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h2>Add Stduent</h2>
<input type="text" name="name" id="name" placeholder="Student Name">
<input type="text"  name="email" id="email" placeholder="Student Email">
<button id="addStduentBtn"> Add</button>


<h2>Stduent List</h2>
<table border="1" id="stduentTable">
    <thead>
        <tr>
            <th>Name</th>
        
            <th>Email</th>
        
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>    

</table>

<script>
    fetchUser();

    function fetchUser(){
        $.get('/fetch-user',function(data){
            let rows = '';
            data.forEach(function(student){
rows += `<tr>
            <td>${student.name}</td>
            <td>${student.email}</td>
            <td><button onclick="deleteStudent(${student.id})">Delete</button></td>
         </tr>`;
            });
            $('#stduentTable tbody').html(row);
        });
    }


    $('#addStduentBtn').click(function(){
        const name = $('#name').val();
        cons email =$('#email').val();


        $.ajax({
            url: 'addadd-user',
            method: 'POST',
            data:{name,email},
            headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
            success:function(res){
                alert(res.status);
                fetchUser();
                $('#name').val('');
                $('#email').val('');
            }
        })
    });


    function deleteStudent(id)
</script>

</body>
</html>