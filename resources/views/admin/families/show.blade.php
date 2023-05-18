@extends('admin.layouts.app')

@section('content')
    <section>
        <div class="container bg-light first-wrapper">
            <div class="row">
                <div class="col-12 d-flex mt-2 justify-content-end">
                    <a class="btn btn-primary ml-1" href="{{ route('admin_families.edit', $family) }}"><i
                            class="fas fa-pen"></i></a>
                    <form id="form-{{ $family->id }}" class="pl-2" name="delete-form" method="POST"
                          action="{{ route('admin_families.destroy', $family) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteConfirm(this)" data-id="{{ $family->id }}"
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
                                    {{ $family->name }}
                                </h4>
                                <p>
                                    {{ $family->id }}
                                </p>
                                <p>
                                    {{ $family->slug }}
                                </p>
                                <p>
                                    {{ $family->budget }}
                                </p>
                                <p>
                                    {{ $family->count_killed }}
                                </p>
                                <p>
                                    {{ $family->count_arrested }}
                                </p>
                                <p>
                                    {{ $family->member }}
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







