@extends('post.main')

@section('content')
        <div class="page-content">

            
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        </form>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Post Form</h4>
{{--                            <p class="card-description">Read the <a href="https://jqueryvalidation.org/" target="_blank"> Official jQuery Validation Documentation </a>for a full list of instructions and other options.</p>--}}
                            <form class="cmxform" method="POST" action="{{ route('post_create') }}">
                                @csrf
                                <fieldset>
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input id="title" class="form-control" name="title" type="text" value="{{ old('title') }}">
                                        @if($errors->has('title'))
                                            <div class="error">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="author">Author</label>
                                        <input id="author" class="form-control" name="author" type="text" value="{{ old('author') }}">
                                        @if($errors->has('author'))
                                            <div class="error">{{ $errors->first('author') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Content</label>
                                        <textarea id="summernote" class="summernote" maxlength="100" rows="8" name="content"></textarea>
                                        
                                    </div>
                                    <script>
                                    $('#summernote').summernote({
                                        
                                        tabsize: 2,
                                        height: 300,
                                        toolbar: [
                                        ['style', ['style']],
                                        ['font', ['bold', 'underline', 'clear']],
                                        ['color', ['color']],
                                        ['para', ['ul', 'ol', 'paragraph']],
                                        ['table', ['table']],
                                        ['insert', ['link', 'picture', 'video']],
                                        ['view', ['fullscreen', 'codeview', 'help']]
                                        ]
                                    });
                                    </script>
                                   
                                    <div class="form-group">
                                        <label for="password">Published at</label>
                                        <input name="published_at" class="form-control datepicker" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy"/>
                                    </div>
                                    <button class="btn btn-warning text-white" type="submit" name="draft">Draft</button>
                                    <button class="btn btn-primary" type="submit">Publish</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            

        



        </div>
        @endsection
