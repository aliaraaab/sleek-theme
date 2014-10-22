@extends('layout')

@section('title')
{{ f('controller.name') }}
@endsection

@section('content')
<div class="contain-area">

    <!-- HEADING -->
    @section('heading')
    <h2 class="title-content">{{ f('controller.name') }}: Read</h2>
    @show
    <!-- END OF HEADING -->

    <form method="POST">
        <div class="nav-form">
            <div class="row">
                <ul class="flat pull-left">

                    <!-- LEFT ACTION BUTTON -->
                    @section('button.action.left')
                    <li>
                        <a href="{{ f('controller.url', '/') }}" class="button">Back</a>
                    </li>
                    @show
                    <!-- END OF LEFT ACTION BUTTON -->

                </ul>
                <ul class="flat pull-right">

                    <!-- RIGHT ACTION BUTTON -->
                    @section('button.action.right')
                    <li>
                        <a href="{{ URL::current() }}/update" class="button">Update</a>
                    </li>
                    <li>
                        <a href="{{ URL::current() }}/delete" class="button delete">Delete</a>
                    </li>
                    @show
                    <!-- END OF RIGHT ACTION BUTTON -->

                </ul>
            </div>
        </div>

        <!-- ENTRY -->
        @section('entry')
        <fieldset>
            @foreach (Norm::factory(f('controller.name'))->schema() as $name => $field)
                @unless($field['hidden'])
                    <div class="row">
                        <div class="span-2">
                            {{ $field->label() }}
                        </div>
                        <div class="span-10">
                            {{ $field->formatReadonly(@$entry[$name], $entry) }}
                        </div>
                    </div>
                @endunless
            @endforeach
        </fieldset>
        @show
        <!-- END OF ENTRY -->
    </form>
</div>
@endsection
