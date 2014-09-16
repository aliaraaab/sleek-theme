@section('content')
<?php $schema = \Norm::factory(f('controller.name'))->schema(); ?>

<div class="contain-area">
    <div class="container">
        <h2 class="title-content">{{ f('controller.name') }}</h2>
        <div class="nav-form">
            <div class="row">
                <div class="span-12">
                    <ul class="flat pull-left">
                        <li>
                            <a href="{{ f('controller.url', '/null/create') }}" class="button">
                                <i class="fa fa-plus"></i> Create
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="table-container">
            <table class="table nowrap stripped">
                <thead>
                    <tr>
                        @foreach ($schema as $key => $value)
                            @if(! $schema[$key]->get('hidden'))
                                <th>{{ $schema[$key]['label'] }}</th>
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @if($entries->count())
                        @foreach ($entries as $entry)
                            <tr>
                                @foreach ($schema as $key => $value)
                                    @if(! $schema[$key]->get('hidden'))
                                        <td>
                                            @if(reset($schema) == $schema[$key])
                                                <a href="{{ f('controller.url', '/'.$entry['$id']) }}">
                                                    {{ $schema[$key]->formatPlain($entry[$key], $entry) ?: 'test' }}
                                                </a>
                                            @else
                                                {{ $schema[$key]->formatPlain($entry[$key], $entry) }}
                                            @endif
                                        </td>
                                    @endif
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
    </div>
</div>

@endsection