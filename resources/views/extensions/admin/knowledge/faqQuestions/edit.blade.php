@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.knowledge.faq-questions.update', [$faqQuestion->id]) }}" method="POST"
                class="space-y-3" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                    <label for="category">{{ __('Category') }}*</label>
                    <select name="category_id" id="category" class="form-control select2" required>
                        @foreach ($categories as $id => $category)
                            <option value="{{ $id }}"
                                {{ (isset($faqQuestion) && $faqQuestion->category ? $faqQuestion->category->id : old('category_id')) == $id ? 'selected' : '' }}>
                                {{ $category }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('category_id') }}
                        </em>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('question') ? 'has-error' : '' }}">
                    <label for="question">{{ trans('cruds.faqQuestion.fields.question') }}*</label>
                    <textarea id="question" name="question" class="form-control " required>{{ old('question', isset($faqQuestion) ? $faqQuestion->question : '') }}</textarea>
                    @if ($errors->has('question'))
                        <em class="invalid-feedback">
                            {{ $errors->first('question') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.faqQuestion.fields.question_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('answer') ? 'has-error' : '' }}">
                    <label for="answer">{{ trans('cruds.faqQuestion.fields.answer') }}*</label>
                    <textarea id="answer" name="answer" class="form-control " required>{{ old('answer', isset($faqQuestion) ? $faqQuestion->answer : '') }}</textarea>
                    @if ($errors->has('answer'))
                        <em class="invalid-feedback">
                            {{ $errors->first('answer') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.faqQuestion.fields.answer_helper') }}
                    </p>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>


        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a style="margin-top:20px;" class="btn btn-outline-secondary" href="{{ url()->previous() }}">
        <i class="bi bi-chevron-left"></i> {{ trans('Back') }}
    </a>
@endpush