@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="mb-0 h4 font-weight-bolder">Dashboard</h3>
            <p class="mb-4">
                Check the sales, value and bounce rate by country.
            </p>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize">Total Users</p>
                            <h4 class="mb-0">{{ $totalUser }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize">Total Active Category</p>
                            <h4 class="mb-0">{{ $totalCategory }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize">Total Active Book</p>
                            <h4 class="mb-0">{{ $totalBook }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize">Total Complte Transaction</p>
                            <h4 class="mb-0">{{$totalTransaction}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card mt-4">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize">Total Pending Transaction</p>
                            <h4 class="mb-0">{{$totalPendingTransaction}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
