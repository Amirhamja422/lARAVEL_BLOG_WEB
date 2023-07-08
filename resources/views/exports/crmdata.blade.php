<table>
    <thead>
    <tr>
        <th>agent</th>
        <th>phone</th>
    </tr>
    </thead>
    <tbody>
    @foreach($crm as $student)
        <tr>
            <td>{{ $student->agent }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->date }}</td>
        </tr>
    @endforeach
    </tbody>
</table>