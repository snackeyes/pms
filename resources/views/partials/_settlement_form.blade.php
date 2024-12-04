<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', $settlementType->name ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="payment_option" class="form-label">Payment Option</label>
    <select name="payment_option" id="payment_option" class="form-control" required>
        <option value="none" {{ old('payment_option', $settlementType->payment_option ?? '') == 'none' ? 'selected' : '' }}>None</option>
        <option value="credit_card" {{ old('payment_option', $settlementType->payment_option ?? '') == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
        <option value="check" {{ old('payment_option', $settlementType->payment_option ?? '') == 'check' ? 'selected' : '' }}>Check</option>
        <option value="loyalty" {{ old('payment_option', $settlementType->payment_option ?? '') == 'loyalty' ? 'selected' : '' }}>Loyalty</option>
    </select>
</div>

<div class="mb-3">
    <label for="surcharge_amount" class="form-label">Surcharge Amount</label>
    <input type="number" step="0.01" name="surcharge_amount" id="surcharge_amount" value="{{ old('surcharge_amount', $settlementType->surcharge_amount ?? 0) }}" class="form-control">
</div>

<div class="mb-3">
    <label for="surcharge_percentage" class="form-label">Surcharge Percentage</label>
    <input type="number" step="0.01" name="surcharge_percentage" id="surcharge_percentage" value="{{ old('surcharge_percentage', $settlementType->surcharge_percentage ?? 0) }}" class="form-control">
</div>
