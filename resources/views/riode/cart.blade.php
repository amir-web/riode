@extends('layouts.riode')
@section('content')
    <main class="main cart">
        <div class="page-content pt-7 pb-10">
            <div class="container mt-7 mb-2">
                <div class="row">
                    <div class="col-lg-12 col-md-12 pr-lg-4">
                        <style>
                            th,td{
                                text-align: center;
                            }
                        </style>
                        <table class="shop-table cart-table">
                            @include('riode.ajax._cart_page_table')
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
