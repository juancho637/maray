@if (Auth::user()->balances->isEmpty())
    <div class="alert alert-warning">
        No tienes una caja activa, si intentas crear el recurso se perdera la información.
    </div>
@elseif(Auth::user()->balances()->lastBalance()->state->abbreviation !== 'gen-act')
    <div class="alert alert-warning">
        No tienes una caja activa, si intentas crear el recurso se perdera la información.
    </div>
@endif