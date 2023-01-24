@extends('app')

@section('page_title', 'Список всех пользователей || OnlineStore')

@section('content')
<div class="w-full">
    <div class="container mx-auto py-4">
        @foreach($users as $user)
            <div><a href="{{ route('user.show', ['id'=>$user->id ]) }}">{{ $user->name }}</a></div>
        @endforeach
    </div>
</div>
@endsection