@extends('layouts.dashboard')

@section('content')
<!-- BEGIN: Header -->
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fa-solid fa-folder"></i></div>
                        Modifier la categorie
                    </h1>
                </div>
            </div>

            {{-- @include('partials._breadcrumbs') --}}
        </div>
    </div>
</header>
<!-- END: Header -->

<!-- BEGIN: Main Page Content -->
<div class="container-xl px-2 mt-n10">
    <form action="{{ route('categories.update', $category->slug) }}" method="POST">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-xl-12">
                <!-- BEGIN: Category Details -->
                <div class="card mb-4">
                    <div class="card-header">
                        Details de la categorie 
                    </div>
                    <div class="card-body">
                        <!-- Form Group (name) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="name">Nom de la categorie  <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="" value="{{ old('name', $category->name) }}" autocomplete="off" />
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                           <div class="mb-3">
                            <label class="small mb-1" for="name">Couleur de la catégorie<span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('color') is-invalid @enderror" id="color" name="color" type="text" placeholder="" value="{{ old('color', $category->color) }}" autocomplete="off" />
                            @error('color')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Form Group (slug) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="slug">Slug de la categorie  (non editable).</label>
                            <input class="form-control form-control-solid @error('slug') is-invalid @enderror" id="slug" name="slug" type="text" placeholder="" value="{{ old('slug', $category->slug) }}" readonly />
                            @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Submit button -->
                        <button class="btn btn-primary" type="submit">Mettre à jour</button>
                        <a class="btn btn-danger" href="{{ route('categories.index') }}">Annuler</a>
                    </div>
                </div>
                <!-- END: Category Details -->
            </div>
        </div>
    </form>
</div>
<!-- END: Main Page Content -->

<script>
    // Slug Generator
    const title = document.querySelector("#name");
    const slug = document.querySelector("#slug");
    title.addEventListener("keyup", function() {
        let preslug = title.value;
        preslug = preslug.replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
    });
</script>
@endsection
