@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">            
            @include('inc.message')
            <div class="card">                               
                @if(count($users)>0)
                    @foreach($users as $user)
                        <div class="card-header">{{$user->first_name}} {{$user->surname}}</div>
                        <div class="card-body" >
                            <div style="margin-top: 1em">                   
                                <p>Email Address : {{$user->email}}</p>
                                <p>Telephone Number : {{$user->telephone}}</p>
                                <p>Gender : {{$user->gender}}</p>
                                <p>Date of birth : {{$user->dob}}</p>
                                <p>Comments : {{$user->comment}}</p>
                            </div>
                        </div>                            
                    @endforeach
                @else
                    <p>No user found</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
    