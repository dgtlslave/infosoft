@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Replenish the deposit:
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{url('deposits-store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="amount">Replenish amount</label>
                            <input type="text" class="form-control" name="replenish_amount" placeholder="34">
                        </div>
                            <input type="hidden" class="form-control" name="deposit_id" value="{{ $data['id'] }}">
                        <button type="submit" class="btn btn-primary">Replenish</button>
                    </form>
                <div>
            </div>
        </div>
    </div>
</div>
@endsection
