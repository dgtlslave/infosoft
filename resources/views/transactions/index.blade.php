@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="card-title">
                            Transactions of deposit id - {{ request()->route('deposit') }}
                        </div>
                        <div>
                            <a href="{{ url()->previous() }}" class="btn btn-sm btn-success">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th class="text-center">Transaction id</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $val)
                          <tr>
                            <td class="text-center">{{ $val['id'] }}</td>
                            <td class="text-center">{{ $val['type'] }}</td>
                            <td class="text-center">{{ $val['amount'] }}</td>
                            <td class="text-center">{{ $val['created_at'] }}</td>
                          </tr>
                            @endforeach
                        </tbody>
                      </table>
                <div>
            </div>
        </div>
    </div>
</div>
@endsection
