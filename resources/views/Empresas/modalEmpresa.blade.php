
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!!Form::open(array('url'=>'empresa/'.$empresa -> id,'method'=>'DELETE'))!!}
            {{Form::token()}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea eliminar la empresa: {{$empresa -> nombre}}?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Aceptar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
