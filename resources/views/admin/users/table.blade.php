@foreach($users as $user)
    <tr>
        <td>{!! $user->name !!}</td>
        <td>{!! $user->email !!}</td>
        <td>{!! $user->date_of_birth !!}</td>
        <td>{!! $user->identity_card !!}</td>
        <td>{!! $user->address !!}</td>
        <td>{!! $user->gender !!}</td>
        <td></td>
    </tr>
@endforeach
