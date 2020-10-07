{{-- Injected variables: $resource, $eventsInHourSlot --}}
<div
    class="{{ $styles['resourceColumnHourSlot'] }}"
    style="height: {{ $hourHeightInRems / (60/$interval) }}rem;"
    id="{{ $_instance->id }}-{{ $resource['id'] }}-{{ $hour }}-{{$slot}}"

    ondragenter="onLivewireResourceTimeGridEventDragEnter(event, @this, '{{ $_instance->id }}', '{{ $resource['id'] }}', {{ $hour }}, {{ $slot }});"
    ondragleave="onLivewireResourceTimeGridEventDragLeave(event, @this, '{{ $_instance->id }}', '{{ $resource['id'] }}', {{ $hour }}, {{ $slot }});"
    ondragover="onLivewireResourceTimeGridEventDragOver(event);"
    ondrop="onLivewireResourceTimeGridEventDrop(event, @this, '{{ $_instance->id }}', '{{ $resource['id'] }}', {{ $hour }}, {{ $slot }});"

    wire:click.stop="hourSlotClick('{{ $resource['id'] }}', {{ $hour }}, {{ $slot }})"
>

    @foreach($eventsInHourSlot as $event)
        <div
            class="{{ $styles['eventWrapper'] }}"
            style="{{ $getEventStyles($event, $events) }}"

            draggable="true"
            ondragstart="onLivewireResourceTimeGridEventDragStart(event, '{{ $event['id'] }}')"

            wire:click.stop=""
        >
            @include($eventView, [
                'event' => $event,
            ])
        </div>
    @endforeach

</div>
