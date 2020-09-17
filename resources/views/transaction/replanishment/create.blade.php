@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            Replenish the deposit id: {{ print(request()->route('deposit')) }}
                        </div>
                        <div>
                            <a href="{{ url()->previous() }}" class="btn btn-sm btn-success">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/deposits/ {{ request()->route('deposit') }} /replanishment-store" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="amount">Replenish amount</label>
                            <input type="text" class="form-control" name="replenish_amount" placeholder="34">
                        </div>
                            <input type="hidden" class="form-control" name="deposit_id" value="{{$data}}">
                        <button type="submit" class="btn btn-primary">Replenish</button>
                    </form>
                <div>
            </div>
        </div>
    </div>
</div>
@endsection
