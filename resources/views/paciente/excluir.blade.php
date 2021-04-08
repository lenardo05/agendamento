@if(session('mensagem'))

<script>$(function(){$("#msgmodal").modal('show');});</script>

<!-- Modal -->
<div class="modal fade" id="msgmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel"> Confirma Exclusão </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>{{ session('mensagem') }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
          <a href="{{ route('pacientes.delete.confirma', session('id')) }}" class="btn btn-danger btn-sm">Excluir</a>
        </div>
      </div>
    </div>
  </div>
@endif