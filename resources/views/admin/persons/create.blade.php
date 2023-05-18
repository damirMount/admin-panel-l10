@extends('admin.layouts.app')

@section('content')
    <div class="p-3 bg-form card-body-admin">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-12 col-md-10 pb-5 px-5">
                <form action="{{ route('admin_persons.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <p class="font-weight-bold h2">Добавление персоны</p>
                    </div>

                    <div class="form-group">
                        <label for="avatar_input">Аватарка</label>
                        <input type="file" accept="image/*" id="avatar_input">
                    </div>
                    <div class="form-group">
                        <label for="background_input">Фон</label>
                        <input type="file" accept="image/*" id="background_input">
                    </div>
                    <div class="form-group">
                        <label for="thumb_input">Thumb:<span class="text-danger">*</span></label>
                        <input id="thumb_input" type="text" class="form-control" name="thumb" required value="{{old('thumb')}}">
                    </div>
                    <div class="form-group">
                        <label for="short_name_input">Инициалы:<span class="text-danger">*</span></label>
                        <input id="short_name_input" type="text" class="form-control" name="short_name" required value="{{old('short_name')}}">
                    </div>
                    <div class="form-group">
                        <label for="birthday_input">Дата рождения:<span class="text-danger">*</span></label>
                        <input id="birthday_input" type="datetime-local" class="form-control" name="birthday" required value="{{old('birthday')}}">
                    </div>
                    <div class="form-group">
                        <label for="deathdate_input">Дата смерти:<span class="text-danger">*</span></label>
                        <input id="deathdate_input" type="datetime-local" class="form-control" name="deathdate" required value="{{old('deathdate')}}">
                    </div>

                    <div class="form-group">
                        <label for="vision_input">Слаг:<span class="text-danger">*</span></label>
                        <input id="vision_input" type="text" class="form-control" name="vision" required value="{{old('vision')}}">
                    </div>
                    <div class="form-group">
                        <label for="department_name_input">Слаг:<span class="text-danger">*</span></label>
                        <input id="department_name_input" type="text" class="form-control" name="department_name" required value="{{old('department_name')}}">
                    </div>
                    <div class="form-group">
                        <label for="family_name_input">Слаг:<span class="text-danger">*</span></label>
                        <input id="family_name_input" type="text" class="form-control" name="family_name" required value="{{old('family_name')}}">
                    </div>
                    <div class="form-group">
                        <label for="meta_title_input">Слаг:<span class="text-danger">*</span></label>
                        <input id="meta_title_input" type="text" class="form-control" name="meta_title" required value="{{old('meta_title')}}">
                    </div>
                    <div class="form-group">
                        <label for="meta_keywords_input">Слаг:<span class="text-danger">*</span></label>
                        <input id="meta_keywords_input" type="text" class="form-control" name="meta_keywords" required value="{{old('meta_keywords')}}">
                    </div>
                    <div class="form-group">
                        <label for="meta_desc_input">Слаг:<span class="text-danger">*</span></label>
                        <input id="meta_desc_input" type="text" class="form-control" name="meta_desc" required value="{{old('meta_desc')}}">
                    </div>
                    <div class="form-group">
                        <label for="slug_input">Слаг:<span class="text-danger">*</span></label>
                        <input id="slug_input" type="text" class="form-control" name="slug" required value="{{old('slug')}}">
                    </div>



                    <div class="form-group">
                        <label for="brief_textarea">Описание:<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="brief" id="brief_textarea">{{ old('brief') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="count_killed_input">Слаг:<span class="text-danger">*</span></label>
                        <input id="count_killed_input" type="number" class="form-control" name="count_killed" required value="{{old('count_killed')}}">
                    </div>
                    <div class="form-group">
                        <label for="count_arrested_input">Слаг:<span class="text-danger">*</span></label>
                        <input id="count_arrested_input" type="number" class="form-control" name="count_arrested" required value="{{old('count_arrested')}}">
                    </div>
                    <div class="form-group">
                        <label for="count_budget_input">Слаг:<span class="text-danger">*</span></label>
                        <input id="count_budget_input" type="number" class="form-control" name="count_budget" required value="{{old('count_budget')}}">
                    </div>

                    <div class="form-group">
                        <label for="is_filled_input">Слаг:<span class="text-danger">*</span></label>
                        <input id="is_fill_input" type="checkbox" class="form-control" name="is_fill" required value="{{old('is_fill')}}">
                    </div>
                    <div class="form-group">
                        <label for="is_visible_input">Слаг:<span class="text-danger">*</span></label>
                        <input id="is_visible_input" type="checkbox" class="form-control" name="is_visible" required value="{{old('is_visible')}}">
                    </div>

                    {{--Json field--}}
                    .

                    <button type="submit" title="{{ __('Coхранить') }}"
                            class="btn btn-success">{{ __('Coхранить') }}</button>

                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
    </script>
@endpush
