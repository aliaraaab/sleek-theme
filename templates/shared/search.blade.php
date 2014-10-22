@extends('layout')

@section('title')
{{ f('controller.name') }} Listing
@endsection

@section('content')
<?php $schema = f('controller')->schema(); ?>

<div class="contain-area">

    <!-- HEADING -->
    @section('heading')
    <h2 class="title-content">{{ f('controller.name') }}</h2>
    @show
    <!-- END OF HEADING -->

    <div class="nav-form">
        <div class="row">
            <div class="span-12">
                <ul class="flat pull-left">

                    <!-- LEFT ACTION BUTTON -->
                    @section('button.action.left')
                    <li>
                        <a href="{{ f('controller.url', '/null/create') }}" class="button">
                            <i class="fa fa-plus"></i> Create
                        </a>
                    </li>
                    @show
                    <!-- END OF LEFT ACTION BUTTON -->

                    <ul class="flat pull-right">

                        <!-- RIGHT ACTION BUTTON -->
                        @yield('button.action.right')
                        <!-- END OF RIGHT ACTION BUTTON -->

                    </ul>
                </ul>
            </div>
        </div>
    </div>

    <!-- ENTRIES -->
    @section('entries')
    <div class="table-container">
        <table class="table nowrap stripped">
            <thead>
                <tr>
                    @foreach ($schema as $key => $value)
                        @unless($schema[$key]->get('hidden'))
                            <th>{{ $schema[$key]['label'] }}</th>
                        @endunless
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @if($entries->count())
                    @foreach ($entries as $entry)
                        <tr>
                            @foreach ($schema as $key => $value)
                                @unless($schema[$key]->get('hidden'))
                                    <td>
                                        @if(reset($schema) == $schema[$key])
                                            <a href="{{ f('controller.url', '/'.$entry['$id']) }}">
                                                {{ $schema[$key]->formatPlain($entry[$key], $entry) }}
                                            </a>
                                        @else
                                            {{ $schema[$key]->formatPlain($entry[$key], $entry) }}
                                        @endif
                                    </td>
                                @endunless
                            @endforeach
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="{{ count($schema) }}" align="center">
                            <strong>Empty</strong>
                        </td>
                    </tr>
                @endif
            </tbody>
       </table>
    </div>
    @show
    <!-- END OF ENTRIES -->

    <!-- PAGINATION -->
    @section('pagination')
    <div class="pager-wrapper">
        {{ KrisanAlfa\Theme\Components\Pagination::create($entries)->paginate(); }}
    </div>
    @show
    <!-- END OF PAGINATION -->

</div>

@endsection
