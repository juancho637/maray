<a href="{{ route('users.show', $id) }}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
<a href="{{ route('users.edit', $id) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
<form method="POST" action="{{ route('users.destroy', $id) }}" style="display: inline">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" onclick="return confirm('¿Estas seguro de querer eliminar este usuario?')" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>
</form>