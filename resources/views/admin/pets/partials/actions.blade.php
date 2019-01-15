<a href="{{ route('clients.pets.edit', [$client_id, $id]) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
<form method="POST" action="{{ route('clients.pets.destroy', [$client_id, $id]) }}" style="display: inline">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit"
            onclick="return confirm('¿Estas seguro de querer eliminar esta mascota?')"
            class="btn btn-xs btn-danger">
        <i class="fa fa-times"></i>
    </button>
</form>