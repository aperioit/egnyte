@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h3>New Hires</h3>

        @foreach ($newhires as $newhire)
            <article class="flex" style="border: 1px solid #ccc;">
                <div class="box1 flex">
                    <a href="newhires/{{ $newhire->slug }}" style="font-size: 16px">
                        <span style="font-size: 18px">{{ $newhire->name }}</span><br>
                        {{ $newhire->position->name }} <span class="label" style="background-color:{{ $newhire->position->color }}">{{ $newhire->position->acronym }}</span><br>
                        Start Date: {{ $newhire->hire_date}}
                    </a>
                </div>
                <div class="box box2 flex">
                    {{-- if newhire has an assignment --}}
                    @if (@count($newhire->assignment))
                        {{-- if newhire assignment is for new equipment --}}
                        @if ($newhire->assignment->method->id == 1)
                            {{-- if newhire has orders --}}
                            @if (@count($newhire->assignment->orders))
                                @foreach ($newhire->assignment->orders as $order)
                                    <a href="/orders/{{ $order->id }}" target="_blank">
                                        <div class="flex iconbox">
                                            @if ($order->order_status_id == 4)
                                                <i class="fas fa-check fa-2x complete"></i>
                                            @else
                                                <i class="fa fa-shopping-cart fa-2x"></i>
                                            @endif
                                        </div>
                                    </a>
                                @endforeach
                            {{-- if newhire does not have orders --}}
                            @else
                                <div class="flex iconbox">
                                    <i class="fas fa-exclamation-triangle fa-2x warning"></i>
                                </div>
                            @endif
                        {{-- if newhire is getting old equipment --}}
                        @else
                            <div class="flex iconbox">
                                <i class="fas fa-check fa-2x complete"></i>
                            </div>
                        @endif
                    {{-- if newhire does not have an assignment --}}
                    @else
                        <div class="flex iconbox">
                            <i class="fas fa-question fa-2x"></i>
                        </div>
                    @endif
                    {{-- if newhire onboarding is complete --}}
                    <a href="/newhirecomplete/{{ $newhire->id }}">
                        @if ($newhire->completed)
                            <div class="flex iconbox">
                                <i class="fas fa-clipboard-check fa-2x complete"></i>
                            </div>
                        @else
                        <div class="flex iconbox">
                            <i class="fa fa-clipboard-list fa-2x danger"></i>
                        </div>
                        @endif
                    </a>
                </div>
            </article>

        @endforeach

            {{ $newhires->links() }}
        </ul>
    </div>

    @include('newhires.new-employee')
</div>
@stop

@section('footer_scripts')
<script>
    $( function() {
        $( "#hire_date" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>
@endsection
