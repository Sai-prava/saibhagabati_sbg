@extends('layouts.app')

@section('script_top')
    <?php
    $baseURL = getBaseURL();
    $setting = getSettingsInfo();
    ?>
@endsection

@section('content')
    <section class="main-content-wrapper">
        <section class="content-header">
            <h3 class="top-left-header">
                {{ isset($title) && $title ? $title : '' }}
            </h3>
        </section>


        <div class="box-wrapper">
            <!-- general form elements -->
            <div class="table-box">
                <!-- form start -->
                {!! Form::model(isset($obj) && $obj ? $obj : '', [
                    'method' => isset($obj) && $obj ? 'PATCH' : 'POST',
                    'files' => true,
                    'route' => ['user.update', isset($obj->id) && $obj->id ? $obj->id : ''],
                    'enctype' => 'multipart/form-data',
                    'id' => 'common-form',
                ]) !!}
                @csrf
                <div>
                    <div class="row">
                        <input type="hidden" id="company_name" value="1">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                            <div class="form-group">
                                <label for="">@lang('index.roles') {!! starSign() !!}</label>
                                <select name="role" id="role"
                                    class="form-control @error('role') is-invalid @enderror select2">
                                    <option value="">@lang('index.select')</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ (isset($obj) && $obj->permission_role == $role->id) == $role->id || old('role') == $role->id ? 'selected' : '' }}>
                                            {{ $role->title ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group">
                                    <label>@lang('index.user_name') {!! starSign() !!}</label>
                                    <input type="text" name="user_name"
                                        class="form-control @error('user_name') is-invalid @enderror user_name"
                                        placeholder="{{ __('index.name') }}"
                                        value="{{ isset($obj) && $obj->user_name ? $obj->user_name : old('user_name') }}">
                                </div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group">
                                    <label>@lang('index.designation') {!! starSign() !!}</label>
                                    <input type="text" name="designation"
                                        class="form-control @error('designation') is-invalid @enderror designation"
                                        placeholder="{{ __('index.designation') }}"
                                        value="{{ isset($obj) && $obj->designation ? $obj->designation : old('designation') }}">
                                </div>
                                @error('designation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group">
                                    <label>@lang('index.email') {!! starSign() !!}</label>
                                    <input type="text" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="{{ __('index.email') }}"
                                        value="{{ isset($obj) && $obj->email ? $obj->email : old('email') }}">
                                </div>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group">
                                    <label>@lang('index.phone_number') {!! starSign() !!}</label>
                                    <input type="text" name="phone_number"
                                        class="form-control @error('phone_number') is-invalid @enderror"
                                        placeholder="{{ __('index.phone_number') }}"
                                        value="{{ isset($obj) && $obj->phone_number ? $obj->phone_number : old('phone_number') }}">
                                </div>
                                @error('phone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group">
                                    <label>
                                        @lang('index.password')
                                        @if (!isset($obj))
                                            {!! starSign() !!}
                                        @endif
                                        @if (isset($obj))
                                            <span class="text-danger">({{ __('index.password_keep_blank') }})</span>
                                        @endif
                                    </label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" id="password" autocomplete="off"
                                        placeholder="{{ __('index.password') }}" maxlength="10">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group">
                                    <label>
                                        @lang('index.salary')
                                    </label>
                                    <input type="number" class="form-control @error('title') is-invalid @enderror"
                                        name="salary" id="salary" autocomplete="off"
                                        value="{{ isset($obj->salary) ? $obj->salary : old('salary') }}"
                                        placeholder="{{ __('index.salary') }}" maxlength="10">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group">
                                    <label>
                                        DOB
                                    </label>
                                    <input type="date" class="form-control @error('title') is-invalid @enderror"
                                        name="dob" id="dob" autocomplete="off"
                                        value="{{ isset($obj->dob) ? $obj->dob : old('	dob') }}" placeholder="">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender">
                                        <option value="">Select Gender</option>
                                        <option value="Male" {{ (isset($obj->gender) && $obj->gender == 'Male') ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ (isset($obj->gender) && $obj->gender == 'Female') ? 'selected' : '' }}>Female</option>
                                        <option value="Other" {{ (isset($obj->gender) && $obj->gender == 'Other') ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                            </div>
                            

                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group">
                                    <label>
                                        Date of Joining
                                    </label>
                                    <input type="date" class="form-control @error('title') is-invalid @enderror"
                                        name="date_of_joining" id="date_of_joining" autocomplete="off"
                                        value="{{ isset($obj->date_of_joining) ? $obj->date_of_joining : old('date_of_joining') }}">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group">
                                    <label>
                                        Address
                                    </label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="address" id="address" autocomplete="off"
                                        value="{{ isset($obj->address) ? $obj->address : old('address') }}" placeholder="Enter the address">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group">
                                    <label>@lang('index.status') {!! starSign() !!}</label>

                                    <select name="status" id="status"
                                        class="form-control @error('status') is-invalid @enderror select2">
                                        <option value="Active"
                                            {{ isset($obj->status) && $obj->status == 'Active' ? 'selected' : null }}>
                                            {{ __('index.active') }}</option>
                                        <option value="Inactive"
                                            {{ isset($obj->status) && $obj->status == 'Inactive' ? 'selected' : null }}>
                                            {{ __('index.in_active') }}</option>
                                    </select>
                                </div>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12 col-md-6 mb-2 d-flex gap-3">
                                <button type="submit" name="submit" value="submit"
                                    class="btn bg-blue-btn"><iconify-icon
                                        icon="solar:check-circle-broken"></iconify-icon>@lang('index.submit')</button>
                                <a class="btn bg-second-btn" href="{{ route('user.index') }}"><iconify-icon
                                        icon="solar:round-arrow-left-broken"></iconify-icon>@lang('index.back')</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
    </section>
@endsection

@section('script')
    <?php
    $baseURL = getBaseURL();
    ?>
    <script type="text/javascript" src="{!! $baseURL . 'frequent_changing/js/role.js' !!}"></script>
@endsection
