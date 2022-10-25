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
                @foreach ($nombres as $item)
                <tr>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->edad}}</td>
                    <td>
                      <div class="text-center">
                        <div class="btn-group ">
                          
                          <button class="btn btn-danger eliminar" data-numero="{{$item->id}}"><i class="fal fa-trash-alt eliminarInterno" data-numero="{{$item->id}}" ></i></button>
                          <button class="btn btn-primary editar" type="button"  data-toggle="modal" data-target="#exa" data-numero="{{$item->id}}"><i class="far fa-user-edit editarInterno" data-numero="{{$item->id}}"></i></button>
                          
                        </div>
                      </div>

                    </td>
                </tr>    
                @endforeach
                
            </tbody>
        </table>
    
    </div>
</div>
@include("modale")




                                                