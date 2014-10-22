@extends('layout')

@section('title')
Create New {{ f('controller.name') }}
@endsection

@section('content')
<div class="contain-area">

    @section('heading')
    <h2 class="title-content">{{ f('controller.name') }}: Create</h2>
    @show

    <form method="POST">
        <div class="nav-form">
            <div class="row">
                <ul class="flat pull-left">

                    @section('button.action.left')
                    <li>
                        <a href="{{ f('controller.url', '/') }}" class="button">Back</a>
                    </li>
                    @show

                </ul>
                <ul class="flat pull-right">

                    <!-- RIGHT ACTION BUTTON -->
                    @yield('button.action.right')
                    <!-- END OF RIGHT ACTION BUTTON -->

                </ul>
            </div>
        </div>

        @section('form')
        <fieldset>
            @foreach (Norm::factory(f('controller.name'))->schema() as $name => $field)
                @unless($field['generated'] and $field['hidden'])
                    @if(isset($_SESSION)) <!-- Check whether we have started PHP session -->
                        @if(isset($_SESSION['notification'])) <!-- Check whether Notification Middleware is registered -->
                            @if(isset($_SESSION['notification']['error'][$name])) <!-- Check whether input has error -->
                                <div class="row has-error">
                            @else
                                <div class="row">
                            @endif
                        @else
                            <div class="row">
                        @endif
                    @else
                    <div class="row">
                    @endif
                        <div class="span-2">
                            {{ $field->label() }}
                        </div>
                        <div class="span-10">
                            {{ $field->formatInput(@$entry[$name], $entry) }}
                        </div>
                    </div>
                @endunless
            @endforeach
        </fieldset>
        @show

        <div class="nav-form">
            <div class="row">
                <ul class="flat pull-left">
                    @yield('button.form.left')
                </ul>
                <ul class="flat pull-right">
                    @section('button.form.right')
                    <li>
                        <input type="submit" value="Save">
                    </li>
                    @show
                </ul>
            </div>
        </div>
    </form>
</div>
@endsection
