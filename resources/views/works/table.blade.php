<table class="table datatables">
    <thead>
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Año</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($works as $work)
        <tr>
            <td>{!! $work->id !!}</td>
            <td>{!! $work->title !!}</td>
            <td>{!! $work->year !!}</td>
            <td>
                @if($work->active)
                    <label class="badge badge-success">activo</label>
                @else
                    <label class="badge badge-danger">inactivo</label>
                @endif
            </td>
            <td>

                <div class='btn-group'>
                    <a href="{!! route('works.show', [$work->id]) !!}" class='btn btn-secondary btn-xs' title="Ver detalles"><i class="mdi mdi-18px mdi-file-document-box"></i></a>
                    <a href="{!! route('works.edit', [$work->id]) !!}" class='btn btn-dark btn-xs' title="Editar"><i class="mdi mdi-18px mdi-pencil-box"></i></a>
                    <button title="Eliminar" type="button" data-toggle="modal" data-target="#delete{!! $work->id !!}" class="btn btn-xs  btn-danger"><i class="mdi mdi-delete mdi-18px"></i></button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="delete{!! $work->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" ><i class="mdi mdi-alert-circle text-danger"></i> Eliminar Trabajo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>¿Desea eliminar este trabajo?</p>
                            </div>
                            <div class="modal-footer">
                                {!! Form::open(['route' => ['works.destroy', $work->id], 'method' => 'delete']) !!}

                                <button title="Eliminar" type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>