@foreach($gcs as $gc)
    <tr>
        <td>{!! $gc->id_guarantee !!}</td>
        <td>{!! $gc->user->name !!}</td>
        <td></td>
    </tr>
@endforeach
