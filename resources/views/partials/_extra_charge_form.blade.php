<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name', $extraCharge->name ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea id="description" name="description" class="form-control">{{ old('description', $extraCharge->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="tax_id" class="form-label">Tax</label>
    <select id="tax_id" name="tax_id" class="form-control" required>
        <option value="">Select Tax</option>
        @foreach($taxes as $tax)
            <option value="{{ $tax->id }}" {{ old('tax_id', $extraCharge->tax_id ?? '') == $tax->id ? 'selected' : '' }}>
                {{ $tax->name }} ({{ $tax->rate }}%)
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="rate" class="form-label">Rate</label>
    <input type="number" id="rate" name="rate" step="0.01" value="{{ old('rate', $extraCharge->rate ?? '') }}" class="form-control" required>
</div>
