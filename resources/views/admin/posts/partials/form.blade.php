<style>
    .ck-editor__editable {
        min-height: 400px;
    }
</style>

{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
    {{Form::label('category_id', 'Categorías')}}
    {{Form::select('category_id', $categories, null, ['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('name', 'Nombre de la entrada')}}
    {{Form::text('name', null, ['class'=> 'form-control', 'id' => 'name'])}}
</div>
<div class="form-group">
    {{Form::label('slug', 'URL amigable')}}
    {{Form::text('slug',null, ['class'=> 'form-control', 'id' => 'slug'])}}
</div>
<div class="form-group">
    {{ Form::label('file', 'Imagen') }}
    {{ Form::file('file') }}
</div>
<div class="form-group">
    {{ Form::label('status', 'Estado') }}
    <label>
        {{ Form::radio('status', 'PUBLISHED') }} Publicado
    </label>
    <label>
        {{ Form::radio('status', 'DRAFT') }} Borrador
    </label>
</div>
<div class="form-group">
    {{ Form::label('tags', 'Etiquetas') }}
    <div>
        @foreach($tags as $tag)
            <label>
                {{ Form::checkbox('tags[]', $tag->id) }} {{ $tag->name }}
            </label>
        @endforeach
    </div>
</div>
<div class="form-group">
    {{ Form::label('excerpt', 'Extracto') }}
    {{ Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => '2']) }}
</div>
<div class="form-group">
    {{Form::label('body', 'Descripción')}}
    {{Form::textarea('body',null, ['class'=> 'form-control', 'id' => 'body'])}}
</div>
<div class="form-group">
    {{Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary'])}}
</div>

@section('scripts')
    <script src="{{asset('js/jquery.stringtoslug.min.js')}}"></script>
    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js"></script>﻿
    <script>
        $(document).ready(function(){
            //StringToSlug
            $("#name, #slug").stringToSlug({
                callback: function (text) {
                    $("#slug").val(text);
                }
            })
        });
        ClassicEditor
            .create( document.querySelector( '#body' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                    ]
                }
            } )
            .catch( error => {
                console.log( error );
            } );
        /*CKEDITOR.config.height = 400;
        CKEDITOR.config.width = 'auto';

        CKEDITOR.replace('body')*/
    </script>
@endsection
