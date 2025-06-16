@if (!empty($name))
<div>Hello {{ $name }}, I am a blade template!</div>
@else
<div>Hello stranger, I am a blade template!</div>
@endif
