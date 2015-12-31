<!-- Modal -->
{{--@if(isset($dado))--}}
    <div class="modal fade bs-example-modal-lg" id="modalMensagem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Aluno:  {!! $dado->id !!}</h4>
                </div>
                <div class="modal-body">

                    {!! Form::open(['url' => '/propostatcc', 'method' => 'post']) !!}
                    <input type="text" class="hidden" value="{!! $dado->id !!}" name="id_proposta">

                        <textarea name="mensagem" id="mensagem" cols="80" rows="10" class="form-control"></textarea>

                        <input type="submit" value="Enviar" class="btn btn-success" />

                    {!! Form::close() !!}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Fechar</button>
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>
{{--@endif--}}