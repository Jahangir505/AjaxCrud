<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ajax CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col pt-5">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Contact Us
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form method="POST" id="contact_form">
                        @csrf
                        <div class="modal-body">
                            
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input required type="text" class="form-control" id="name" name="name" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input required type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input required type="text" class="form-control" id="phone" name="phone">
                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" id="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
    <div class="row pt-5">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="float-left">Contact List</h5>
                    <a href="{{url('/')}}" class="btn btn-success float-right">Book Add</a>
                </div>
                <div class="card-body">
                    <table class="table table-dark">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach ($contacts as $k=>$item)
                            <tr>
                                <th scope="row">{{$k+1}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                            </tr>
                         @endforeach
                            
                        
                        </tbody>
                      </table>
                </div>
              </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
</body>

<script>
   $(function(){
       $.ajaxSetup({
           header: {'X-CSRF-Token' : '{{csrf_token()}}'}
       });
       $('#contact_form').submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();
            var url = '{{url('contacts')}}'
            console.log(data);

            $.ajax({
                url:url,
                method:'POST',
                data:data,
                success:function(response){
                    if(response.success){
                        alert(response.message)
                    }
                },
                error:function(error){
                    console.log(error);
                }
            })
       })

       $('#submit').modal('hide');
   })
</script>

</html>