@extends('layout')

@section('title')
{{ f('controller.name') }} Delete
@endsection

@section('content')
<div class="contain-area">

    @section('heading')
    <h2 class="title-content">
        Delete
    </h2>
    @show

    <form action="" method="POST" class="confirm-area">
        <fieldset>
            <input type="hidden" name="confirm" value="1" />

            @section('delete.warning')
            <p>
                Are you sure want to delete this entry?
            </p>
            @show

            <div class="row">
                <ul class="flat">
                    @section('delete.action')
                    <li><input type="submit" value="OK" class="button delete"></li>
                    <li><a href="{{ f('controller.url') }}" class="button">Cancel</a></li>
                    @show
                </ul>
            </div>
        </fieldset>
    </form>
</div>
@endsection
