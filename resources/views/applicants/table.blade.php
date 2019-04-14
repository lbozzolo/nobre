<table class="table datatables">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>País</th>
            <th>Provincia</th>
            <th style="width: 100px">Opciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($applicants as $applicant)
        <tr>
            <td>{!! $applicant->id !!}</td>
            <td>{!! $applicant->full_name !!}</td>
            <td>{!! $applicant->email !!}</td>
            <td>{!! config('sistema.countries.'.$applicant->country) !!}</td>
            <td>{!! (in_array($applicant->province, [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22]))? config('sistema.provinces.'.$applicant->province) : '-' !!}</td>
            {{--<td>--}}
                {{--@foreach($applicant->categories as $category)--}}
                    {{--<span class="badge badge-dark">{!! $category->name !!}</span>--}}
                {{--@endforeach--}}
            {{--</td>--}}
            <td>

                <div class='btn-group'>
                    <a href="{!! route('applicants.show', [$applicant->id]) !!}" class='btn btn-secondary btn-xs' title="Ver detalles"><i class="mdi mdi-18px mdi-file-document-box"></i></a>
                    <a href="{!! route('applicants.edit', [$applicant->id]) !!}" class='btn btn-dark btn-xs' title="Editar"><i class="mdi mdi-18px mdi-pencil-box"></i></a>
                    <button title="Eliminar" type="button" data-toggle="modal" data-target="#delete{!! $applicant->id !!}" class="btn btn-xs  btn-danger"><i class="mdi mdi-delete mdi-18px"></i></button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="delete{!! $applicant->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" ><i class="mdi mdi-alert-circle text-danger"></i> Eliminar Aspirante</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>¿Desea eliminar este aspirante?</p>
                            </div>
                            <div class="modal-footer">
                                {!! Form::open(['route' => ['applicants.destroy', $applicant->id], 'method' => 'delete']) !!}

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