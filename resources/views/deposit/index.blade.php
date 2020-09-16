@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <div class="d-flex justify-content-between">
                            <div>
                                Deposits of wallet - id: {{ print(request()->route('id')) }}
                            </div>
                            <div>
                                <a href="/deposits-create/{{ print(request()->route('id')) }}" class="btn btn-sm btn-success">New</a>
                            </div>
                        </div>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th class="text-center">Deposit id:</th>
                            <th class="text-center">Invested:</th>
                            <th class="text-center">Percent:</th>
                            <th class="text-center">Active:</th>
                            <th class="text-center">Duration:</th>
                            <th class="text-center">Action:</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $val)
                          <tr>
                            <th class="text-center">{{ $val->id }}</th>
                            <th class="text-center">{{ $val->invested }}</th>
                            <th class="text-center">{{ $val->percent }}</th>
                            <th class="text-center">{{ $val->active }}</th>
                            <th class="text-center">{{ $val->duration }}</th>
                            <td class="text-center">
                                @if ($val->active == 1)
                                    <a href="#" class="btn btn-sm btn-success">Replenishment</a>
                                @endif
                                <a href="#" class="btn btn-sm btn-warning">Withdrawal</a>
                                <a href="#" class="btn btn-sm btn-info">Transactions</a>
                            </td>
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
