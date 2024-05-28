@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-danger text-white">Menu</div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route ('meals.index') }}" class="list-group-item list-group-item-action">Display All Meals</a>
                        <a href="{{ route ('meals.create') }}" class="list-group-item list-group-item-action">Create New Meal</a>
                        <a href="{{ route ('orders.index') }}" class="list-group-item list-group-item-action">Orders</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-white bg-danger">Meals</div>
                <div class="card-body text-center">

                                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    


                    <form action="{{route('meals.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" class="form-control form-control-lg mb-3" placeholder="Name of Meal">
                        <textarea name="description" class="form-control form-control-lg mb-3" rows="3" placeholder="Description Of Meal"></textarea>

                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label>Small Meal Price (LE)</label>
                                <input type="number" name="small_meal_price" class="form-control" placeholder="Small Meal Price">
                            </div>
                            <div class="col">
                                <label>Medium Meal Price (LE)</label>
                                <input type="number" name="medium_meal_price" class="form-control" placeholder="Medium Meal Price">
                            </div>
                            <div class="col">
                                <label>Large Meal Price (LE)</label>
                                <input type="number" name="large_meal_price" class="form-control" placeholder="Large Meal Price">
                            </div>
                        </div>

                        <select class="form-select form-select-lg mb-3" name="category">
                            <option selected disabled>Category</option>
                            <option value="shawerma">Shawerma</option>
                            <option value="burger">Burger</option>
                            <option value="pizza">Pizza</option>
                        </select>
                        <input type="file" name="image" class="form-control form-control-lg mb-3">
                        <button type="submit" class="btn btn-danger btn-lg w-100">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection