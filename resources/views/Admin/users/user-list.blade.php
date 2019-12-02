@extends('layouts.adminnav')

@section('content')
        <div class="category-list-form">
            <table class="user-table">
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
                            @if ($user->block == "1")
                                <td><a href="{{ route('user-block',['id' => $user->id, 'block' => 0 ]) }}">Odblokiraj</a></td>
                            @else
                                <td><a href="{{ route('user-block',['id' => $user->id, 'block' => 1 ]) }}">Blokiraj</a></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection