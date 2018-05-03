<div class="col-md-4">
    <h3>New Employee</h3>

    <div class="panel panel-default">
        <div class="panel-body">
            <form method="POST" action="{{ url('/newhires') }}">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="control-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="What is the name of the new employee?" value="{{ old('name') }}">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{$errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('position_id') ? 'has-error' : '' }}">
                    <label for="position_id" class="control-label">Position:</label>

                    <select class="form-control" name="position_id">
                        <option selected disabled>Select Position...</option>

                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}" {{ old('position_id') == $position->id ? 'selected' : '' }}>
                                {{ $position->name }}
                            </option>
                        @endforeach
                    </select>

                    @if ($errors->has('position_id'))
                        <span class="help-block">
                            <strong>{{$errors->first('position') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('hire_date') ? 'has-error' : '' }}">
                    <label for="hire_date" class="control-label">Hire Date:</label>

                    <input type="text" class="form-control" id="hire_date" name="hire_date" value="{{ old('hire_date') }}">

                    @if ($errors->has('hire_date'))
                        <span class="help-block">
                            <strong>{{$errors->first('hire_date') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                    <label for="notes" class="control-label">Notes:</label>

                    <textarea class="form-control" id="notes" name="notes" value="{{ old('notes') }}" rows="5"></textarea>

                    @if ($errors->has('notes'))
                        <span class="help-block">
                            <strong>{{$errors->first('notes') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-bullhorn"></i> Announce
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
