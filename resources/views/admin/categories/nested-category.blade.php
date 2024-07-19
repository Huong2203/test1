<option value="{{ $category->id }}" @if(isset($model))
    {{ $model?->parent_id == $category?->id ? 'selected' : "" }}
    @endif>{{ $each }}{{ $category->name }}</option>

@if($category->children)

    @php($each .= "-")

    @foreach($category->children as $child)

        @include('admin.categories.nested-category', ['category' => $child])

    @endforeach

@endif
