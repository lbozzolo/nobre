<table class="table table-striped table-bordered">
    <tbody>
        <tr>
            <td>Nombre:</td>
            <td>{!! $applicant->full_name !!}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{!! $applicant->email !!}</td>
        </tr>
        <tr>
            <td>Teléfono:</td>
            <td>{!! $applicant->phone !!}</td>
        </tr>
        <tr>
            <td>País:</td>
            <td>{!! ($applicant->country)? config('sistema.countries.'.$applicant->country) : '-' !!}</td>
        </tr>
        <tr>
            <td>Provincia:</td>
            <td>{!! (in_array($applicant->province, [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22]))? config('sistema.provinces.'.$applicant->province) : '-' !!}</td>
        </tr>
        <tr>
            <td>Empresa:</td>
            <td>{!! ($applicant->company)? $applicant->company : '-' !!}</td>
        </tr>
        <tr>
            <td>Áreas de interés:</td>
            <td>
                <ul class="list-unstyled">
                    @forelse($applicant->categories as $category)
                        <li><label class="badge badge-dark" style="display: inline-block; margin: 2px 0px">{!! $category->name !!}</label></li>
                    @empty
                        -
                    @endforelse
                </ul>
            </td>
        </tr>
        <tr>
            <td>Texto:</td>
            <td>
                <p style="max-width: 300px; white-space: normal; overflow: hidden">{!! ($applicant->text)? $applicant->text : '-' !!}</p>
            </td>
        </tr>
        <tr>
            <td>Fecha de alta:</td>
            <td>{!! $applicant->fecha_creado !!}</td>
        </tr>
        {{--<tr>--}}
            {{--<td>Última vez editado:</td>--}}
            {{--<td>{!! $applicant->fecha_editado !!}</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>Estado:</td>--}}
            {{--<td>--}}
                {{--<label class="{!! ($applicant->active)? 'badge badge-success' : 'badge badge-danger' !!}">{!! ($applicant->active)? 'ACTIVO' : 'INACTIVO' !!}</label>--}}
            {{--</td>--}}
        {{--</tr>--}}
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2">
                <a href="{!! route('applicants.edit', $applicant->id) !!}" class="btn btn-primary">Editar</a>
                <a href="{!! route('applicants.index') !!}" class="btn btn-default">Cancelar</a>
            </td>
        </tr>
    </tfoot>
</table>




