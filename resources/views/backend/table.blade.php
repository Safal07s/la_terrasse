@extends('backend.includes.main');
@section('content');

<div class="filter-container">
    <select id="tableFilter" class="filter-dropdown" onchange="filterTables()">
        <option value="all">All</option>
        <option value="available">Available</option>
        <option value="occupied">Occupied</option>
        <option value="reserved">Reserved</option>
    </select>
</div>

<div class="table-layout" >
    <a href="{{url('/orderitems')}}">
    <button class="tables available" >

            <p>Table: 1</p>
            <p>Capacity: 4</p>
        </button>
    </a>
    <a href="{{url('/orderitems')}}">
    <button class="tables available">
        <p>Table: 2</p>
        <p>Capacity: 4</p>
    </button>
    </a>
    <a href="{{url('/orderitems')}}">
    <button class="tables available">
        <p>Table: 3</p>
        <p>Capacity: 4</p>
    </button>
    </a>
    <a href="{{url('/orderitems')}}">
    <button class="tables available">
        <p>Table: 4</p>
        <p>Capacity: 6</p>
    </button>
    </a>
    <a href="{{url('/orderitems')}}">
    <button class="tables available">
        <p>Table: 5</p>
        <p>Capacity: 6</p>
    </button>
    </a>
    <a href="{{url('/orderitems')}}">
    <button class="tables available">
        <p>Table: 6</p>
        <p>Capacity: 6</p>
    </button>
    </a>
    <a href="{{url('/orderitems')}}">
    <button class="tables available">
        <p>Table: 7</p>
        <p>Capacity: 6</p>
    </button>
    </a>
    <a href="{{url('/orderitems')}}">
    <button class="tables available">
        <p>Table: 8</p>
        <p>Capacity: 8</p>
    </button>
    </a>
    <a href="{{url('/orderitems')}}">
    <button class="tables available">
        <p>Table: 9</p>
        <p>Capacity: 8</p>
    </button>
    </a>
    <a href="{{url('/orderitems')}}">
    <button class="tables available">
        <p>Table: 10</p>
        <p>Capacity: 8</p>
    </button>
    </a>
</div>


@endsection
