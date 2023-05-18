@extends('admin.layouts.app')

@section('content')
    <section>
        <div class="container bg-light first-wrapper">
            <div class="row">
                <div class="col-12 d-flex mt-2 justify-content-end">
                    <a class="btn btn-primary ml-1" href="{{ route('admin_articles.edit', $article) }}"><i
                            class="fas fa-pen"></i></a>
                    <form id="form-{{ $article->id }}" class="pl-2" name="delete-form" method="POST"
                          action="{{ route('admin_articles.destroy', $article) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteConfirm(this)" data-id="{{ $article->id }}"
                                title="{{ __('Удалить') }}"
                                class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>

                </div>
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="col-7">
                                <h4>
                                    {{ $article->title }}
                                </h4>
                                <p>
                                    {{ $article->id }}
                                </p>
                                <p>
                                    {{ $article->brief }}
                                </p>
                                <p>
                                    {{ $article->context }}
                                </p>
                                <p>
                                    {{ $article->slug }}
                                </p>
                                <p>
                                    {{ $article->killed }}
                                </p>
                                <p>
                                    {{ $article->arrested }}
                                </p>
                                <p>
                                    {{ $article->press }}
                                </p>
                                <p>
                                    {{ $article->link }}
                                </p>
                                <p>
                                    {{ $article->date }}
                                </p>
                                <p>
                                    {{ $article->meta_title }}
                                </p>
                                <p>
                                    {{ $article->meta_keywords }}
                                </p>
                                <p>
                                    {{ $article->meta_description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .card-body img {
            max-width: 100%;
            height: auto;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function deleteConfirm(me) {
            if (confirm('Вы дествительно хотите удалить ?')) {
                let model_id = me.dataset.id;
                $('form#form-' + model_id).submit();
            }
        }
    </script>
@endpush

