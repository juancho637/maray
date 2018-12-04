<hr>
@foreach($historyEngagements as $historyEngagement)
    @foreach($historyEngagement->engagement->detailEngagements as $detailEngagement)
        @if($detailEngagement->service->abbreviation === 'services')
            <form method="post" class="vaccine_form">
                <input name="engagement_id" type="hidden" value="{{ $historyEngagement->engagement->id }}">
                <input name="engagement_detail_id" type="hidden" value="{{ $detailEngagement->id }}">
                <input name="purchase_order_id" type="hidden" value="{{ $historyEngagement->engagement->purchaseOrder->id }}">
                @foreach($historyEngagement->engagement->purchaseOrder->details as $purchaseOrderDetail)
                    @if($purchaseOrderDetail->product->category->name === 'Biologicos')
                        <input name="detail_id" type="hidden" value="{{ $purchaseOrderDetail->id }}">
                    @endif
                @endforeach
                <div class="col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label>Nombre de la vacuna:</label>
                        <select class="form-control vaccine_id" name="product_id" style="width: 100%;" required>
                            @foreach($historyEngagement->engagement->purchaseOrder->details as $purchaseOrderDetail)
                                @if($purchaseOrderDetail->product->category->name === 'Biologicos')
                                    <option value="{{ $purchaseOrderDetail->product_id }}" selected="selected">{{ \App\Product::where('id', $purchaseOrderDetail->product_id)->first()->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-3">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Fecha de la vacunación:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input value="{{ $historyEngagement->engagement->date }}" name="date" type="text" class="form-control pull-right datepicker" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-5">
                    <div class="form-group">
                        <label>Descripción:</label>
                        <textarea class="form-control" name="description" rows="1">{{ $detailEngagement->description }}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-1">
                    <label style="color: transparent;">d</label>
                    <button name="action" class="btn btn-info btn-block"><i class="fa fa-refresh"></i></button>
                </div>
            </form>
            {{--<div class="col-xs-12 col-lg-1">
                <form method="post" class="delete_vaccine_form">
                    <label style="color: transparent;">d</label>
                    <input name="engagement_id" type="hidden" value="{{ $historyEngagement->engagement->id }}">
                    <input name="engagement_detail_id" type="hidden" value="{{ $detailEngagement->id }}">
                    <button class="btn btn-danger btn-block"><i class="fa fa-trash"></i></button>
                </form>
            </div>--}}
        @endif
    @endforeach
@endforeach

<script>
    //Initialize Datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        language: 'es',
        format: 'yyyy-mm-dd'
    });

    $('.vaccine_id').select2({
        minimumInputLength: 2,
        language: {
            inputTooShort: function () {
                return "Por favor ingrese 2 o más letras para realizar la busqueda.";
            }
        },
        ajax: {
            url: "{{ route('api.products.index') }}",
            data: function (params) {
                return {
                    search: params.term,
                    category: 'biologicos'
                };
            },
            processResults: function (data, params) {
                return {
                    results: data
                };
            },
        }
    });
</script>