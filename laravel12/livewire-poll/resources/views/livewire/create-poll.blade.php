<div>
    <form>
        <label>Poll Title</label>
        <input type="text" wire:model.live="title" />

        <h1 class="mt-4">Current Title: {{ $title }}</h1>

        <div class="mtb-4 mt-4">
            <button class="btn" wire:click.prevent="addOption">Add Option</button>
        </div>
        <div>
            @foreach ($options as $index => $option)
                <div class="mt-4">
                    {{ $index }} - {{ $option }}
                </div>
            @endforeach
        </div>
    </form>
</div>
