@extends('layouts.adminnav')

@section('content')
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Email</th>
                        <th>Kreiran</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td><a href="{{ route('user-block', $user->id ) }}">Blokiraj</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection