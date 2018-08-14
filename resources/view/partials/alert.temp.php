@if ($this->exists("info")):
    <div class="alert alert-info" role="alert">
        {{ $this->flash('info') }}
    </div>
@endif