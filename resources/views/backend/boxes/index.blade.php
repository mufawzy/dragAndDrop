@extends('layouts.backend.master')
@push('add_css')
    <style>
        .card-header:first-child {
            display:flex;
        }
    </style>
@endpush
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="my-auto">
                    <div class="d-flex">
                        <h4 class="content-title mb-0 my-auto">Boxes</h4>
                        <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ List</span></div>
                </div>
                <div class="d-flex my-xl-auto left-content">
                    Here you can add, edit, delete Boxes
                </div>
            </div>
            <div class="card-body">
                <div class="btns mb-3">
                    <a href="{{ route('admin.boxes.create') }}" class="btn btn-primary btn-sm">Add box</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Box name</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at->format('d M,Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.boxes.edit',$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('admin.boxes.destroy',$item->id) }}" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('d-box-{{ $item->id }}').submit();">Delete</a>

                                    <form id="d-box-{{ $item->id }}" action="{{ route('admin.boxes.destroy',$item->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('add_js')
    
@endpush