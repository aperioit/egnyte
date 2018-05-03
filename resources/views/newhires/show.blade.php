@extends('layouts.app')

@section('content')
<div id="newhire" class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>New Hire</h3>

            <ul class="list-group">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Assignment</th>
                        <th>Hire Date</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    <tr>
                        <td>{{ $newhire->id }}</td>
                        <td>{{ $newhire->name }}</td>
                        <td>{{ $newhire->position->name }}</td>
                        <td>
                            @if (count($newhire->assignment))
                                {{ $newhire->assignment->method->name }}
                            @else
                                &nbsp;
                            @endif
                        </td>
                        <td>{{ $newhire->hire_date }}</td>
                        <td>{{ $newhire->created_at }}</td>
                        <td>{{ $newhire->updated_at }}</td>
                    </tr>
                </table>
            </ul>

            <div class="panel panel-default">
                <textarea v-model="notes" class="form-control" rows="5" @blur="updateNotes()"></textarea>
            </div>

            <h3>Orders</h3>
            <ul class="list-group">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>Order Id</th>
                        <th>Equipment</th>
                        <th>Equipment Type</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Delivery Date</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>

                    @if($newhire->assignment)
                        @if($newhire->assignment->orders)
                            @foreach ($newhire->assignment->orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->equipment->name }}</td>
                                    <td>{{ $order->equipment->equipmentType->name }}</td>
                                    <td>{{ $order->order_status->name }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->deliver_date }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->updated_at }}</td>
                                </tr>
                            @endforeach
                        @endif
                    @endif
                </table>
            </ul>

            <h3>Tasks</h3>
            <ul class="list-group" id="tasks">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>Task List</th>
                        <th>Task Name</th>
                        <th>&nbsp;</th>
                    </tr>

                    @foreach ($newhire->activeTasks as $task)
                        <tr>
                            <td>
                                {{ $task->task_list_id }}
                            </td>
                            <td>
                                <b>{{ $task->task_name }}</b><br>
                                {{ $task->task_details }}
                            </td>
                            <td>
                                <a class="btn btn-default" href="/taskcomplete/{{ $task->id }}" role="button">
                                    @if (! $task->complete)
                                        <span class="glyphicon glyphicon-remove"></span>
                                    @else
                                        <span class="glyphicon glyphicon-ok"></span>
                                    @endif
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('footer_scripts')
<script>
    new Vue({
        el: '#newhire',
        data: {
            newhire: {!! json_encode($newhire->toArray()) !!},
            notes: ''
        },
        methods: {
            updateNotes() {
                axios.put('/api/newhire/notes', {
                    id: this.newhire.id,
                    notes: this.notes
                })
            },
        },
        created() {
            this.notes = this.newhire.notes;
        }
    });
</script>
@stop