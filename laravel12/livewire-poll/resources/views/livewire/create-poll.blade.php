<div>
    <form>
        <label>Poll Title</label>
        <input type="text" wire:model.live="title" />

        <h1>Current Title: {{ $title }}</h1>
    </form>
</div>
