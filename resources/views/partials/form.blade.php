<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>{{ $title }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ $formAction }}" method="POST">
                @csrf
                {{-- Add method override for PUT if editing --}}
                @if(isset($isEdit) && $isEdit)
                    @method('PUT')
                @endif

                {{-- Loop through fields and render inputs --}}
                @foreach($fields as $field)
                    <div class="mb-3">
                        <label for="{{ $field['name'] }}" class="form-label">{{ $field['label'] }}</label>
                        {{-- Check for textarea type --}}
                        @if($field['type'] === 'textarea')
                            <textarea id="{{ $field['name'] }}" 
                                      name="{{ $field['name'] }}" 
                                      class="form-control"
                                      {{ $field['required'] ? 'required' : '' }}>{{ old($field['name'], $field['value'] ?? '') }}</textarea>
                        @else
                            <input type="{{ $field['type'] }}" 
                                   id="{{ $field['name'] }}" 
                                   name="{{ $field['name'] }}" 
                                   step="{{ $field['step'] ?? '' }}" 
                                   value="{{ old($field['name'], $field['value'] ?? '') }}" 
                                   class="form-control"
                                   {{ $field['required'] ? 'required' : '' }}>
                        @endif
                    </div>
                @endforeach

                {{-- Submit button --}}
                <button type="submit" class="btn btn-success">{{ $buttonText }}</button>
            </form>
        </div>
    </div>
</div>
