<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Aluno:  {!! $dado->nome !!}</h4>
            </div>
            <div class="modal-body">
                <table border="0" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><strong>Ano: </strong> {!! $dado->ano !!}</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Orientador: </strong> {!! $dado->orientador !!}
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Tilulo: </strong> {!! $dado->titulo !!}</td>
                    </tr>
                    <tr>
                        <td><strong>Subtitulo: </strong> {!! $dado->subtitulo !!}</td>
                    </tr>
                    <tr>
                        <td><strong>Local: </strong> {!! $dado->local !!}</td>
                    </tr>
                    <tr>
                        <td><strong>Finalidade: </strong> {!! $dado->finalidade !!}</td>
                    </tr>
                    <tr>
                        <td><strong>Objetivos: </strong> {!! $dado->objetivos !!}</td>
                    </tr>
                    <tr>
                        <td><strong>Problematização: </strong> {!! $dado->Problematizacao !!}</td>
                    </tr>
                    <tr>
                        <td><strong>Delimitação: </strong> {!! $dado->delimitacao !!}</td>
                    </tr>
                    <tr>
                        <td><strong>Objetivo geral: </strong> {!! $dado->objetivo_geral !!}</td>
                    </tr>
                    <tr>
                        <td><strong>Objetivo especifico: </strong> {!! $dado->objetivo_especifico !!}</td>
                    </tr>
                    <tr>
                        <td><strong>Justificativa: </strong> {!! $dado->justificativa !!}</td>
                    </tr>
                    <tr>
                        <td><strong>Usuário: </strong> {!! $dado->usuario !!}</td>
                    </tr>
                    <tr>
                        <td><strong>Status: </strong> {!! $dado->status !!}</td>
                    </tr>
                    <tr>
                        <td><strong>Dia da criação: </strong> {!! $dado->created_at !!}</td>
                    </tr>
                    <tr>
                        <td><strong>Dia da atualização: </strong> {!! $dado->updated_at !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Fechar</button>
                {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
            </div>
        </div>
    </div>
</div>