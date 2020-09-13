@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Wallets
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th class="text-center">Wallet id:</th>
                            <th class="text-center">Balance</th>
                            <th class="text-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $val)
                          <tr>
                            <td class="text-center">{{ $val['id'] }}</td>
                            <td class="text-center">{{ $val['balance'] }}</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-info">Transactions</a>
                                <a href="#" class="btn btn-sm btn-success">Replenishment</a>
                                <a href="#" class="btn btn-sm btn-warning">Withdrawal</a>
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
