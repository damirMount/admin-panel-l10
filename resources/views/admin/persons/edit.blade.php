@extends('admin.layouts.app')

@section('content')
    <div class="p-3 bg-form card-body-admin">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-12 col-md-10">
                <form action="{{ route('admin_articles.update', $article->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-center">
                        <p class="font-weight-bold h2">Добавление новости</p>
                    </div>
                    <div class="form-group">
                        <label for="title_input">Заголовок:<span class="text-danger">*</span></label>
                        <input id="title_input" type="text" class="form-control" name="title" required
                               value="{{old('title', $article->title)}}">
                    </div>
                    <div class="form-group">
                        <label for="brief_textarea">Описание:<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="brief" id="brief_textarea">{!! old('brief', $article->brief) !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="context_textarea">Контекст:<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="context" id="context_textarea">{!! old('context', $article->context) !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="slug_input">Слаг:<span class="text-danger">*</span></label>
                        <input id="slug_input" type="text" class="form-control" name="slug" required
                               value="{{old('slug', $article->slug)}}">
                    </div>
                    <div class="form-group">
                        <label for="killed_input">Убит:<span class="text-danger">*</span></label>
                        <input id="killed_input" type="number" class="form-control" name="killed" required
                               value="{{old('killed', $article->killed)}}">
                    </div>
                    <div class="form-group">
                        <label for="arrested_input">Арестован:<span class="text-danger">*</span></label>
                        <input id="arrested_input" type="number" class="form-control" name="arrested" required
                               value="{{old('arrested', $article->arrested)}}">
                    </div>
                    <div class="form-group">
                        <label for="press_input">Пресса:<span class="text-danger">*</span></label>
                        <input id="press_input" type="text" class="form-control" name="press" required
                               value="{{old('press', $article->press)}}">
                    </div>
                    <div class="form-group">
                        <label for="link_input">Связь:<span class="text-danger">*</span></label>
                        <input id="link_input" type="text" class="form-control" name="link" required
                               value="{{old('link', $article->link)}}">
                    </div>
                    <div class="form-group">
                        <label for="date_input">Дата:<span class="text-danger">*</span></label>
                        <input id="date_input" type="datetime-local" class="form-control" name="date" required  value="{{old('date', $article->date)}}">
                    </div>
                    <div class="form-group">
                        <label for="meta_title_input">Мета название:</label>
                        <input id="meta_title_input" type="text" class="form-control" name="meta_title"
                               value="{{old('meta_title', $article->meta_title)}}">
                    </div>
                    <div class="form-group">
                        <label for="meta_keywords_input">Мета ключевые:</label>
                        <input id="meta_keywords_input" type="text" class="form-control" name="meta_keywords"
                               value="{{old('meta_keywords', $article->meta_keywords)}}">
                    </div>
                    <div class="form-group">
                        <label for="meta_description_input">Мета описание:</label>
                        <textarea class="form-control"
                                  name="meta_description"
                                  id="meta_description_input">{!! old('meta_description', $article->meta_description) !!}</textarea>
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
    {{--<script>--}}
        {{--tinymce.init({--}}
            {{--selector: 'textarea.tinymce-editor',--}}
            {{--height: 500,--}}
            {{--menubar: true,--}}
            {{--plugins: [--}}
                {{--'advlist autolink lists link image charmap print preview anchor',--}}
                {{--'searchreplace visualblocks code fullscreen',--}}
                {{--'insertdatetime media table paste code help wordcount'--}}
            {{--],--}}
            {{--toolbar: 'undo redo | formatselect | ' +--}}
            {{--'bold italic backcolor | alignleft aligncenter ' +--}}
            {{--'alignright alignjustify | bullist numlist outdent indent | ' +--}}
            {{--'removeformat | help | uploadimage',--}}
            {{--paste_data_images: true,--}}
            {{--images_upload_handler: function (blobInfo, success, failure) {--}}
                {{--success("data:" + blobInfo.blob().type + ";base64," + blobInfo.base64());--}}
            {{--},--}}
        {{--});--}}
    {{--</script>--}}
@endpush
