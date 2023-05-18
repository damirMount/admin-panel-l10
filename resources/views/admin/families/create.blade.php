@extends('admin.layouts.app')

@section('content')
    <div class="p-3 bg-form card-body-admin">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-12 col-md-10 pb-5 px-5">
                <form action="{{ route('admin_families.store') }}" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <p class="font-weight-bold h2">Добавление семьи</p>
                    </div>
                    <div class="form-group">
                        <label for="name_input">Заголовок:<span class="text-danger">*</span></label>
                        <input id="name_input" type="text" class="form-control" name="name" required value="{{old('name')}}">
                    </div>

                    <div class="form-group">
                        <label for="slug_input">Слаг:<span class="text-danger">*</span></label>
                        <input id="slug_input" type="text" class="form-control" name="slug" required value="{{old('slug')}}">
                    </div>
                    <div class="form-group">
                        <label for="budget_input">Убит:<span class="text-danger">*</span></label>
                        <input id="budget_input" type="number" class="form-control" name="budget" required value="{{old('budget')}}">
                    </div>
                    <div class="form-group">
                        <label for="count_killed_input">Арестован:<span class="text-danger">*</span></label>
                        <input id="count_killed_input" type="number" class="form-control" name="count_killed" required value="{{old('count_killed')}}">
                    </div>
                    <div class="form-group">
                        <label for="count_arrested_input">Пресса:<span class="text-danger">*</span></label>
                        <input id="count_arrested_input" type="number" class="form-control" name="count_arrested" required value="{{old('count_arrested')}}">
                    </div>
                    <div class="form-group">
                        <label for="member_input">Связь:<span class="text-danger">*</span></label>
                        <input id="member_input" type="text" class="form-control" name="member" required value="{{old('member')}}">
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

