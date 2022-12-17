<form
    @if(!$data)
        action="{{route($route_name.'.store')}}"
    @else
        action="{{route($route_name.'.update',['product'=>$data->id])}}"
    @endif
    enctype="multipart/form-data"
    method="post">
    @if($data)
        @method('PUT')
    @endif
    @csrf
    @foreach($fields as $name=>$field)
        @if($field["element"]=="input")
            <div class="mb-3">
                <label for="id_{{$field["name"]}}" class="form-label text-capitalize">@lang($name)</label>
                @if($field["type"]=="checkbox")
                    @include('model-form::components.input.checkbox')
                @elseif($field["type"]=="radio")
                    @include('model-form::components.input.radio')
                @else
                    @include('model-form::components.input.text')
                @endif
                @error($field["name"])
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        @elseif($field["element"]=="textarea")
            @include('model-form::components.textarea.textarea')
        @elseif($field["element"]=="select")
            @include('model-form::components.select.select')
        @elseif($field["element"]=="foreign")
            @include('model-form::components.select.foreign')
        @endif

    @endforeach
    <button type="submit" class="btn btn-primary">@lang('Send')</button>
</form>
