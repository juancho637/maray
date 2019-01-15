<a href="{{ route('species.breeds.edit', [$species_id, $id]) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
<form method="POST" action="{{ route('species.breeds.destroy', [$species_id, $id]) }}" style="display: inline">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit"
            onclick="return confirm('¿Estas seguro de querer eliminar esta raza?')"
            class="btn btn-xs btn-danger">
        <i class="fa fa-times"></i>
    </button>
</form>