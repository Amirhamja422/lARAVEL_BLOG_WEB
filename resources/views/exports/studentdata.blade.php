<table>
    <thead>
    <tr>
        <th>agent</th>
        <th>phone</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{{ $student->agent }}</td>
            <td>{{ $student->phone }}</td>
        </tr>
    @endforeach
    </tbody>
</table>