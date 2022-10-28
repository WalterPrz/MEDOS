<form action="{{ route('laravelroles::roles.store') }}" method="POST" accept-charset="utf-8" id="store_role_form" class="mb-0 needs-validation" enctype="multipart/form-data" role="form" >
    {{ method_field('POST') }}
    <div class="card-body">
        @include('laravelroles::laravelroles.forms.role-form')
    </div>
    <div class="card-footer">
        <div class="row ">
            <div class="col-md-6">
                <span data-toggle="tooltip" title="{!! trans('laravelroles::laravelroles.tooltips.save-role') !!}">
                    <button type="submit" class="btn btn-success btn-lg btn-block" value="save" name="action">
                        <i class="fa fa-save fa-fw">
                            <span class="sr-only">
                                 {!! trans("laravelroles::laravelroles.forms.roles-form.buttons.save-role.sr-icon") !!}
                            </span>
                        </i>
                        {!! trans("laravelroles::laravelroles.forms.roles-form.buttons.save-role.name") !!}
                    </button>
                </span>
            </div>
        </div>
    </div>
</form>

@include('laravelroles::laravelroles.scripts.form-inputs-helpers')

<script>
    $(document).ready(function(){
        $('#name').keyup(function(e){
            var str = $('#name').val();
            str = str.replace(/\W+(?!$)/g, '.').toLowerCase();//rplace stapces with dash
            $('#slug').val(str);
            $('#slug').attr('placeholder', str);
        });
    });
</script>
