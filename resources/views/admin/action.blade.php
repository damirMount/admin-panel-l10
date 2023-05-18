<div class="row justify-content-center">
    <form id="form-{{ $model->id }}" name="delete-form" method="POST"
          action="{{ route('admin.'.$type.'.destroy', $model) }}">
        @csrf
        @method('DELETE')
        <button type="button" onclick="deleteConfirm(this)" data-id="{{ $model->id }}" title="{{ __('Удалить') }}"
                class="btn n btn-danger">
            <i class="fas fa-trash"></i>
        </button>
    </form>

    <a class="btn btn-primary ml-1" href="{{ route('admin.'.$type.'.edit', $model) }}" ><i class="fas fa-pen"></i></a>
    <a class="btn btn-success ml-1" href="{{ route('admin.' . $type . '.show', $model) }}" ><i class="fas fa-eye"></i></a>
</div>

<script>
    function deleteConfirm(me) {
        if (confirm('Вы дествительно хотите удалить ?')) {
            let model_id = me.dataset.id;
            $('form#form-' + model_id).submit();
        }
    }
</script>
