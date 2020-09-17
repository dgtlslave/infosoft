@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="card-title">
                            Create new deposit
                        </div>
                        <div>
                            <a href="{{ url()->previous() }}" class="btn btn-sm btn-success">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('deposits-store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="amount">Deposit amount</label>
                            <input type="text" class="form-control" name="amount" placeholder="34">
                        </div>
                            <input type="hidden" class="form-control" name="user_id" value="{{ $data['id'] }}">
                            <input type="hidden" class="form-control" name="wallet_id" value="{{ $data['wallets']['id'] }}">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                <div>
            </div>
        </div>
    </div>
</div>
@endsection
