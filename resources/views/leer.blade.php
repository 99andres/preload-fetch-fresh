<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <meta name="csrf-token" content="{{csrf_token()}}">




    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>Hello, world!</title>

    <style>
      
            .minh-100 {
        height: 100vh;
        
      }
      #tabla{
        box-sizing: border-box;
        
      }
    
      .preload{
        width: 100vw;
        height: 100vh;
        background: black;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 10000;

      }
      .spiner{
        width: 50px;
        height: 50px;
        border-top: 5px solid blue;
        border-right: 5px solid transparent;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        position: absolute;
        left:0;
        top:0;
        right: 0;
        bottom: 0;
        margin:auto;
        z-index: 1000000;

      }
      .spiner > div{
        box-sizing: border-box;
        width: 100%;
        height: 100%;
        animation: spin 1s linear infinite;


        
      }
      .establecido{
        display:none !important;
      }
      @keyframes spin{
        100% {
          transform: rotate(360deg);
        }
      }

    </style>
    
  </head>
  <body class="card-header" style="border-bottom:none;">
    <div class="preload">
      <div class="spiner">
        <div class="spiner">
          <div class="spiner">
            <div class="spiner"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="container" id="cont" >
      <div class="row align-items-center justify-conntent-center minh-100">
        <div class="card card-body row align-items-center justify-conntent-center">
            <table class="table table-bordered w-50" id="tabla">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Acccion</th>
                    </tr>
                </thead>
                <tbody class="contenidoAccion" id="contenidoAccion">
                  @foreach($nombres as $item)
                  <tr>
                      <td>{{$item->nombre}}</td>
                      <td>{{$item->edad}}</td>
                      <td>
                        <div class="text-center">
                          <div class="btn-group ">
                            <button class="btn btn-danger eliminar" data-numero="{{$item->id}}"><i class="fal fa-trash-alt eliminarInterno" data-numero="{{$item->id}}" ></i></button>
                            <button class="btn btn-primary editar" data-numero="{{$item->id}}" type="button"  data-toggle="modal" data-target="#exa"><i class="far fa-user-edit editarInterno" data-numero="{{$item->id}}" ></i></button>
                          </div>
                        </div>
  
                      </td>
                  </tr>    
                  @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
    @include("modale")
        
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
  
    
    
    <script>
      $(document).ready(function(){ 
        
        let preload=document.querySelector(".preload")
        preload.style.display="none"
        

        $("#cont").load("ver",function(response, status, xhr){
          let guardaData=document.querySelector("#guardaData")
          guardaData.addEventListener("click",function(){
            let nombre=document.getElementById("nombre")
            let edad=document.getElementById("edad")
            let datainfor={
              [document.getElementById("nombre").id]:document.getElementById("nombre").value,
              [document.getElementById("edad").id]:document.getElementById("edad").value,
              [document.getElementById("identificador").id]:document.getElementById("identificador").value,
            }
            
            fetch("gaurdarData",{
              headers:{
                "content-type":"application/json",
                "X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content"),


              },
              method:"POST",
              body: JSON.stringify(datainfor)
            })
            .then((result)=>result.text())
            .then((data)=>{
              setTimeout(() => {
                $("#cont").load("#contenidoAccion")
                let cerrando=document.getElementById("cerrando")
                cerrando.click()

                }, 1000);
              
              

            })  

            
        })
              if(status=="success"){
                let contenidoAccion=document.querySelector(".contenidoAccion")
                contenidoAccion.addEventListener("click",function(e){//4
                  if(e.target.classList.contains("editar") || e.  target.classList.contains("editarInterno"))
                  {
                    
                    let nombre=document.getElementById("nombre")
                    let apellido=document.getElementById("edad")
                    let identificador=document.getElementById("identificador")
                    nombre.value=""
                    apellido.value=""
                    
                    fetch("procesandoEditar",{
                      headers:{
                        "content-type":"application/json",
                        "X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                      },
                      method:"POST",
                      body: e.target.dataset.numero
                    })
                    .then((result)=>result.json())
                    .then((data)=>{
                      console.log(data)
                      nombre.value=data.nombre
                      apellido.value=data.edad
                      identificador.value=data.id

                    })


                  }
                  if(e.target.classList.contains("eliminar") || e.target.classList.contains("eliminarInterno")){
                    preload.style.display="block"
                    if(e.target.dataset.numero!=0){//6
                    
                      fetch("procesandoEliminar",{
                        headers:{
                          "Content-type":"application/json",
                          "X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                        },
                        method:"POST",
                        body: e.target.dataset.numero,
                      })
                      .then((result)=>{
                          return result.text()
                      })
                      .then(datos=>{
                          
                        if(datos!=""){//gaa
                          setTimeout(() => {
                            $("#cont").load("#contenidoAccion",function(status){
                              if(status=="success"){
                                preload.style.display="none";
                              }
                              else{
                                preload.style.display="none "
                              }
                            })
                        }, 1000)
                              }                     
                      
                      })
                  }
                  
                                      
                                        
                }
              })     
                                       
            }
          })  
      
      
      
        })//1
    
    

          
        
    


    
    </script>
  </body>
</html>