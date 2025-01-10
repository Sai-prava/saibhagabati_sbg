@extends('layouts.app')
@section('content')
    <?php
    $baseURL = getBaseURL();
    $setting = getSettingsInfo();
    $base_color = '#6ab04c';
    if (isset($setting->base_color) && $setting->base_color) {
        $base_color = $setting->base_color;
    }
    ?>
    <section class="main-content-wrapper">
        @include('utilities.messages')
        <section class="content-header">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="top-left-header">{{ isset($title) && $title ? $title : '' }}</h2>
                    <input type="hidden" class="datatable_name" data-title="{{ isset($title) && $title ? $title : '' }}"
                        data-id_name="datatable">
                </div>
                <div class="col-md-offset-4 col-md-2">

                </div>
            </div>
        </section>


        <div class="box-wrapper">
            <form action="{{ request()->url() }}" method="get">
                <div class="row">
                    <div class="col-sm-12 mb-2 col-md-6">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="form-group w-50">
                                <label>@lang('index.product') <span class="required_star">*</span></label>
                                <select class="form-control @error('product') is-invalid @enderror select2" name="product"
                                    id="product_id">
                                    <option value="">@lang('index.select_product')</option>
                                    @foreach ($products as $value)
                                        <option value="{{ $value->id }}|{{ $value->name }}|{{ $value->code }}">{{ $value->name }}
                                            ({{ $value->code }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quantity">@lang('index.quantity') <span class="required_star">*</span></label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                    id="quantity" name="quantity" placeholder="@lang('index.enter_quantity')">
                            </div>
                            <button type="button" class="btn bg-blue-btn mt-4" id="add_product"><iconify-icon
                                    icon="solar:check-circle-broken"></iconify-icon>@lang('index.add')</button>
                        </div>
                        <p id="product_error" class="text-danger d-none">Product is required</p>
                        <p id="quantity_error" class="text-danger d-none">Quantity is required</p>
                        <p id="product_duplicate_error" class="text-danger d-none">Product already added</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mb-2 col-md-6">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>@lang('index.sn')</th>
                                    <th>@lang('index.product')</th>
                                    <th>@lang('index.quantity')</th>
                                    <th>@lang('index.actions')</th>
                                </tr>
                            </thead>
                            <tbody id="product_list">
                                <p class="text-danger d-none" id="product_list_error">Please add at least one product</p>
                            </tbody>
                        </table>
                        <button type="submit" class="btn bg-blue-btn mt-4" id="forecast_product"><iconify-icon
                                icon="carbon:forecast-lightning"></iconify-icon>@lang('index.forecast')</button>
                    </div>
                </div>
            </form>
            @if (isset($obj) && $obj != null)
                <div class="table-box">
                    <!-- /.box-header -->
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="w-5">@lang('index.sn')</th>
                                    <th class="w-15">@lang('index.name')</th>
                                    <th class="w-15">@lang('index.code')</th>
                                    <th class="w-15">@lang('index.available_quantity')</th>
                                    <th class="w-15">@lang('index.required_quantity')</th>
                                    <th class="w-15">@lang('index.need_to_purchase')</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($obj as $value)
                                    <?php
                                    $i = $loop->iteration;
                                    ?>
                                    <tr>
                                        <td class="c_center">{{ $i-- }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->code }}</td>
                                        <td>{{ (int)$value->current_stock ?? 0 }}</td>
                                        <td>{{ $value->required_quantity }}</td>
                                        <td>{{ $value->need_to_purchase }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            @endif
        </div>

    </section>
@endsection
@section('script')
    <script src="{!! $baseURL . 'assets/datatable_custom/jquery-3.3.1.js' !!}"></script>
    <script src="{!! $baseURL . 'assets/dataTable/jquery.dataTables.min.js' !!}"></script>
    <script src="{!! $baseURL . 'assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js' !!}"></script>
    <script src="{!! $baseURL . 'assets/dataTable/dataTables.bootstrap4.min.js' !!}"></script>
    <script src="{!! $baseURL . 'assets/dataTable/dataTables.buttons.min.js' !!}"></script>
    <script src="{!! $baseURL . 'assets/dataTable/buttons.html5.min.js' !!}"></script>
    <script src="{!! $baseURL . 'assets/dataTable/buttons.print.min.js' !!}"></script>
    <script src="{!! $baseURL . 'assets/dataTable/jszip.min.js' !!}"></script>
    <script src="{!! $baseURL . 'assets/dataTable/pdfmake.min.js' !!}"></script>
    <script src="{!! $baseURL . 'assets/dataTable/vfs_fonts.js' !!}"></script>
    <script src="{!! $baseURL . 'frequent_changing/newDesign/js/forTable.js' !!}"></script>
    <script src="{!! $baseURL . 'frequent_changing/js/custom_report.js' !!}"></script>
    <script src="{!! $baseURL . 'frequent_changing/js/forecasting.js' !!}"></script>
@endsection
