@foreach($doctors as $doctor)
    <tr>
        <td>{!! $doctor->name !!}</td>
        <td><a href="{{ route('doctors.edit',$doctor->id) }}" class="btn btn-info">Sửa</a></td>
    </tr>
@endforeach
