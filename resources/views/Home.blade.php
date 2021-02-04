<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
        <div style="margin-left: 40% ; margin-right: 40%; margin-top: 3% ; border-style: dashed">
        <div style="margin-left: 0% ; margin-top: 0%" class="container"><br>

        <script>

        function updateTextInput(val) {
          document.getElementById('textInput').value=val; 
        }    

        </script>    

        <form action="/view" method="POST">
            {{csrf_field()}}
            <p>Enter the name</p>
            <input type="text" name="c_name"placeholder="name" class="form-control" ><br>
            <p>Enter the Address</p>
            <input type="text" name="c_address" placeholder="address" class="form-control" ><br>
            <p>Enter the Contact</p>
            <input type="text" name="c_contact"  placeholder="contact" pattern="[0-9]{10}" class="form-control"><br>
            <p>Enter the E-mial</p>
            <input type="text" name="c_email" placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control"><br>
            <p>Enter the Salary</p>
            <input type="range"  min="0" max="100000"  class="form-label" list="tickmarks" style="width:100%;" onchange="updateTextInput(this.value); ">
            <input type="text" name="c_salary" class="form-control" id="textInput" placeholder="Select / Type">

            <datalist id="tickmarks">
                <option value="0" label="0"></option>
                <option value="10000" label="10000"></option>
                <option value="20000" label="20000"></option>
                <option value="30000" label="30000"></option>
                <option value="40000" label="40000"></option>
                <option value="50000" label="50000"></option>
                <option value="60000" label="60000"></option>
                <option value="70000" label="70000"></option>
                <option value="80000" label="80000"></option>
                <option value="90000" label="90000"></option>
                <option value="10000" label="100000"></option>
            </datalist>

            <br>    
            <input type="submit" name="Submit" value="submit" class="btn btn-primary" ><br><br>     
        </form>
    </div>
        </div><br><br>

    <div style="margin-left: 2%;margin-right: 2%">
        <table class="table ; text-center" >
            <thead class="table-dark">
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>User Address</th>
                    <th>User Contact</th>
                    <th>User Email</th>
                    <th>User Salary</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
        </thead>
                @foreach($data as $users)
                <tr>
                    <td>{{$users->userID}}</td>
                    <td>{{$users->userName}}</td>
                    <td>{{$users->address}}</td>
                    <td>{{$users->contact}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->salary ?? "0"}}</td>
                    <td><a href="/viewData/{{$users->userID}}" class="btn btn-success" >Edit</a></td>
                    <td><a href="/deleteData/{{$users->userID}}" class="btn btn-danger" onclick="return confirm('Are you sure?')" >Delete</a></td>
                </tr>
                @endforeach              
        </table>
       {{--$data->links()--}}
    </div>
    </body>

</html>
