@extends('layouts.app')

@section('script_top')
    <?php
    $setting = getSettingsInfo();
    $tax_setting = getTaxInfo();
    $baseURL = getBaseURL();
    ?>
@endsection

@section('content')

    <section class="main-content-wrapper">
        <section class="content-header">
            <h3 class="top-left-header">
                {{ isset($title) && $title ? $title : '' }}
            </h3>
        </section>

        @include('utilities.messages')

        <div class="box-wrapper">
            <div class="table-box">
                <!-- form start -->
                {!! Form::model(isset($obj) && $obj ? $obj : '', [
                    'id' => 'product_form',
                    'method' => isset($obj) && $obj ? 'POST' : 'POST',
                    'enctype' => 'multipart/form-data',
                    'route' => ['finiduplicate_store'],
                ]) !!}
                @csrf
                <div>
                    <div class="row">
                        <div class="col-sm-12 mb-2 col-md-4">
                            <div class="form-group">
                                <label>@lang('index.name') <span class="required_star">*</span></label>
                                {!! Form::text('name', null, [
                                    'class' => 'check_required form-control',
                                    'id' => 'name',
                                    'placeholder' => 'Name',
                                ]) !!}
                                @if ($errors->has('name'))
                                    <div class="denger_alert">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 mb-2 col-lg-4">
                            <div class="form-group">
                                <label>@lang('index.code') <span class="required_star">*</span></label>
                                {!! Form::text('code', $ref_no, [
                                    'class' => 'check_required form-control',
                                    'id' => 'code',
                                    'onfocus' => 'select()',
                                    'placeholder' => 'Code',
                                ]) !!}
                                @if ($errors->has('code'))
                                    <div class="denger_alert">
                                        {{ $errors->first('code') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2 col-md-4">
                            <div class="form-group">
                                <label>@lang('index.category') <span class="required_star">*</span></label>
                                <select class="form-control select2" name="category" id="category_id">
                                    <option value="">@lang('index.select')</option>
                                    @foreach ($categories as $value)
                                        <option
                                            {{ isset($obj->category) && $obj->category == $value->id ? 'selected' : '' }}
                                            value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <div class="denger_alert">
                                        {{ $errors->first('category') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-sm-12 col-md-6 mb-2 col-lg-4">
                            <div class="form-group">
                                <label>@lang('index.unit') <span class="required_star">*</span></label>
                                <select class="form-control select2" name="unit" id="unit_id">
                                    <option value="">@lang('index.select')</option>
                                    @foreach ($units as $value)
                                        <option {{ isset($obj->unit) && $obj->unit == $value->id ? 'selected' : '' }}
                                            value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('unit'))
                                    <div class="denger_alert">
                                        {{ $errors->first('unit') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-2 col-lg-4">
                            <div class="form-group">
                                <label>@lang('index.stock_method') <span class="required_star">*</span></label>
                                <select class="form-control select2" name="stock_method" id="stocks">
                                    <option value="">@lang('index.select')</option>
                                    <option
                                        {{ isset($obj->stock_method) && $obj->stock_method == 'none' ? 'selected' : '' }}
                                        value="none">@lang('index.none')</option>
                                    <option
                                        {{ isset($obj->stock_method) && $obj->stock_method == 'fifo' ? 'selected' : '' }}
                                        value="fifo">@lang('index.fifo')</option>
                                    <option
                                        {{ isset($obj->stock_method) && $obj->stock_method == 'batchcontrol' ? 'selected' : '' }}
                                        value="batchcontrol">@lang('index.batch_control')</option>
                                    <option
                                        {{ isset($obj->stock_method) && $obj->stock_method == 'fefo' ? 'selected' : '' }}
                                        value="fefo">@lang('index.fefo')</option>
                                </select>
                                @if ($errors->has('stock_method'))
                                    <div class="denger_alert">
                                        {{ $errors->first('stock_method') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="clearfix"></div><br>
                        <h4 class="header_right">@lang('index.raw_material_consumption_cost') (BoM)</h4>
                        <div class="col-sm-12 mb-2 col-md-4">
                            <div class="form-group">
                                <label>@lang('index.raw_material_consumption_cost')</label>
                                <select tabindex="4" class="form-control select2 select2-hidden-accessible"
                                    name="rmaterial" id="rmaterial">
                                    <option value="">Select</option>
                                    @foreach ($rmaterials as $rm)
                                        <?php
                                $totalStock = @($rm->total_purchase * $rm->conversion_rate)  - $rm->total_rm_waste + $rm->opening_stock;
                                if ($totalStock > 0) :
                                    $last_p_price = getLastThreePurchasePrice($rm->id);
                                    $last_cp_price = getLastThreeCPurchasePrice($rm->id);
                                ?>
                                        <?php if ($rm->consumption_check === 0) : ?>
                                        <option value="{{ $rm->id . '|' . $rm->name . ' (' . $rm->code . ')|' . $rm->name . '|' . $rm->cost_in_consumption_unit . '|' . getPurchaseSaleUnitById($rm->unit) . '|' . $setting->currency . '|' . $last_p_price }}">{{ $rm->name . '(' . $rm->code . ')' }}</option>
                                        <?php else : ?>
                                        <option value="{{ $rm->id . '|' . $rm->name . ' (' . $rm->code . ')|' . $rm->name . '|' . $rm->cost_in_consumption_unit . '|' . getPurchaseSaleUnitById($rm->consumption_unit) . '|' . $setting->currency . '|' . $rm->rate_per_consumption_unit }}">{{ $rm->name . '(' . $rm->code . ')' }}</option>
                                        <?php endif; ?>

                                        <?php
                                endif;
                                ?>
                                    @endforeach
                                </select>

                                @if ($errors->has('rmaterial'))
                                    <div class="denger_alert">
                                        {{ $errors->first('rmaterial') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive" id="purchase_cart">
                                <table class="table">
                                    <thead>
                                        <th class="width_1_p">@lang('index.sn')</th>
                                        <th class="width_20_p">@lang('index.raw_materials')(@lang('index.code'))</th>
                                        <th class="width_20_p"> @lang('index.rate_per_unit')</th>
                                        <th class="width_20_p"> @lang('index.consumption')</th>
                                        <th class="width_20_p">@lang('index.cost')</th>
                                        <th class="width_3_p ir_txt_center">@lang('index.actions')</th>
                                    </thead>
                                    <tbody class="add_tr">
                                        @if (isset($fp_rmaterials) && $fp_rmaterials)
                                            @foreach ($fp_rmaterials as $key => $value)
                                                <tr class="rowCount" data-id="{{ $value->rmaterials_id }}">
                                                    <td class="width_1_p">
                                                        <p class="set_sn"></p>
                                                    </td>
                                                    <td><input type="hidden" value="{{ $value->rmaterials_id }}"
                                                            name="rm_id[]">
                                                        <span>{{ getRMName($value->rmaterials_id) }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="number" tabindex="5" name="unit_price[]"
                                                                onfocus="this.select();"
                                                                class="check_required form-control integerchk input_aligning unit_price_c cal_row"
                                                                placeholder="Unit Price" value="{{ $value->unit_price }}"
                                                                id="unit_price_1">
                                                            <div class="input-group-append">
                                                                <span
                                                                    class="input-group-text">{{ $setting->currency }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="number" data-countid="1" tabindex="51"
                                                                id="qty_1" name="quantity_amount[]"
                                                                onfocus="this.select();"
                                                                class="check_required form-control integerchk input_aligning qty_c cal_row"
                                                                value="{{ $value->consumption }}"
                                                                placeholder="Consumption">
                                                            <div class="input-group-append">
                                                                <span
                                                                    class="input-group-text">{{ getPurchaseUnitByRMID($value->rmaterials_id) }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="number" id="total_1" name="total[]"
                                                                class="form-control input_aligning total_c"
                                                                value="{{ $value->consumption_unit }}"
                                                                placeholder="Total" readonly="">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    {{ $setting->currency }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="ir_txt_center"><a
                                                            class="btn btn-xs del_row dlt_button"><iconify-icon
                                                                icon="solar:trash-bin-minimalistic-broken"></iconify-icon>
                                                        </a></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="clearfix"></div>
                        <div class="col-md-8"></div>
                        <div class="col-md-3 mrl-42">
                            <label>@lang('index.total_raw_material_cost') <span class="required_star">*</span></label>
                            <div class="input-group">
                                <input type="text" id="rmcost_total" name="rmcost_total"
                                    class="form-control input_aligning" value="{{ $value->consumption_unit }}"
                                    placeholder="Total Raw Material Cost" readonly="">
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ $setting->currency }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="clearfix"></div>
                        <h4 class="">@lang('index.non_inventory_cost')</h4>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>@lang('index.non_inventory_item_cost')</label>
                                    <select tabindex="4" class="form-control select2 select2-hidden-accessible"
                                        name="noniitem" id="noniitem">
                                        <option value="">Select</option>
                                        @foreach ($nonitem as $rm)
                                            <option value="{{ $rm->id . '|' . $rm->name . '|' . $setting->currency }}">{{ $rm->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive" id="purchase_cart">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="width_1_p">@lang('index.sn')</th>
                                                <th class="width_20_p">@lang('index.non_inventory_items')</th>
                                                <th class="width_20_p"> @lang('index.non_inventory_cost') </th>
                                                <th class="width_3_p ir_txt_center">@lang('index.actions')</th>
                                            </tr>
                                        </thead>
                                        <tbody class="add_tr1">

                                            @if (isset($fp_nonitems) && $fp_nonitems)
                                                @foreach ($fp_nonitems as $key => $value)
                                                    <tr class="rowCount1" data-id="{{ $value->noninvemtory_id }}">
                                                        <td class="width_1_p">
                                                            <p class="set_sn1"></p>
                                                        </td>
                                                        <td><input type="hidden" value="{{ $value->noninvemtory_id }}"
                                                                name="noniitem_id[]">
                                                            <span>{{ getNonInventroyItem($value->noninvemtory_id) }}</span>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="number" id="total_1" name="total_1[]"
                                                                    class="cal_row  form-control aligning total_c1"
                                                                    onfocus="select();" value="{{ $value->nin_cost }}"
                                                                    placeholder="Total">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">
                                                                        {{ $setting->currency }}</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="ir_txt_center"><a
                                                                class="btn btn-xs del_row dlt_button"><iconify-icon
                                                                    icon="solar:trash-bin-minimalistic-broken"></iconify-icon>
                                                            </a></td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-4 mrl-70">
                                <label>@lang('index.total_non_inventory_cost')</label>
                                <div class="input-group">
                                    {!! Form::text('noninitem_total', null, [
                                        'class' => 'form-control',
                                        'readonly' => '',
                                        'id' => 'noninitem_total',
                                        'placeholder' => 'Total Non Inventory Cost',
                                    ]) !!}
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{ $setting->currency }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <label>@lang('index.total_cost') <span class="required_star">*</span></label>
                            <div class="input-group">
                                {!! Form::text('total_cost', null, [
                                    'class' => 'form-control total_cos margin_cal',
                                    'readonly' => '',
                                    'id' => 'total_cost',
                                    'placeholder' => 'Total Non Inventory Cost',
                                ]) !!}
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ $setting->currency }}</span>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <label>@lang('index.profit_margin') (%)</label>
                            <div class="input-group">
                                {!! Form::text('profit_margin', null, [
                                    'class' => 'form-control profit_margin margin_cal',
                                    'id' => 'profit_margin',
                                    'placeholder' => 'Profit Margin',
                                ]) !!}
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <?php
                        $collect_tax = $tax_items->collect_tax;
                        $tax_type = $tax_items->tax_type;
                        $tax_information = json_decode(isset($obj->tax_information) && $obj->tax_information ? $obj->tax_information : '');
                        ?>
                        <input type="hidden" name="tax_type" class="tax_type" value="{{ $tax_type }}">
                        @foreach ($tax_fields as $tax_field)
                            <div class="col-md-3 {{ isset($collect_tax) && $collect_tax == 'Yes' ? '' : 'd-none' }}">
                                @if ($tax_information)
                                    @foreach ($tax_information as $single_tax)
                                        @if ($tax_field->id == $single_tax->tax_field_id)
                                            <label>{{ $tax_field->tax }}</label>
                                            <input onfocus="select();" tabindex="1" type="hidden"
                                                name="tax_field_id[]" value="{{ $single_tax->tax_field_id }}">
                                            <input onfocus="select();" tabindex="1" type="hidden"
                                                name="tax_field_name[]" value="{{ $single_tax->tax_field_name }}">
                                            <div class="input-group">
                                                <input onfocus="select();" tabindex="1" type="text"
                                                    name="tax_field_percentage[]"
                                                    class="form-control @error('title') is-invalid @enderror integerchk get_percentage cal_row"
                                                    placeholder="" value="{{ $single_tax->tax_field_percentage }}">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <label>{{ $tax_field->tax }}</label>
                                    <input onfocus="select();" tabindex="1" type="hidden" name="tax_field_id[]"
                                        value="{{ $tax_field->id }}">
                                    <input onfocus="select();" tabindex="1" type="hidden" name="tax_field_name[]"
                                        value="{{ $tax_field->tax }}">
                                    <div class="input-group">
                                        <input onfocus="select();" tabindex="1" type="text"
                                            name="tax_field_percentage[]"
                                            class="form-control @error('title') is-invalid @enderror integerchk get_percentage cal_row"
                                            placeholder="{{ $tax_field->tax }}" value="{{ $tax_field->tax_rate }}">
                                        <span class="input-group-text">%</span>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>@lang('index.sale_price') <span class="required_star">*</span></label>

                            <div class="input-group">
                                {!! Form::text('sale_price', null, [
                                    'class' => 'form-control margin_cal sale_price',
                                    'readonly' => '',
                                    'id' => 'sale_price',
                                    'placeholder' => 'Sale Price',
                                ]) !!}
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ $setting->currency }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div><br>
                    <h4 class="">@lang('index.manufacture_stages')</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>@lang('index.manufacture_stages')</label>
                                <select tabindex="4" class="form-control select2 select2-hidden-accessible"
                                    name="productionstage" id="productionstage">
                                    <option value="">@lang('index.select')</option>
                                    @foreach ($productionstage as $ps)
                                        <option value="{{ $ps->id . '|' . $ps->name }}">{{ $ps->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('productionstage'))
                                    <div class="denger_alert">
                                        {{ $errors->first('productionstage') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive" id="purchase_cart">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="width_1_p">@lang('index.sn')</th>
                                            <th class="width_20_p stage_header">@lang('index.stage')</th>
                                            <th class="width_20_p stage_header"> @lang('index.required_time')</th>
                                            <th class="width_1_p ir_txt_center">@lang('index.actions')</th>
                                        </tr>
                                    </thead>
                                    <tbody class="add_tr2">

                                        @if (isset($fp_productionstages) && $fp_productionstages)
                                            @foreach ($fp_productionstages as $key => $value)
                                                <tr class="rowCount2" data-id="{{ $value->productionstage_id }}">
                                                    <td class="width_1_p">
                                                        <p class="set_sn2"></p>
                                                    </td>
                                                    <td class="stage_name"><input type="hidden"
                                                            value="{{ $value->productionstage_id }}"
                                                            name="producstage_id[]">
                                                        <span>{{ getProductionStages($value->productionstage_id) }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="input-group"><input
                                                                        class="form-control stage_aligning" type="text"
                                                                        id="month_limit" name="stage_month[]"
                                                                        min="0" max="02"
                                                                        value="{{ $value->stage_month }}"
                                                                        placeholder="Month"><span
                                                                        class="input-group-text">@lang('index.months')</span>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="input-group"><input
                                                                        class="form-control stage_aligning" type="text"
                                                                        id="day_limit" name="stage_day[]" min="0"
                                                                        max="31" value="{{ $value->stage_day }}"
                                                                        placeholder="Days"><span
                                                                        class="input-group-text">@lang('index.days')</span>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="input-group"><input
                                                                        class="form-control stage_aligning" type="text"
                                                                        id="hours_limit" name="stage_hours[]"
                                                                        min="0" max="24"
                                                                        value="{{ $value->stage_hours }}"
                                                                        placeholder="Hours"><span
                                                                        class="input-group-text">@lang('index.hours')</span>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="input-group"><input
                                                                        class="form-control stage_aligning" type="text"
                                                                        id="minute_limit" name="stage_minute[]"
                                                                        min="0" max="60"
                                                                        value="{{ $value->stage_minute }}"
                                                                        placeholder="Minutes"><span
                                                                        class="input-group-text">@lang('index.minutes')</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="ir_txt_center"><a
                                                            class="btn btn-xs del_row dlt_button"><iconify-icon
                                                                icon="solar:trash-bin-minimalistic-broken"></iconify-icon>
                                                        </a></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="row mt-2">
                    <div class="col-sm-12 col-md-6 mb-2 d-flex gap-3">
                        <button type="submit" name="submit" value="submit" class="btn bg-blue-btn"><iconify-icon
                                icon="solar:check-circle-broken"></iconify-icon>@lang('index.submit')</button>
                        <a class="btn bg-second-btn" href="{{ route('finishedproducts.index') }}"><iconify-icon
                                icon="solar:round-arrow-left-broken"></iconify-icon>@lang('index.back')</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>


@endsection

@section('script')
    <script type="text/javascript" src="{!! $baseURL . 'frequent_changing/js/addFinishedProduct.js' !!}"></script>
@endsection
