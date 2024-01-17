<div class="row mb-3">
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'name';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "required";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'slug';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'site';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "required";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'description';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'taxon_id';
            $field_label = __("collection::$module_name.$field_name");
            $field_relation = "taxon";
            $field_placeholder = __("Select an option");
            $required = "required";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, isset($$module_name_singular)?optional($$module_name_singular->$field_relation)->pluck('name', 'id'):'')->placeholder($field_placeholder)->class('form-control select2-taxon')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'status';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = __("Select an option");
            $required = "required";
            $select_options = [
                '1' => 'Published',
                '0' => 'Unpublished',
                '2' => 'Draft'
            ];
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-select')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'order';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'meta_title';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'meta_keywords';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12 col-sm-6">
        <div class="form-group">
            <?php
            $field_name = 'meta_description';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>

<!-- Select2 Library -->
<x-library.select2 />

@push ('after-scripts')
<script type="module">
    $(document).ready(function() {
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
            document.querySelector('.select2-container--open .select2-search__field').focus();
        });

        $('.select2-taxon').select2({
            theme: "bootstrap4",
            placeholder: '@lang("Select an option")',
            minimumInputLength: 2,
            allowClear: true,
            ajax: {
                url: '{{route("backend.taxons.index_list")}}',
                dataType: 'json',
                data: function(params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
    });
</script>
@endpush