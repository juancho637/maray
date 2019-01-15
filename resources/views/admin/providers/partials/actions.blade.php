<a href="{{ route('providers.edit', $id) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
<form method="POST" action="{{ route('providers.destroy', $id) }}" style="display: inline">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit"
            onclick="return confirm('¿Estas seguro de querer eliminar este proveedor?')"
            class="btn btn-xs btn-danger">
        <i class="fa fa-times"></i>
    </button>
</form>