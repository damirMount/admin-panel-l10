@extends('admin.layouts.app')

@section('content')
    <div class="p-3 bg-form card-body-admin">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-12 col-md-10 pb-5 px-5">
                <form action="{{ route('admin_businesses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <p class="font-weight-bold h2">Добавление бизнес</p>
                    </div>
                    <div class="form-group">
                        <label for="title_input">Наименование:<span class="text-danger">*</span></label>
                        <input id="title_input" type="text" class="form-control" name="name" required value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="title_input">Тип:<span class="text-danger">*</span></label>
                        <input id="title_input" type="text" class="form-control" name="type" required value="{{old('type')}}">
                    </div>
                    <div class="form-group">
                        <label for="title_input">Слаг:<span class="text-danger">*</span></label>
                        <input id="title_input" type="text" class="form-control" name="slug" required value="{{old('slug')}}">
                    </div>
                    <div class="form-group">
                        <label for="title_input">Бюджет:<span class="text-danger">*</span></label>
                        <input id="title_input" type="text" class="form-control" name="budget" required value="{{old('budget')}}">
                    </div>
                    <div class="form-group">
                        <label for="title_input">Участники:<span class="text-danger">*</span></label>
                        <select name="member_id" id=""></select>
                    </div>




                    <div class="form-group">
                        <label for="brief_textarea">Заголовок:<span class="text-danger">*</span></label>
                        <textarea name="brief" id="brief_textarea" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="context_textarea">Контекст:<span class="text-danger">*</span></label>
                        <textarea name="context" id="context_textarea" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="slug_input">Слаг:<span class="text-danger">*</span></label>
                        <input id="slug_input" type="text" class="form-control" name="slug" required value="{{old('slug')}}">
                    </div>
                    <div class="form-group">
                        <label for="killed_input">Убит:<span class="text-danger">*</span></label>
                        <input id="killed_input" type="text" class="form-control" name="killed" required value="{{old('killed')}}">
                    </div>
                    <div class="form-group">
                        <label for="arrested_input">Арестован:<span class="text-danger">*</span></label>
                        <input id="arrested_input" type="text" class="form-control" name="arrested" required value="{{old('arrested')}}">
                    </div>
                    <div class="form-group">
                        <label for="press_input">Заголовок:<span class="text-danger">*</span></label>
                        <input id="press_input" type="text" class="form-control" name="press" required value="{{old('press')}}">
                    </div>
                    <div class="form-group">
                        <label for="link_input">Заголовок:<span class="text-danger">*</span></label>
                        <input id="link_input" type="text" class="form-control" name="link" required value="{{old('link')}}">
                    </div>
                    <div class="form-group">
                        <label for="date_input">Заголовок:<span class="text-danger">*</span></label>
                        <input id="date_input" type="text" class="form-control" name="date" required value="{{old('date')}}">
                    </div>
                    <div class="form-group">
                        <label for="meta_title_input">Заголовок:<span class="text-danger">*</span></label>
                        <input id="meta_title_input" type="text" class="form-control" name="meta_title" required value="{{old('meta_title')}}">
                    </div>
                    <div class="form-group">
                        <label for="meta_keywords_input">Заголовок:<span class="text-danger">*</span></label>
                        <input id="meta_keywords_input" type="text" class="form-control" name="meta_keywords" required value="{{old('meta_keywords')}}">
                    </div>
                    <div class="form-group">
                        <label for="meta_description_input">Заголовок:<span class="text-danger">*</span></label>
                        <textarea name="meta_description" id="meta_description_input" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" title="{{ __('Coхранить') }}"
                            class="btn btn-success">{{ __('Coхранить') }}</button>

                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{--<script src="https://cdn.tiny.cloud/1/v3r71nl7rlj94mvjubwapzf91fnk5xaia0oxkl1jq66xux3i/tinymce/5/tinymce.min.js"--}}
            {{--referrerpolicy="origin"></script>--}}
    <script>
        // tinymce.init({
        //     selector: 'textarea.tinymce-editor',
        //     height: 500,
        //     menubar: true,
        //     plugins: [
        //         'advlist autolink lists link image charmap print preview anchor',
        //         'searchreplace visualblocks code fullscreen',
        //         'insertdatetime media table paste code help wordcount'
        //     ],
        //     toolbar: 'undo redo | formatselect | ' +
        //     'bold italic backcolor | alignleft aligncenter ' +
        //     'alignright alignjustify | bullist numlist outdent indent | ' +
        //     'removeformat | help | uploadimage',
        //     paste_data_images: true,
        //     images_upload_handler: function (blobInfo, success, failure) {
        //         success("data:" + blobInfo.blob().type + ";base64," + blobInfo.base64());
        //     },
        //     // content_css: '//www.tiny.cloud/css/codepen.min.css',
        // });
    </script>
@endpush
{{--
title
brief
context
slug
killed
arrested
press
link
date
meta_title
meta_keywords
meta_description
pIfExists
--}}
