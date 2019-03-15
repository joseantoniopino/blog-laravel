@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card mb-3">
                    <div class="card-header">
                        Editar Categoría
                    </div>
                    <div class="card-body">
                        {!! Form::model($category, ['route'=>['categories.update', $category->id],'method' => 'PUT']) !!}

                            @include('admin.categories.partials.form')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
