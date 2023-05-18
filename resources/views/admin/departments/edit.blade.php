@extends('admin.layouts.app')

@section('content')
    <div class="p-3 bg-form card-body-admin">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-12 col-md-10">
                <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-center">
                        <p class="font-weight-bold h2">Редактирование статуса</p>
                    </div>
                    <div class="form-group">
                        <label for="title_input">Заголовок</label>
                        <input id="title_input" type="text" class="form-control"
                               value="{{ old('content', $blog->title)}}"
                               name="title"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="desc_textarea">Описание</label>
                        <textarea id="desc_textarea" type="text" class="form-control"
                                  name="desc">{{ old('content', $blog->desc) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="banner_input">Баннер:<span class="text-danger">*</span></label>
                        <input id="banner_input" type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="content_textarea">Контент:<span class="text-danger">*</span></label>
                        <textarea id="content_textarea" type="text" class="form-control tinymce-editor"
                                  name="content">{!! old('content',$blog->content) !!}</textarea>
                    </div>
                    <button type="submit" title="{{ __('Изменить') }}"
                            class="btn btn-success">{{ __('Изменить') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.tiny.cloud/1/v3r71nl7rlj94mvjubwapzf91fnk5xaia0oxkl1jq66xux3i/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            height: 500,
            menubar: true,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help | uploadimage',
            paste_data_images: true,
            images_upload_handler: function (blobInfo, success, failure) {
                success("data:" + blobInfo.blob().type + ";base64," + blobInfo.base64());
            },
        });
    </script>
@endpush
