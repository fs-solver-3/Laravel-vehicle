@foreach($demandObjects as $item)
    <a href="{{ route('profile', ['locale' => app()->getLocale(), 'demand_id' => $item->id]) }}" class="links" title="support">
    <div class="demand_block panel-body @if($item->archive) in @else out  @endif">
        <div class="demand_title">
                {{ $item->name }}
            </div>
            <div class="demand_time">
                {{ $item->created_at }}
            </div>
            <div class="demand_state">
                {{ $item->state }}
            </div>
    </div>
    </a>
@endforeach