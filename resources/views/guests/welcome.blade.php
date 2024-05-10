@extends('layouts.app')
@section('content')
    {{-- @dd($trains) --}}

    <div class="container-fluid">
        <div class="row">
            {{-- jumbotron --}}
            <div class="col-12">
                <div class="p-5 mb-4 bg-light rounded-3">
                    <div class="container-fluid py-3">
                        <h1 class="display-5 fw-bold">Welcome to Laravel Migration Seeder</h1>
                        <p class="col-md-8 fs-4">
                            In this web page, wel'll learn how to manage a database structure and seed it with initial data
                            using Laravel migrations.
                        </p>
                    </div>
                </div>
            </div>
            {{-- main section --}}
            <div class="col-12">
                <div class="container-xl py-4 mb-4">
                    <div class="row g-3">
                        <div class="col-12 px-4">
                            <h3>Current Train Rides Selection</h3>
                        </div>
                        {{-- pick data range --}}
                        <div class="col-12">
                          <form action=" {{ route('welcome')}}" method="GET" id="ms_form">
                            <label for="start_date">Start Date:</label>
                            <input type="date" id="start_date" name="start_date">
                            <label for="end_date">End Date:</label>
                            <input type="date" id="end_date" name="end_date">
                            <button type="submit">Filter search</button>
                            <button type="submit" name="reset" value="reset">Reset</button>
                          </form>
                        </div>
                        
                        {{-- card cycle --}}
                        @forelse($trains as $train)
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                      <h5 class="ms-1">{{ $train->company}}</h5>
                                      <div class="row">
                                        <div class="col">
                                          <h4>{{ $train->departure_time }}</h4>
                                            <p>{{ $train->departure_station }}</p>
                                        </div>
                                        <div class="col">
                                          <h4>{{ $train->arrival_time}}</h4>
                                          <p>{{ $train->arrival_Station}}</p>
                                        </div>
                                        <div class="col">
                                          <p>from</p>
                                          <h4>{{ $train->ticket_price }}€</h4>
                                        </div>
                                        {{-- details dropdwn --}}
                                        <div class="col">
                                          <div class="dropdown">
                                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                              Details
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-center" aria-labelledby="dropdownMenuLink">
                                              <p class="dropdown-item">{{ $train->details}}</p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                        
                                         
                                    </div>
                                </div>
                            </div>
                            

                        @empty
                            <h4 class="py-4">No ticket available for the selected time...</h4>
                        @endforelse

                        {{-- pagination --}}
                        {{ $trains->links() }}
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
@endsection
