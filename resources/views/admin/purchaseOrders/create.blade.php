@extends('admin._layouts.main')

@section('title', config('app.name').' | Ordenes y cotizaciones')

@section('header', 'Ordenes y cotizaciones')

@section('description', 'Crear orden o cotización')

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/dist/css/select2.min.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- jquery timepicker -->
    <link rel="stylesheet" href="{{ asset('/plugins/jquery-timepicker/jquery.timepicker.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('/plugins/iCheck/all.css') }}">
@endpush

@section('content')
    @include('admin._layouts.partials.warningBalance')
    <div class="box box-primary">
        <div class="box-body">
            <form action="{{ route('purchaseOrders.store') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group {{ $errors->has('expires') ? 'has-error' : '' }}">
                            <label for="datepicker">Fecha de vencimiento:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input value="{{ old('expires', Date('Y-m-d')) }}" name="expires" type="text" class="form-control pull-right datepicker">
                            </div>
                            {!! $errors->first('expires', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <label>Tipo:</label>
                            <select name="type" id="type" style="width: 100%" class="form-control select2" required>
                                <option value="purchaseOrder" selected>Orden de compra</option>
                                <option value="invoice">Factura</option>
                                <option value="quotation">Cotización</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
                            <label for="client_id">Cliente:</label>
                            <select name="client_id" id="client_id" class="form-control" style="width: 100%;" required></select>
                            {!! $errors->first('client_id', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group {{ $errors->has('pet_id') ? 'has-error' : '' }}">
                            <label for="pet_id">Mascota:</label>
                            <select name="pet_id" id="pet_id" class="form-control select2" style="width: 100%;">
                                <option value="" selected="selected">Selecciona una mascota</option>
                            </select>
                            {!! $errors->first('pet_id', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <label>Identificación:</label>
                            <input type="text" id="identification" class="form-control" disabled/>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <label>Dirección:</label>
                            <input type="text" id="address" class="form-control" disabled/>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <label>Celular:</label>
                            <input type="text" id="cell_phone" class="form-control" disabled/>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <label>Teléfono:</label>
                            <input type="text" id="phone" class="form-control" disabled/>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group {{ $errors->has('products') ? 'has-error' : '' }}">
                            <button type="button" id="addProduct" class="btn btn-primary btn-block">Agregar producto</button>
                            {!! $errors->first('products', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div id="products"></div>
                </div>
                <div id="deposits"></div>
                <hr>
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label>Sub total:</label>
                            <input type="text" id="subTotal" name="subTotal" class="form-control" readonly/>
                        </div>
                    </div>
                    <div id="invoice">
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label>Iva:</label>
                                <input type="text" id="iva" name="iva" class="form-control" readonly/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label>Total:</label>
                                <input type="text" id="total" name="total" class="form-control" readonly/>
                            </div>
                        </div>
                    </div>
                    <div id="purchase">
                        <div class="col-xs-12 col-md-3">
                            <div class="form-group">
                                <label>Efectivo:</label>
                                <input type="number" name="cash" id="cash" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="form-group">
                                <label>Cheque:</label>
                                <input type="number" name="cheque" id="cheque" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="form-group">
                                <label>Tarjeta:</label>
                                <input type="number" name="card" id="card" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="form-group">
                                <label>Crédito:</label>
                                <input type="number" name="credit" id="credit" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label>Depósito asignado:</label>
                                <input type="text" id="assignedDeposit" class="form-control" disabled/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group {{ $errors->has('outstandingBalance') ? 'has-error' : '' }}">
                                <label>Saldo pendiente:</label>
                                <input type="text" id="outstandingBalance" name="outstandingBalance" class="form-control" readonly/>
                                {!! $errors->first('outstandingBalance', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label>Saldo a favor:</label>
                                <input type="text" id="positiveBalance" name="positiveBalance" class="form-control" readonly/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Crear</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- moment -->
    <script src="{{ asset('/plugins/moment/moment-with-locales.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" charset="UTF-8"></script>
    <script src="{{ asset('/plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js') }}"></script>

    <script>
        $(function () {
            let pets = [], clients = [], productId = 0, products = [];
            let subTotal = 0, iva = 0, total = 0;
            let cash = 0, credit = 0, card = 0, cheque = 0, deposit = 0;
            let client_id = '{{ old('client_id') }}';

            @if(old('products'))
                @foreach(old('products') as $product)
                    products.push({
                        product_id: parseInt('{{ $product['product_id'] }}'),
                        name: "{{ \App\Product::where('id', $product['product_id'])->first()->name }}",
                        row: ""+productId,
                        quantity: parseInt('{{ $product['quantity'] }}'),
                        taxPercentage: parseInt('{{ $product['iva'] }}'),
                        netValue: parseInt('{{ $product['unit_value'] }}'),
                        totalValue: parseInt('{{ $product['total_value'] }}'),
                        unitValue: parseInt('{{ $product['net_value'] }}'),
                    });

                    $('#products').append(productForm(productId, products[productId]));
                    productId++;
                @endforeach
                calculateTotalValues();
                calculateBalance();
                //console.log(products);
            @endif

            //Initialize Select2 Elements
            $('.select2').select2();

            //Date picker
            $('.datepicker').datepicker({
                autoclose: true,
                language: 'es',
                format: 'yyyy-mm-dd',
                startDate: new Date()
            });

            initializeProductSelect();

            $('#client_id').select2({
                minimumInputLength: 2,
                language: {
                    inputTooShort: function () {
                        return "Por favor ingrese 2 o más letras para realizar la busqueda.";
                    }
                },
                ajax: {
                    url: "{{ route('api.clients.index') }}",
                    data: function (params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        clients = data;
                        return {
                            results: data
                        };
                    },
                }
            }).change(function() {
                clients.map((client)=>{
                    if(client.id === parseInt($(this).val())){
                        client_id = client.id;
                        setFields(client);
                    }
                });

                deposit = 0;
                searchDeposits($(this).val());
                calculateBalance();
            });

            $('#addProduct').click(function(){
                $('#products').append(productForm(productId));
                initializeProductSelect();
                productId++;
            });

            $(document).on("click", ".deposits", function(){
                if ($(this).is(':checked')){
                    deposit += parseInt($(this).attr('data-total'));
                }else{
                    deposit -= parseInt($(this).attr('data-total'));
                }

                calculateBalance();
            });

            $(document).on("click", ".btnRemoveProduct", function(){
                let row = $(this).attr('data-deleteRow');

                products.map(function (product, index) {
                    if(product.row === row) {
                        products.splice(index, 1);
                    }
                });

                //console.log(products);
                calculateTotalValues();
                calculateBalance();
                $('#row'+row).remove();
            });

            $(document).on('keyup', 'input[data-quantityRow]', function(){
                if ($(this).val() !== ""){
                    let _rowId = $(this).attr('data-quantityRow');
                    let _quantity = parseInt($(this).val());
                    let _totalValue = _quantity * $('input[data-unitValueRow="'+_rowId+'"]').val();

                    $('input[data-totalValueRow="'+_rowId+'"]').val(_totalValue);

                    products.map(function (product) {
                        if (_rowId === product.row){
                            product.quantity = _quantity;
                            product.totalValue = _totalValue;
                        }
                    });

                    calculateTotalValues();
                    calculateBalance();
                    //console.log(products);
                }
            });

            $('#cash').bind('keyup', function() {
                let _val = parseInt($(this).val());

                if (isNaN(_val)) {
                    cash = 0;
                } else {
                    cash = _val;
                }

                setTimeout(function(){
                    calculateBalance();
                }, 2000);
            });
            $('#credit').bind('keyup', function() {
                let _val = parseInt($(this).val());

                if (isNaN(_val)) {
                    credit = 0;
                } else {
                    credit = _val;
                }

                setTimeout(function(){
                    calculateBalance();
                }, 2000);
            });
            $('#card').bind('keyup', function() {
                let _val = parseInt($(this).val());

                if (isNaN(_val)) {
                    card = 0;
                } else {
                    card = _val;
                }

                setTimeout(function(){
                    calculateBalance();
                }, 2000);
            });
            $('#cheque').bind('keyup', function() {
                let _val = parseInt($(this).val());

                if (isNaN(_val)) {
                    cheque = 0;
                } else {
                    cheque = _val;
                }

                setTimeout(function(){
                    calculateBalance();
                }, 2000);
            });

            $('#type').change(function () {
                //console.log(client_id);
                if ($(this).val() === 'quotation') {
                    $('#deposits').empty();
                    $('#purchase').hide();
                }else{
                    if (client_id){
                        searchDeposits(client_id);
                    }
                    $('#deposits').show();
                    $('#purchase').show();
                }
                deposit = 0;
                calculateBalance();
            });

            //Code
            if(client_id){
                $.get('{{ route('api.clients.show', old('client_id')) }}', function(client) {
                    $('#client_id').append(`<option value="{{ old('client_id') }}" selected>${client.text}</option>`);
                    setFields(client);
                });

                searchDeposits(client_id);
            }

            function setFields(client) {
                pets = client.pets;
                $('#identification').val(client.type_identification+'. '+client.identification);
                $('#address').val(client.address);
                $('#cell_phone').val(client.cell_phone);
                $('#phone').val(client.phone);

                let oldPet = parseInt({{ old('pet_id') }});

                $('#pet_id').empty().append(`<option value="" selected>Selecciona una mascota</option>`);
                pets.map((pet)=>{
                    $('#pet_id').append(`<option value="${pet.id}" title="${pet.breed.name}" ${oldPet === pet.id ? 'selected' : ''}>${pet.name}</option>`);
                });
            }

            function searchDeposits(client_id) {
                if ($('#type').val() !== 'quotation') {
                    let url = '{{ route("api.clients.deposits.index", ":client_id") }}';
                    url = url.replace(':client_id', client_id);

                    $.get(url, function (response) {
                        $('#deposits').empty().html(response.view);
                    });
                }else{
                    $('#deposits').empty();
                }
            }

            function initializeProductSelect() {
                $('.product_id').select2({
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
                                search: params.term
                            };
                        },
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        },
                    }
                }).change(function() {
                    let _rowId = $(this).attr('data-productRow');
                    let _quantity = $('input[data-quantityRow="'+_rowId+'"]').val();
                    //console.log($(this).val());

                    if ($(this).val() !== null) {
                        let url = '{{ route("api.products.show", [":product_id"]) }}';
                        url = url.replace(':product_id', $(this).val());

                        $.ajax({
                            url: url,
                            type: 'GET',
                            success: function (res) {
                                $('input[data-netValueRow="'+_rowId+'"]').val(res.value);
                                $('input[data-ivaRow="'+_rowId+'"]').val(res.tax_percentage);
                                $('input[data-unitValueRow="'+_rowId+'"]').val(res.unit_value);
                                $('input[data-totalValueRow="'+_rowId+'"]').val(_quantity * res.unit_value);
                                let push = true;

                                products.map(function (product) {
                                    if (_rowId === product.row){
                                        product.unitValue = res.value;
                                        product.taxPercentage = res.tax_percentage;
                                        product.netValue = res.unit_value;
                                        product.totalValue = _quantity * res.unit_value;
                                        push = false;
                                    }
                                });

                                if (push){
                                    products.push({
                                        row: _rowId,
                                        unitValue: res.value,
                                        taxPercentage: res.tax_percentage,
                                        quantity: parseInt(_quantity),
                                        netValue: res.unit_value,
                                        totalValue: _quantity * res.unit_value,
                                    });
                                }

                                calculateTotalValues();
                                calculateBalance();
                                //console.log(products);
                            }
                        });
                    }
                });
            }

            function productForm(id, product = []) {
                let prod = {
                    netValue: product['netValue'] ? product['netValue'] : 0,
                    product_id: product['product_id'] ? product['product_id'] : 0,
                    name: product['name'] ? product['name'] : null,
                    quantity: product['quantity'] ? product['quantity'] : 1,
                    taxPercentage: product['taxPercentage'] ? product['taxPercentage'] : 0,
                    totalValue: product['totalValue'] ? product['totalValue'] : 0,
                    unitValue: product['unitValue'] ? product['unitValue'] : 0,
                };

                let html = '<div id="row'+id+'">';
                html += '<div class="col-xs-12 col-md-3">';
                html += '<div class="form-group">';
                html += '<label>Producto:</label>';
                html += '<select name="products['+id+'][product_id]" data-productRow="'+id+'" style="width: 100%" class="form-control product_id" required>';
                if (product['netValue']) {
                    html += '<option value="'+prod['product_id']+'" selected>'+prod['name']+'<option>';
                }
                html += '</select>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-xs-12 col-md-1">';
                html += '<div class="form-group">';
                html += '<label>Cantidad:</label>';
                html += '<input type="text" name="products['+id+'][quantity]" data-quantityRow="'+id+'" class="form-control" value="'+prod['quantity']+'" data-inputmask=\'"mask": "9[9][9]"\' data-mask required/>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-xs-12 col-md-2">';
                html += '<div class="form-group">';
                html += '<label>Valor neto:</label>';
                html += '<input type="text" name="products['+id+'][net_value]" data-netValueRow="'+id+'" class="form-control" value="'+prod['unitValue']+'" readonly/>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-xs-12 col-md-1">';
                html += '<div class="form-group">';
                html += '<label>Iva (%):</label>';
                html += '<input type="text" name="products['+id+'][iva]" data-ivaRow="'+id+'" class="form-control" value="'+prod['taxPercentage']+'" readonly/>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-xs-12 col-md-2">';
                html += '<div class="form-group">';
                html += '<label>Valor unitario:</label>';
                html += '<input type="text" name="products['+id+'][unit_value]" data-unitValueRow="'+id+'" class="form-control" value="'+prod['netValue']+'" readonly/>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-xs-12 col-md-2">';
                html += '<div class="form-group">';
                html += '<label>Valor total:</label>';
                html += '<input type="text" name="products['+id+'][total_value]" data-totalValueRow="'+id+'" class="form-control" value="'+prod['totalValue']+'" readonly/>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-xs-12 col-md-1">';
                html += '<div class="form-group">';
                html += '<label style="color: transparent;">d</label>';
                html += '<button type="button" class="btn btn-danger btn-block btnRemoveProduct" data-deleteRow="'+id+'"><i class="fa fa-trash"></i></button>';
                html += '</div>';
                html += '</div>';
                html += '</div>';

                return html;
            }
            
            function calculateTotalValues() {
                subTotal = 0;
                iva = 0;
                total = 0;

                products.map(function (product) {
                    //console.log(product);
                    subTotal += product.unitValue * product.quantity;
                    iva += ((product.taxPercentage * product.unitValue) / 100) * product.quantity;
                    total += product.totalValue;
                });

                $('#subTotal').val(subTotal);
                $('#iva').val(iva);
                $('#total').val(total);
            }

            function calculateBalance() {
                let _type = $('#type').val();
                let _balance = cash + cheque + card + credit + deposit;

                $('#assignedDeposit').val(deposit);

                if (_type === 'purchaseOrder') {
                    /*if ((cash + deposit) > subTotal){

                    }*/
                    if (_balance > subTotal) {
                        $('#positiveBalance').val(_balance - subTotal);
                        $('#outstandingBalance').val(0);
                    } else {
                        $('#outstandingBalance').val(subTotal - _balance);
                        $('#positiveBalance').val(0);
                    }
                }
                if (_type === 'invoice') {
                    if (_balance > total) {
                        $('#positiveBalance').val(_balance - total);
                        $('#outstandingBalance').val(0);
                    } else {
                        $('#outstandingBalance').val(total - _balance);
                        $('#positiveBalance').val(0);
                    }
                }
            }
        });
    </script>
@endpush