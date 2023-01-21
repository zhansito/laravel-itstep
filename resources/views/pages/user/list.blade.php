@extends('app')

@section('page_title', 'Список всех пользователей || OnlineStore')

@section('content')
    <div>
        @foreach ($users as $user)
            <div>{{ $user->name }}</div>
            <div>
                @foreach($user->items as $item)    
                <div>{{ $item->title }}</div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection