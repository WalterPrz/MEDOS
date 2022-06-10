@php
    if(!$level){
        $level = 0;
    }
@endphp

<div class="col-12">
    <input type="hidden" id="level" name="level" min="0" step="1" onkeypress="return event.charCode >= 48" class="form-control" value="{{ $level }}" placeholder="{{ trans('laravelroles::laravelroles.forms.roles-form.role-level.placeholder') }}">
</div>