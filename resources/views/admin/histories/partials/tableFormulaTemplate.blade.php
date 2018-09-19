@if($engagement->history()->exists())
    @if(count($engagement->history->formulas))
        @if(count($engagement->history->formulas[0]->formulaDetails))
            <table class="table table-striped" id="products-table">
                <thead>
                <tr>
                    <th>Medicamento</th>
                    <th>Presentación</th>
                    <th>Cantidad</th>
                    <th>Indicaciones</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody id="purchase-order-details">
                @include('admin.histories.partials.trFormulaTemplate', ['details' => $engagement->history->formulas[0]->formulaDetails])
                </tbody>
            </table>
        @endif
    @endif
@endif