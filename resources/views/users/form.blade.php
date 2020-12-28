<div class="form-group">
    <label>Name</label>
    <input id="name" type="text" name="name"  value="{{ old('name', $user->name ?? null) }}">
</div>

<div class="form-group">
    <label>Unique Employee Identification</label>
    <input id="unique" type="text" name="unique" aria-describedby="uniqueHelp" value="{{ old('unique', $user->unique ?? null) }}">
    <small id="uniqueHelp" class="form-text text-muted">* This field is not mandatory</small>
</div>
