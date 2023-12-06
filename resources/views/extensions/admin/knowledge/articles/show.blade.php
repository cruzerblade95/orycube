@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.article.title') }}
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('Id') }}
                            </th>
                            <td>
                                {{ $article->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('Title') }}
                            </th>
                            <td>
                                {{ $article->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('Slug') }}
                            </th>
                            <td>
                                {{ $article->slug }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.article.fields.short_text') }}
                            </th>
                            <td>
                                {!! $article->short_text !!}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.article.fields.full_text') }}
                            </th>
                            <td>
                                {!! $article->full_text !!}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.article.fields.category') }}
                            </th>
                            <td>
                                @if ($article->category->count())
                                    <span class="label label-info label-many">{{ $article->category->name }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ __('Tags') }}
                            </th>
                            <td>
                                @foreach ($article->tags as $id => $tags)
                                    <span class="label label-info label-many">{{ $tags->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.article.fields.views_count') }}
                            </th>
                            <td>
                                {{ $article->views_count }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-primary" href="{{ url()->previous() }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>


        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a style="margin-top:20px;" class="btn btn-outline-secondary" href="{{ url()->previous() }}">
        <i class="bi bi-chevron-left"></i> {{ trans('Back') }}
    </a>
@endpush
