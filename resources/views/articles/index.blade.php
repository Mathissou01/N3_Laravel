@extends('layouts.app')

@section('content')
<!-- BEGIN: Header -->
<header class="bg-gradient-to-r from-primary to-secondary py-10">
    <div class="container mx-auto px-4">
        <div class="py-4">
            <div class="flex items-center justify-between">
                <div class="my-4">
                    <h1 class="text-3xl font-bold text-white">
                        <div class="flex items-center">
                            <i class="fas fa-boxes-stacked mr-3"></i>
                            Liste de produit
                        </div>
                    </h1>
                </div>
                <div class="my-4">
                    <a href="{{ route('articles.create') }}" class="btn btn-primary add-list my-1">
                        <i class="fas fa-plus mr-3"></i>Ajouter
                    </a>
                    <a href="{{ route('articles.index') }}" class="btn btn-danger add-list my-1">
                        <i class="fas fa-trash mr-3"></i>Raffraichir
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container mx-auto mt-10">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-4 border-b">
            <form action="{{ route('articles.index') }}" method="GET">
                <div class="flex flex-wrap items-center justify-between">
                    <div class="mb-2 md:mb-0">
                        <label for="row" class="block">Ligne:</label>
                        <select class="form-select" name="row">
                            <option value="10" @if(request('row') == '10')selected="selected"@endif>10</option>
                            <option value="25" @if(request('row') == '25')selected="selected"@endif>25</option>
                            <option value="50" @if(request('row') == '50')selected="selected"@endif>50</option>
                            <option value="100" @if(request('row') == '100')selected="selected"@endif>100</option>
                        </select>
                    </div>

                    <div class="flex-1 ml-4">
                        <label for="search" class="block">Rechercher:</label>
                        <div class="flex">
                            <input type="text" id="search" class="form-input mr-2" name="search" placeholder="Chercher un produit" value="{{ request('search') }}">
                            <button type="submit" class="bg-primary text-white p-2">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <hr>

        <div class="p-4">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Id.</th>
                            <th scope="col">Image</th>
                            <th scope="col">@sortablelink('title', 'Nom de produit')</th>
                            <th scope="col">@sortablelink('category.name', 'Categories')</th>
                            <th scope="col">@sortablelink('slug')</th>
                            <th scope="col">@sortablelink('buying_price', 'Unité')</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <th scope="row">{{ (($articles->currentPage() * (request('row') ? request('row') : 10)) - (request('row') ? request('row') : 10)) + $loop->iteration  }}</th>
                                <td>
                                    <div style="max-height: 80px; max-width: 80px;">
                                        <img class="img-fluid" src="{{ $article->article_image ? asset('storage/articles/'.$article->article_image) : asset('assets/img/articles/default.webp') }}">
                                    </div>
                                </td>
                                <td>{{ $article->article_name }}</td>
                                <td>{{ $article->category->name }}</td>
                                <td>{{ $article->stock }}</td>
                                <td>{{ $article->unit->name }}</td>
                                <td>
                                    <div class="flex">
                                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-success btn-sm mx-1"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary btn-sm mx-1"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $articles->links() }}
</div>

@endsection