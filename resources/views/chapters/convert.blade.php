@extends('simple-layout')

@section('body')

    <div class="container small">

        <div class="my-s">
            @include('partials.breadcrumbs', ['crumbs' => [
                $chapter->book,
                $chapter,
                $chapter->getUrl('/convert') => [
                    'text' => trans('entities.chapters_convert'),
                    'icon' => 'convert',
                ]
            ]])
        </div>

        <div class="card content-wrap auto-height">
            <h1 class="list-heading">{{ trans('entities.chapters_convert') }}</h1>
            <p>{{ trans('entities.chapters_convert_explain', ['chapterName' => $chapter->name]) }}</p>
            <p class="text-neg"><strong>{{ trans('entities.chapters_convert_confirm') }}</strong></p>

            <form action="{{ $chapter->getUrl('/convert') }}" method="POST">

                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="PUT">

                <div class="text-right">
                    <a href="{{ $chapter->getUrl() }}" class="button outline">{{ trans('common.cancel') }}</a>
                    <button type="submit" class="button">{{ trans('common.confirm') }}</button>
                </div>
            </form>
        </div>
    </div>

@stop