<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
            .minh-100 {
        height: 100vh;
        
      }

    </style>
  </head>
  <body class="card-header"  style="border-bottom:none;">
    <div class="container">
        <div class="row  align-items-center minh-100 ">
                <div class="card card-body row    align-items-center">
                    <form class="w-50">

                        <div class="form-group row">
                            <label for="nombre" class="col-4 col-form-label ">Nombre</label>
                            <div class="col-8">
                                <input type="text" id="nombre" class="form-control" autofocus>
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edad" class="col-4 col-form-label "  >Edad</label>
                            <div class="col-8">
                                <input type="text" id="edad" class="form-control">
                            </div>  
                        </div>
                        <div class="form-group container">
                            <div class="row justify-content-center">
                                <button class="btn btn-primary" id="btn">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
    <script>
        let btn=document.getElementById("btn")
        btn.addEventListener('click',function(e){
            e.preventDefault()
            let data={
                [document.getElementById("nombre").id]:document.getElementById("nombre").value,
                [document.getElementById("edad").id]:document.getElementById("edad").value,
                
            }
            swal({
                title:"estas seguro",
                icon:"warning",
                buttons: true,
                dangerMode: true,
            })
            .then(boton=>{
                if(boton){
                    fetch('proceso',{
                        headers:{
                            "Content-type":"application/json",
                            "X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                        },

                        method:"POST",
                        body:JSON.stringify(data)
                    })
                    .then(response=>response.json())
                    .then(result=>{
                        console.log(result)
                    })

                }
                else{
                    return false
                }
            })
            
            
        })
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>