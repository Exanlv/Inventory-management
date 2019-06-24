@extends('layout')

@section('title') Categories @endsection

@section('body')
    <div class="table-responsive-sm">
        <table class="table">
            <tr>
                <td class="border-top-0 font-weight-bold" style="width: 5%">#</td>
                <td class="border-top-0 font-weight-bold" style="width: 85%;">Name</td>
                <td class="border-top-0" style="width: 5%;"></td>
                <td class="border-top-0" style="width: 5%;"></td>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td>
                    {{ $category->id }}
                </td>
                <td>
                    <a href="{{ route('categories.show', ['category' => $category]) }}" class="text-info">{{ $category->name }}</a>
                </td>
                <td class="text-center">
                    <a href="{{ route('categories.edit', ['category' => $category]) }}"><i class="fa fa-pencil-square-o text-warning" aria-hidden="true"></i></a>
                </td>
                <td class="text-center">
                    <form method="POST" action="{{ route('categories.destroy', ['category' => $category]) }}">
                        @method('DELETE')
                        @csrf
                        <button class="p-0 m-0 border-0" style="background: transparent"><i class="fa fa-times text-danger" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-center"><a href="{{ route('categories.create') }}"><i class="fa fa-plus text-success" aria-hidden="true"></i></a></td>
            </tr>
        </table>
    </div>
@endsection