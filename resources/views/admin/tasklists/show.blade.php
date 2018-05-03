@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header" v-text="tasklist"></h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add Task
            </a>
        </div>
        <div class="panel panel-body">
            <div class="table-responsive">
                <tasklist-draggable :tasks="tasks"></tasklist-draggable>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer_scripts')
<script>
    $(document).ready( function () {
        new Vue({
            el: '#app',
            data: {
                url: '',
                tasklist: '',
                tasks: [],
            },
            methods: {
                getTaskListId() {
                    let path = window.location.pathname
                    this.url = /\d+/.exec(path)
                },
                getTasks() {
                    axios.get(route('api.tasklists.show', this.url))
                        .then(response => {
                                this.tasklist = response.data.name
                                this.tasks = response.data.tasks
                        });
                }
            },
            created() {
                this.getTaskListId()
                this.getTasks()
            }
        });
    });
</script>
@stop
