@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
            <tr class="table-success">
                <th scope="col">#</th>
                <th scope="col">company</th>
                <th scope="col">contact</th>
                <th scope="col">Addresses</th>
                <th scope="col">city</th>
                <th scope="col">country</th>
            </tr>
            </thead>
            <tbody>
            @foreach($consignments as $consignment)
                <tr>
                    <th scope="row">{{ $consignment->id }}</th>
                    <td>{{ $consignment->company }}</td>
                    <td>{{ $consignment->contact }}</td>

                    <td>
                        @forelse($consignment->addresses as $address)
                            {{$address->address}} <br>
                        @empty
                            -
                        @endforelse
                    </td>

                    <td>{{ $consignment->city }}</td>
                    <td>{{ $consignment->country }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $consignments->links() !!}
        </div>
    </div>
@endsection
