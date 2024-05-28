@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-danger text-white">Menu</div>

                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route ('meals.index') }}" class="list-group-item list-group-item-action">Display All Meals</a>
                        <a href="{{ route ('meals.create') }}" class="list-group-item list-group-item-action">Create New Meal</a>
                        <a href="{{ route ('orders.index') }}" class="list-group-item list-group-item-action">User Order</a>
                    </div>
                </div> <!--card-body-->
            </div>
        </div> <!--col-md-3-->

        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-white bg-danger">Orders</div>

                <div class="card-header text-center">
                    <div class="card-body text-center"></div>
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope=col>#</th>
                                <th scope=col>User</th>
                                <th scope=col>Phone/ Email</th>
                                <th scope=col> Date/ Time</th>
                                <th scope=col>Meal</th>
                                <th scope=col>S.Meal</th>
                                <th scope=col>M.Meal</th>
                                <th scope=col>L.Meal</th>
                                <th scope=col>Total</th>
                                <th scope=col>Body</th>
                                <th scope=col>Status</th>



                            <th scope=col>Accept</th>
                            <th scope=col>Rejected</th>
                            <th scope=col>Completed</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($orders) > 0)
                            @foreach ($orders as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->user->email }}  / {{ $order->phone }}</td>
                                <td>{{ $order->date }}  / {{ $order->time }}</td>
                                <td>{{ $order->meal->name }}</td>
                                <td>{{ $order->small_meal }}</td>
                                <td>{{ $order->medium_meal }}</td>
                                <td>{{ $order->large_meal }}</td>
                                <td>LE {{ ($order->meal->small_meal_price * $order->small_meal) + ($order->meal->medium_meal_price * $order->medium_meal) + ($order->meal->large_meal_price * $order->large_meal) }}</td>
                                <td>{{ $order->body }}</td>
                                <td>{{ $order->status }}</td>

                                <form action="">
                                    @csrf
                                    <td>
                                        <button type="button" value="accepted" name="status" class="btn btn-primary btn-sm" onclick="confirmAction(this)">Accept</button>
                                    </td>
                                    <td>
                                        <button type="button" value="rejected" name="status" class="btn btn-danger btn-sm" onclick="confirmAction(this)">Reject</button>
                                    </td>
                                    <td>
                                        <button type="button" value="completed" name="status" class="btn btn-success btn-sm" onclick="confirmAction(this)">Complete</button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="13" class="text-center text-danger">NO Orders To show</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div> <!--card-body-->
            </div>
        </div> <!--col-md-9-->
    </div>
</div>

<script>
    function confirmAction(button) {
        var confirmation = confirm("Are you sure you want to " + button.innerText.toLowerCase() + " this order?");
        if (confirmation) {
            var buttons = button.parentElement.parentElement.getElementsByTagName('button');
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].classList.remove('disabled');
                buttons[i].disabled = false;
            }
            button.classList.add('disabled');
            button.disabled = true;
            button.innerText = button.value.charAt(0).toUpperCase() + button.value.slice(1) + 'ed';
        }
    }
</script>
@endsection
