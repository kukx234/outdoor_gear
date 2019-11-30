@extends('layouts.adminnav')

@section('content')
        <div>
            <table>
                <thead>
                    <tr>
                        <td>Ime</td>
                        <td>Email</td>
                        <td>Kreiran</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection