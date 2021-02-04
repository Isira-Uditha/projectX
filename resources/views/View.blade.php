<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
        <div style="margin-left: 40% ; margin-right: 40%; margin-top: 4% ; border-style: dashed">
        <div style="margin-left: 0% ; margin-top: 0%" class="container"><br>


            <p>Name</p>
            <input type="text" name="c_name" value="{{$data->userName}}" class="form-control" disabled ><br>
            <p>Address</p>
            <input type="text" name="c_address" value="{{$data->address}}" class="form-control" disabled ><br>
            <p>Contact</p>
            <input type="text" name="c_contact"  value="{{$data->contact}}" pattern="[0-9]{10}" class="form-control" disabled><br>
            <p>E-mial</p>
            <input type="text" name="c_email"  value="{{$data->email}}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" disabled><br>
            <p>E-mial</p>
            <input type="text" name="c_slary" value="{{$data->salary}}" class="form-control" disabled><br>
            <a href="/updateViewData/{{$data->userID}}" class="btn btn-success">Edit</a><br><br>

    </div>
        </div>
    </body>

</html>