<table>
    @foreach ($posts as $p)
        <tr>
            <td>{{ $p->active }}</td>
            <td>{{ $p->title }}</td>
        </tr>
    @endforeach
</table>